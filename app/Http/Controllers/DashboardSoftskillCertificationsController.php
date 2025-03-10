<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Softskills;
use Illuminate\Http\Request;

class DashboardSoftskillCertificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.adssoftskill.index', [
            "title" => "Pendaftar Training Softskill",
            'softskills' => Softskills::where('training_id', NULL)->orderBy('created_at', 'desc')->get()
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
     * @param  \App\Models\Softskills  $softskills
     * @return \Illuminate\Http\Response
     */
    public function show(Softskills $softskills)
    {
        return view('dashboard.adssoftskill.show', [
            "title" => "Detail Pendaftar Training Softskill",
            'softskill'  => $softskills
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Softskills  $softskills
     * @return \Illuminate\Http\Response
     */
    public function edit(Softskills $softskills)
    {
        $progress = ['Sudah','Belum'];
        return view('dashboard.adssoftskill.edit', [
            "title" => "Edit Data Pendaftar Training Softskill",
            'softskill' => $softskills,
            'ad'  => Ad::all()
        ], compact('progress'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Softskills  $softskills
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Softskills $softskills)
    {
        $rules = [
            'progress'  => 'required'
        ];

        if($request->slugSoftskill != $softskills->slugSoftskill) {
            $rules['slugSoftskill'] = 'required|unique:softskills';
        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        Softskills::where('id', $softskills->id)
            ->update($validatedData);

        return redirect('/dashboard/adssoftskill')->with('success', 'Data berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Softskills  $softskills
     * @return \Illuminate\Http\Response
     */
    public function destroy(Softskills $softskills)
    {
        //
    }
}
