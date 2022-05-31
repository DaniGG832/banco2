<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    
    public function operacion()
    {
        return $this->belongsTo(Operacion::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
