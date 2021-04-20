<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\ProfileCompany;

class ProfileCompanyRepository
{
    public static function store(Request $request)
    {
    	$profileCompany = new ProfileCompany;

        if($request->hasFile('logo')){

            $file = $request->file('logo');
            $nameLogo = uniqid().'-'.$file->getClientOriginalName();
            $path = public_path() .'/assets/img/profiles';        
            $file->move($path,$nameLogo);
        } 

        if($request->hasFile('favicon')){

            $file = $request->file('favicon');
            $nameFavicon = uniqid().'-'.$file->getClientOriginalName();
            $path = public_path();        
            $file->move($path,$nameFavicon);
        } 

        $profileCompany->name_trade = $request->name_trade;
        $profileCompany->name_legal = $request->name_legal;
        $profileCompany->email = $request->email;
        $profileCompany->phone_local = $request->phone_local;
        $profileCompany->phone_mobile = $request->phone_mobile ?? null;
        $profileCompany->address_1 = $request->address_1;
        $profileCompany->address_2 = $request->address_2 ?? null;
        $profileCompany->country = $request->country;
        $profileCompany->city = $request->city ?? null;
        $profileCompany->region = $request->region;
        $profileCompany->logo = $nameLogo;
        $profileCompany->favicon = $nameFavicon;
        $profileCompany->save();

        return true;
    }

    public static function update(Request $request, $id)
    {
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $nameLogo = uniqid().'-'.$file->getClientOriginalName();
            $path = public_path() .'/assets/img/profiles/';        
            $file->move($path,$nameLogo);

            $logo = public_path('/assets/img/profiles/'.$request->hiddenlogo);

            if (@getimagesize($logo)) {

                unlink(public_path('/assets/img/profiles/'.$request->hiddenlogo));
            }

        } else {
            $nameLogo = $request->hiddenlogo;
        }

        if($request->hasFile('favicon')){
            $file = $request->file('favicon');
            $nameFavicon = uniqid().'-'.$file->getClientOriginalName();
            $path = public_path();        
            $file->move($path,$nameFavicon);

            $favicon = public_path($request->hiddenfavicon);

            if (@getimagesize($favicon)) {

                unlink(public_path($request->hiddenfavicon));
            }

        } else {
            $nameFavicon = $request->hiddenfavicon;
        }

        ProfileCompany::where('id', $id)
          ->update([
            'name_trade' => $request->name_trade,
            'name_legal' => $request->name_legal,
            'email' => $request->email,
            'phone_local' => $request->phone_local,
            'phone_mobile' => $request->phone_mobile ?? null,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2 ?? null,
            'country' => $request->country,
            'city' => $request->city,
            'region' => $request->region ?? null,
            'logo' => $nameLogo,
            'favicon' => $nameFavicon,
            
        ]); 
    }

    public static function destroy($id)
    {
       $profileCompany = ProfileCompany::find($id);

        $logo = public_path('/assets/img/profiles/'.$profileCompany->logo);
        if (@getimagesize($logo)) {
            unlink(public_path('/assets/img/profiles/'.$profileCompany->logo));
        }

        $favicon = public_path($profileCompany->favicon);
        if (@getimagesize($favicon)) {
            unlink(public_path($profileCompany->favicon));
        }

        $profileCompany->delete();
    }
}