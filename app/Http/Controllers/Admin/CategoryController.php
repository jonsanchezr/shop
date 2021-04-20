<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\SettingTopmenu;
use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        $arg = [
            'categories' => $categories,
        ];

        return $this->responseViewAdmin('admin.tables.categoryTable', $arg);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arg = [];
        return $this->responseViewAdmin('admin.forms.categoryForm', $arg);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {

        CategoryRepository::store($request);

        return redirect()
            ->route('categories.index')
            ->with('success','Category Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->first();

        $arg = [
            'category' => $category,
        ];
        return $this->responseViewAdmin('admin.forms.categoryForm', $arg);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $slug)
    {
        CategoryRepository::update($request, $slug);

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        CategoryRepository::destroy($slug);

        return redirect()->route('categories.index');
    }

    
}
