<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use App\Models\TrainingCategories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.trainings.index', [
            "title" => "Pelatihan dan Pembinaan",
            // User::where('id', '!=', auth()->id())->get();
            'trainings' => Training::where('id', '!=', '0')->get()
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
        return view('dashboard.trainings.create', [
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
            'slug'  =>  'required|unique:trainings',
            'thumbnail' => 'image|file|max:1024',
            'description' => 'required',
            'theory' => 'required',
            'participant_requirement' => 'nullable',
            'goal' => 'nullable',
            'method' => 'nullable',
            'facility' => 'nullable',
        ]);

	if ($request->file('thumbnail')) {
	    $filename = time() . '-' . Str::random(10) . '.' . $request->file('thumbnail')->getClientOriginalExtension();
	    $request->file('thumbnail')->move(public_path('training-thumbnail'), $filename);
	    $validatedData['thumbnail'] = 'training-thumbnail/' . $filename;
	}
	
	Training::create($validatedData);

        return redirect(url('/dashboard/trainings'))->with('success', 'New program has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        return view('dashboard.trainings.show', [
            "title" => "Detail Program",
            'training'  => $training
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        
        return view('dashboard.trainings.edit', [
            'title' => "Edit Program Pelatihan dan Pembinaan",
            'training' => $training,
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
    public function update(Request $request, Training $training)
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
        
        if($request->slug != $training->slug) {
            $rules['slug'] = 'required|unique:trainings';
        }

        $validatedData = $request->validate($rules);
        
	if ($request->file('thumbnail')) {
            // Hapus gambar lama jika ada
            if ($training->thumbnail && file_exists(public_path($training->thumbnail))) {
                unlink(public_path($training->thumbnail));
            }

            // Simpan gambar baru
            $filename = time() . '-' . Str::random(10) . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->move(public_path('training-thumbnail'), $filename);
            $validatedData['thumbnail'] = 'training-thumbnail/' . $filename;
        }

        Training::where('id', $training->id)
        ->update($validatedData);

        return redirect('/dashboard/trainings')->with('success', 'Program has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Training $training)
    {
        // Hapus gambar lama jika ada
        $training->update(['thumbnail' => null]);                

        $training->delete();

        return redirect('/dashboard/trainings')->with('success', 'Program has been deleted!');
    }


    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Training::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
