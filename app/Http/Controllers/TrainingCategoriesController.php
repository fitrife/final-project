<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\TrainingCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TrainingCategoriesController extends Controller
{
    public function index()
    {
        // $title = 'Pelatihan dan Pembinaan'; 

        if(request('category')) {
            $pelatihan = TrainingCategories::firstWhere('slug', request('trainingcategories'));
            $title = ' in ' . $pelatihan->name;
            $category_id = ' in ' . $pelatihan->id;
        }

        return view('trainingcategories', [
            "title" => $title ,
            'active' => 'trainingcategories',
            'category'  => $category_id,
            // 'trainingcategory'  => TrainingCategories::all(),
            'categories' => TrainingCategories::where('id', '!=', '4')->get(),
            'trainings' => Training::latest()->filter(request(['category']))->paginate(9)->withQueryString()

        ]);
    }

}
