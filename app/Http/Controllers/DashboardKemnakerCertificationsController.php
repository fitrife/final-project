<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\Education;
use Illuminate\Http\Request;
use App\Models\KemnakerCertifications;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardKemnakerCertificationsController extends Controller
{
    public function index()
    {
        return view('dashboard.kemnaker.index', [
            "title" => "Pendaftar Sertifikasi Kemnaker RI",
            'kemnaker' => KemnakerCertifications::where('ad_id', NULL)->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function show(KemnakerCertifications $kemnaker)
    {
        return view('dashboard.kemnaker.show', [
            "title" => "Detail Pendaftar Training Kemnaker RI",
            'kemnaker'  => $kemnaker
        ]);
    }

    public function edit(KemnakerCertifications $kemnaker)
    { 
        $progress = ['Sudah','Belum'];
        return view('dashboard.kemnaker.edit', [
            "title" => "Edit Data Pendaftar Sertifikasi Kemnaker RI",
            'kemnaker' => $kemnaker,
            'training'  => Training::all(),
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

        return redirect('/dashboard/kemnaker')->with('success', 'Data berhasil diperbaharui!');
    }
}
