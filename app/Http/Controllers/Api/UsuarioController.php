<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getAllUsuarios() {
        $usuarios = Usuario::get()->toJson(JSON_PRETTY_PRINT);
        return response($usuarios, 200);
      }

    public function getUsuario($id) {
        if (Usuario::where('id', $id)->exists()) {
          $usuario = Usuario::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($usuario, 200);
        } else {
          return response()->json(["message" => "Usuario not found"], 404);
        }
    }

    public function createUsuario(Request $request) {
        $usuario = new Usuario;
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->telefone = $request->telefone;
        $usuario->dtNasc = date('Y-m-d',strtotime($request->dtNasc));
        $usuario->save();

        return response()->json(["message" => "Usuario created"], 201);
      }

      public function updateUsuario(Request $request, $id) {
        if (Usuario::where('id', $id)->exists()) {
          $usuario = Usuario::find($id);
          if($request->nome!=null){
            $usuario->nome = $request->nome;
          }
          else if($request->email!=null){
            $usuario->email = $request->email;
          }
          else if($request->telefone!=null){
            $usuario->telefone = $request->telefone;
          }
          else if($request->dtNasc!=null){
            $usuario->dtNasc = date('Y-m-d',strtotime($request->dtNasc));
          }
          else{
            return response()->json(["message" => "failed to update"], 404);
          }

          $usuario->save();

          return response()->json(["message" => "medico updated successfully"], 200);
        }
        else {

          return response()->json(["message" => "Usuario not found"], 404);
        }
      }

    public function deleteUsuario($id){
        if(Usuario::where('id', $id)->exists()) {
            $usuario = Usuario::find($id);
            $usuario->delete();

            return response()->json(["message" => "deleted"], 202);
        } else {
            return response()->json(["message" => "Usuario not found"], 404);
        }
    }

}
