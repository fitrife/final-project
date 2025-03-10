<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Ads;
use App\Models\Training;
use Illuminate\Http\Request;
use App\Models\TrainingCategories;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.ads.index', [
            "title" => "Pelatihan dan Pembinaan",
            'ads' => Ads::where('id', '!=', '0')->get()
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
        return view('dashboard.ads.create', [
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
            'training_categories_id'   =>  'required',
            'name' =>  'required|max:255',
            'slug'  =>  'required|unique:ads',
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

        Ads::create($validatedData);

        return redirect('/dashboard/ads')->with('success', 'New program has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ads $ads)
    {
        return view('dashboard.ads.show', [
            "title" => "Detail Program",
            'ads'  => $ads
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ads $ads)
    {
        
        return view('dashboard.ads.edit', [
            'title' => "Edit Program Pelatihan dan Pembinaan",
            'ads' => $ads,
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
    public function update(Request $request, Ads $ads)
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
        
        if($request->slug != $ads->slug) {
            $rules['slug'] = 'required|unique:ad';
        }

        $validatedData = $request->validate($rules);
        
        if($request->file('thumbnail')) {
            if($request->oldThumbnail) {
                Storage::delete($request->oldThumbnail);
            }
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('ads->thumbnail');
        }

        Ads::where('id', $ads->id)
        ->update($validatedData);

        return redirect('/dashboard/ads')->with('success', 'Program has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ads $ads)
    {
        // if($ads->thumbnail) {
        //     Storage::delete($ads->thumbnail);
        // }
        // Ads::destroy($ads->id);

        // return redirect('/dashboard/ads')->with('success', 'Program has been deleted!');

        try { 
            if($ad->thumbnail) {
                Storage::delete($ads->thumbnail);
            }
            Ad::destroy($ad->id);
    
            return redirect('/dashboard/advertisement')->with('success', 'Program has been deleted!');
        
        } catch (Exception $e) {
            report($e);

                return back()->with('error', 'Program tidak dapat dihapus karena berelasi dengan Pendaftar!');
        }
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Ads::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
