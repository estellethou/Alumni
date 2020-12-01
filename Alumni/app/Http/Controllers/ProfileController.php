<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Profile;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all profiles
        return Profile::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create a profile 
        $request->validate([
            'user_id' => 'required'
        ]);
        return Profile::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show a profile
        $profile = Profile::find($id);
        //check policy first
        // $this->authorize('view', $profile);
        return $profile;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        //Get profile id
        $profile = Profile::find($id);
        //check policy first
        $this->authorize('update', $profile);
        //update profile
        $profile->update($request->all());

        $validatedDataProfile = request()->validate([
            //'user_id',
            'phone' => '',
            'description' => '',
            'url_linkedin' => '',
            'url_github' => '',
            'url_website' => '',
            'image' => '',
            'resume' => '',
        ]);
        //$profile->update($request->all());

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public'); #1st param is location where img are stored, 2nd location on your local filesystem");
            $image = Image::make(public_path("storage/$imagePath"))->fit(1000, 1000); #cut the image to have perfect square -use intervention/image
            $image->save();
            $imageArray = ['image' => $imagePath];
        } 

        if(request('resume')){
            $resumePath = request('resume')->store('profile', 'public');
            $resumeArray = ['resume' => $resumePath];
        }

        $profile->update(array_merge(
            $validatedDataProfile,
            $imageArray ?? [], ## if $imageArray exists then the merge takes $imagePath else it returns an empty array
            $resumeArray ?? [],
        )); 
        return $profile;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get profile id
        $profile = Profile::find($id);
        //check policy first
        $this->authorize('delete', $profile);
        //delete profile
        return Profile::destroy($id);
    }
}
