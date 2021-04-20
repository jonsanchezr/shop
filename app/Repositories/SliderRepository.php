<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderRepository
{
    public static function store(Request $request)
    {
    	$slider = new Slider;

        if($request->hasFile('image')){
          $file = $request->file('image');
          $image = uniqid().'-'.$file->getClientOriginalName();
          $path = public_path() .'/assets/img/sliders';        
          $file->move($path, $image);
        }

        $slider->brand_id = $request->brand_id;
        $slider->title = $request->title;
        $slider->amount = $request->amount;
        $slider->url = $request->url;
        $slider->image = $image;
        $slider->save();

        return true;
    }

    public static function update(Request $request, $id)
    {
        if($request->hasFile('image')){
            $file = $request->file('image');
            $image = uniqid().'-'.$file->getClientOriginalName();
            $path = public_path() .'/assets/img/sliders';        
            $file->move($path, $image);

            $imagename = public_path('/assets/img/sliders/'.$request->get('hiddenimage'));

            if (@getimagesize($imagename)) {
                unlink(public_path('/assets/img/sliders/'.$request->get('hiddenimage')));
            }
        } else {
            $image = $request->get('hiddenimage');
        }

        Slider::where('id', $id)
          ->update([
            'brand_id' => $request->brand_id,
            'title' => $request->title,
            'amount' => $request->amount,
            'url' => $request->url,
            'image' => $image,
        ]);	
    }

    public static function destroy($id)
    {
       $slider = Slider::find($id);

        $image1 = public_path('/assets/img/sliders/'.$slider->image);
        if (@getimagesize($image1)) {
            unlink(public_path('/assets/img/sliders/'.$slider->image));
        }

        $slider->delete();
    }
}