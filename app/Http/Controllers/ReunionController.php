<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reunion;

class ReunionController extends Controller
{
    public function index()  {
        $reuniones=Reunion::all();
        return view('reunions.index',['reuniones' => $reuniones]);
    }
    public function create(){

        $reunion=new Reunion;
        return view('reunions.create',compact('reunion'));
    }

    public function store(){
        $datareunion=request()->except('_token');
        $datareunion['created_at'] = (new \DateTime())->format("Y-m-d H:i:s");
        $datareunion['conclusion']='-';
        $datareunion['id_usuario']=auth()->user()->id;
        $id_reunion = Reunion::insertGetId($datareunion);
        return redirect('reunions/'.$id_reunion)->with('success', 'Se creo el servicio correctamente!');
    }

    
    public function show($id){

        $reunion=Reunion::find($id);
        return view('reunions.show',compact('reunion'));
    }

    public function edit($id){
        $reunion =Reunion::find($id);
        return view('reunions.edit',compact('reunion'));
    }
    public function update(Request $request, $id){

        $datareunion=request()->except('_token','_method');
        Servicio::where('id','=',$id)->update($datareunion);
        return redirect('reunions/'.$id);
    }
}
