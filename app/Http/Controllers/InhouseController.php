<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InhouseTraining;
use Cviebrock\EloquentSluggable\Services\SlugService;

class InhouseController extends Controller
{
    public function index() {
        $title = '';

        return view('inhouse', [
            "title" => "Inhouse Training" . $title,
            "active" => 'inhouse-training'
        ]);
    }

    public function create()
    {
        $progress = ['Belum','Sudah'];
        return view('inhouse', compact('progress'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'program' => 'required|max:255',
            'total_of_participants' => 'required',
            'name_of_participants' => 'nullable',
            'name' =>  'required|max:255',
            'slug'  =>  'required|unique:inhouse_trainings',
            'job_position'  =>  'required',
            'company' => 'required',
            'company_address' =>  'required',
            'company_email' => ['required','email:dns'],
            'alternative_email' => ['required','email:dns'],
            'company_phone' =>  'required',
            'handphone' =>  'required',
        ]);

        // dd($request->all());

        InhouseTraining::create($validatedData);

        return redirect('/inhouse-training')->with('success', 'Terimakasih telah mendaftar! Kami akan menghubungi Anda segera');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(InhouseTraining::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
