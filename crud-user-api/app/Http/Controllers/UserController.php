<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'age' => 'required|integer|min:0',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'age.required' => 'Umur wajib diisi.',
            'age.integer' => 'Umur harus berupa angka.',
            'age.min' => 'Umur tidak boleh negatif.',
        ]);

        $user = User::create($validated);
        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    $user = User::find($id);

    if (!$user) {
        return response()->json([
            'message' => 'User tidak ditemukan.'
        ], 404);
    }

    return response()->json($user);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Cari user berdasarkan ID
    $user = User::find($id);

    if (!$user) {
        return response()->json(['message' => 'User tidak ditemukan.'], 404);
    }

    // Validasi data yang diterima
    $validated = $request->validate([
        'name' => 'sometimes|required|string|max:255',
        'email' => 'sometimes|required|email|unique:users,email,' . $id,
        'age' => 'sometimes|required|integer|min:0',
    ], [
        'name.required' => 'Nama wajib diisi.',
        'email.required' => 'Email tidak boleh kosong.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah digunakan.',
        'age.required' => 'Umur wajib diisi.',
        'age.integer' => 'Umur harus berupa angka.',
        'age.min' => 'Umur tidak boleh negatif.',
    ]);

    // Update user dengan data yang divalidasi
    $user->update($validated);

    return response()->json($user);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
