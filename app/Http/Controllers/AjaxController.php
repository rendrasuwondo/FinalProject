<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Pertanyaan_like;
use App\Pertanyaan;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
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
}
