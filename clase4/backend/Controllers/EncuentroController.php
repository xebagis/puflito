<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utiles\MySQLUtil;

class EncuentroController extends Controller
{
    public function index() {
        $utilitario = new MySQLUtil();
        $res = $utilitario->query('select * from encuentros');
        return response()->json($res, 200);
    }

    public function show($id) {
        $utilitario = new MySQLUtil();
        $res = $utilitario->query("select * from encuentros where id = '$id' ");
        return response()->json($res, 200);
    }

    public function store(Request $request) {
        $id = $request->input("id");
        $fecha = $request->input("fecha");
        $nombre = $request->input("nombre");

        $strSQL = "INSERT encuentros (id, fecha, nombre) values ('$id', '$fecha', '$nombre')";
        $utilitario = new MySQLUtil();
        $utilitario->execute($strSQL);
        $resp = ["res" => "ok"];
        return response()->json($resp, 201);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {    
        $strSQL = "DELETE FROM encuentros where id = '$id'";
        $utilitario = new MySQLUtil();
        $utilitario->execute($strSQL);
 
        $resp = ["borrado" => "ok"];
        return response()->json($resp, 200);
    }
}
