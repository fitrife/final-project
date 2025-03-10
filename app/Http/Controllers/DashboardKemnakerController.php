<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Training;
use App\Models\Education;
use Illuminate\Http\Request;
use App\Models\KemnakerCertifications;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardKemnakerController extends Controller
{
    public function index()
    {
        return view('dashboard.adskemnaker.index', [
            "title" => "Pendaftar Sertifikasi Kemnaker RI",
            'kemnaker' => KemnakerCertifications::where('training_id', NULL)->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function show(KemnakerCertifications $kemnaker)
    {
        return view('dashboard.adskemnaker.show', [
            "title" => "Detail Pendaftar Training Kemnaker RI",
            'kemnaker'  => $kemnaker
        ]);
    }

    public function edit(KemnakerCertifications $kemnaker)
    { 
        $progress = ['Sudah','Belum'];
        return view('dashboard.adskemnaker.edit', [
            "title" => "Edit Data Pendaftar Sertifikasi Kemnaker RI",
            'kemnaker' => $kemnaker,
            'ads'  => Ad::all(),
            "education" => Education::all()
        ], compact('progress'));
    }

    public function update(Request $request, KemnakerCertifications $kemnaker)
    {
        $rules = [
            'progress'  => 'required'
        ];

        if($request->slug != $kemnaker->slug) {
            $rules['slug'] = 'required|unique:kemnaker_certifications';
        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        KemnakerCertifications::where('id', $kemnaker->id)
            ->update($validatedData);

        return redirect('/dashboard/adskemnaker')->with('success', 'Data berhasil diperbaharui!');
    }
}
