<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryRepository
{
    public static function store(Request $request)
    {
    	 $category = new Category;

        if($request->hasFile('image')){

            $file = $request->file('image');
            $name = uniqid().'-'.$file->getClientOriginalName();
            $path = public_path() .'/assets/img/categories';        
            $file->move($path,$name);
        } 

            $category->title = $request->title;
            $category->description = $request->description;
            $category->slug = $request->slug;
            $category->image = $name;

        $category->save();
    }

    public static function update(Request $request, $slug)
    {
    	if($request->hasFile('image')){
            $file = $request->file('image');
            $name = uniqid().'-'.$file->getClientOriginalName();
            $path = public_path() .'/assets/img/categories/';        
            $file->move($path,$name);

            $image = public_path('/assets/img/categories/'.$request->hiddenimage);

            if (@getimagesize($image)) {

                unlink(public_path('/assets/img/categories/'.$request->hiddenimage));
            }

        } else {
            $name = $request->hiddenimage;
        }
        Category::where('slug', $slug)
          ->update([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => $request->slug,   
            'image' => $name,
            
        ]);
    }

    public static function destroy($slug)
    {
        $category = Category::where('slug', $slug)->first();

        $image = public_path('/assets/img/categories/'.$category->image);

        if (@getimagesize($image)) {
            unlink(public_path('/assets/img/categories/'.$category->image));
        }

        $category->delete();
    }
}