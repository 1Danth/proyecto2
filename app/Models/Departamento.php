<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamento';
    protected $fillable=[
        'descripcion',
        'estado'
    ];

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'Usuario_Departamento', 'id_departamento', 'id_usuario')->withTimestamps();
    }
}
