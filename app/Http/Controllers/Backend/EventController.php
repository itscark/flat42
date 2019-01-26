<?php

namespace App\Http\Controllers;

use App\Event;
use App\GroceryList;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends BackendController
{


    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('backend.events.index');
    }

    ////////////////////////////
    //get items
    ////////////////////////////
    public function indexApi()
    {
        return $this->event->getEvents($this->flat_id);
    }

    ////////////////////////////
    //store the items
    ////////////////////////////
    public function store(Request $request)
    {
        $this->validate(\request(), [
            'title' => 'required|string|min:2',
            'body' => 'required|string|min:2',
            'date' => 'required|date|after:today'
        ]);
        $newEvent = Event::create([
            'flat_id' => $this->flat_id,
            'user_id' => $this->user_id,
            'title' => \request('title'),
            'body' => \request('body'),
            'date' => \request('date'),
        ]);

        ////////////////////////////
        //for axios request set the username so there is no error
        ////////////////////////////
        $newEvent['user_name'] = auth()->user()->name;

        return response()->json($newEvent);
    }
    
    ////////////////////////////
    //update a event
    ////////////////////////////
    public function update(Request $request, Event $event)
    {
        $this->validate(\request(), [
            'title' => 'required|string|min:2',
            'body' => 'required|string|min:2',
            'date' => 'required|date|after:today'
        ]);

        $event->update([
            'body' => $request->body,
            'title' => $request->title,
            'date' => $request->date
        ]);

        return response()->json($event);
    }

    ////////////////////////////
    //softdelete a event
    ////////////////////////////
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->user_id == auth()->id()){
            $event->deleted = true;
            $event->deleted_by = auth()->id();
            $event->save();
            return response()->json($event);
        } else {
            ////////////////////////////
            //if a user trys to delete a event he hasnt created, aboirt
            ////////////////////////////
            return response('Du hast dieses Event nicht geplant und kannst es daher nicht löschen!', 401);
        }

    }

    ////////////////////////////
    //get previous Events
    ////////////////////////////
    public function prevEvent()
    {
        return Event::getPrevFlatEvents();
    }

    ////////////////////////////
    //get deleted events
    ////////////////////////////
    public function delEvent()
    {
        return Event::getDelFlatEvents();
    }
    
    ////////////////////////////
    //get the event info for edit
    ////////////////////////////
    public function showEvent($id)
    {
        return $this->event->getEventInfo($this->flat_id, $id);
    }

}
