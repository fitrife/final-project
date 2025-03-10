<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Softskill;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\BnspCertifications;
use App\Models\InhouseTraining;
use App\Models\KemnakerCertifications;
use App\Models\PublicTraining;
use App\Models\Softskills;
use Intervention\Image\Facades\Image;

class DashboardController extends Controller
{
    public function index()
    {
        // $program = Program::count();
        // $softskill = Softskill::count();
        $article = Post::count();
        $softskill = Softskills::where('progress', '=', 'Belum')->count();
        $kemnaker = KemnakerCertifications::where('progress', '=', 'Belum')->count();
        $bnsp = BnspCertifications::where('progress', '=', 'Belum')->count();
        $inhouse = InhouseTraining::latest()->take(10)->get();
        $public = PublicTraining::latest()->take(10)->get();

        return view('dashboard.index', [
            "title" => "Dashboard",
            'posts' => Post::where('user_id', auth()->user()->id)->latest()->take(10)->get(),
            // 'students' => Student::latest()->take(10)->get(),
            'softskill' => $softskill,
            // 'student' => $student,
            'article' => $article,
            'inhouse' => $inhouse,
            'public' => $public,
            'kemnaker' => $kemnaker,
            'bnsp' => $bnsp
        ]);
    }

    public function img_upload() {
        $mainImage = $request->file('file');
        $filename = time() . '.' . $mainImage->extension();
        Image::make($mainImage)->save(public_path('tinymce_images/' . $filename));
        
        return json_encode(['location' => asset('tinymce_images' . $filename)]);
        
    }
}
