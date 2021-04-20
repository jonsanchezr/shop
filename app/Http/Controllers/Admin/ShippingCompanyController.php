<?php

namespace App\Http\Controllers\Admin;

use App\Models\ShippingCompany;
use App\Http\Requests\ShippingCompanyRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippingcompaies = ShippingCompany::all();
        $arg = [
            'shippingcompaies' => $shippingcompaies
        ];
        return $this->responseViewAdmin('admin.tables.shippingCompanyTable', $arg);
    }

     public function create()
    {
        $arg = [];
        return $this->responseViewAdmin('admin.forms.shippingCompanyForm', $arg);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShippingCompanyRequest $request)
    {

        $shippingcompany = new ShippingCompany;

        $shippingcompany->name = $request->name;
        $shippingcompany->description = $request->description;
        $shippingcompany->delivery_time = $request->delivery_time;
        $shippingcompany->price = $request->price;
        $shippingcompany->save();

        return redirect()->route('shippingcompanies.index');
    }

     public function show($id)
    {   
        $shippingcompany = ShippingCompany::where('id', $id)->first();
        $arg = [
            'shippingcompany' => $shippingcompany
        ];
        return $this->responseViewAdmin('admin.forms.shippingCompanyForm', $arg);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShippingCompanyRequest $request, $id)
    {
        ShippingCompany::where('id', $id)
          ->update([
            'name' => $request->name,
            'description' => $request->description,
            'delivery_time' => $request->delivery_time,
            'price' => $request->price,
            
        ]);

        return redirect()->route('shippingcompanies.index');
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

        $deletedRows = ShippingCompany::where('id', $id)->delete();
        return redirect()->route('shippingcompanies.index');
    }
}