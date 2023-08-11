<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentoController extends Controller
{
    public function index(){

        $departamentos = Departamento::orderBy('id')->get();
            return view('departamentos.index',compact('departamentos'));
    }
    
    public function create(){
        $departamento=new Departamento;
        return view('departamentos.create',compact('departamento'));
    }

    public function store(Request $request){

        $datadepa=request()->except('_token');
        $datadepa['created_at'] = (new \DateTime())->format("Y-m-d H:i:s");
        $datadepa['estado']='disponible';
        $id_depa = Departamento::insertGetId($datadepa);
        return redirect('departamentos/'.$id_depa);
    }

    public function show($id){
        $departamento=Departamento::find($id);
        return view('departamentos.show',compact('departamento'));
    }

    public function edit($id){
        $departamento =Departamento::find($id);
        return view('departamentos.edit',compact('departamento'));
    }

    public function update(Request $request, $id){

        $datadepa=request()->except('_token','_method');
        Departamento::where('id','=',$id)->update($datadepa);
        return redirect('departamentos/'.$id);
    }
}
