<?php

namespace App\Http\Controllers\Admin;

use App\Models\SettingTopcategory;
use App\Models\category;
use App\Http\Requests\SettingTopcategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingTopcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settingTopcategories = SettingTopcategory::with('category')->get();
        $arg = [
            'settingTopcategories' => $settingTopcategories
        ];
        return $this->responseViewAdmin('admin.tables.settingTopcategoryTable', $arg);
    }

    public function create()
    {
        $categories = Category::all();
        $arg = [
            'categories' => $categories
        ];
        return $this->responseViewAdmin('admin.forms.settingTopcategoryForm', $arg); 
    }

    public function store(SettingTopcategoryRequest $request)
    {
         $SettingTopcategory = new SettingTopcategory;

        $SettingTopcategory->category_id = $request->category_id;

        $SettingTopcategory->save();

        return redirect()->route('settingtopcategories.index');
    }

    public function show($id)
    {
        $categories = Category::all();
        $settingTopcategory = SettingTopcategory::where('id', $id)->first();
        $arg = [
            'categories' => $categories,
            'settingTopcategory' => $settingTopcategory,
        ];
        return $this->responseViewAdmin('admin.forms.settingTopcategoryForm', $arg);
    }

    public function update(SettingTopcategoryRequest $request, $id)
    {
        SettingTopcategory::where('id', $id)
          ->update([
            'category_id' => $request->category_id,
            
        ]);

        return redirect()->route('settingtopcategories.index');
    }

    public function destroy($id)
    {
        $this->hasRole('admin');

        $deletedRows = SettingTopcategory::where('id', $id)->delete();
        return redirect()->route('settingtopcategories.index');
    }


}