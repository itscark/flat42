<?php

namespace App\Http\Controllers;

use App\Event;
use App\GroceryList;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends BackendController
{
    protected $flat_id;
    protected $user_id;
    protected $event;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->flat_id = auth()->user()->flat_id;
            $this->user_id = auth()->id();
            return $next($request);
        });
        $this->event = new Event();

    }

    public function index()
    {
        $events = $this->event->getEvents($this->flat_id);
        return view('backend.events.index', compact('events'));
    }

    public function create()
    {
        return view('backend.events.create');
    }

    public function store(Request $request)
    {
        $this->validate(\request(), [
            'title' => 'required',
            'body' => 'required',
            'date' => 'required|date'
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

    public function edit(Event $event)
    {
        if ($event->user_id == $this->user_id) {
            return view('backend.events.edit', compact('event'));
        } else {
            return redirect(route('event.index'));
        }
    }

    public function update(Request $request, Event $event)
    {
        $this->validate(\request(), [
            'title' => 'required',
            'body' => 'required',
            'date' => 'required|date'
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
        $event->deleted = true;
        $event->deleted_by = auth()->id();
        $event->save();
        return response()->json($event);
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
