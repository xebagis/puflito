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
        $res = $utilitario->query("select * from registroUsuario where idUsuario = '$id' ");
        return response()->json($res, 200);
    }

    public function store(Request $request) {
        $idUsuario = $request->input("idUsuario");
        $idEncuentro = $request->input("idEncuentro");

        $strSQL = "INSERT INTO registroUsuario values ('$idUsuario', '$idEncuentro')";
        $utilitario = new MySQLUtil();
        $utilitario->execute($strSQL);
        $resp = ["ejecutado..." => "$strSQL", "idUsu" => "$idUsuario", "idEnc" => "$idEncuentro"];
        return response()->json($resp, 201);
    }

    public function destroy($idUsuario, $idEncuentro) {    
        $strSQL = "DELETE FROM registrousuario where ".
                  "idusuario = '$idUsuario' and idencuentro = '$idEncuentro' ";
        $utilitario = new MySQLUtil();
        $utilitario->execute($strSQL);
 
        $resp = ["idUsuario" => $idUsuario, "idEvento" => $idEncuentro];
        return response()->json($resp, 200);
    }
}
