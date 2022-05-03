<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    //relacion sucursal $ user
    public function user()
    {
        //Una  sucursales pertenece a un usuario 
        // N:1
        return $this->belongsTo(User::class);
    }

    public function consultas()
    {
        // 
        return $this->hasMany(Consulta::class);
    }
}
