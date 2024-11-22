<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Member;

class EventController extends Controller
{
    public function showEventForm(){
        return view('SuperAdmin.Event.event');
    }

    public function createEvent(Request $request){
        $validatedData = $request->validate([
            "event_title" => 'required|string',
            "event_sd" => 'required|string',
            "event_ld" => 'required|string',
            "event_date" => 'nullable|string',
            "event_banner[]" => 'nullable|mimes:png,jpg,jpeg,svg,gif',
            "event_members" => "required|string",
        ]);

         try {

            $eventBannerPaths = [];
            if ($request->hasFile('event_banner')) {
                foreach ($request->file('event_banner') as $bannerImage) {
                    $bannerName = time() . '_' . $bannerImage->getClientOriginalName();
                    $bannerImage->move(public_path('event-banners'), $bannerName);
                    $eventBannerPaths[] = 'event-banners/' . $bannerName; // Add the file path to the array
                }
                $validatedData['event_banner'] = json_encode($eventBannerPaths); // Store as JSON in the database
            }

             // Decode Event Members
            $members = json_decode($validatedData['event_members'], true);
            if (!is_array($members)) {
                throw new \Exception("Invalid event members format.");
            }

            $event = Event::create([
                'event_banner' => $validatedData['event_banner'] ?? null,
                'event_title' => $validatedData['event_title'] ?? null,
                'event_date' => $validatedData['event_date'] ?? null,
                'event_short_desc' => $validatedData['event_sd'] ?? null,
                'event_long_desc' => $validatedData['event_ld'] ?? null ,
            ]);


            foreach($members as $member){
                if (isset($member['value'])) { // Check for 'value' field
                Member::create([
                    'member_name' => $member['value'],
                    'event_id' => $event->id,
                ]);
            }
            }

             return redirect()->route('sadmin.event-list')->with("success", "Event created successfully.");


         }
         catch(Exception $e){
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    public function eventList(){
        $events = Event::with('member')->get();
        return view('SuperAdmin.Event.event_list',compact('events'));
    }
}
