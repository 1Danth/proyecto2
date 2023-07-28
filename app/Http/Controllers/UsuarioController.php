<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()  {
        $usuarios=Usuario::all();
        return view('usuarios.index',['usuarios' => $usuarios]);
    }

    public function create(){
        $usuario=new Usuario;
        return view('usuarios.create',compact('usuario'));
    }
    public function store(Request $request){
            $datausuario=request()->except('_token');
            $datausuario['created_at'] = (new \DateTime())->format("Y-m-d H:i:s");
            $datausuario['password']=Hash::make($request->password);
            $id_usuario = Usuario::insertGetId($datausuario);
            return redirect('usuarios/'.$id_usuario)->with('success', 'Se creo el usuario correctamente!');
    }

    public function show($id){

        $usuario=Usuario::find($id);
        return view('usuarios.show',compact('usuario'));

    }
}
