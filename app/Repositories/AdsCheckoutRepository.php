<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\AdsCheckout;

class AdsCheckoutRepository
{
    public static function store(Request $request)
    {
    	$adsCheckout = new AdsCheckout;

        if($request->hasFile('image')){

            $file = $request->file('image');
            $nameImg = uniqid().'-'.$file->getClientOriginalName();
            $path = public_path() .'/assets/img/ads';        
            $file->move($path,$nameImg);
        }

        $adsCheckout->title = $request->title;
        $adsCheckout->image = $nameImg;
        $adsCheckout->url = $request->url;
        $adsCheckout->save();
        
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

        AdsCheckout::where('id', $id)
          ->update([
            'title' => $request->title,
            'image' => $nameImg,
            'url' => $request->url,

            
        ]);
    }

    public static function destroy($id)
    {
       $adsCheckout = AdsCheckout::find($id);

        $image = public_path('/assets/img/ads/'.$adsCheckout->image);
        
        if (@getimagesize($image)) {
            unlink(public_path('/assets/img/ads/'.$adsCheckout->image));
        }

        $adsCheckout->delete();
    }
}