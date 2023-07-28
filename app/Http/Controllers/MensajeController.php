<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensaje;

class MensajeController extends Controller
{
    public function index()  {
        $mensajes=Mensaje::where('id_receptor',auth()->user()->id)->get();
        return view('mensajes.index',['mensajes' => $mensajes]);
    }
}
