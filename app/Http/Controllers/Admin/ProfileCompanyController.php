<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProfileCompany;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileCompanyRequest;
use App\Repositories\ProfileCompanyRepository;
use Illuminate\Http\Request;

class ProfileCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profileCompanies = ProfileCompany::all();
        $arg = [
          'profileCompanies' => $profileCompanies,
        ];
        return $this->responseViewAdmin('admin.tables.profileCompanyTable', $arg);
    }

     public function create()
    {
        $arg = [
          'action' => 2
        ];
        return $this->responseViewAdmin('admin.forms.profileCompanyForm', $arg);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileCompanyRequest $request)
    {
        ProfileCompanyRepository::store($request);

        return redirect()->route('profilecompany.index');
    }

     public function show($id)
    { 
        $profileCompany = ProfileCompany::where('id', $id)->first();
        $arg = [
          'profileCompany' => $profileCompany,
          'action' => 1
        ];
        return $this->responseViewAdmin('admin.forms.profileCompanyForm', $arg);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileCompanyRequest $request, $id)
    {
        ProfileCompanyRepository::update($request, $id);

        return redirect()->route('profilecompany.index');
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

        ProfileCompanyRepository::destroy($id);
        return redirect()->route('profilecompany.index');
    }
}