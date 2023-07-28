<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuario';
    protected $fillable=[
        'nombre',
        'fecha_nac',
        'telefono',
        'email',
        'password',
        'sexo',
        'tipo',
        'estado'
    ];

    protected $hidden=[
        'password',
        'remember_token'
    ];

    public function msjEnviados() {
        return $this->hasMany(Mensaje::class,'id_emisor');
    }

    public function msjRecibidos() {
        return $this->hasMany(Mensaje::class,'id_receptor');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'id_usuario');
    }

    public function reuniones()
    {
        return $this->hasMany(Reunion::class, 'id_usuario');
    }
 
    public function departamentos()
    {
        return $this->belongsToMany(Departamento::class, 'Usuario_Departamento', 'id_usuario', 'id_departamento')->withTimestamps();
    }  

}
