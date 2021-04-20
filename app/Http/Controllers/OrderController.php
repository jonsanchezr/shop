<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Address;
use App\Models\PaymentMethod;
use App\Models\Statu;
use App\Models\ShippingCompany;
use App\User;
use App\Http\Requests\OrderRequest;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $orders = Order::all();
        return view('tables.orderTable', compact('orders'));
    }

     public function create()
    {
        $users = User::all();
        $addresses = Address::all();
        $paymentMethods = PaymentMethod::all();
        $status = Statu::all();
        $shippingCompanies = ShippingCompany::all();
        return view('forms.orderCreateFrom', compact(
            'users',
            'addresses',
            'paymentMethods',
            'status',
            'shippingCompanies'
        ));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {

        $order = new Order;

        $order->user_id = $request->user_id;
        $order->address_id = $request->address_id;
        $order->payment_method_id = $request->payment_method_id;
        $order->statu_id = $request->statu_id;
        $order->shipping_company_id = $request->shipping_company_id;
        $order->total = $request->total;
        $order->subtotal = $request->subtotal;
        $order->tax = $request->tax;
        

        $order->save();

        return redirect()
            ->route('orders.index');
    }

     public function show($id)
    { 
        $users = User::all();
        $addresses = Address::all();
        $paymentMethods = PaymentMethod::all();
        $status = Statu::all();
        $shippingCompanies = ShippingCompany::all();
        $order = Order::where('id', $id)->first();
        return view('forms.orderUpdateForm', compact(
            'users',
            'addresses',
            'paymentMethods',
            'status',
            'shippingCompanies',
            'order',
        ));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        Order::where('id', $id)
          ->update([
            'user_id' => $request->user_id,
            'address_id' => $request->address_id,
            'payment_method_id' => $request->payment_method_id,
            'statu_id' => $request->statu_id,
            'shipping_company_id' => $request->shipping_company_id,
            'total' => $request->total,
            'subtotal' => $request->subtotal,
            'tax' => $request->tax,
            
        ]);

        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $deletedRows = Order::where('id', $id)->delete();
        return redirect()->route('orders.index');
    }

}