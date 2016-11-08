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
use App\Registration;
use App\User;

class EventController extends Controller
{

    public function createNewView()
    {

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
        $events = Event::with('user')->get();
        return view('admin-views/events', compact('events'));
    }

    public function deleteEvent($id)
    {
        $event = Event::find($id);

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
        $events = Event::with('user')->get();
        $team = Team::where('id', '=', Auth::user()->team)->first();
        foreach($events as $key=>$event) {
            $ifRegistered[$key]= Registration::where("user_id", "=", Auth::user()->id)->where("event_id", "=", $event["id"])->count();
            $ifRegisteredTeam[$key]= Registration::where("team_id", "=", $team->id)->where("event_id", "=", $event["id"])->count();
        }
            return view('events', compact('events', 'team', 'ifRegistered', 'ifRegisteredTeam'));


    }

    public function joinOngoingEvent($id)
{

    $event = Event::find($id);
    $user = (Auth::user()->id);
    if (($event["eventType"])== "one")  {
        if ((Registration::where("user_id", "=", $user)->where("event_id", "=", $event["id"])->count()) == 0) {

            $registration = new Registration;
            $registration->event_id = $id;
            $registration->user_id = $user;
            $registration->save();

            Session::flash('success-message', 'Prisiregistruota sėkmingai');
            return Redirect::back();

        } else {
            Session::flash('error-message', 'Jūs jau prisiregistravęs');
            return Redirect::back();
        }
    }
    else
    {
        Session::flash('error-message', 'Renginys tik komandoms');
        return Redirect::back();
    }
}

    public function joinOngoingEventTeam($id,$eventId)
    {

        $event = Event::find($eventId);
        if (($event["eventType"])== "team")  {
            if ((Registration::where("team_id", "=", $id)->where("event_id", "=", $event["id"])->count()) == 0) {

                $registration = new Registration;
                $registration->event_id = $eventId;
                $registration->team_id = $id;
                $registration->save();

                Session::flash('success-message', 'Komanda prisiregistruota sėkmingai');
                return Redirect::back();

            } else {
                Session::flash('error-message', 'Jūsų komanda jau prisiregistravusi');
                return Redirect::back();
            }
        }
        else
        {
            Session::flash('error-message', 'Renginys tik vienam žmogui');
            return Redirect::back();
        }
    }

    /* Funkcija skirta issiregistruoti is renginio */

    public function unJoinOngoingEvent($eventId)
    {
        $user = Auth::user()->id;
        $registration = Registration::where("user_id", "=", $user)->where("event_id", "=", $eventId)->get();
        //return $registration;
        $reg = Registration::find($registration[0]->id);

        $reg->delete();

        Session::flash('success-message', 'Sėkmingai išssiregistravote!');
        return Redirect::back();

    }


    public function unJoinOngoingTeamEvent($id, $eventId)
    {
        $user = Auth::user()->id;
        $registration = Registration::where("team_id", "=", $id)->where("event_id", "=", $eventId)->get();
        //return $registration;
        $reg = Registration::find($registration[0]->id);

        $reg->delete();

        Session::flash('success-message', 'Sėkmingai išssiregistravote komandą!');
        return Redirect::back();

    }


}

