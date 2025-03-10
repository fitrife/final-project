<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Training;
use Illuminate\Http\Request;
use App\Models\TrainingCategories;

class HomeController extends Controller
{
    public function index() {
        $kemnaker = Training::where('training_categories_id', '=', '1')->take(9)->get();
        $bnsp = Training::where('training_categories_id', '=', '2')->take(9)->get();
        $softskill = Training::where('training_categories_id', '=', '3')->take(9)->get();

        $all = Training::latest()->take(9)->get();
        if(request('training_categories')) {
            $training_categories = TrainingCategories::firstWhere('slug', request('kategori'));
            $title = ' in ' . $training_categories->name;
       }

       $training = Training::where('id', '!=', '0')
                   ->latest()->filter(request(['kategori']))
                   ->paginate(9)->withQueryString();

        $title = '';
        return view('home', [
            "title" => "Beranda" . $title,
            "active" => 'home',
            'kemnaker'  => $kemnaker,
            'bnsp'  => $bnsp,
            'softskill'  => $softskill,
            'all' => $all,
            'schedules' => Schedule::latest()->take(10)->get(),
            'categories' => TrainingCategories::where('id', '!=', '4')->get(),
            'trainings' => Training::latest()->filter(request(['category']))->paginate(9)->withQueryString(),
            'training_categories' => TrainingCategories::where('id', '!=', '4')->get(),
             // == solve N+1 problem == //
            //  "trainings" =>  Training::latest()->filter(request(['kategori']))->paginate(9)->withQueryString()
            "trainings" => $training
        ]);
    }
}
