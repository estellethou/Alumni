<?php

namespace App\Http\Controllers\Admin;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProfileControllerAdmin extends ControllerAdmin
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(User $user)
    {   
        return view('admin/profile_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        dd(request()->file('image'));
        $data = request()->validate([
            'phone' => ['string', 'digits_between:10,12', 'starts_with:0,+'],
            'description' => ['string'],
            'url_linkedin' =>  ['url'],
            'url_github' => ['url'],
            'url_website' => ['url'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        $data['image'] = $imageName;
        request()->image->store('/images', 's3');
        // request()->image->move(public_path(''), $imageName);
        $image = Storage::disk('s3')->response('/images', $imageName);
        $user->profile->update($data);
        
        //$profile->update($request->all()); // ???
        //check policy first
        // $this->authorize('update', $profile);

        // $profile->update(request()->all()->except('image'));
        
        // if (request('image')) {
        //     $exploded = explode(',', $request->image);
        //     $decoded = base64_decode($exploded[1]);
        //     if (str_contains($exploded[0], 'jpeg')) {
        //         $extension = 'jpg';
        //     } elseif (str_contains($exploded[0], 'png')) {
        //         $extension = 'png';
        //     }
        //     $name = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)))), 1, 10);
        //     $filename = $name.'.'.$extension;
        //     $path = public_path().'/'.$filename;
        //     file_put_contents($path, $decoded); //save the decoded image to the pa
        //     $profile->update(['image' => $filename ?? '']);    
        // }
        
        return redirect("/admin/users/{$user->id}")->with('success','User profile successfully edited.');
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