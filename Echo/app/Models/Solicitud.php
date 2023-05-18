<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    public function oferta_empleo()
    {
        return $this->belongsTo(OfertaEmpleo::class);
    }

    public function candidato()
    {
        //una solicitud se corresponde con un candidato
        return $this->belongsTo(Candidato::class);
    }
}
