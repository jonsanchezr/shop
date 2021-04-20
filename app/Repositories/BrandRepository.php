<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandRepository
{
    public static function store(Request $request)
    {
    	$brands = new Brand;

         if($request->hasFile('logo')){

            $file = $request->file('logo');
            $nameImg = uniqid().'-'.$file->getClientOriginalName();
            $path = public_path() .'/assets/img/brands';        
            $file->move($path,$nameImg);
        } 

        $brands->name = $request->name;
        $brands->slug = $request->slug;
        $brands->logo = $nameImg;

        $brands->save();

        return true;
    }

    public static function update(Request $request, $slug)
    {
    	 if($request->hasFile('logo')){
            $file = $request->file('logo');
            $nameImg = uniqid().'-'.$file->getClientOriginalName();
            $path = public_path() .'/assets/img/brands';        
            $file->move($path,$nameImg);

            $image = public_path('/assets/img/brands/'.$request->hiddenimage);

            if (@getimagesize($image)) {

                unlink(public_path('/assets/img/brands/'.$request->hiddenimage));
            }

        } else {
            $nameImg = $request->hiddenimage;
        }
         Brand::where('slug', $slug)
          ->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'logo' => $nameImg,
            
        ]);
    }

    public static function destroy($slug)
    {
        $brand = Brand::where('slug', $slug)->first();

        $image = public_path('/assets/img/brands/'.$brand->logo);
        
        if (@getimagesize($image)) {
            unlink(public_path('/assets/img/brands/'.$brand->logo));
        }

        $brand->delete();
    }
}