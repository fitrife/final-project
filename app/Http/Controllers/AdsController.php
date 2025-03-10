<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\BnspCertifications;
use App\Models\Education;
use App\Models\KemnakerCertifications;
use App\Models\Softskills;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdsController extends Controller
{
    public function index(Ad $ads) {
        
        return view('ads', [
            "title" => $ads->name,
            "active" => 'training',
            "ad" => $ads,
            "education" => Education::all()
            ]);
    }

    public function store(Request $request, Ad $ads) {
        if ($ads->training_categories_id == '3') {
            $validatedData = $request->validate([
                'total_of_participant' => 'required',
                'participants'  => 'required',
                'name' =>  'required|max:255',
                'slugSoftskill'  =>  'required|unique:softskill',
                'ad_id'  => 'required',
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
        } elseif ($ads->training_categories_id == '2') {
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
                'ad_id'  => 'required',
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
                'ad_id'  => 'required',
                'training_categories_id'  => 'required',
                ]);
                KemnakerCertifications::create($validatedData);
                // End Store Data
        
                return back()->with('success', 'Terimakasih telah mendaftar! Kami akan menghubungi Anda segera');
        }
    }

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
