<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardCategoryController extends Controller
{
    public function index() {
        return view('dashboard.categories.index', [
            'title' => 'Kategori Blog',
            'categories' => Category::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.categories.create', [
            'title' => "Tambah Kategori Blog",
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' =>  'required|max:255',
            'slug'  =>  'required|unique:categories',
        ]);

        Category::create($validatedData);

        return redirect('/dashboard/categories')->with('success', 'New category has been added!');
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'title' => "Edit Kategori Blog",
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' =>  'required|max:255',
        ];
        
        if($request->slug != $category->slug) {
            $rules['slug'] = 'required|unique:categories';
        }

        $validatedData = $request->validate($rules);

        Category::where('id', $category->id)
            ->update($validatedData);

        return redirect('/dashboard/categories')->with('success', 'Category has been updated!');
    }

    public function destroy(Category $category)
    {
        // try {
        //     Category::destroy($category->id);

        //     return redirect('/dashboard/categories')->with('success', 'Category has been deleted!');
        // } catch (Exception $e) {
        //     return redirect->back()->with('error', 'Category has been deleted!');
        // }

        try {
            Category::destroy($category->id);

            return redirect('/dashboard/categories')->with('success', 'Category has been deleted!');
        } catch (Exception $e) {
            report($e);

            return back()->with('error', 'Category cannot be delete because there is relation with posts!');
        }
        // Category::destroy($category->id);

        // return redirect('/dashboard/categories')->with('success', 'Category has been deleted!');
    }

    // public function destroy(Request $request, $id)
    // {
    //     $category = Category::find($id);

    //     if ($category->posts()->exists()) {
    //         abort('Category cannot be deleted due to existence of related posts.');
    //     }

    //     $category->delete();

    //     return redirect('/dashboard/categories')->with('success', 'Category has been deleted!');
    // }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
