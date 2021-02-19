<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        'id_medico',
        'id_agenda',
        'status',
        'dataAgendamento',
    ];

}
