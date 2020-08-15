<?php

namespace App\Http\Controllers;

use App\PertanyaanKomen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PertanyaanKomenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'isi' => 'required',
        ]);

        $pertanyaanKomen = $request->all();
        $pertanyaanKomen['user_id'] = Auth::id();

        PertanyaanKomen::create($pertanyaanKomen);

        $pertanyaan = $request['pertanyaan_id'];
        return redirect()->route('pertanyaan.show',$pertanyaan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PertanyaanKomen  $pertanyaanKomen
     * @return \Illuminate\Http\Response
     */
    public function show(PertanyaanKomen $pertanyaanKomen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PertanyaanKomen  $pertanyaanKomen
     * @return \Illuminate\Http\Response
     */
    public function edit(PertanyaanKomen $pertanyaanKomen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PertanyaanKomen  $pertanyaanKomen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PertanyaanKomen $pertanyaanKomen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PertanyaanKomen  $pertanyaanKomen
     * @return \Illuminate\Http\Response
     */
    public function destroy(PertanyaanKomen $pertanyaanKomen)
    {
        //
    }
}
