<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tax;
use App\Http\Controllers\Controller;
use App\Http\Requests\TaxRequest;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxs = Tax::all();
        $arg = [
            'taxs' => $taxs
        ];
        return $this->responseViewAdmin('admin.tables.taxTable', $arg);
    }

     public function create()
    {
        $arg = [];
        return $this->responseViewAdmin('admin.forms.taxForm', $arg);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaxRequest $request)
    {

        $tax = new Tax;

        $tax->amount = $request->amount;
        $tax->save();

        return redirect()->route('tax.index');
    }

     public function show($id)
    { 
        $tax = Tax::where('id', $id)->first();
        $arg = [
            'tax' => $tax
        ];
        return $this->responseViewAdmin('admin.forms.taxForm', $arg);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaxRequest $request, $id)
    {
        Tax::where('id', $id)
          ->update([
            'amount' => $request->amount,
     
        ]);

        return redirect()->route('tax.index');
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

       $deletedRows = Tax::where('id', $id)->delete();
        return redirect()->route('tax.index');
    }
}