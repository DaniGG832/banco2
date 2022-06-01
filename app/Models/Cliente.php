<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['dni','nombre'];

    public function Cuentas(){
        
        return $this->belongsToMany(Cuenta::class,'titulares');
    }

    public function registros()
    {
        return $this->hasMany(Registro::class);
    }

}
