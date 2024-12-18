<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all()->toArray();
        return Inertia::render('Dashboard', [ //nama komponen saya 
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        // validasi akun 
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        // Membuat slug
        $slug = str::slug($request->name, '-');

        // Simpan data ke database 
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $slug;
        $category->description = $request->description;
        $category->save();

        // Kembalikan data 
        return redirect()->route('dashboard');
    }
}
