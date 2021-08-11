<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Carbon\Carbon;

class notificaciones extends Controller
{
    public function actualizar_notificaciones(Request $request){

       

            $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
            'id' => auth()->user()->id_planta ] );
           
            if($request->tipo_noti === "solicitud" && $request->para_noti === "3" ){


                $actualizar = \DB::select('call actualizar_notificaciones (:id)',[
                    'id'=>(int)$request->id_notificacion
                    ]);


                    
        
                $titulo = "REMISIONES SAN MARCOS";
               
                $moldes = \DB::select('call moldes_remision(3)');  
               
                $remisionesenviadas = \DB::select('call mostrar_remisiones_enviadas(3)');   

                $remisionesrecibidas = \DB::select("call mostrar_remisiones_recibidas('San Marcos')"); 

                $bodega = \DB::select('call traer_cantidad(3)');
                $abrir = "3";
                $fechai = $request->fecha_inicio;
                $fechaf = $request->fecha_fin;
                $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
                    'id' => auth()->user()->id_planta ] );


                return view('remisionessanMarcos')->with ('notificaciones', $notificaciones)->with('titulo',$titulo)->with('moldes',$moldes) ->with('fechai',$fechai)->with('fechaf',$fechaf)
                ->with('remisionesenviadas',$remisionesenviadas)->with('remisionesrecibidas',$remisionesrecibidas)->with('bodega',$bodega)->with('abrir', $abrir);

               
            }else

            
             if($request->tipo_noti === "envio" && $request->para_noti === "3" ){

                
                $actualizar = \DB::select('call actualizar_notificaciones (:id)',[
                    'id'=>(int)$request->id_notificacion
                    ]);
        
                $titulo = "REMISIONES SAN MARCOS";
               
                $moldes = \DB::select('call moldes_remision(3)');  
               
                $remisionesenviadas = \DB::select('call mostrar_remisiones_enviadas(3)');   

                $remisionesrecibidas = \DB::select("call mostrar_remisiones_recibidas('San Marcos')"); 

                $bodega = \DB::select('call traer_cantidad(3)');
                $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
                    'id' => auth()->user()->id_planta ] );
                $abrir = "2";
                $fechai = $request->fecha_inicio;
                $fechaf = $request->fecha_fin;
              
               
                return view('remisionessanMarcos')->with ('notificaciones', $notificaciones)->with('titulo',$titulo)->with('moldes',$moldes) ->with('fechai',$fechai)->with('fechaf',$fechaf)
                ->with('remisionesenviadas',$remisionesenviadas)->with('remisionesrecibidas',$remisionesrecibidas)->with('bodega',$bodega)->with('abrir', $abrir);

            }else 
            if($request->tipo_noti === "solicitud" && $request->para_noti === "1" ){

                $actualizar = \DB::select('call actualizar_notificaciones (:id)',[
                    'id'=>(int)$request->id_notificacion
                    ]);
        
                $titulo = "REMISIONES EL PARAÍSO";
                $moldes = \DB::select('call moldes_remision(1)'); 
                $remisionesenviadas = \DB::select('call mostrar_remisiones_enviadas(1)'); 
                $fechai = $request->fecha_inicio;
                $fechaf = $request->fecha_fin;
                
                $remisionesrecibidas = \DB::select("call mostrar_remisiones_recibidas('Paraíso Cigar')");
                
                $bodega = \DB::select('call traer_cantidad(1)');
            
                $abrir ="3";

                $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
                    'id' => auth()->user()->id_planta ] );

                return view('remisionesparaiso')->with('titulo',$titulo)->with('moldes',$moldes)->with ('notificaciones', $notificaciones)
                ->with('remisionesenviadas',$remisionesenviadas)->with('remisionesrecibidas',$remisionesrecibidas)->with('bodega',$bodega)->with('abrir', $abrir)
                ->with('fechai',$fechai)->with('fechaf',$fechaf);


            }else 
            if($request->tipo_noti === "envio" && $request->para_noti === "1" ){

                $actualizar = \DB::select('call actualizar_notificaciones (:id)',[
                    'id'=>(int)$request->id_notificacion
                    ]);
        
                $titulo = "REMISIONES EL PARAÍSO";
                $moldes = \DB::select('call moldes_remision(1)'); 
                $remisionesenviadas = \DB::select('call mostrar_remisiones_enviadas(1)'); 
                $fechai = $request->fecha_inicio;
                $fechaf = $request->fecha_fin;
                
                $remisionesrecibidas = \DB::select("call mostrar_remisiones_recibidas('Paraíso Cigar')");
                
                $bodega = \DB::select('call traer_cantidad(1)');
            
                $abrir ="2";
                $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
                    'id' => auth()->user()->id_planta ] );

                return view('remisionesparaiso')->with('titulo',$titulo)->with('moldes',$moldes)->with ('notificaciones', $notificaciones)
                ->with('remisionesenviadas',$remisionesenviadas)->with('remisionesrecibidas',$remisionesrecibidas)->with('bodega',$bodega)->with('abrir', $abrir)
                ->with('fechai',$fechai)->with('fechaf',$fechaf);


            }else 
            if($request->tipo_noti === "solicitud" && $request->para_noti === "2" ){

                $actualizar = \DB::select('call actualizar_notificaciones (:id)',[
                    'id'=>(int)$request->id_notificacion
                    ]);
        
                    $titulo = "REMISIONES MOROCELI";
                    $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
                        'id' => auth()->user()->id_planta ] );
                   
                    $fechai = $request->fecha_inicio;
                    $fechaf = $request->fecha_fin;
                    $moldes = \DB::select('call moldes_remision(2)'); 
                    
                    $remisionesenviadas = \DB::select('call mostrar_remisiones_enviadas(2)'); 
                    
                    $remisionesrecibidas = \DB::select("call mostrar_remisiones_recibidas('Morocelí')"); 
                   
                    $bodega = \DB::select('call traer_cantidad(2)');
    
                    $abrir = "3";
                    return view('remisionesmoroceli')->with('titulo',$titulo) ->with('moldes',$moldes)->with('fechai',$fechai)->with('fechaf',$fechaf)
                    ->with('remisionesenviadas',$remisionesenviadas)->with ('notificaciones', $notificaciones)->with('remisionesrecibidas',$remisionesrecibidas)->with('bodega',$bodega)->with('abrir', $abrir);
    
            }else 
            if($request->tipo_noti === "envio" && $request->para_noti === "2" ){

                $actualizar = \DB::select('call actualizar_notificaciones (:id)',[
                    'id'=>(int)$request->id_notificacion
                    ]);
                $titulo = "REMISIONES MOROCELI";
                $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
                    'id' => auth()->user()->id_planta ] );
               
                $fechai = $request->fecha_inicio;
                $fechaf = $request->fecha_fin;
                $moldes = \DB::select('call moldes_remision(2)'); 
                
                $remisionesenviadas = \DB::select('call mostrar_remisiones_enviadas(2)'); 
                
                $remisionesrecibidas = \DB::select("call mostrar_remisiones_recibidas('Morocelí')"); 
               
                $bodega = \DB::select('call traer_cantidad(2)');

                $abrir = "2";
                return view('remisionesmoroceli')->with('titulo',$titulo) ->with('moldes',$moldes)->with('fechai',$fechai)->with('fechaf',$fechaf)
                ->with('remisiones_moroceli/2',$remisionesenviadas)->with ('notificaciones', $notificaciones)->with('remisionesrecibidas',$remisionesrecibidas)->with('bodega',$bodega)->with('abrir', $abrir);


            }else 
            if($request->tipo_noti === "solicitud" && $request->para_noti === "4" ){

                $actualizar = \DB::select('call actualizar_notificaciones (:id)',[
                    'id'=>(int)$request->id_notificacion
                    ]);
                    $titulo = "REMISIONES GUALIQUEME";
                
                    $fecha =Carbon::now();
                    $fecha = $fecha->format('Y-m-d');
                    $moldes = \DB::select('call moldes_remision(4)'); 
                   
                    $remisionesenviadas = \DB::select('call mostrar_remisiones_enviadas(4)'); 
                    
                    $remisionesrecibidas = \DB::select("call mostrar_remisiones_recibidas('Gualiqueme')"); 
                    
                    $bodega = \DB::select('call traer_cantidad(4)');
                    $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
                        'id' => auth()->user()->id_planta ] );
                        
                    $fechai = $request->fecha_inicio;
                    $fechaf = $request->fecha_fin;
                    $abrir = "3";
    
                    return view('remisionesgualiqueme')->with('titulo',$titulo)->with ('notificaciones', $notificaciones)->with('moldes',$moldes)->with('fecha', $fecha)->with('fechai',$fechai)->with('fechaf',$fechaf)
                    ->with('remisionesenviadas',$remisionesenviadas)->with('fecha', $fecha)->with('remisionesrecibidas',$remisionesrecibidas)->with('bodega',$bodega)->with('abrir', $abrir);
            
            }else 
            if($request->tipo_noti === "envio" && $request->para_noti === "4" ){

                $actualizar = \DB::select('call actualizar_notificaciones (:id)',[
                    'id'=>(int)$request->id_notificacion
                    ]);
                    $titulo = "REMISIONES GUALIQUEME";
                
                    $fecha =Carbon::now();
                    $fecha = $fecha->format('Y-m-d');
                    $moldes = \DB::select('call moldes_remision(4)'); 
                   
                    $remisionesenviadas = \DB::select('call mostrar_remisiones_enviadas(4)'); 
                    
                    $remisionesrecibidas = \DB::select("call mostrar_remisiones_recibidas('Gualiqueme')"); 
                    
                    $bodega = \DB::select('call traer_cantidad(4)');
                    $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
                        'id' => auth()->user()->id_planta ] );
                        
                    $fechai = $request->fecha_inicio;
                    $fechaf = $request->fecha_fin;
                    $abrir = "2";
    
                    return view('remisionesgualiqueme')->with('titulo',$titulo)->with ('notificaciones', $notificaciones)->with('moldes',$moldes)->with('fecha', $fecha)->with('fechai',$fechai)->with('fechaf',$fechaf)
                    ->with('remisionesenviadas',$remisionesenviadas)->with('fecha', $fecha)->with('remisionesrecibidas',$remisionesrecibidas)->with('bodega',$bodega)->with('abrir', $abrir);
            

            }
            
            


           

    }


    public function redireccionar(Request $request){


        if($request->tipo_noti === "confirmacion" && $request->para_noti === "3" ){

            
            $actualizar = \DB::select('call actualizar_notificaciones (:id)',[
                'id'=>(int)$request->id_notificacion
                ]);
                
            return REDIRECT($request->local);

        }else 
        if($request->tipo_noti === "confirmacion" && $request->para_noti === "1" ){

            
            $actualizar = \DB::select('call actualizar_notificaciones (:id)',[
                'id'=>(int)$request->id_notificacion
                ]);
                
            return REDIRECT($request->local);
    
        } else 
            if($request->tipo_noti === "confirmacion" && $request->para_noti === "2" ){

                
            $actualizar = \DB::select('call actualizar_notificaciones (:id)',[
                'id'=>(int)$request->id_notificacion
                ]);
                    
            return REDIRECT($request->local);
        
        }else 
        if($request->tipo_noti === "confirmacion" && $request->para_noti === "4" ){

         
            $actualizar = \DB::select('call actualizar_notificaciones (:id)',[
                'id'=>(int)$request->id_notificacion
                ]);
                
            return REDIRECT($request->local);
 
        }

    }
}