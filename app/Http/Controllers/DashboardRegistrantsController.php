<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\Registrants;
use Illuminate\Http\Request;

class DashboardRegistrantsController extends Controller
{
    public function index()
    {
        if(auth()->guest()) {
            abort(403);
        }
        return view('dashboard.registrant.index', [
            "title" => "Pendaftar Training Kemnaker dan BNSP",
            'registrants' => Registrants::all()->sortDesc()
        ]);
    }

    public function show(Registrants $registrants)
    {
        return view('dashboard.registrant.show', [
            "title" => "Detail Pendaftar Training Softskill",
            'kemnaker'  => $registrants
        ]);
    }

    public function edit(Registrants $registrants)
    { 
        $progress = ['Sudah','Belum'];
        return view('dashboard.registrant.edit', [
            "title" => "Edit Data Pendaftar Training Softskill",
            'registrant' => $registrants,
            'training'  => Training::all()
        ], compact('progress'));
    }
}
