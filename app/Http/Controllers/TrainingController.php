<?php

namespace App\Http\Controllers;

use App\Models\Bnsp;
use App\Models\BnspCertifications;
use App\Models\Training;
use App\Models\Education;
use App\Models\Kemnaker;
use App\Models\KemnakerCertifications;
use App\Models\Registrant;
use App\Models\Softskills;
use App\Models\Registrants;
use App\Models\Softskill;
use Illuminate\Http\Request;
use App\Models\TrainingCategories;
use Cviebrock\EloquentSluggable\Services\SlugService;

class TrainingController extends Controller
{

    public function index() {
        
        $title = '';
 
        if(request('training_categories')) {
             $training_categories = TrainingCategories::firstWhere('slug', request('kategori'));
             $title = ' in ' . $training_categories->name;
        }

        $training = Training::where('id', '!=', '0')
                    ->latest()->filter(request(['kategori']))
                    ->paginate(9)->withQueryString();
 
         return view('alltrainingcategories', [
             "title" => "Pelatihan dan Pembinaan" . $title,
             "active" => 'training',
             'training_categories' => TrainingCategories::where('id', '!=', '4')->get(),
             // == solve N+1 problem == //
            //  "trainings" =>  Training::latest()->filter(request(['kategori']))->paginate(9)->withQueryString()
            "trainings" => $training
         ]);
     }
 
    public function show(Training $training) {

        
        $schedule = Training::join('schedules', 'schedules.training_id', '=', 'trainings.id')
                ->where('schedules.training_id', '=', $training->id)
                ->orderBy('schedules.updated_at', 'asc')
                ->get(['schedules.name', 'trainings.name','schedules.schedule', 'schedules.method']);
        return view('program', [
        "title" => $training->name,
        "active" => 'training',
        "training" => $training,
        "education" => Education::all()
        ], compact('schedule'));
    }

    public function store(Request $request, Training $training) {
        if ($training->training_categories_id == '3') {
            $validatedData = $request->validate([
                'total_of_participant' => 'required',
                'participants'  => 'required',
                'name' =>  'required|max:255',
                'slugSoftskill'  =>  'required|unique:softskill',
                'training_id'  => 'required',
                'job_position'   => 'required',
                'company'   => 'required',
                'company_address'   =>  'required',
                'company_email' => ['required','email:dns'],
                'email' => ['required','email:dns'],
                'telephone' =>  'required',
                'phone' =>  'required',
                ]);
                Softskills::create($validatedData);
                // End Store Data
        
                return back()->with('success', 'Terimakasih telah mendaftar! Kami akan menghubungi Anda segera');
            // Store Data
        } elseif ($training->training_categories_id == '2') {
            $validatedData = $request->validate([
                'name' =>  'required|max:255',
                'slugBnsp'  =>  'required|unique:bnsp_certifications',
                'birthdate' =>  'required',
                'email' => ['required','email:dns'],
                'phone' =>  'required',
                'education_id'  =>  'required',
                'job'   =>  'required',
                'company'   => 'nullable',
                'company_address'   =>  'nullable',
                'company_messenger' => 'required',
                'have_attended_training'    =>  'required',
                'training_id'  => 'required',
                'training_categories_id'  => 'required',
                ]);
                BnspCertifications::create($validatedData);
                // End Store Data
        
                return back()->with('success', 'Terimakasih telah mendaftar! Kami akan menghubungi Anda segera');
        } else {
            $validatedData = $request->validate([
                'name' =>  'required|max:255',
                'slugKemnaker'  =>  'required|unique:kemnaker_certifications',
                'birthdate' =>  'required',
                'email' => ['required','email:dns'],
                'phone' =>  'required',
                'education_id'  =>  'required',
                'job'   =>  'required',
                'company'   => 'nullable',
                'company_address'   =>  'nullable',
                'company_messenger' => 'required',
                'have_attended_training'    =>  'required',
                'training_id'  => 'required',
                'training_categories_id'  => 'required',
                ]);
                KemnakerCertifications::create($validatedData);
                // End Store Data
        
                return back()->with('success', 'Terimakasih telah mendaftar! Kami akan menghubungi Anda segera');
        }
    }

    // public function checkSlug(Request $request, Training $training) {
    //     if ($training->training_categories_id == '3') {
    //         $slug = SlugService::createSlug(Softskill::class, 'slug', $request->name);

    //         return response()->json(['slug' => $slug]);
    //     } elseif ($training->training_categories_id == '2') {
    //         $slugKemnaker = SlugService::createSlug(KemnakerCertifications::class, 'slugKemnaker', $request->name);

    //         return response()->json(['slugKemnaker' => $slugKemnaker]);
    //     } else {
    //         $slugBnsp = SlugService::createSlug(BnspCertifications::class, 'slugBnsp', $request->name);

    //         return response()->json(['slugBnsp' => $slugBnsp]);
    //     }
    // }

    public function checkKemnakerSlug(Request $request) {
        $slugKemnaker = SlugService::createSlug(KemnakerCertifications::class, 'slugKemnaker', $request->name);

        return response()->json(['slugKemnaker' => $slugKemnaker]);
    }

    public function checkBnspSlug(Request $request) {
        $slugBnsp = SlugService::createSlug(BnspCertifications::class, 'slugBnsp', $request->name);

        return response()->json(['slugBnsp' => $slugBnsp]);
    }

    public function checkSoftskillSlug(Request $request) {
        $slugSoftskill = SlugService::createSlug(Softskills::class, 'slugSoftskill', $request->name);

        return response()->json(['slugSoftskill' => $slugSoftskill]);
    }
}
