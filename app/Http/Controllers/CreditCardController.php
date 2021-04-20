<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreditCard;
use App\User;
use App\Http\Requests\CreditCardRequest;


 

class CreditCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $creditcards = CreditCard::all();
        return view('tables.creditCardTable', compact('creditcards'));
    }

     public function create()
    {
        $users = User::all();
        return view('forms.creditCardCreateFrom', compact('users'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreditCardRequest $request)
    {

        $creditcard = new CreditCard;

        $creditcard->user_id = $request->user_id;
        $creditcard->card_number = $request->card_number;
        $creditcard->name = $request->name;   
        $creditcard->expire = $request->expire;
        $creditcard->cvc = $request->cvc;

        $creditcard->save();

        return redirect()
            ->route('creditcards.index');
    }

      public function show($id)
    { 
        $users = User::all();
         $creditcard = CreditCard::where('id', $id)->first();
        return view('forms.creditCardUpdateForm', compact('creditcard', 'users'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreditCardRequest $request, $id)
    {
        CreditCard::where('id', $id)
          ->update([
            'user_id' => $request->user_id,
            'card_number' => $request->card_number,
            'name' => $request->name,
            'expire' => $request->expire,
            'cvc' => $request->cvc,
        ]);

        return redirect()->route('creditcards.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $deletedRows = CreditCard::where('id', $id)->delete();
        return redirect()->route('creditcards.index');
    }
}
