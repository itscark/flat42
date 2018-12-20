<?php

namespace App\Http\Controllers;

use App\Event;
use App\GroceryList;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::getFlatEvents();
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

        Event::create([
            'flat_id' => auth()->user()->flat_id,
            'user_id' => auth()->id(),
            'title' => \request('title'),
            'body' => \request('body'),
            'date' => \request('date'),
        ]);

        /*return redirect((route('event.index')));*/

        return ['message' => 'Event erstellt!'];
    }

    public function show(Event $event)
    {
        return abort(404);
    }

    public function edit(Event $event)
    {
        if ($event->user_id == auth()->user()->id) {
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


}
