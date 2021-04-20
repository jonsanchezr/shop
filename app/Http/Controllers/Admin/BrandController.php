<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Repositories\BrandRepository;
 

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();

        $arg = [
            'brands' => BrandResource::collection($brands)
        ];
        return $this->responseViewAdmin('admin.tables.brandTable', $arg);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arg = [];
        return $this->responseViewAdmin('admin.forms.brandForm', $arg);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {   
        BrandRepository::store($request);

        return redirect()
            ->route('brands.index')
            ->with('success','Brand Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $brand = Brand::where('slug', $slug)->first();


        $arg = [
            'brand' => new BrandResource($brand)
        ];
        return $this->responseViewAdmin('admin.forms.brandForm', $arg);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(BrandRequest $request, $slug)
    {
       BrandRepository::update($request, $slug);

        return redirect()->route('brands.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $this->hasRole('admin');

        BrandRepository::destroy($slug);
        return redirect()->route('brands.index');
    }
}
