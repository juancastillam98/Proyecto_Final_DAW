<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfertaEmpleo extends Model
{
    use HasFactory;

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function solicitud()
    {
        return $this->hasMany(Solicitud::class);
    }

    public function puesto()
    {
        return $this->belongsTo(Puesto::class);
    }
}
