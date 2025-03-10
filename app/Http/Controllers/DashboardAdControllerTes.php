<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use App\Models\TrainingCategories;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardAdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.ad.index', [
            "title" => "Pelatihan dan Pembinaan",
            'ad' => Ad::where('id', '!=', '0')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trainingcategories = TrainingCategories::where('id', '!=', '4')->get();
        return view('dashboard.ad.create', [
            'title' => "Tambah Program Pelatihan dan Pembinaan",
            'trainingcategories' => $trainingcategories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' =>  'required|max:255',
            'slug'  =>  'required|unique:Ad',
            'training_categories_id'   =>  'required',
            'thumbnail' => 'image|file|max:1024',
            'description' => 'required',
            'theory' => 'required',
            'participant_requirement' => 'nullable',
            'goal' => 'nullable',
            'method' => 'nullable',
            'facility' => 'nullable',
        ]);
        
        if($request->file('thumbnail')) {
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('ads->thumbnail');
        }

        Ad::create($validatedData);

        return redirect('/dashboard/ad')->with('success', 'New program has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $iklan)
    {
        return view('dashboard.ad.show', [
            "title" => "Detail Program",
            'ads'  => $iklan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        
        return view('dashboard.ad.edit', [
            'title' => "Edit Program Pelatihan dan Pembinaan",
            'ad' => $ad,
            'trainingcategories' => TrainingCategories::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        $rules = [
            'training_categories_id'   =>  'required',
            'name' =>  'required|max:255',
            'thumbnail' => 'image|file|max:1024',
            'description' => 'required',
            'theory' => 'required',
            'participant_requirement' => 'nullable',
            'goal' => 'nullable',
            'method' => 'nullable',
            'facility' => 'nullable',
        ];
        
        if($request->slug != $ad->slug) {
            $rules['slug'] = 'required|unique:Ad';
        }

        $validatedData = $request->validate($rules);
        
        if($request->file('thumbnail')) {
            if($request->oldThumbnail) {
                Storage::delete($request->oldThumbnail);
            }
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('ads->thumbnail');
        }

        Ad::where('id', $ad->id)
        ->update($validatedData);

        return redirect('/dashboard/ad')->with('success', 'Program has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        if($ad->thumbnail) {
            Storage::delete($ad->thumbnail);
        }
        Ad::destroy($ad->id);

        return redirect('/dashboard/ad')->with('success', 'Program has been deleted!');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Ad::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
