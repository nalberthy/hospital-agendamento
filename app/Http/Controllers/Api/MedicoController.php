<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function getAllMedicos() {
        $medicos = Medico::get()->toJson(JSON_PRETTY_PRINT);
        return response($medicos, 200);
      }

    public function getMedico($id) {
        if (Medico::where('id', $id)->exists()) {
          $medico = Medico::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($medico, 200);
        } else {
          return response()->json([
            "message" => "Medico not found"
          ], 404);
        }
    }

    public function createMedico(Request $request) {
        $medico = new Medico();
        $medico->nome = $request->nome;
        $medico->ativo = $request->ativo;
        $medico->save();

        return response()->json([
          "message" => "Medico created"
        ], 201);
      }

      public function updateMedico(Request $request, $id) {
        if (Medico::where('id', $id)->exists()) {
          $medico = Medico::find($id);

          if($request->nome!=null){
            $medico->nome = $request->nome;
          }
          else if($request->ativo!=null){
            $medico->ativo = $request->ativo;
          }
          else{
            return response()->json(["message" => "failed to update"], 404);
          }


          $medico->save();

          return response()->json([
            "message" => "medico updated successfully"
          ], 200);
        } else {
          return response()->json(["message" => "Medico not found"], 404);
        }
      }

    public function deleteMedico($id){
        if(Medico::where('id', $id)->exists()) {
            $medico = Medico::find($id);
            $medico->delete();

            return response()->json([
            "message" => "deleted"
            ], 202);
        } else {
            return response()->json(["message" => "Medico not found"], 404);
        }
    }
}
