<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServicioController extends Controller
{
        public function index()  {
            $servicios = Servicio::orderBy('id')->get();
            return view('servicios.index',compact('servicios'));
        }

        public function create(){

            $servicio=new Servicio;
            return view('servicios.create',compact('servicio'));
        }

        public function store(Request $request){
            $dataservicio=request()->except('_token');
            $dataservicio['created_at'] = (new \DateTime())->format("Y-m-d H:i:s");
            $id_servicio = Servicio::insertGetId($dataservicio);
            return redirect('servicios/'.$id_servicio)->with('success', 'Se creo el servicio correctamente!');
        }

        public function show($id){

            $servicio=Servicio::find($id);
            return view('servicios.show',compact('servicio'));
    
        }

        public function edit($id){
                $servicio =Servicio::find($id);
                return view('servicios.edit',compact('servicio'));
        }

        public function update(Request $request, $id){

            $dataservicio=request()->except('_token','_method');
            Servicio::where('id','=',$id)->update($dataservicio);
            return redirect('servicios/'.$id);
        }
}