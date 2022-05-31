<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    use HasFactory;
        
    protected $table = 'operaciones';
    
    public function registros()
    {
        return $this->hasMany(Registro::class);
    }
}
