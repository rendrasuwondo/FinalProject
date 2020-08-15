<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Pertanyaan_like;
use App\Pertanyaan;
use Illuminate\Support\Facades\Auth;
use App\Jawaban;
use App\Jawaban_like;


class AjaxController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth')->except(['index', 'show']);
        // $this->middleware('auth')->only(['create']);
    }

    public function index($id)
    {


        $msg = $id;

        // echo json_encode($msg);
        return response()->json(array('msg' => $msg), 200);
    }

    public function pertanyaanUp($id)
    {

        $pertanyaan = Pertanyaan::where('id', $id)->first();

        if ($pertanyaan['user_id'] != Auth::id()) {

            $count = DB::table('pertanyaan_like')
                ->where('pertanyaan_id', $id)
                ->where('user_id', Auth::id())
                ->count('id');

            if ($count == 0) {
                //INSERT VOTE
                $pertanyaanlike['user_id'] = Auth::id();
                $pertanyaanlike['pertanyaan_id'] = $id;
                $pertanyaanlike['point'] = 10;

                Pertanyaan_like::create($pertanyaanlike);
                //INSERT VOTE END
            }
        }



        //SUM VOTE
        $msg = DB::table('pertanyaan_like')
            ->where('pertanyaan_id', $id)
            ->sum('point');
        //SUM VOTE END

        // echo json_encode($msg);
        return response()->json(array('msg' => $msg), 200);
    }

    public function pertanyaanDown($id)
    {

        //INSERT VOTE
        $pertanyaan['user_id'] = Auth::id();
        $pertanyaan['pertanyaan_id'] = $id;
        $pertanyaan['point'] = -1;

        Pertanyaan_like::create($pertanyaan);
        //INSERT VOTE END

        //SUM VOTE
        $msg = DB::table('pertanyaan_like')
            ->where('pertanyaan_id', $id)
            ->sum('point');
        //SUM VOTE END

        // echo json_encode($msg);
        return response()->json(array('msg' => $msg), 200);
    }


    public function jawabanUp(Request $request)
    {

        $jawaban = Jawaban::where('id', $request->segment(2))->first();

        if ($jawaban['user_id'] != Auth::id()) {

            $count = DB::table('jawaban_like')
                ->where('jawaban_id', $request->segment(2))
                ->where('user_id', Auth::id())
                ->count('id');

            if ($count == 0) {
                //INSERT VOTE
                $jawabanlike['user_id'] = Auth::id();
                $jawabanlike['jawaban_id'] = $request->segment(2);
                $jawabanlike['point'] = 10;

                Jawaban_like::create($jawabanlike);
                //INSERT VOTE END
            }
        }



        //SUM VOTE
        $msg = DB::table('jawaban_like')
            ->where('jawaban_id', $request->segment(2))
            ->sum('point');
        //SUM VOTE END

        // echo json_encode($msg);
        return redirect()->route('pertanyaan.show', $request->segment(3));
    }

    public function jawabanDown(Request $request)
    {

        // dd($request->segment(3));

        //INSERT VOTE
        $jawaban['user_id'] = Auth::id();
        $jawaban['jawaban_id'] = $request->segment(2);
        $jawaban['point'] = -1;

        Jawaban_like::create($jawaban);
        // //INSERT VOTE END

        //SUM VOTE
        $msg = DB::table('jawaban_like')
            ->where('jawaban_id', $request->segment(2))
            ->sum('point');
        //SUM VOTE END

        // // echo json_encode($msg);
        // // return response()->json(array('msg' => $msg), 200);
        return redirect()->route('pertanyaan.show', $request->segment(3));
    }
}
