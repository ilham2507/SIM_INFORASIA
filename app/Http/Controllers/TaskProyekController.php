<?php

namespace App\Http\Controllers;

use App\Models\Task_proyek;
use Illuminate\Http\Request;

class TaskProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task_proyek::all();
        return response()->json(['tasks' => $tasks], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'proyek_id' => 'required',
            'user_id' => 'required',
            'penerimaProyek_id' => 'required',
            'tugas' => 'required',
            'catatan' => 'required',
            'pekerja' => 'required',
            'start' => 'required',
            'deadline' => 'required',
            'status' => 'required',
            'nilai' => 'required'

        ]);

        $task = Task_proyek::create($request->all());

        return response()->json(['message' => 'Task proyek berhasil disimpan', 'task' => $task], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task_proyek::find($id);

        if(!$task) {
            return response()->json(['message' => 'Task proyek tidak ditemukan'], 404);
        }

        return response()->json(['task' => $task], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task_proyek::find($id);

        if(!$task) {
            return response()->json(['message' => 'Task proyek tidak ditemukan'], 404);
        }

        $task->fill($request->all());
        $task->updated_at = now(); // Atur updated_at secara manual
        $task->save();

        return response()->json(['message' => 'Task proyek berhasil diperbarui', 'task' => $task], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task_proyek::find($id);

        if(!$task) {
            return response()->json(['message' => 'Task proyek tidak ditemukan'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Task proyek berhasil dihapus'], 200);
    }
}
