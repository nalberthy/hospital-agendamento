<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function getAllAgenda() {
        $agendas = Agenda::get()->toJson(JSON_PRETTY_PRINT);
        return response($agendas, 200);
      }

    public function getAgenda($id) {
        if (Agenda::where('id', $id)->exists()) {
          $agenda = Agenda::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($agenda, 200);
        } else {
          return response()->json([
            "message" => "Agenda not found"
          ], 404);
        }
    }

    public function createAgenda(Request $request) {
        $agenda = new Agenda();
        if($request->id_medico!=null){
            $agenda->id_medico = $request->id_medico;
        }
        else{
           return response()->json(["message" => "Medico não informado"], 404);
        }

        $agenda->dataHorarioInicio = $request->dataHorarioInicio;
        $agenda->dataHorarioFim = $request->dataHorarioFim;
        $agenda->qtdAgendamento = $request->qtdAgendamento;
        $agenda->status = $request->status;
        $agenda->dataCadastro = $request->dataCadastro;

        $agenda->save();

        return response()->json(["message" => "Agenda created"], 201);
      }

      public function updateAgenda(Request $request, $id) {
        if (Agenda::where('id', $id)->exists()) {
          $agenda = Agenda::find($id);


        if($request->id_medico!=null){
            $agenda->id_medico = $request->id_medico;
        }
        else{
           return response()->json(["message" => "Medico não informado"], 404);
        }
        if($request->dataHorarioInicio!=null){
            $agenda->dataHorarioInicio = $request->dataHorarioInicio;
        }
        else if($request->dataHorarioFim!=null){
            $agenda->dataHorarioFim = $request->dataHorarioFim;
        }
        else if($request->qtdAgendamento!=null){
            $agenda->qtdAgendamento = $request->qtdAgendamento;
        }
        else if($request->status!=null){
            $agenda->status = $request->status;
        }
        else if($request->dataCadastro!=null){
            $agenda->dataCadastro = $request->dataCadastro;
        }
        else{
        return response()->json(["message" => "failed to update"], 404);
        }


          $agenda->save();

          return response()->json(["message" => "agenda updated successfully"], 200);
        } else {
          return response()->json(["message" => "Agenda not found"], 404);
        }
      }

    public function deleteAgenda($id){
        if(Agenda::where('id', $id)->exists()) {
            $agenda = Agenda::find($id);
            $agenda->delete();

            return response()->json(["message" => "deleted"], 202);
        } else {
            return response()->json(["message" => "Medico not found"], 404);
        }
    }





}
