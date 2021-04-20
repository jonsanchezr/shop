<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdsCategory;
use App\Http\Requests\AdsCategoryRequest;
use App\Http\Controllers\Controller;
use App\Repositories\AdsCategoryRepository;
use Illuminate\Http\Request;

class AdsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adsCategories = AdsCategory::all();
        $arg = [
            'adsCategories' => $adsCategories
        ];
        return $this->responseViewAdmin('admin.tables.adsCategoryTable', $arg);
    }

     public function create()
    {
        $arg = [];
        return $this->responseViewAdmin('admin.forms.adsCategoryForm', $arg);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdsCategoryRequest $request)
    {
        AdsCategoryRepository::store($request);

        return redirect()
            ->route('adscategories.index');
    }

     public function show($id)
    { 
        $adsCategory = AdsCategory::where('id', $id)->first();
        $arg = [
            'adsCategory' => $adsCategory,
        ];
        return $this->responseViewAdmin('admin.forms.adsCategoryForm', $arg);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdsCategoryRequest $request, $id)
    {
        AdsCategoryRepository::update($request, $id);
        return redirect()->route('adscategories.index');
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
        
        AdsCategoryRepository::destroy($id);
        return redirect()->route('adscategories.index');
    }
}