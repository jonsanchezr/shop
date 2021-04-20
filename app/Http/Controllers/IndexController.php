<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SettingTopcategory;
use App\Models\SettingTopmenu;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\AdsIndex;
use App\Models\OfferLimit;
use App\Models\AdsCategory;


class IndexController extends Controller
{
	/**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
	public function index()
    {
        $adsIndex = AdsIndex::all();
        $sliders = Slider::all();
        $offerLimits = OfferLimit::all();
        $products = Product::latest()->take(8)->get();
        $categories = Category::with('products')->first();
        $brands = Brand::inRandomOrder()->take(8)->get();
        $topcategories = SettingTopcategory::with('category')->get();
        $sellerProducts = Product::inRandomOrder()->take(3)->get();
        $bestProducts = Product::inRandomOrder()->take(3)->get();
        $activeTopMenu = '';

        $arg = [
            'adsIndex' => $adsIndex,
            'sliders' => $sliders,
            'offerLimits' => $offerLimits,
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
            'topcategories' => $topcategories,
            'sellerProducts' => $sellerProducts,
            'bestProducts' => $bestProducts,
            'activeTopMenu' => $activeTopMenu
        ];

        return $this->responseViewPublic('index.index', $arg);
    }

    public function allCategory()
    {
        $adsCategories = AdsCategory::all();
        $products = Product::with('category')->first();
        $brands = Brand::all();
        $categories = Category::all();
        $activeTopMenu = 'categories';

         $arg = [
            'adsCategories' => $adsCategories,
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
            'activeTopMenu' => $activeTopMenu,
        ];

        return $this->responseViewPublic('index.allCategory', $arg);
    }

    public function allProducts()
    {
        $products = Product::all();
        $categories = Category::all();
        $activeTopMenu = 'products';
        $brands = Brand::all();


         $arg = [
            'products' => $products,
            'brands' => $brands,
            'categories' => $categories,
            'activeTopMenu' => $activeTopMenu
        ];

        return $this->responseViewPublic('index.allProducts', $arg);
    }

    public function singleProduct($slug)
    {
        $product = Product::where('slug', $slug)->first();

        $products = Product::where('category_id', $product->category_id)->get();

        $activeTopMenu = 'products';
         $arg = [
            'product' => $product,
            'products' => $products,
            'activeTopMenu' => $activeTopMenu
        ];

        return $this->responseViewPublic('index.singleProduct', $arg);

    }

    public function singleCategories($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $categories = Category::all();
        $products = Product::where('category_id', $category['id'])->get();
        $brands = Brand::all();
        $activeTopMenu = 'categories';
        
        $arg = [
            'products' => $products,
            'categories' => $categories,
            'category' => $category,
            'brands' => $brands,
            'activeTopMenu' => $activeTopMenu
        ];

        return $this->responseViewPublic('index.singleCategories', $arg);
    }

    public function about()
    {
        $activeTopMenu = 'abouts';

        $arg = [
            'activeTopMenu' => $activeTopMenu
        ];

        return $this->responseViewPublic('index.about', $arg);
    }

    public function contact()
    {
        $activeTopMenu = 'contacts';

        $arg = [
            'activeTopMenu' => $activeTopMenu
        ];

        return $this->responseViewPublic('index.contact', $arg);
    }
    
}