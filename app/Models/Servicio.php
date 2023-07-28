<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $table = 'servicio';
    protected $fillable=[
        'nombre'
    ];

    public function pago(): BelongsTo
    {
        return $this->hasOne(Pago::class, 'id_servicio');
    }
}