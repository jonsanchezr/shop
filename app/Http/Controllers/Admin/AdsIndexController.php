<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdsIndex;
use App\Http\Requests\AdsIndexRequest;
use App\Http\Controllers\Controller;
use App\Repositories\AdsIndexRepository;
use Illuminate\Http\Request;

class AdsIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adsIndexs = AdsIndex::all();
        $arg = [
            'adsIndexs' => $adsIndexs
        ];
        return $this->responseViewAdmin('admin.tables.adsIndexTable', $arg);
    }

     public function create()
    {
        $arg = [];
        return $this->responseViewAdmin('admin.forms.adsIndexForm', $arg);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdsIndexRequest $request)
    {
        AdsIndexRepository::store($request);

        return redirect()
            ->route('adsindex.index');
    }

     public function show($id)
    { 
        $adsIndex = AdsIndex::where('id', $id)->first();
        $arg = [
            'adsIndex' => $adsIndex,
        ];
         return $this->responseViewAdmin('admin.forms.adsIndexForm', $arg);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdsIndexRequest $request, $id)
    {
        AdsIndexRepository::update($request, $id);

        return redirect()->route('adsindex.index');
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

        AdsIndexRepository::destroy($id);

        return redirect()->route('adsindex.index');
    }
}