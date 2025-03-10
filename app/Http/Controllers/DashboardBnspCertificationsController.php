<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\Education;
use Illuminate\Http\Request;
use App\Models\BnspCertifications;

class DashboardBnspCertificationsController extends Controller
{
    public function index()
    {
        return view('dashboard.bnsp.index', [
            "title" => "Pendaftar Sertifikasi BNSP",
            'bnsp' => BnspCertifications::where('ad_id', NULL)->orderBy('created_at', 'desc')->get()
        ]);
    }

    // public function show(BnspCertifications $bnspCertifications)
    // {
    //     return view('dashboard.bnsp.show', [
    //         "title" => "Detail Pendaftar Sertifikasi BNSP",
    //         'bnsp'  => $bnspCertifications
    //     ]);
    // }

    public function show(BnspCertifications $bnsp)
    {
        return view('dashboard.bnsp.show', [
            "title" => "Detail Pendaftar Sertifikasi BNSP",
            'bnsp'  => $bnsp
        ]);
    }

    // public function edit(BnspCertifications $bnspCertifications)
    // { 
    //     $progress = ['Sudah','Belum'];
    //     return view('dashboard.bnsp.edit', [
    //         "title" => "Edit Data Pendaftar Training Softskill",
    //         'bnsp' => $bnspCertifications,
    //         'training'  => Training::all()
    //     ], compact('progress'));
    // }

    public function edit(BnspCertifications $bnsp)
    {
        $progress = ['Sudah','Belum'];
        return view('dashboard.bnsp.edit', [
            'bnsp' => $bnsp,
            "title" => "Edit Pendaftar Training BNSP",
            "education" => Education::all(),
            "training"  => Training::all(),
        ], compact('progress'));
    }

    public function update(Request $request, BnspCertifications $bnsp)
    {
        $rules = [
            'progress'  => 'required'
        ];

        if($request->slug != $bnsp->slug) {
            $rules['slug'] = 'required|unique:bnsp_certifications';
        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        BnspCertifications::where('id', $bnsp->id)
            ->update($validatedData);

        return redirect('/dashboard/bnsp')->with('success', 'Data berhasil diperbaharui!');
    }
}
