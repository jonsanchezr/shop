<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\OfferLimit;

class OfferLimitRepository
{
    public static function store(Request $request)
    {
    	$offerLimit = new OfferLimit;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $nameImg = uniqid().'-'.$file->getClientOriginalName();
            $path = public_path() .'/assets/img/offerLimits';        
            $file->move($path,$nameImg);
        }

        $offerLimit->title = $request->title;
        $offerLimit->subtitle = $request->subtitle;
        $offerLimit->description = $request->description;
        $offerLimit->url = $request->url;
        $offerLimit->image = $nameImg;
        $offerLimit->date_end = $request->date_end ?? null;
        $offerLimit->save();

        return true;
    }

    public static function update(Request $request, $id)
    {
    	if($request->hasFile('image')){
            $file = $request->file('image');
            $nameImg = uniqid().'-'.$file->getClientOriginalName();
            $path = public_path() .'/assets/img/offerLimits';        
            $file->move($path,$nameImg);

            $image = public_path('/assets/img/offerLimits/'.$request->hiddenimage);

            if (@getimagesize($image)) {

                unlink(public_path('/assets/img/offerLimits/'.$request->hiddenimage));
            }

        } else {
            $nameImg = $request->hiddenimage;
        }

        OfferLimit::where('id', $id)
          ->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'url' => $request->url,
            'image' => $nameImg,
            'date_end' => $request->date_end ?? null,     
        ]);
    }

    public static function destroy($id)
    {
        $offerLimit = OfferLimit::find($id);

        $image = public_path('/assets/img/offerLimits/'.$offerLimit->image);
        
        if (@getimagesize($image)) {
            unlink(public_path('/assets/img/offerLimits/'.$offerLimit->image));
        }

        $offerLimit->delete();
    }
}