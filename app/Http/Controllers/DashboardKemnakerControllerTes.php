<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Education;
use Illuminate\Http\Request;
use App\Models\KemnakerCertifications;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardKemnakerControllerTes extends Controller
{
    public function index()
    {
        return view('dashboard.adskemnaker.index', [
            "title" => "Pendaftar Sertifikasi Kemnaker RI",
            'kemnaker' => KemnakerCertifications::where('training_id', NULL)->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function show(KemnakerCertifications $kemnakerCertifications)
    {
        return view('dashboard.adskemnaker.show', [
            "title" => "Detail Pesan",
            'kemnaker'  => $kemnakerCertifications
        ]);
    }

    // public function show(KemnakerCertifications $kemnaker)
    // {

    //     // dd($kemnaker);
    //     return view('dashboard.kemnaker.show', [
    //         "title" => "Detail Pendaftar Sertifikasi Kemnaker RI",
    //         'kemnaker'  => $kemnaker
    //     ]);
    // }

    public function edit(KemnakerCertifications $kemnaker)
    { 
        $progress = ['Sudah','Belum'];
        return view('dashboard.adskemnaker.edit', [
            "title" => "Edit Data Pendaftar Sertifikasi Kemnaker RI",
            'kemnaker' => $kemnaker,
            'ads'  => Ads::all(),
            "education" => Education::all()
        ], compact('progress'));
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(KemnakerCertifications::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
