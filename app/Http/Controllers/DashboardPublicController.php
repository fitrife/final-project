<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublicTraining;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPublicController extends Controller
{
    public function index()
    {
        return view('dashboard.public.index', [
            "title" => "Public Training",
            'public' => PublicTraining::all()->sortDesc()
        ]);
    }

    public function show(PublicTraining $public)
    {
        return view('dashboard.public.show', [
            "title" => "Detail Pendaftar Public Training",
            'public'  => $public
        ]);
    }

    public function edit(PublicTraining $public)
    { 
        $progress = ['Sudah','Belum'];
        return view('dashboard.public.edit', [
            "title" => "Edit Data Pendaftar Public Training",
            'public' => $public,
        ], compact('progress'));
    }

    public function update(Request $request, PublicTraining $public)
    {
        $rules = [
            'progress'  => 'required'
        ];

        if($request->slug != $public->slug) {
            $rules['slug'] = 'required|unique:public';
        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        PublicTraining::where('id', $public->id)
            ->update($validatedData);

        return redirect('/dashboard/public')->with('success', 'Data berhasil diperbaharui!');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(PublicTraining::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
