<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Models\Brand;
use App\Http\Requests\SliderRequest;
use App\Repositories\SliderRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        $arg = [
            'sliders' => $sliders
        ];
        return $this->responseViewAdmin('admin.tables.sliderTable', $arg);
    }

    public function create()
    {
        $brands = Brand::all();
        $arg = [
            'brands' => $brands
        ];
        return $this->responseViewAdmin('admin.forms.sliderForm', $arg);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        SliderRepository::store($request);

        return redirect()->route('sliders.index');
    }

    public function show($id)
    { 
        $brands = Brand::all();
        $slider = Slider::where('id', $id)->first();
        $arg = [
            'brands' => $brands,
            'slider' =>  $slider
        ];
        return $this->responseViewAdmin('admin.forms.sliderForm', $arg);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    { 
        SliderRepository::update($request, $id);

        return redirect()->route('sliders.index');
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
        
        SliderRepository::destroy($id);

        return redirect() -> route('sliders.index');
    }
}