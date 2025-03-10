<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use App\Models\BnspCertifications;

class BnspController extends Controller
{
    public function index()
    {

        $title = 'Sertifikasi BNSP';

        return view('trainingcategories', [
            "title" => $title ,
            'active' => 'sertfikasi-bnsp',
            'trainings' => Training::where('training_categories_id', 2)->get()
        ]);
    }
}
