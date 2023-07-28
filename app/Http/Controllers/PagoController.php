<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pago;

class PagoController extends Controller
{
    public function index()  {
        if (auth()->user()->tipo==='administrador') {
            $pagos=DB::select('select pago.id, fecha, monto, estado, nombre as servicio from pago,servicio where id_servicio in (select id from servicio) and id_usuario in(select id from usuario where tipo=\'administrador\') order by fecha desc');
            return view('pagos.index',['pagos' => $pagos]);
        }else{
            $pagos=DB::select('select pago.id, fecha, monto,estado , nombre as servicio from pago,servicio where id_servicio in (select id from servicio ) and id_usuario = '.auth()->user()->id.';');
            return view('pagos.index',['pagos' => $pagos]);
        }
      
    }
}
