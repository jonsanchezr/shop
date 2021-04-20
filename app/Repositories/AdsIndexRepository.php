<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\AdsIndex;

class AdsIndexRepository
{
    public static function store(Request $request)
    {
    	$adsIndex = new AdsIndex;

        if($request->hasFile('image')){

            $file = $request->file('image');
            $nameImg = uniqid().'-'.$file->getClientOriginalName();
            $path = public_path() .'/assets/img/ads';        
            $file->move($path,$nameImg);
        }

        $adsIndex->title = $request->title;
        $adsIndex->image = $nameImg;
        $adsIndex->url = $request->url;
        $adsIndex->save();

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

        AdsIndex::where('id', $id)
          ->update([
            'title' => $request->title,
            'image' => $nameImg,
            'url' => $request->url,    
        ]);
    }

    public static function destroy($id)
    {
        $adsIndex = AdsIndex::find($id);

        $image = public_path('/assets/img/ads/'.$adsIndex->image);
        
        if (@getimagesize($image)) {
            unlink(public_path('/assets/img/ads/'.$adsIndex->image));
        }

        $adsIndex->delete();
    }
}