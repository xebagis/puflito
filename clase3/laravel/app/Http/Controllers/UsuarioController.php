<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utiles\MySQLUtil;

class UsuarioController extends Controller
{
    public function index() {
        $utilitario = new MySQLUtil();
        $res = $utilitario->query('select * from usuarios');
        return response()->json($res, 200);
    }

    public function show($id) {
        $utilitario = new MySQLUtil();
        $res = $utilitario->query("select * from usuarios where id = '$id' ");
        return response()->json($res, 200);
    }

    public function store(Request $request) {
        $id = $request->input("id");
        $nombre = $request->input("nombre");
        $apellido = $request->input("apellido");

        $strSQL = "INSERT usuarios (id, nombre, apellido) values ('$id', '$nombre', '$apellido')";
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
        $resp = ["borrado" => "ok"];
        return response()->json($resp, 200);
    }
}
