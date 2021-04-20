<?php

namespace App\Http\Controllers\Admin;

use App\Models\Label;
use App\Http\Requests\LabelRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labels = Label::all();
        $arg = [
            'labels' => $labels
        ];
        return $this->responseViewAdmin('admin.tables.labelTable', $arg);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arg = [];
        return $this->responseViewAdmin('admin.forms.labelForm', $arg);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LabelRequest $request)
    {

        $labels = new Label;

        $labels->name = $request->name;
        $labels->slug = $request->slug;

        $labels->save();

        return redirect()->route('labels.index');
    }

    public function show($slug)
    {
        $label = Label::where('slug', $slug)->first();
        $arg = [
            'label' => $label
        ];
        return $this->responseViewAdmin('admin.forms.labelForm', $arg);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LabelRequest $request, $slug)
    {
        Label::where('slug', $slug)
          ->update([
            'name' => $request->name,
            'slug' => $request->slug,
            
        ]);

        return redirect()->route('labels.index');
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
        
        $deletedRows = Label::where('slug', $slug)->delete();
        return redirect()->route('labels.index');
    }

}