<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all jobs
        return Job::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create a job
        $job = new Job;

        // validate Job datas input when creating a new job/internship add
        $validate = $request->validate([
            'title' => 'required | string | min:3 | max:255',
            'content' => 'required | string | min:10 | max:4,294,967,295',
            'profile' => 'required | string',
            'qualifications' => 'required | string',
            'yearExperiences' => 'required',
            'streetAddress' => 'required | string',
            'postalCode' => 'required | string | min:5 | max:5', // add pagackage https://github.com/axlon/laravel-postal-code-validation
            'city' => 'required | string',
            'contract' => 'required',
            'contractDuration' => 'nullable',
            'companyName' => 'required | string',
            'sector' => 'nullable',
            'userId' => 'nullable | required',
        ]);

        if ($validate) {
            $job->title = $request['title'];
            $job->content = $request['content'];
            $job->profile = $request['profile'];
            $job->qualifications = $request['qualifications'];
            $job->year_experiences = $request['yearExperiences'];
            $job->street_address = $request['streetAddress'];
            $job->postal_code = $request['postalCode'];
            $job->city = $request['city'];
            $job->contract = $request['contract'];
            $job->contract_duration = $request['contractDuration'];
            $job->company_name = $request['companyName'];
            $job->sector = $request['sector'];
            $job->user_id = $request['userId'];
            $job->save();
        }

        return response()->json(['message' => 'Job/Internship was edited successfully', 'job' => $job]);

        // return Job::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // show a job
        return Job::find($id);
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
        $job = Job::find($id);

        // validate Job datas input when editing a job/internship add
        $validate = $request->validate([
            'title' => 'required | string | min:3 | max:255',
            'content' => 'required | string | min:10 | max:4,294,967,295',
            'profile' => 'required | string',
            'qualifications' => 'required | string',
            'yearExperiences' => 'required',
            'streetAddress' => 'required | string',
            'postalCode' => 'required | string | min:5 | max:5', // add pagackage https://github.com/axlon/laravel-postal-code-validation
            'city' => 'required | string',
            'contract' => 'required',
            'contractDuration' => 'nullable',
            'companyName' => 'required | string',
            'sector' => 'nullable',
            'userId' => 'nullable | required',
        ]);

        if ($validate) {
            $job->title = $request['title'];
            $job->content = $request['content'];
            $job->profile = $request['profile'];
            $job->qualifications = $request['qualifications'];
            $job->year_experiences = $request['yearExperiences'];
            $job->street_address = $request['streetAddress'];
            $job->postal_code = $request['postalCode'];
            $job->city = $request['city'];
            $job->contract = $request['contract'];
            $job->contract_duration = $request['contractDuration'];
            $job->company_name = $request['companyName'];
            $job->sector = $request['sector'];
            $job->user_id = $request['userId'];
            $job->save();
        }

        return response()->json(['message' => 'Job/Internship created successfully', 'job' => $job]);

        if ($job) {
            $validate = null;

        }


        //Check Policy first
        $this->authorize('update', $job);
        // update a job
        $job -> update($request->all());
        return $job;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get job id
        $job = Job::find($id);
        //check policy first
        $this->authorize('delete', $job);
        //DELETE a job
        return Job::destroy($id);
    }
}
