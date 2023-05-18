<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    public function oferta_empleo()
    {
        return $this->hasMany(OfertaEmpleo::class);
    }
    public function usuario()
    {
        //una empresa se corresponde con 1 usuario
        return $this->belongsTo(User::class);
    }
}
