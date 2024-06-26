<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
    {
        $users = User::all();
        // dd($users);
        return response()->json(['users' => $users], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_id' =>'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3',
            // tambahkan validasi untuk field lainnya
        ]);

        $user = User::create($request->all());

        return response()->json(['message' => 'Pengguna berhasil disimpan', 'user' => $user], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $userId)
    {
        $user = User::find($userId);

        if(!$user) {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
        }

        return response()->json(['user' => $user], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if(!$user) {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
        }

        $user->fill($request->all());
        $user->updated_at = now();
        $user->save();

        return response()->json(['message' => 'Pengguna berhasil diperbarui', 'user' => $user], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if(!$user) {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Pengguna berhasil dihapus'], 200);
    }
}
