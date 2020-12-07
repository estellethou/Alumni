<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return Profile::find($id);
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
        $profile->update($request->except(['image','resume']));
        if ($request->image) {
            $exploded = explode(',', $request->image);
            $decoded = base64_decode($exploded[1]);
            if (str_contains($exploded[0], 'jpeg')) {
                $extension = 'jpg';
            } elseif (str_contains($exploded[0], 'png')) {
                $extension = 'png';
            }
            $name = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)))), 1, 10);
            $filename = $name.'.'.$extension;
            $newPath = public_path().'/'.$filename;
            //$newPath = $request->image->store('/', 's3');
            file_put_contents($newPath, $decoded); //save the decoded image to the path
            $profile->update(['image' => $filename ?? '']);
        }
        if ($request->resume) {
            $exploded = explode(',', $request->resume);
            $decoded = base64_decode($exploded[1]);
            if (str_contains($exploded[0], 'pdf')) {
                $extension = 'pdf';
            }
            $name = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)))), 1, 10);
            $filename = $name.'.'.$extension;
            $path = public_path().'/'.$filename;
            file_put_contents($path, $decoded); //save the decoded resume to the pa
            $profile->update(['resume' => $filename ?? '']);    
        }
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
        //delete profile
        return Profile::destroy($id);
    }
}
