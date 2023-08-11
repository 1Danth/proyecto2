<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pago;
use App\Models\Servicio;
use App\Models\Usuario;

class PagoController extends Controller
{
    public function index()  {

        
        if (auth()->user()->tipo==='administrador') {
            $pagos=DB::select('select pago.id, fecha, monto, estado, nombre as servicio from pago,servicio where id_servicio=servicio.id and id_usuario in(select id from usuario where tipo=\'administrador\') order by fecha desc;');
            return view('pagos.index',['pagos' => $pagos]);
        }else{
            $pagos=DB::select('select pago.id, fecha, monto,estado , nombre as servicio from pago,servicio where id_servicio =servicio.id  and id_usuario = '.auth()->user()->id.';');
            return view('pagos.index',['pagos' => $pagos]);
        }
      
    }

    public function create(){
        $pago= new Pago;
        $servicios=Servicio::orderBy('created_at')->get();
        $usuarios=Usuario::orderBy('nombre')->get();
        return view('pagos.create',compact('pago','servicios','usuarios'));
    }

    public function store(Request $request){
        $datapago=request()->except('_token','pagotipo','userselected');
        $usersid=request()->userselected;
         $datapago['estado']='no realizado';
         
        if ($request->pagotipo=='compartido') {
            
                $datapago['id_usuario']=auth()->user()->id;
                $datapago['created_at'] = (new \DateTime())->format("Y-m-d H:i:s");
                $id_pago=Pago::insertGetId($datapago);
                $montodiv= intval($datapago['monto']/count($usersid));
                foreach ($usersid as $userid) {
                     $datapago['id_usuario']=$userid;
                     $datapago['created_at'] = (new \DateTime())->format("Y-m-d H:i:s");
                     $datapago['monto']=  $montodiv;
                     $id_pago_pag=Pago::insertGetId($datapago);
                }
        }else {
            foreach ($usersid as $userid) {
                $datapago['id_usuario']=$userid;
                $datapago['created_at'] = (new \DateTime())->format("Y-m-d H:i:s");
                $id_pago=Pago::insertGetId($datapago);
            }
            
        }
        return redirect('pagos/'.$id_pago)->with('success', 'Se creo el Cobro correctamente!');
    }

public function show($id){
    $pago =Pago::find($id);
    $servicio=Servicio::find($pago->id_servicio);
    $pagoslinked=DB::select('select pago.id,fecha,monto,estado,nombre from pago,usuario where id_usuario IN( select id from usuario where tipo=\'residente\' or tipo=\'subarrendado\') and id_usuario=usuario.id and id_servicio= '.$pago->id_servicio);
    return view('pagos.show',compact('pago','servicio','pagoslinked'));
}

    public function edit($id){
        $pago =Pago::find($id);
        $servicio=Servicio::find($pago->id_servicio);
        $pagoslinked=DB::select('select pago.id,fecha,monto,estado,nombre from pago,usuario where id_usuario IN( select id from usuario where tipo=\'residente\' or tipo=\'subarrendado\') and id_usuario=usuario.id and id_servicio= '.$pago->id_servicio);
        return view('pagos.edit',compact('pago','servicio','pagoslinked'));
}

public function update(Request $request, $id){

    $datapago=request()->except('_token','_method','estados');
    Pago::where('id','=',$id)->update($datapago);
    $estados=request()->estados;
    foreach ($estados as $estado =>$estadovalor) {
        $pagoEdit = Pago::find($estado);
        $pagoEdit->estado=$estadovalor;
        $pagoEdit->save();
    }
    return redirect('pagos/'.$id);
}
}
