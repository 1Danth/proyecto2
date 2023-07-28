<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;

    protected $table = 'mensaje';
    protected $fillable=[
        'fecha',
        'hora',
        'tipo',
        'contenido',
        'id_emisor',
        'id_receptor'
    ];

    public function emisor() {
        return $this->belongsTo(Usuario::class,'id_emisor');
    }

    public function receptor() {
        return $this->belongsTo(Usuario::class,'id_receptor');
    }
}
