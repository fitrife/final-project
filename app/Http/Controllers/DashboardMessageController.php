<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardMessageController extends Controller
{
    public function index()
    {
        return view('dashboard.messages.index', [
            "title" => "Pesan Masuk",
            'messages' => Message::all()->sortDesc()
        ]);
    }

    public function show(Message $message)
    {
        return view('dashboard.messages.show', [
            "title" => "Detail Pesan",
            'message'  => $message
        ]);
    }

    public function edit(Message $message)
    { 
        $progress = ['Sudah','Belum'];
        return view('dashboard.messages.edit', [
            "title" => "Edit Pesan",
            'message' => $message,
        ], compact('progress'));
    }

    public function update(Request $request, Message $message)
    {
        $rules = [
            'name' =>  'required|max:255',
            'email' => ['required','email:dns'],
            'phone'  => 'required',
            'message'  => 'required',
            'progress'  => 'required'
        ];

        if($request->slug != $message->slug) {
            $rules['slug'] = 'required|unique:messages';
        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        Message::where('id', $message->id)
            ->update($validatedData);

        return redirect('/dashboard/messages')->with('success', 'Message has been updated!');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Message::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
