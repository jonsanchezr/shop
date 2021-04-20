<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\ProfileCompany;
use App\Models\Profile;
use App\Models\Address;
use App\Models\Order;
use App\Models\CreditCard;
use App\Models\OrderProduct;
//use App\Http\Requests\AddressRequest; 

class UserPublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $profile = Profile::where('user_id', \Auth::user()->id)->first();
        $address= Address::where('user_id', \Auth::user()->id)->first();
        $orders = Order::all();

        $activeTopMenu = '/users/profile';

        $arg = [
            'activeTopMenu' => $activeTopMenu,
            'profile' => $profile,
            'orders' => $orders,
            'address' => $address
        ];

        return $this->responseViewPublic('usersPublic.profile', $arg);
    }

    public function profileStore(Request $request)
    {

         Address::where('id', (int)$request->address_id)
          ->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone, 
        ]);

        Profile::where('id', (int)$request->profile_id)
          ->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,     
            'identity' => $request->identity,     
        ]);

          return redirect()->route('users.profile');
        
    }

    public function address()
    { 
        $profile = Profile::where('user_id', \Auth::user()->id)->first();
        $address= Address::where('user_id', \Auth::user()->id)->first();
        $orders = Order::all();

        $activeTopMenu = '/users/address';

        $arg = [
            'profile' => $profile,
            'orders' => $orders,
            'address' => $address,
            'activeTopMenu' => $activeTopMenu,
        ];

        return $this->responseViewPublic('usersPublic.address', $arg);
    }

    public function addressStore(Request $request)
    {
        Address::where('id', (int)$request->address_id)
          ->update([
            'company' => $request->company, 
            'country' => $request->country, 
            'city' => $request->city, 
            'code_postal' => $request->code_postal, 
            'address_1' => $request->address_1, 
            'address_2' => $request->address_2, 
        ]);

          return redirect()->route('users.address');
    }

    public function order()
    {
        $profile = Profile::where('user_id', \Auth::user()->id)->first();
        $orders = Order::with('statu', 'shippingCompany')->where('user_id', \Auth::user()->id)->latest()->get();
        $activeTopMenu = '/users/orders';

        $arg = [
            'profile' => $profile,
            'orders' => $orders,
            'activeTopMenu' => $activeTopMenu,
        ];

        return $this->responseViewPublic('usersPublic.order', $arg);
    }

    public function download($id)
    {
        $order = Order::with('address', 'shippingCompany', 'paymentMethod', 'products')->where('id', $id)->first();
        $profileCompany = ProfileCompany::all();
        $creditCard = CreditCard::where('user_id', \Auth::user()->id)->first();
        $orderProduct = OrderProduct::where('order_id', $order['id'])->get();

        $data = [
            'order' => $order,
            'creditCard' => $creditCard,
            'profileCompany' => $profileCompany,
            'orderProduct' => $orderProduct,
            'subTotalCart' => $this->subTotalCart() 
        ];

        $pdf = \PDF::loadView('index.invoice-pdf', $data);

        return $pdf->stream('A-'. str_pad($order->id, 4, "0", STR_PAD_LEFT) .'.pdf');
    }
} 