<?php

namespace App\Http\Controllers\Admin;

use App\Models\Statu;
use App\Http\Requests\StatuRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = Statu::all();
        $arg = [
            'status' => $status
        ];
        return $this->responseViewAdmin('admin.tables.statuTable', $arg);
    }

     public function create()
    {
        $arg = [];
        return $this->responseViewAdmin('admin.forms.statuForm', $arg);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatuRequest $request)
    {

        $statu = new Statu;

        $statu->name = $request->name; 
        $statu->save();

        return redirect()->route('status.index');
    }

     public function show($id)
    { 
        $statu = Statu::where('id', $id)->first();
        $arg = [
            'statu' => $statu
        ];
        return $this->responseViewAdmin('admin.forms.statuForm', $arg);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StatuRequest $request, $id)
    {
        Statu::where('id', $id)
          ->update([
            'name' => $request->name,
            
        ]);

        return redirect()->route('status.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->hasRole('admin');

        $deletedRows = Statu::where('id', $id)->delete();
        return redirect()->route('status.index');
    }
}