<?php

namespace App\Http\Controllers;

use App\Models\Sinopsis;
use Illuminate\Http\Request;

class SinopsisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sinopsis = sinopsis::all();
        return  response()->json([
            'status' => 'success',
            'message' => 'Gamas de la Jardinería',
            'code' => 401,
            'data' => $sinopsis
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sinopsis  $sinopsis
     * @return \Illuminate\Http\Response
     */
    public function show(Sinopsis $sinopsis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sinopsis  $sinopsis
     * @return \Illuminate\Http\Response
     */
    public function edit(Sinopsis $sinopsis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sinopsis  $sinopsis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sinopsis $sinopsis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sinopsis  $sinopsis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sinopsis $sinopsis)
    {
        //
    }
}
