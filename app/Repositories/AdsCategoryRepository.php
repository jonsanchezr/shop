<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\AdsCategory;

class AdsCategoryRepository
{
    public static function store(Request $request)
    {
    	$adsCategory = new AdsCategory;

        if($request->hasFile('image')){

            $file = $request->file('image');
            $nameImg = uniqid().'-'.$file->getClientOriginalName();
            $path = public_path() .'/assets/img/ads';        
            $file->move($path,$nameImg);
        }

        $adsCategory->title = $request->title;
        $adsCategory->image = $nameImg;
        $adsCategory->url = $request->url;


        $adsCategory->save();
        return true;
    }

    public static function update(Request $request, $id)
    {
    	if($request->hasFile('image')){
            $file = $request->file('image');
            $nameImg = uniqid().'-'.$file->getClientOriginalName();
            $path = public_path() .'/assets/img/ads';        
            $file->move($path,$nameImg);

            $image = public_path('/assets/img/ads/'.$request->hiddenimage);

            if (@getimagesize($image)) {

                unlink(public_path('/assets/img/ads/'.$request->hiddenimage));
            }

        } else {
            $nameImg = $request->hiddenimage;
        }

        AdsCategory::where('id', $id)
          ->update([
            'title' => $request->title,
            'image' => $nameImg,
            'url' => $request->url,     
        ]);
    }

    public static function destroy($id)
    {
        $adsCategory = AdsCategory::find($id);

        $image = public_path('/assets/img/ads/'.$adsCategory->image);
        
        if (@getimagesize($image)) {
            unlink(public_path('/assets/img/ads/'.$adsCategory->image));
        }

        $adsCategory->delete();
    }
}