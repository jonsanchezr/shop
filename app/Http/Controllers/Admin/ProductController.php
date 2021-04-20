<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Requests\ProductRequest;
use App\Repositories\ProductRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category','brand')->get();
        $arg = [
            'products' => $products
        ];
        return $this->responseViewAdmin('admin.tables.productTable', $arg);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $arg = [
            'categories' => $categories,
            'brands' => $brands,
        ];
        return $this->responseViewAdmin('admin.forms.productForm', $arg);
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        ProductRepository::store($request);

        return redirect()->route('products.index');
    }

     public function show($slug)
    {
        $product = Product::with('category','brand')->where('slug', $slug)->first();
        $categories = Category::all();
        $brands = Brand::all();
        $arg = [
            'categories' => $categories,
            'brands' => $brands,
            'product' => $product,
        ];
        return $this->responseViewAdmin('admin.forms.productForm', $arg);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $slug)
    {
        
        ProductRepository::update($request, $slug);

        return redirect()->route('products.index');
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
        
        ProductRepository::destroy($slug);

        return redirect() -> route('products.index');
    }
   
}

