<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index() {
        $title = '';
        $kemnaker = Schedule::where('schedules.training_categories_id', '=', '1')
                    ->get();
        $bnsp = Schedule::where('schedules.training_categories_id', '=', '2')
                    ->get();
        $softskill = Schedule::where('schedules.training_categories_id', '=', '3')
                    ->get();

        return view('schedule', [
            "title" => "Jadwal Pembinaan" . $title,
            "active" => 'jadwal',
            'schedules' => Schedule::all(),
            'kemnaker' => $kemnaker,
            'bnsp'  => $bnsp,
            'softskill' => $softskill
        ]);
    }
}
