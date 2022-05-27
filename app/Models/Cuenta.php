<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;

    protected $fillable= ['numero'];

    public function Clientes()
    {
        return $this->belongsToMany(Cliente::class,'titulares');
    }

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class);
    }

}
