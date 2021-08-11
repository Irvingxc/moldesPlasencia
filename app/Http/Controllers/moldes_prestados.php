<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class moldes_prestados extends Controller
{
    public function remisiones( Request $request)
    {

        $fechai = $request->fecha_inicio;
        $fechaf = $request->fecha_fin;
        $nombre = $request->txt_nombre;
if($request->nombre === null){
    $nombrecero = "0";
}else{
    $nombrecero =$request->nombre;
}
$notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
    'id' => auth()->user()->id_planta ] );


    $titulo = "REMISIONES A OTRAS EMPRESAS";
    $moldes = \DB::select('call mostrar_remisiones_otras_empresas(:nombre)',
    [
        'nombre' => $nombrecero
    ]);  

   return view('otras_empresas')->with('titulo',$titulo) ->with('moldes',$moldes)  
   ->with('fechai',$fechai)->with('fechaf',$fechaf) ->with('nombre',$nombre)->with('notificaciones',$notificaciones);
}


public function remisiones_index( Request $request)
    {

        $fechai = $request->fecha_inicio;
        $fechaf = $request->fecha_fin;
        
        $nombre = $request->txt_nombre;
    $titulo = "REMISIONES A OTRAS EMPRESAS";
    $moldes = \DB::select('call mostrar_remisiones_otras_empresas_index');  

    
$notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
    'id' => auth()->user()->id_planta ] );
   return view('otras_empresas')->with('titulo',$titulo) ->with('moldes',$moldes)->with('notificaciones',$notificaciones)
   ->with('fechai',$fechai)->with('fechaf',$fechaf) ->with('nombre',$nombre);


}



public function buscar_prestadas( Request $request)  {

    $titulo = "REMISIONES A OTRAS EMPRESAS";
   
    $fechai = $request->fecha_inicio;
    $fechaf = $request->fecha_fin;
    
    $nombre = $request->txt_nombre;
    $nom = $request->txt_nombre;
    if ($request->fecha_inicio === null){
        $incio = "0";
   }else{
       $incio = $request->fecha_inicio;
   }

   if ($request->txt_nombre === null){
    $nom = "";
}else{
   $nom = $request->txt_nombre;
}

   if ($request->fecha_fin === null){
       $fin = "0";
   }else{
       $fin = $request->fecha_fin;

   }

   
$notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
    'id' => auth()->user()->id_planta ] );

   //$moldes = \DB::select('call mostrar_remisiones_otras_empresas_index');  

    $moldes = \DB::select('call buscar_remisiones_prestadas(:fecha_inicio,:fecha_fin,:nombre)',
    [ 'fecha_inicio' => $incio,
    'fecha_fin' => $fin,
    'nombre' => $nom]);
  

    return view('otras_empresas')->with('titulo',$titulo)->with('nombre',$nombre)->with('notificaciones',$notificaciones)
    ->with('moldes', $moldes)  ->with('fechai',$fechai)->with('fechaf',$fechaf);
}




public function imprimirdatos_otras_empresas( Request $request){
                
    $fecha =Carbon::now();
    $fecha = $fecha->format('d-m-Y');

    $ffecha =Carbon::now();
$fecha_imp =$ffecha->format('d-m-Y/h:i');


    $nombre = $request->txt_nombre;
    $fechai = $request->fecha_inicio;
    $fechaf = $request->fecha_fin;
    $titulo = "REMISIONES A OTRAS EMPRESAS";
   
    if ($request->fechainicio === null){
        $incio = "0";
   }else{
       $incio = $request->fechainicio;
   }

   if ($request->fechafin === null){
       $fin = "0";
   }else{
       $fin = $request->fechafin;
   }

   if ($request->nombre === null){
    $nom = "0";
}else{
   $nom = $request->nombre;
}




$notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
    'id' => auth()->user()->id_planta ] );

   //$moldes = \DB::select('call mostrar_remisiones_otras_empresas_index');  

    $moldes = \DB::select('call buscar_remisiones_prestadas(:fecha_inicio,:fecha_fin,:nombre)',
    [ 'fecha_inicio' => $incio,
    'fecha_fin' => $fin,
    'nombre' => $nom]);
  

    $vista = view('imprimir_otras_empresas')->with('titulo',$titulo)->with('nombre',$nombre)->with('notificaciones',$notificaciones)
    ->with('moldes', $moldes)->with('fecha', $fecha)  ->with('fechai',$fechai)->with('fechaf',$fechaf);


    $pdf =  \PDF::loadHTML($vista);
    return $pdf->stream('Remisiones a otras empresas '.$fecha_imp .'.pdf');

    }
}
