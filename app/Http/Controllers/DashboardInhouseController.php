<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InhouseTraining;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardInhouseController extends Controller
{
    public function index()
    {
        return view('dashboard.inhouse.index', [
            "title" => "Inhouse Training",
            'inhouse' => InhouseTraining::all()->sortDesc()
        ]);
    }

    public function show(InhouseTraining $inhouse)
    {
        return view('dashboard.inhouse.show', [
            "title" => "Detail Pendaftar Inhouse Training",
            'inhouse'  => $inhouse
        ]);
    }

    public function edit(InhouseTraining $inhouse)
    { 
        $progress = ['Sudah','Belum'];
        return view('dashboard.inhouse.edit', [
            "title" => "Edit Data Pendaftar Inhouse Training",
            'inhouse' => $inhouse,
        ], compact('progress'));
    }

    public function update(Request $request, InhouseTraining $inhouse)
    {
        $rules = [
            'progress'  => 'required'
        ];

        if($request->slug != $inhouse->slug) {
            $rules['slug'] = 'required|unique:inhouse';
        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        InhouseTraining::where('id', $inhouse->id)
            ->update($validatedData);

        return redirect('/dashboard/inhouse')->with('success', 'Data berhasil diperbaharui!');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(PublicTraining::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
