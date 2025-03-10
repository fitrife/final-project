<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Education;
use Illuminate\Http\Request;
use App\Models\BnspCertifications;

class DashboardBnspController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.adsbnsp.index', [
            "title" => "Pendaftar Sertifikasi BNSP",
            'bnsp' => BnspCertifications::where('training_id', NULL)->orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BnspCertifications  $bnspCertifications
     * @return \Illuminate\Http\Response
     */
    public function show(BnspCertifications $bnsp)
    {
        return view('dashboard.adsbnsp.show', [
            "title" => "Detail Pendaftar Sertifikasi BNSP",
            'bnsp'  => $bnsp
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BnspCertifications  $bnspCertifications
     * @return \Illuminate\Http\Response
     */
    public function edit(BnspCertifications $bnsp)
    {
        $progress = ['Sudah','Belum'];
        return view('dashboard.adsbnsp.edit', [
            'bnsp' => $bnsp,
            "title" => "Edit Pendaftar Training BNSP",
            "education" => Education::all(),
            "ad"  => Ad::all(),
        ], compact('progress'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BnspCertifications  $bnspCertifications
     * @return \Illuminate\Http\Response
     */
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

        return redirect('/dashboard/adsbnsp')->with('success', 'Data berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BnspCertifications  $bnspCertifications
     * @return \Illuminate\Http\Response
     */
    public function destroy(BnspCertifications $bnspCertifications)
    {
        //
    }
}
