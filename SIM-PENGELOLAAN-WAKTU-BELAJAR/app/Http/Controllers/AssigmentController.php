<?php

namespace App\Http\Controllers;

use App\Models\Assigment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AssigmentController extends Controller
{
    public function index($id)
    {

        $assignment = Category::find($id);

        return Inertia::render('Assigment', [
            'idCategory' => $assignment->id
        ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'judul_tugas' => 'required|string|max:255',
            'deskripsi' => 'string',
            'deadline' => 'required|date',
            'prioritas' => 'required|string|in:low,medium,high',
            'status' => 'required|string|in:ToDo,Progress,Done',
            'category_id' => 'required|exists:categories,id',  // Pastikan kategori ada
        ]);
        $userId = Auth::id();
        Assigment::create([
            'user_id' => $userId,
            'category_id' => $validated['category_id'],
            'judul_tugas' => $validated['judul_tugas'],
            'deskripsi' => $validated['deskripsi'],
            'deadline' => $validated['deadline'],
            'prioritas' => $validated['prioritas'],
            'status' => $validated['status'],
        ]);
        return redirect()->route('assigment.show', ['id' => $validated['category_id']]);
    }
}
