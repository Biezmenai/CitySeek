<?php

namespace App\Http\Controllers;

use App\Rank;
use DB;
use Auth;
use Input;
use Session;
use Redirect;
use App\Event;
use App\Task;

class TaskController extends Controller
{

    public function tasksView()
    {
        $events = Event::all();
        foreach($events as $key => $event) {
            $task_count[$key] = Task::where('eventId', '=', $event->id)->count();
        }

        return view('admin-views/tasks', compact('events', 'task_count'));
    }

    public function tasksViewOfEvent($eventid)
    {

        $tasks = Task::where('eventId', '=', $eventid)->get();
        $event = Event::find($eventid);

        return view('admin-views/tasks-of-event', compact('tasks', 'event'));
    }

    public function deleteTask($id)
    {
        $task = Task::find($id);
        $task->delete();
        Session::flash('success-message', 'Užduotis ištrinta');
        return Redirect::back();
    }

    public function editTaskView($id)
    {
        $task = Task::find($id);
        return view('admin-views/edit-task', compact('task'));
    }

    public function editTaskSubmit($id)
    {
        $task= Task::find($id);
        $task->rusis = Input::get('rusis');
        $task->pavadinimas = Input::get('pavadinimas');
        $task->aprasymas = Input::get('aprasymas');
        $task->taskai = Input::get('taskai');
        $task->save();

        Session::flash('success-message', 'Užduotis atnaujinta');
        return Redirect::back();
    }

    public function addTaskToEventView($id)
    {
        $event = Event::find($id);
        $event_id = $event['id'];

        return view('admin-views/new-task', compact('event_id'));
    }

    public function addTaskToEventSubmit($id)
    {
        $task= new Task;
        $task->rusis = Input::get('rusis');
        $task->pavadinimas = Input::get('pavadinimas');
        $task->aprasymas = Input::get('aprasymas');
        $task->taskai = Input::get('taskai');
        $task->eventId = $id;
        $task->save();

        Session::flash('success-message', 'Užduotis pridėta');
        return Redirect::back();
    }
}

