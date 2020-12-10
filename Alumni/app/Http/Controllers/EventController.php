<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all Events
        return Event::orderBy('start_date', 'asc')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //Create an event
         $event = new Event;
        $validate = $request->validate([
            'organiser_user_id' => 'required | integer',
            'title' => 'required | string',
            'description' => 'required | string',
            'picture' => 'nullable | string',
            'location' => 'required | string',
            'start_date' => 'required | date',
            'end_date' => 'required | date | after:start_date',
            'views' => 'nullable | integer',
            'status' => 'nullable | integer',
            'max_attendees' => 'nullable | integer',
        ]);
        

        $event = Event::create($validate);
        $event->refresh();
        return $event;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $id)
    {
        // show an Event
        return Event::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //Check Policy first
        $event = Event::find($id);
        $this->authorize('update', $event);
        // dd($request);
        $validate = $request->validate([
            'organiser_user_id' => 'nullable | integer',
            'title' => 'nullable | string',
            'description' => 'nullable | string',
            'picture' => 'nullable | string',
            'location' => 'nullable | string',
            'start_date' => 'nullable | date',
            'end_date' => 'nullable | date | after:start_date',
            'views' => 'nullable | integer',
            'status' => 'nullable | integer',
            'max_attendees' => 'nullable | integer',
        ]);
         
        $event->update($validate);
 
        return $event;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get job id
        $event = Event::find($id);
        //check policy first
        $this->authorize('delete', $event);
        return Event::destroy($id);
    }
}