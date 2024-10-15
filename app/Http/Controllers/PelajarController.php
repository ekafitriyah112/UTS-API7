<?php

namespace App\Http\Controllers;

use App\Models\Pelajar;
use Illuminate\Http\Request;

class PelajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // menampilkan semua data pelajar
        $pelajars = Pelajar::all();
        return response()->json($pelajars);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi input
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:100',
            'nis' => 'required|string|max:20|unique:pelajars',
            'email' => 'required|email|max:100|unique:pelajars',
            'password' => 'required|string|min:8'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
         // Menyimpan data pelajar baru
         $pelajar = new Pelajar();
         $pelajar->nama = $request->nama;
         $pelajar->nis = $request->nis;
         $pelajar->email = $request->email;
         $pelajar->password = Hash::make($request->password); // Hash password
         $pelajar->save();
 
         return response()->json(['message' => 'Pelajar created successfully', 'pelajar' => $pelajar], 201);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Pelajar $pelajar)
    {
        //  Menampilkan pelajar berdasarkan ID
        $pelajar = Pelajar::find($id);

        if (!$pelajar) {
            return response()->json(['message' => 'Pelajar not found'], 404);
        }

        return response()->json($pelajar);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelajar $pelajar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelajar $pelajar)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama' => 'sometimes|required|string|max:100',
            'nis' => 'sometimes|required|string|max:20|unique:pelajars,nis,' . $id,
            'email' => 'sometimes|required|email|max:100|unique:pelajars,email,' . $id,
            'password' => 'sometimes|required|string|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }    
        // Mengambil data pelajar yang akan diupdate
        $pelajar = Pelajar::find($id);

        if (!$pelajar) {
            return response()->json(['message' => 'Pelajar not found'], 404);
        }
        // Update data pelajar
        if ($request->has('nama')) {
            $pelajar->nama = $request->nama;
        }
        if ($request->has('nis')) {
            $pelajar->nis = $request->nis;
        }
        if ($request->has('email')) {
            $pelajar->email = $request->email;
        }
        if ($request->has('password')) {
            $pelajar->password = Hash::make($request->password); // Hash password baru
        }

        $pelajar->save();

        return response()->json(['message' => 'Pelajar updated successfully', 'pelajar' => $pelajar]);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelajar $pelajar)
    {
        //
    }
}
