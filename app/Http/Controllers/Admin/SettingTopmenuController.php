<?php

namespace App\Http\Controllers\Admin;

use App\Models\SettingTopmenu;
use App\Http\Requests\SettingTopmenuRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingTopmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settingTopmenus = SettingTopmenu::all();
        $arg = [
            'settingTopmenus' => $settingTopmenus,
        ];

        return $this->responseViewAdmin('admin.tables.settingTopmenuTable', $arg);
    }

    public function create()
    { 
        $arg = [];

        return $this->responseViewAdmin('admin.forms.settingTopmenuForm', $arg);
    }

    public function store(SettingTopmenuRequest $request)
    {
        $settingTopmenu = new SettingTopmenu;

        $settingTopmenu->title = $request->title;
        $settingTopmenu->url = $request->url;
        $settingTopmenu->save();

        return redirect()->route('settingtopmenus.index');
    }

    public function show($id)
    {
        $settingTopmenu = SettingTopmenu::where('id', $id)->first();
        $arg = [
            'settingTopmenu' => $settingTopmenu
        ];

        return $this->responseViewAdmin('admin.forms.settingTopmenuForm', $arg);
    }

    public function update(SettingTopmenuRequest $request, $id)
    {
        SettingTopmenu::where('id', $id)
          ->update([
            'title' => $request->title,
            'url' => $request->url,
            
        ]);

        return redirect()->route('settingtopmenus.index');
    }

    public function destroy($id)
    {
        $this->hasRole('admin');

        $deletedRows = SettingTopmenu::where('id', $id)->delete();
        return redirect()->route('settingtopmenus.index');
    }


}