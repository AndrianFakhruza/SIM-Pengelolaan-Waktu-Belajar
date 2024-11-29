<?php

namespace App\Http\Controllers;

use App\Models\Assigment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssigmentController extends Controller
{
    public function index() {}
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_tugas' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'deadline' => 'required|date',
            'prioritas' => 'required|string|in:low,medium,high',
            'status' => 'required|string|in:ToDo,Progress,Done',
            'category_id' => 'required|exists:categories,id',  // Pastikan kategori ada
            'schedule_id' => 'required|exists:schedules,id',   // Pastikan jadwal ada
        ]);

        Assigment::create([
            'user_id' => Auth::id(),  // Ambil user_id dari autentikasi yang sedang login
            'category_id' => $validated['category_id'],
            'judul_tugas' => $validated['judul_tugas'],
            'deskripsi' => $validated['deskripsi'],
            'deadline' => $validated['deadline'],
            'prioritas' => $validated['prioritas'],
            'status' => $validated['status'],
            'schedule_id' => $validated['schedule_id'],
        ]);
        return redirect()->route('dashboard');
    }   
}
