<?php

namespace App\Http\Controllers;

use App\JawabanKomen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JawabanKomenController extends Controller
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

        $jawabanKomen = $request->all();
        $jawabanKomen['user_id'] = Auth::id();
        $cariSoal = $request['pertanyaan_id'];
        
        JawabanKomen::create($jawabanKomen);

        return redirect()->route('pertanyaan.show', $cariSoal);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JawabanKomen  $jawabanKomen
     * @return \Illuminate\Http\Response
     */
    public function show(JawabanKomen $jawabanKomen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JawabanKomen  $jawabanKomen
     * @return \Illuminate\Http\Response
     */
    public function edit(JawabanKomen $jawabanKomen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JawabanKomen  $jawabanKomen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JawabanKomen $jawabanKomen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JawabanKomen  $jawabanKomen
     * @return \Illuminate\Http\Response
     */
    public function destroy(JawabanKomen $jawabanKomen)
    {
        //
    }
}
