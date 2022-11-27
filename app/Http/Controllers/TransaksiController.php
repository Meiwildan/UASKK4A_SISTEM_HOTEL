<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        return $transaksi;
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
        $table = Transaksi::create([
            "username" => $request->username,
            "no_kamar" => $request->no_kamar,
            "jenis_kamar" => $request->jenis_kamar,
            "check_in" => $request->check_in,
            "check_out" => $request->check_out,
            "sub_total" => $request->sub_total,
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
        $transaksi = transaksi::find($id);
        if ($transaksi) {
            return response()->json([
                'status' => 200,
                'data' => $transaksi
            ], 200);
        }else {
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
        $transaksi = transaksi::find($id);
        if($transaksi){
            $transaksi->username = $request->username ? $request->username : $transaksi->username;
            $transaksi->no_kamar = $request->no_kamar ? $request->no_kamar : $transaksi->no_kamar;
            $transaksi->jenis_kamar = $request->jenis_kamar ? $request->jenis_kamar : $transaksi->jenis_kamar;
            $transaksi->check_in = $request->check_in ? $request->check_in : $transaksi->check_in;
            $transaksi->check_out = $request->check_out ? $request->check_out : $transaksi->check_out;
            $transaksi->sub_total = $request->sub_total ? $request->sub_total : $transaksi->sub_total;
            $transaksi->save();
            return response()->json([
                'status' => 200,
                'data'    => $transaksi
            ], 200);
        }else{
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
        $transaksi = transaksi::where('id',$id)->first();
        if($transaksi){
            $transaksi->delete();
            return response()->json([
                'status' => 200,
                'data' => $transaksi
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . 'tidak ditemukan'
            ],404);
        }
    }
}
