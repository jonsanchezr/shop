<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductRepository
{
    public static function store(Request $request)
    {
        $product = new Product;

        $image = [];
        for ($i=1; $i < 5; $i++) { 
            $nameImg = "slot_image_$i";
            if($request->hasFile($nameImg)){
                $file = $request->file($nameImg);
                $image[$i] = uniqid().'-'.$file->getClientOriginalName();
                $path = public_path() .'/assets/img/products';        
                $file->move($path, $image[$i]);
            }

        }

        if($request->hasFile('slot_video')){

            $file = $request->file('slot_video');
            $video = uniqid().'-'.$file->getClientOriginalName();
            $path = public_path() .'/assets/img/products';        
            $file->move($path,$video);
        } 

        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->title = $request->title;
        $product->short_description = $request->short_description;
        $product->large_description = $request->large_description;
        $product->amount = $request->amount;
        $product->unit = $request->unit;
        $product->slug = $request->slug;
        $product->slot_image_1 = $image[1];
        $product->slot_image_2 = $image[2] ?? null;
        $product->slot_image_3 = $image[3] ?? null;
        $product->slot_image_4 = $image[4] ?? null;
        $product->slot_video = $video ?? null;

        $product->save();
    }

    public static function update(Request $request, $slug)
    {
        $image = [];
        for ($i=1; $i < 5; $i++) { 
            $nameImg = "slot_image_$i";
            if($request->hasFile($nameImg)){
                $file = $request->file($nameImg);
                $image[$i] = uniqid().'-'.$file->getClientOriginalName();
                $path = public_path() .'/assets/img/products';        
                $file->move($path, $image[$i]);

                $imagename = public_path('/assets/img/products/'.$request->get('hiddenimage'.$i));

                if (@getimagesize($imagename)) {
                    unlink(public_path('/assets/img/products/'.$request->get('hiddenimage'.$i)));
                }
            } else {
                $image[$i] = $request->get('hiddenimage'.$i);
            }
        }

        if($request->hasFile('slot_video')){

            $file = $request->file('slot_video');
            $video = uniqid().'-'.$file->getClientOriginalName();
            $path = public_path() .'/assets/img/products';        
            $file->move($path,$video);

            $videoname = public_path('/assets/img/products/'.$request->hiddenvideo);

                if (@getimagesize($videoname)) {

                    unlink(public_path('/assets/img/products/'.$request->hiddenvideo));
                } 
        } else {
            $video = $request->hiddenvideo;
        }
        

        Product::where('slug', $slug)
          ->update([
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'title' => $request->title,
            'short_description' => $request->short_description,
            'large_description' => $request->large_description,
            'amount' => $request->amount,
            'unit' => $request->unit,   
            'slug' => $request->slug,   
            'slot_image_1' => $image[1],
            'slot_image_2' => $image[2] ?? null,
            'slot_image_3' => $image[3] ?? null,
            'slot_image_4' => $image[4] ?? null,
            'slot_video' => $video ?? null

        ]);
    }

    public static function destroy($slug)
    {
        $product = Product::where('slug', $slug)->first();;

        $image1 = public_path('/assets/img/products/'.$product->slot_image_1);
        if (@getimagesize($image1)) {
            unlink(public_path('/assets/img/products/'.$product->slot_image_1));
        }

        $image2 = public_path('/assets/img/products/'.$product->slot_image_2);
        if (@getimagesize($image2)) {
            unlink(public_path('/assets/img/products/'.$product->slot_image_2));
        }

        $image3 = public_path('/assets/img/products/'.$product->slot_image_3);
        if (@getimagesize($image3)) {
            unlink(public_path('/assets/img/products/'.$product->slot_image_3));
        }

        $image4 = public_path('/assets/img/products/'.$product->slot_image_4);
        if (@getimagesize($image4)) {
            unlink(public_path('/assets/img/products/'.$product->slot_image_4));
        }

        $video = public_path('/assets/img/products/'.$product->slot_video);
        if (@getimagesize($video)) {
            unlink(public_path('/assets/img/products/'.$product->slot_video));
        }

        $product->delete();
    }
}
