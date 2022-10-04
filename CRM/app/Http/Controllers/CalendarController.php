<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use MaddHatter\LaravelFullCalendar\Facades\Calendar;
use Redirect,Response;

class CalendarController extends Controller
{
    public function index()
    {
         if(request()->ajax()) 
         {
 
          $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
          $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
 
          $data = Event::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','title','start', 'end']);
          return Response::json($data);
         }
        // $events = Event::all();
        // $event =[];
        // foreach($events as $row){
        //     $enddate = $row->end." 24:00:00";
        //     $event[] = \Calendar::event(
        //     $row->title,
        //     true,
        //     new \DateTime($row->start),
        //     new \DateTime($row->end),
        //     $row->id,
        //     [
        //         'color' => $row->color,
        //     ]
        //     );
        // }
        // $calendar =\Calendar::addEvents($event);
        return view('calendar');
    }
    
   
    public function create(Request $request)
    {  
        $insertArr = [ 'title' => $request->title,
                       'start' => $request->start,
                       'end' => $request->end
                    ];
        $event = Event::insert($insertArr);   
        return Response::json($event);
    }
     
 
    public function update(Request $request)
    {   
        $where = array('id' => $request->id);
        $updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];
        $event  = Event::where($where)->update($updateArr);
 
        return Response::json($event);
    } 
 
 
    public function destroy(Request $request)
    {
        $event = Event::where('id',$request->id)->delete();
   
        return Response::json($event);
    }  
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);
        $events = new Event;

        $events->title = $request->input('title');
        $events->start = $request->input('start');
        $events->end = $request->input('end');

        $events->save();
        return redirect('/calendar')->with('success', 'Events Added');
    }
    
    public function addEvent(Request $request)
    {
        return view('addevent');
    }
 
 
}

