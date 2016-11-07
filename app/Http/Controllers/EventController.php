<?php

namespace App\Http\Controllers;

use App\News;
use DB;
use Auth;
use Input;
use Session;
use Redirect;
use App\Event;
use App\Team;

class EventController extends Controller
{

    public function createNewView()
    {
        //$news = News::with('user')->get()->sortBy('created_at', SORT_DESC, true);

       return view('admin-views/new-event');

    }

    public function createNewEventSubmit()
    {
        $event = new Event;
        $event->title = Input::get('title');
        $event->about = Input::get('about');
        $event->start = Input::get('start');
        $event->end = Input::get('end');
        $event->added_by = Auth::user()->id;
        $event->eventType = Input::get('eventType');
        $event->save();

        Session::flash('success-message', 'Naujas renginys pridėtas');
        return Redirect::back();

    }

    public function eventsListView()
    {
        $events= Event::with('user')->get();
        return view('admin-views/events', compact('events'));
    }

    public function deleteEvent($id)
    {
        $event= Event::find($id);

        $event->delete();

        Session::flash('success-message', 'Renginys ištrintas');
        return Redirect::back();
    }

    public function editEvent($id)
    {
        $event = Event::find($id);
        return view('admin-views/edit-event', compact('event'));

    }

    public function editEventSubmit($id)
    {
        $event = Event::find($id);

        $event->title = Input::get('title');
        $event->about = Input::get('about');
        $event->start = Input::get('start');
        $event->end = Input::get('end');
        $event->eventType = Input::get('eventType');
        $event->save();

        Session::flash('success-message', 'Renginys sėkmingai paredaguotas');
        return Redirect::back();

    }

    /* Funkcijos skirtos useriams */
    /* ---------------------------------------------------------------------------------------- */
    public function createNewViewForUser()
    {
        return view('events');
    }

    public function upcomingEventsListView()
    {
        $events= Event::with('user')->get();
        $team = Team::where('id', '=', Auth::user()->team)->first();
        return view('events', compact('events', 'team'));

    }

}

