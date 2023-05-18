<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;

    public function oferta_empleo()
    {
        //una solicitud se corresponde con un candidato
        return $this->hasMany(OfertaEmpleo::class);
    }
}
