<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdsCheckout;
use App\Http\Controllers\Controller;
use App\Repositories\AdsCheckoutRepository;
use App\Http\Requests\AdsCheckoutRequest;
use Illuminate\Http\Request;

class AdsCheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adsCheckouts = AdsCheckout::all();
        $arg = [
            'adsCheckouts' => $adsCheckouts
        ];
        return $this->responseViewAdmin('admin.tables.adsCheckoutTable', $arg);
    }

     public function create()
    {
        $arg = [];
        return $this->responseViewAdmin('admin.forms.adsCheckoutForm', $arg);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdsCheckoutRequest $request)
    {
        AdsCheckoutRepository::store($request);

        return redirect()
            ->route('adscheckouts.index');
    }

     public function show($id)
    { 
         $adsCheckout = AdsCheckout::where('id', $id)->first();
         $arg = [
            'adsCheckout' => $adsCheckout,
         ];
        return $this->responseViewAdmin('admin.forms.adsCheckoutForm', $arg);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdsCheckoutRequest $request, $id)
    {
        AdsCheckoutRepository::update($request, $id);

        return redirect()->route('adscheckouts.index');
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

        AdsCheckoutRepository::destroy($id);

        return redirect()->route('adscheckouts.index');
    }
}