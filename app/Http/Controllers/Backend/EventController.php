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

    public function indexApi()
    {
        return $this->event->getEvents($this->flat_id);
    }

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

        $newEvent['user_name'] = auth()->user()->name;

        return response()->json($newEvent);
    }

    public function show(Event $event)
    {
        return abort(404);
    }

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

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->user_id == auth()->id()){
            $event->deleted = true;
            $event->deleted_by = auth()->id();
            $event->save();
            return response()->json($event);
        } else {
            return response('Du hast dieses Event nicht geplant und kannst es daher nicht löschen!', 401);
        }

    }

    public function prevEvent()
    {
        return Event::getPrevFlatEvents();
    }

    public function delEvent()
    {
        return Event::getDelFlatEvents();
    }

    public function showEvent($id)
    {
        return $this->event->getEventInfo($this->flat_id, $id);
    }

}
