<?php

namespace App\Http\Controllers;

use File;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Path\To\DOMDocument;
use Intervention\Image\ImageManagerStatic as Image;

class DashboardPostController extends Controller
{
    public function index() {
        return view('dashboard.posts.index', [
            'title' => 'Artikel Blog',
            'posts' => Post::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.posts.create', [
            "title" => "Tambah Artikel",
            'categories' => Category::all()
        ]);
    }

public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'slug' => 'required|unique:posts',
        'category_id' => 'required',
        'image' => 'image|file|max:1024',
        'body' => 'required'
    ]);

    // Simpan gambar unggahan utama (jika ada)
    if ($request->file('image')) {
        $filename = time() . '-' . Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('post-images'), $filename);
        $validatedData['image'] = 'post-images/' . $filename;
    }

    // Simpan gambar dalam konten
    $storage = 'post-content';  // Simpan dalam public/post-content/
    $dom = new \DOMDocument();
    libxml_use_internal_errors(true);
    $dom->loadHTML($request->body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();

    $images = $dom->getElementsByTagName('img');

    foreach ($images as $img) {
        $src = $img->getAttribute('src');

        // Jika gambar dalam format base64 (data:image), ubah menjadi file
        if (preg_match('/data:image/', $src)) {
            preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
            $mimetype = $groups['mime'];

            $fileNameContent = time() . '-' . Str::random(10) . ".$mimetype";
            $filePath = "$storage/$fileNameContent";

            // Simpan gambar di dalam public/post-content/
            Image::make($src)
                ->resize(1200, 1200)
                ->encode($mimetype, 100)
                ->save(public_path($filePath));

            // Ganti src dengan path yang bisa diakses
            $new_src = asset($filePath);
            $img->setAttribute('src', $new_src);
            $img->setAttribute('class', 'img-responsive');
        }
    }

    $validatedData['user_id'] = auth()->user()->id;
    $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 400);

    // Simpan data ke database dengan konten yang sudah diperbarui
    Post::create($validatedData + ['body' => $dom->saveHTML()]);

    return redirect('/dashboard/posts')->with('success', 'New post has been added!');
}

    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            "title" => "Preview Artikel",
            'post'  => $post
        ]);
    }

    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            "title" => "Edit Artikel",
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

public function update(Request $request, Post $post)
{
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'slug' => 'required|unique:posts,slug,' . $post->id,
        'category_id' => 'required',
        'image' => 'image|file|max:1024',
        'body' => 'required'
    ]);

    // Jika ada gambar baru diunggah, hapus yang lama & simpan yang baru
    if ($request->file('image')) {
        // Hapus gambar lama jika ada
        if ($post->image && file_exists(public_path($post->image))) {
            unlink(public_path($post->image));
        }

        // Simpan gambar baru
        $filename = time() . '-' . Str::random(10) . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('post-images'), $filename);
        $validatedData['image'] = 'post-images/' . $filename;
    }

    // **Update gambar dalam konten body**
    $storage = 'post-content';
    $dom = new \DOMDocument();
    libxml_use_internal_errors(true);
    $dom->loadHTML($request->body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();

    $images = $dom->getElementsByTagName('img');

    foreach ($images as $img) {
        $src = $img->getAttribute('src');

        if (preg_match('/data:image/', $src)) {
            preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
            $mimetype = $groups['mime'];

            $fileNameContent = time() . '-' . Str::random(10) . ".$mimetype";
            $filePath = "$storage/$fileNameContent";

            // Simpan gambar di dalam public/post-content/
            Image::make($src)
                ->resize(1200, 1200)
                ->encode($mimetype, 100)
                ->save(public_path($filePath));

            $new_src = asset($filePath);
            $img->setAttribute('src', $new_src);
            $img->setAttribute('class', 'img-responsive');
        }
    }

    $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 400);
    
    // Simpan perubahan ke database
    $post->update($validatedData + ['body' => $dom->saveHTML()]);

    return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
}



public function destroy(Post $post)
{
    // Hapus gambar utama jika ada
    if ($post->image && file_exists(public_path($post->image))) {
        unlink(public_path($post->image));
    }

    // Hapus semua gambar dalam konten body
    $dom = new \DOMDocument();
    libxml_use_internal_errors(true);
    $dom->loadHTML($post->body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();

    $images = $dom->getElementsByTagName('img');

    foreach ($images as $img) {
        $src = $img->getAttribute('src');
        $imagePath = str_replace(asset('/'), '', $src); // Ambil relative path
        
        if (file_exists(public_path($imagePath))) {
            unlink(public_path($imagePath));
        }
    }

    // Hapus data dari database
    $post->delete();

    return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
}


    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }

    // public function upload(Request $request) {
    //     if($request->hasFile('upload')) {
    //         $request->file('upload')->store('uploads');
            
    //         $url = assets('uploads/');
            
    //         return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
    //     }
    // }
}
