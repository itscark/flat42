<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::getFlatEvents();
        return view('backend.events.index', compact('events'));
    }

    public function join()
    {
        //
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
        if ((($event->flat_id) == auth()->user()->flat_id)) {
            return view('backend.events.show', compact('event'));
        } else {
            return abort(404);
        }
    }

    public function edit(Event $event)
    {
        return view('backend.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'date' => 'required|date'
        ]);


        $event->fill($request->all());
        $event->save();

        return redirect(route('event.show', $event->id));
    }

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        return redirect(route('event.index'));
    }
}
