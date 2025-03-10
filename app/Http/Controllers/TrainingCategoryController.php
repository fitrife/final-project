<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class TrainingCategoryController extends Controller
{
    public function index()
    {
        $title = 'Pelatihan dan Pembinaan';

        return view('trainingcategories', [
            "title" => $title ,
            'active' => 'trainingcategories',
            'trainings' => Training::where('training_categories_id', '1')
        ]);
    }
}
