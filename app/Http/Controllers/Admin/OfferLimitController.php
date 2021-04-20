<?php

namespace App\Http\Controllers\Admin;

use App\Models\OfferLimit;
use App\Http\Controllers\Controller;
use App\Http\Requests\OfferLimitRequest;
use App\Http\Resources\OfferLimitResource;
use App\Repositories\OfferLimitRepository;
use Illuminate\Http\Request;

class OfferLimitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offerLimits = OfferLimit::all();
        $arg = [
            'offerLimits' => OfferLimitResource::collection($offerLimits)
        ];
        return $this->responseViewAdmin('admin.tables.offerLimitTable', $arg);
    }

     public function create()
    {
        $arg = [];
        return $this->responseViewAdmin('admin.forms.offerLimitForm', $arg);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferLimitRequest $request)
    {
        OfferLimitRepository::store($request);

        return $this->responseRedirectAdmin('offerlimits.index', 'Offer Limit Creado');
    }

     public function show($id)
    { 
        $offerLimit = OfferLimit::where('id', $id)->first();
        $arg = [
            'offerLimit' => $offerLimit
        ];
        return $this->responseViewAdmin('admin.forms.offerLimitForm', $arg);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OfferLimitRequest $request, $id)
    {
        OfferLimitRepository::update($request, $id);

        return $this->responseRedirectAdmin('offerlimits.index', 'Offer Limit Actualizado');
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

        OfferLimitRepository::destroy($id);
        return $this->responseRedirectAdmin('offerlimits.index', 'Offer Limit Borrado');
    }

}