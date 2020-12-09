<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;


class JobControllerAdmin extends ControllerAdmin
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::orderByDesc('created_at')->get();
        return view('admin/jobs', compact('jobs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'user_id' => ['required', 'numeric'],
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:255'],
            'profile' => ['required', 'string', 'max:255'],
            'qualifications'  => ['required', 'string', 'max:255'],
            'year_experiences' => ['string'],
            'street_address'  => ['required', 'string', 'max:255'],
            'postal_code'  => ['required', 'numeric'],
            'city'  => ['required', 'string', 'max:255'],
            'contract'  => ['required', 'string', 'max:255'],
            'contract_duration'  => ['string', 'max:255'],
            'company_name'  => ['required', 'string', 'max:255'],
            'sector'  => ['required', 'string', 'max:255'],
        ]);
        $job = Job::create($data);
        return redirect("/admin/jobs/{$job->id}")->with('success','Job offer successfully edited created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $job = Job::find($id);
        return view("admin/job_show", compact('job'));
    }
    
    public function edit(Job $job)
    {   
        $users = User::all();
        return view('admin/job_edit', compact('job', 'users'));
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
        // update a job
        // toDo: add validator
        $job = Job::find($id);
        $job -> update($request->all());
        return redirect("/admin/jobs/{$job->id}")->with('success','Job offer successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete a job
        Job::destroy($id);
        return redirect("/admin/jobs")->with('success','Job offer successfully deleted.');
    }
}