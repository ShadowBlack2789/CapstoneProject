<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Duties;
use App\Models\vacation;
use App\Models\absent;

class EventsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('super');
    }

    public function loadEvents()
    {
        $duties = Duties::all();
        $values_events = [];

        foreach($duties as $dutie ){
            $values_events[] = [
                'title' => $dutie->rooms_number,
                'start' => $dutie->start_date,
                'color' => '#900C3F',
                'textColor' => '#000000'
            ];
        }

        $vacations = vacation::all();

        foreach($vacations as $vacation ){
            $values_events[] = [
                'title' => 'Vacation',
                'start' => $vacation->start_date,
                'end' => $vacation->end_date,
                'color' => '#ffc107',
                'textColor' => '#000000'
            ];
        }

        $absents = absent::all();

        foreach($absents as $absent ){
            $values_events[] = [
                'title' => $absent->user_id,
                'start' => $absent->start_date,
                'end' => $absent->end_date,
                'color' => '#FF0000',
                'textColor' => '#000000'
            ];
        }

        return response()->json($values_events);
    }

    
}
