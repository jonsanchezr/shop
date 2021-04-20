<?php

namespace App\Http\Controllers\Admin;

use App\Models\SocialNetwork;
use App\Models\ProfileCompany;
use App\Http\Controllers\Controller;
use App\Http\Requests\SocialNetworkRequest;
use Illuminate\Http\Request;

class SocialNetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialNetworks = SocialNetwork::all();
        $arg = [
            'socialNetworks' => $socialNetworks
        ];
        return $this->responseViewAdmin('admin.tables.socialNetworkTable', $arg);
    }

     public function create()
    {
        $profileCompanies = ProfileCompany::all();
        $arg = [
            'profileCompanies' => $profileCompanies
        ];
        return $this->responseViewAdmin('admin.forms.socialNetworkForm', $arg);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocialNetworkRequest $request)
    {

        $socialNetwork = new SocialNetwork;

        $socialNetwork->profile_company_id = $request->profile_company_id;
        $socialNetwork->name = $request->name;
        $socialNetwork->url = $request->url;

        $socialNetwork->save();

        return redirect()->route('socialnetworks.index');
    }

     public function show($id)
    { 
        $profileCompanies = ProfileCompany::all();
        $socialNetwork = SocialNetwork::where('id', $id)->first();
        $arg = [
            'profileCompanies' => $profileCompanies,
            'socialNetwork' => $socialNetwork,
        ];
        return $this->responseViewAdmin('admin.forms.socialNetworkForm', $arg);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SocialNetworkRequest $request, $id)
    {
        SocialNetwork::where('id', $id)
          ->update([
            'profile_company_id' => $request->profile_company_id,
            'name' => $request->name,
            'url' => $request->url,
            
        ]);

        return redirect()->route('socialnetworks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->hasRole('admin');

        $deletedRows = SocialNetwork::where('id', $id)->delete();
        return redirect()->route('socialnetworks.index');
    }
}