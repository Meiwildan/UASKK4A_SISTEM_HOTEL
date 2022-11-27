<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kamar = Kamar::all();
        return $kamar;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = Kamar::create([
            "jenis_kamar" => $request->jenis_kamar,
            "deskripsi_kamar" => $request->deskripsi_kamar,

        ]);

        return response()->json([
            'success' => 201,
            'message' => 'data berhasil disimpan',
            'data'    => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kamar = kamar::find($id);
        if ($kamar) {
            return response()->json([
                'status' => 200,
                'data' => $kamar
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id atas' . $id . 'tidak ditemukan',
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kamar = kamar::find($id);
        if ($kamar) {
            $kamar->jenis_kamar = $request->jenis_kamar ? $request->jenis_kamar : $kamar->jenis_kamar;
            $kamar->deskripsi_kamar = $request->deskripsi_kamar ? $request->deskripsi_kamar : $kamar->deskripsi_kamar;
            $kamar->save();
            return response()->json([
                'status' => 200,
                'data'    => $kamar
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => $id . 'tidak ditemukan',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kamar = kamar::where('id', $id)->first();
        if ($kamar) {
            $kamar->delete();
            return response()->json([
                'status' => 200,
                'data' => $kamar
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . 'tidak ditemukan'
            ], 404);
        }
    }
}
