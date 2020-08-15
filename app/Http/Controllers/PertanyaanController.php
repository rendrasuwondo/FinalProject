<?php

namespace App\Http\Controllers;

use App\Pertanyaan;
use App\Jawaban;
use App\PertanyaanKomen;
use App\JawabanKomen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class PertanyaanController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('auth')->except(['index', 'show']);
        // $this->middleware('auth')->only(['create']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pertanyaan = Pertanyaan::latest()->paginate(10);
        return view('pertanyaan.index', compact('pertanyaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pertanyaan.create');
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
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $pertanyaan = $request->all();
        $pertanyaan['user_id'] = Auth::id();
        $pertanyaan['jawaban_id'] = null;

        Pertanyaan::create($pertanyaan);

        return redirect()->route('pertanyaan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pertanyaan $pertanyaan)
    {
        // $jawaban = Jawaban::latest()->paginate(10);
        $user = Pertanyaan::find($pertanyaan->id);
        $jawaban = jawaban::where('pertanyaan_id', $pertanyaan->id)->get();

        $vote = DB::table('pertanyaan_like')
            ->where('pertanyaan_id', $pertanyaan->id)
            ->sum('point');

        // dd($vote);
        $pertanyaanKomen = PertanyaanKomen::where('pertanyaan_id', $pertanyaan->id)->get();

        return view('pertanyaan.show', compact('pertanyaan', 'jawaban', 'user', 'pertanyaanKomen', 'vote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pertanyaan $pertanyaan)
    {
        return view('pertanyaan.edit', compact('pertanyaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pertanyaan $pertanyaan)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $pertanyaan->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        return redirect()->route('pertanyaan.show', compact('pertanyaan'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pertanyaan $pertanyaan)
    {
        $pertanyaan->delete();

        return redirect()->route('pertanyaan.index');
    }
}
