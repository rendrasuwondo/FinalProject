<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AjaxController extends Controller
{
    public function index($id)
    {


        $msg = $id;

        // echo json_encode($msg);
        return response()->json(array('msg' => $msg), 200);
    }
}
