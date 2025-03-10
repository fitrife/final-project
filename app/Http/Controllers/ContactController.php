<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ContactController extends Controller
{
    public function index() {
        $title = '';
        return view('contact', [
            "title" => "Kontak Kami" . $title,
            "active" => 'kontak',
        ]);
    }

    public function create()
    {
        $progress = ['Belum','Sudah'];
        return view('contact', compact('progress'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' =>  'required|max:255',
            'slug'  =>  'required|unique:messages',
            'email' => ['required','email:dns'],
            'phone'  => 'required',
            'message'  => 'required',
        ]);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->message), 50);
        
        Message::create($validatedData);

        return redirect('/kontak-kami')->with('success', 'Pesan Anda akan kami balas segera!');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Message::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
