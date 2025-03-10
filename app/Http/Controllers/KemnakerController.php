<?php

namespace App\Http\Controllers;

use App\Models\Kemnaker;
use App\Models\Training;
use Illuminate\Http\Request;
use App\Models\KemnakerCertifications;

class KemnakerController extends Controller
{
    public function index()
    {

        $title = 'Sertifikasi Kemnaker RI';
        $trainings = Training::where('trainings.training_categories_id', '=', '1')
                    ->get();

        return view('trainingcategories', [
            "title" => $title ,
            'active' => 'sertfikasi-kemnaker-ri',
            'trainings' => $trainings
        ]);
    }
}
