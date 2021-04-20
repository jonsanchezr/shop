<?php

namespace App\Http\Controllers\Admin;

use App\Models\PaymentMethod;
use App\Http\Requests\PaymentMethodRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentMethods = PaymentMethod::all();
        $arg = [
            'paymentMethods' => $paymentMethods
        ];
        return $this->responseViewAdmin('admin.tables.paymentMethodTable', $arg);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arg = [];
        return $this->responseViewAdmin('admin.forms.paymentMethodForm', $arg);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentMethodRequest $request)
    {

        $paymentMethod = new PaymentMethod;

        $paymentMethod->name = $request->name;

        $paymentMethod->save();

        return redirect()->route('paymentmethods.index');
    }

    public function show($id)
    {
        $paymentMethod = PaymentMethod::where('id', $id)->first();
        $arg = [
            'paymentMethod' => $paymentMethod
        ];
        return $this->responseViewAdmin('admin.forms.paymentMethodForm', $arg);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentMethodRequest $request, $id)
    {
        PaymentMethod::where('id', $id)
          ->update([
            'name' => $request->name,
            
        ]);

        return redirect()->route('paymentmethods.index');
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

        $deletedRows = PaymentMethod::where('id', $id)->delete();
        return redirect()->route('paymentmethods.index');
    }

}