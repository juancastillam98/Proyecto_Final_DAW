<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    public function usuario()
    {
        //un candidato se corresponde con 1 usuario
        return $this->belongsTo(User::class);
    }

    public function solicitudes()
    {
        //un candidato puede hacer muchas solicitudes
        return $this->hasMany(Solicitud::class);
    }
}
