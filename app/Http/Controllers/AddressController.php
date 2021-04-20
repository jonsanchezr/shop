<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\User;
use App\Http\Requests\AddressRequest;


 

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::all();
        return view('tables.addressTable', compact('addresses'));
    }

     public function create()
    {
        $users = User::all();
        return view('forms.addressCreateFrom', compact('users'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressRequest $request)
    {

        $address = new Address;

        $address->user_id = $request->user_id;
        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->email = $request->email;
        $address->phone = $request->phone;
        $address->company = $request->company ?? null;
        $address->country = $request->country;
        $address->city = $request->city ?? null;
        $address->code_postal = $request->code_postal;
        $address->address_1 = $request->address_1;
        $address->address_2 = $request->address_2 ?? null;

        $address->save();

        return redirect()
            ->route('address.index');
    }

     public function show($id)
    { 
        $users = User::all();
         $address = Address::where('id', $id)->first();
        return view('forms.addressUpdateForm', compact('address', 'users'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddressRequest $request, $id)
    {
        Address::where('id', $id)
          ->update([
            'user_id' => $request->user_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'country' => $request->country,
            'city' => $request->city,
            'code_postal' => $request->code_postal,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            
        ]);

        return redirect()->route('address.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $deletedRows = Address::where('id', $id)->delete();
        return redirect()->route('address.index');
    }
}