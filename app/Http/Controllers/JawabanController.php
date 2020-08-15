<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jawaban;
use Illuminate\Support\Facades\Auth;

class JawabanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth')->except(['index', 'show']);
        // $this->middleware('auth')->only(['create']);
    }

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
        // dd($request);

        $request->validate([
            'isi' => 'required',
        ]);

        $jawaban = $request->all();
        $jawaban['user_id'] = Auth::id();
        $jawaban['jawaban_tepat'] = 0;


        Jawaban::create($jawaban);

        $pertanyaan = $request['pertanyaan_id'];
        return redirect()->route('pertanyaan.show', $pertanyaan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
