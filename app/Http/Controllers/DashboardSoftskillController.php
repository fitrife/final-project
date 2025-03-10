<?php

namespace App\Http\Controllers;

use App\Models\Softskill;
use App\Models\Softskills;
use App\Models\Training;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardSoftskillController extends Controller
{
    public function index()
    {
        return view('dashboard.softskill.index', [
            "title" => "Pendaftar Training Softskill",
            'softskills' => Softskills::where('ad_id', NULL)->orderBy('created_at', 'desc')->get()
        ]);
    }
    
    public function show(Softskills $softskill)
    {
        return view('dashboard.softskill.show', [
            "title" => "Detail Pendaftar Training Softskill",
            'softskill'  => $softskill
        ]);
    }

    public function edit(Softskills $softskill)
    { 
        $progress = ['Sudah','Belum'];
        return view('dashboard.softskill.edit', [
            "title" => "Edit Data Pendaftar Training Softskill",
            'softskill' => $softskill,
            'training'  => Training::all()
        ], compact('progress'));
    }

    public function update(Request $request, Softskills $softskill)
    {
        $rules = [
            'progress'  => 'required'
        ];

        if($request->slugSoftskill != $softskill->slugSoftskill) {
            $rules['slugSoftskill'] = 'required|unique:softskills';
        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        Softskills::where('id', $softskill->id)
            ->update($validatedData);

        return redirect('/dashboard/softskill')->with('success', 'Data berhasil diperbaharui!');
    }

}
