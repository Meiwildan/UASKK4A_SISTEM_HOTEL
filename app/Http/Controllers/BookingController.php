<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking = Booking::all();
        return $booking;
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
        $table = Booking::create([
            "username" => $request->username,
            "no_kamar" => $request->no_kamar,
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
        $booking = booking::find($id);
        if ($booking) {
            return response()->json([
                'status' => 200,
                'data' => $booking
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
        $booking = booking::find($id);
        if ($booking) {
            $booking->username = $request->username ? $request->username : $booking->username;
            $booking->no_kamar = $request->no_kamar ? $request->no_kamar : $booking->no_kamar;
            $booking->jenis_kamar = $request->jenis_kamar ? $request->jenis_kamar : $booking->jenis_kamar;
            $booking->deskripsi_kamar = $request->deskripsi_kamar ? $request->deskripsi_kamar : $booking->deskripsi_kamar;
            $booking->save();
            return response()->json([
                'status' => 200,
                'data'    => $booking
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
        $booking = booking::where('id', $id)->first();
        if ($booking) {
            $booking->delete();
            return response()->json([
                'status' => 200,
                'data' => $booking
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . 'tidak ditemukan'
            ], 404);
        }
    }
}
