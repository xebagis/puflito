<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function doGet() {
        $res = ["mensaje"=>"Prueba"];
        return response()->json($res, 200);
    }
    public function doGetId($id) {
        $res = ["mensaje con id", $id];
        return response()->json($res, 200);
    }
    public function doPost() {
        $res = ["mensaje"=>"Prueba post"];
        return response()->json($res, 200);
    }
    public function doPut($id) {
        $res = ["mensaje"=>"Prueba put $id"];
        return response()->json($res, 200);
    }
    public function doDelete($id) {
        $res = ["mensaje"=>"Prueba delete $id"];
        return response()->json($res, 200);
    }
}
