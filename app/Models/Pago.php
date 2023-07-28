<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pago';
    protected $fillable=[
        'fecha',
        'monto',
        'estado'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function servicio(): HasOne
    {
        return $this->belongsTo(Servicio::class, 'id_servicio');
    }
}
