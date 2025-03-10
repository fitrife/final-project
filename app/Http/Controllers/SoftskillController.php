<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class SoftskillController extends Controller
{
    public function index()
    {

        $title = 'Training Softskill';
        $trainings = Training::where('trainings.training_categories_id', '=', 3)
                    ->get();

        return view('trainingcategories', [
            "title" => $title ,
            'active' => 'softskill',
            'trainings' => $trainings
        ]);
    }
}
