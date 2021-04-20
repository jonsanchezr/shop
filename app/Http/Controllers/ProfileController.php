<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\User;
use App\Http\Requests\ProfileRequest;


 

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::with('user')->get();
        return view('tables.profileTable', compact('profiles'));
    }

    public function create()
    {
        $users = User::all();
        return view('forms.profileCreateFrom', compact('users'));

    }

    public function store(ProfileRequest $request)
    {

        $profile = new Profile;

            if($request->hasFile('avatar')){

                $file = $request->file('avatar');
                $avatar = uniqid().'-'.$file->getClientOriginalName();
                $path = public_path() .'/assets/img/profiles';        
                $file->move($path,$avatar);
            }

        $profile->user_id = $request->user_id;
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->identity = $request->identity;
        $profile->avatar = $avatar;
        


        $profile->save();

        return redirect()
            ->route('profiles.index');
    }

    public function show($id)
    { 
        $users = User::all();
         $profile = Profile::where('id', $id)->first();
        return view('forms.profileUpdateForm', compact('profile', 'users'));
    }

    public function update(ProfileRequest $request, $id)
    {
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $avatar = uniqid().'-'.$file->getClientOriginalName();
            $path = public_path() .'/assets/img/profiles';        
            $file->move($path,$avatar);

            $image = public_path('/assets/img/profiles/'.$request->hiddenimage);

            if (@getimagesize($image)) {

                unlink(public_path('/assets/img/profiles/'.$request->hiddenimage));
            }

        } else {
            $avatar = $request->hiddenimage;
        }

        Profile::where('id', $id)
          ->update([
            'user_id' => $request->user_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'identity' => $request->identity,
            'avatar' => $avatar,     
        ]);

        return redirect()->route('profiles.index');
    }

    public function destroy($id)
    {
        $profile = Profile::find($id);

        $avatar = public_path('/assets/img/profiles/'.$profile->avatar);
        
        if (@getimagesize($avatar)) {
            unlink(public_path('/assets/img/profiles/'.$profile->avatar));
        }

        $profile->delete();
        return redirect()->route('profiles.index');
    }
}