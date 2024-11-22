<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Exception;
use Carbon\Carbon;


class EventApiController extends Controller
{
    public function eventList(){
        try{
            $events = Event::with('member')->get();
            return response()->json(['success' => true, 'events' => $events]);
        }
        catch(Exception $e){
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function upcomingEvent(){
        try{
        $upcomingEvents = Event::with('member')->where('event_date', '>', carbon::now())->get();
        return response()->json(['success' => true, 'upcomingEvents' => $upcomingEvents]);

        } catch(Exception $e){
          return response()->json(['success' => false, 'message' => $e->getMessage()]);   
        }
    }

    public function pastEvent(){
        try{
        $pastEvents = Event::with('member')->where('event_date', '<', carbon::now())->get();
        return response()->json(['success' => true, 'pastEvents' => $pastEvents]);

        } catch(Exception $e){
          return response()->json(['success' => false, 'message' => $e->getMessage()]);   
        }

    }
}
