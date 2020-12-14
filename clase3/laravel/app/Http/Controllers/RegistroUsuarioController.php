<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utiles\MySQLUtil;

class RegistroUsuarioController extends Controller
{
    public function index() {
        $utilitario = new MySQLUtil();
        $strSQL = "SELECT usuarios.nombre as nombreUsu, usuarios.apellido, ". 
                  "encuentros.nombre as nombreEncuentro, encuentros.fecha ".
                  "FROM registrousuario ".
                  "INNER JOIN encuentros on encuentros.id = registrousuario.idencuentro ".
                  "INNER JOIN usuarios on usuarios.id = registrousuario.idUsuario";
 
        $res = $utilitario->query($strSQL);
        // $res = ["sql" => $strSQL];
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

    public function destroy($idUsuario, $idEvento) {    
        $strSQL = "DELETE FROM registrousuario where ".
                  "idusuario = '$idUsuario' and idencuentro = '$idEvento' ";
        $utilitario = new MySQLUtil();
        $utilitario->execute($strSQL);
 
        $resp = ["idUsuario" => $idUsuario, "idEvento" => $idEvento];
        return response()->json($resp, 200);
    }
}
