<?php

namespace App\Http\Controllers;


use App\Models\Moldes;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use PDF;
use Carbon\Carbon;

class sucursal_sanMarcos extends Controller
{
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index( Request $request)
        {
            $titulo = "INVENTARIO DE MOLDES SUCURSAL SAN MARCOS";
            $fechai = $request->fecha_inicio;
            $fechaf = $request->fecha_fin;

            $vitolaB = $request->vitolabuscar;
            $figuraB = $request->figurabuscar;
            $materialB = $request->materialimprimir;

            $material = \DB::select('call MostrarTodosMateriales');

            $moldes = \DB::select('call moldes_sanMarcos(:vitola,:nombre_figura,:material)',
            [ 'vitola' => (string)$request->vitolabuscar,
            'nombre_figura' => (string)$request->figurabuscar,
            'material'=> (string)$request->materialbuscar]);

            $vitolas     = \DB::select('call mostrar_vitolas(?)', [$request->id]);
            $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
                'id' => auth()->user()->id_planta ] );
            $figuras = \DB::select('call mostrar_figura_tipos(?)', [$request->id]);

            $id_planta = [$request->id];

            return view('sucursal_sanMarcos')->with ('notificaciones', $notificaciones)->with('moldes',$moldes)->with('vitolas', $vitolas)->with( 'figuras',$figuras) ->with('fechai',$fechai)->with('fechaf',$fechaf)
            ->with('id_planta', $id_planta)->with('titulo',$titulo) ->with('vitolaB',$vitolaB)->with('figuraB',$figuraB)->with('material', $material);

        }


        public function store(Request $request)
        {

                $molde = \DB::select('call insertar_moldes_planta3(:id_planta,:id_vitola,:id_figura,:bueno,:irregular,:malo,:bodega,:reparacion,:salon,:fivi,:id_material)',
                 [ 'id_planta' => (int)$request->id_plantamo,
                    'id_vitola' =>  \DB::select('call traer_id_vitola(?,?)', [$request->id_plantamo,$request->id_vitola])[0]->id_vitola,
                    'id_figura' => \DB::select('call traer_id_figura(?,?)', [$request->id_plantamo,$request->id_figura])[0]->id_figura,
                    'bueno' => (int)$request->bueno,
                    'irregular' => (int)$request->irregulares,
                    'malo' => (int)$request->malos,
                    'reparacion' => (int)$request->reparacion,
                    'bodega' => (int)$request->bodega,
                    'salon' => (int)$request->salon,
                    'fivi' => (string)$request->fivi,
                    'id_material' => \DB::select('call traer_id_material(?)', [$request->id_material])[0]->id_material,

                ]);

                $fechai = $request->fecha_inicio;
                $fechaf = $request->fecha_fin;

                $moldes = \DB::select('call mostrar_datos_moldes(?)', [$request->id]);

                $vitolas = \DB::select('call mostrar_vitolas(?)', [$request->id]);
                $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
                    'id' => auth()->user()->id_planta ] );

                $figuras = \DB::select('call mostrar_figura_tipos(?)', [$request->id]);


                 return REDIRECT('sucursal_sanMarcos/3')->with ('notificaciones', $notificaciones)->with('moldes', $moldes)->with('vitolas', $vitolas)->with( 'figuras',$figuras) ->with('fechai',$fechai)->with('fechaf',$fechaf)
                ->with('id_planta', $request->id);

        }


        public function update(Request $request, $id)
        {
                $molde = \DB::select('call actualizar_moldes(:id_molde, :bueno,:irregular,:malo,:bodega,:reparacion,:salon)',
                    [
                        'id_molde' => (int)$request->id_molde,
                        'bueno' => (int)$request->mo_bueno,
                        'irregular' => (int)$request->mo_irregular,
                        'malo' => (int)$request->mo_malo,
                        'reparacion' => (int)$request->mo_reparacion,
                        'bodega' => (int)$request->mo_bodega,
                        'salon' => (int)$request->mo_salon
                    ]);

                    $moldes = \DB::select('call mostrar_datos_moldes(?)', [$request->id]);

                    $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
                        'id' => auth()->user()->id_planta ] );
                    $vitolas = \DB::select('call mostrar_vitolas(?)', [$request->id]);

                    $figuras = \DB::select('call mostrar_figura_tipos(?)', [$request->id]);
                    $fechai = $request->fecha_inicio;
                    $fechaf = $request->fecha_fin;

                    return REDIRECT('sucursal_sanMarcos/3')->with ('notificaciones', $notificaciones)->with('moldes', $moldes)->with('vitolas', $vitolas)->with( 'figuras',$figuras) ->with('fechai',$fechai)->with('fechaf',$fechaf)
                    ->with('id_planta', $request->id);

        }

        public function remisiones( Request $request)
        {
                $titulo = "REMISIONES SAN MARCOS";

                $moldes = \DB::select('call moldes_remision(3)');

                $remisionesenviadas = \DB::select('call mostrar_remisiones_enviadas(3)');

                $remisionesrecibidas = \DB::select("call mostrar_remisiones_recibidas('San Marcos')");

                $bodega = \DB::select('call traer_cantidad(:id_planta)',
                [
                    'id_planta' => (int)3
                ]);

                $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
                    'id' => auth()->user()->id_planta ] );
                $abrir = "3";
                $fechai = $request->fecha_inicio;
                $fechaf = $request->fecha_fin;
                return view('remisionessanmarcos')->with ('notificaciones', $notificaciones)->with('titulo',$titulo)->with('moldes',$moldes) ->with('fechai',$fechai)->with('fechaf',$fechaf)
                ->with('remisionesenviadas',$remisionesenviadas)->with('remisionesrecibidas',$remisionesrecibidas)->with('bodega',$bodega)->with('abrir', $abrir);

    }

    public function procesar(Request $request){
        $procesar = \DB::select('call preparandoProcesar(:id_remision, :id_planta,:estado,:fivi,
        :cantidad,:planta_recibido,:nombre_otra_planta)',

        [
            'id_remision' => (int)$request->remi,
            'id_planta' => (int)$request->plan_id,
            'estado' => (string)$request->est,
            'fivi' => (string)$request->tip_mol,
            'cantidad' => (int)$request->cant,
 //           'id_molde' => (int)$request->id_molde,
            'planta_recibido' => (string)$request->plan_id,
            'nombre_otra_planta'=> (string)$request->para_planta
        ]);
        return REDIRECT('/remisiones_sanMarcos/3');
    }


    public function deleteremisiones(Request $request, $id){
        $molde = \DB::select('call deleteremisiones(:id_remision)',
        [
        'id_remision' => $id
        ]);

        return REDIRECT('/remisiones_sanMarcos/3');
    }




        public function insertarremisiones( Request $request)
        {

               /* $fecha =Carbon::now();
                $fecha = $fecha->format('Y-m-d');*/
                $fecha = $request->txt_fecha;
                $empresa = "";

                $fechai = $request->fecha_inicio;
                $fechaf = $request->fecha_fin;

                if($request->txt_otra_fabrica != null){
                    $empresa = $request->txt_otra_fabrica;
                    $check = 1;
                }else{
                    $empresa = $request->txt_sucursales;
                    $check = $request->chequear;
                }

                $bodega = \DB::select('call traer_cantidad(:id_planta)',
                [
                    'id_planta' => (int)$request->id_planta
                ]);

                $molde = \DB::select('call insertar_remisiones(:fecha,:id_planta,:nombre_fabrica,:estado_moldes,:tipo_molde,:cantidad,:chequear)',
                [
                'fecha' => $fecha,
                'id_planta' => (int)$request->id_planta,
                'nombre_fabrica'=> $empresa,
                'estado_moldes' => (string)$request->txt_estado,
                'tipo_molde' => (string)$request->id_tipo,
                'cantidad' => (int)$request->txt_cantidad,
                'chequear' => (int)$check
                ]);

                $descripcion = "Remisi??n de moldes con la descripci??n: ".$request->id_tipo." enviada. Favor confirmar la entrega.";


               /* $molde = \DB::select('call insertar_notificaciones(:tipo,:descripcion,:activo,:idplanta,:planta)',
                [ 'tipo' => "envio",
               'descripcion' => $descripcion,
                 'activo' => (int)$request->activo,
               'idplanta' => (string)$request->id_planta,
                'planta' => (string)$request->id_otra_plan

                ]);*/

                $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
                    'id' => auth()->user()->id_planta ] );
                $titulo = "REMISIONES SAN MARCOS";

                $moldes = \DB::select('call moldes_remision(3)');

                $remisionesenviadas = \DB::select('call mostrar_remisiones_enviadas(3)');

                $abrir = "3";

                $remisionesrecibidas = \DB::select("call mostrar_remisiones_recibidas('San Marcos')");

                return REDIRECT('/remisiones_sanMarcos/3');
        }



        public function actualizarremision(Request $request, $id){
            $fechai = $request->fecha_inicio;
            $fechaf = $request->fecha_fin;
                $remision = \DB::select('call actualizar_remision_moldes(:id_remision, :id_planta,:estado,:fivi,
                :cantidad,:id_molde,:planta_recibido,:nombre_otra_planta)',

                [
                    'id_remision' => (int)$request->txt_id_remision,
                    'id_planta' => (int)$request->txt_id_planta,
                    'estado' => (string)$request->txt_estado_moldes,
                    'fivi' => (string)$request->txt_tipo_moldes,
                    'cantidad' => (int)$request->cantidad,
                    'id_molde' => (int)$request->id_molde,
                    'planta_recibido' => (string)$request->nombre_recibido,
                    'nombre_otra_planta'=> (string)$request->txt_nombre_fabrica
                ]);

                $descripcion = "Los moldes con la descripci??n: ".$request->txt_tipo_moldes." se recibieron correctamente.";

                $molde = \DB::select('call insertar_notificaciones(:tipo,:descripcion,:activo,:idplanta,:planta)',
                [ 'tipo' => "confirmacion",
               'descripcion' => $descripcion,
                 'activo' => (int)$request->activo,
               'idplanta' => (string)$request->id_planta,
                'planta' => (string)$request->id_otra

                ]);

                $bodega = \DB::select('call traer_cantidad(:id_planta)',
                [
                    'id_planta' => (int)$request->id_planta
                ]);

                $titulo = "REMISIONES SAN MARCOS";

                $moldes = \DB::select('call moldes_remision(3)');

                $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
                    'id' => auth()->user()->id_planta ] );
                $remisionesenviadas = \DB::select('call mostrar_remisiones_enviadas(3)');

                $remisionesrecibidas = \DB::select("call mostrar_remisiones_recibidas('San Marcos')");

                $abrir = "3";

                return view('remisionessanmarcos') ->with ('notificaciones', $notificaciones)->with('titulo',$titulo) ->with('moldes',$moldes) ->with('fechai',$fechai)->with('fechaf',$fechaf)
                ->with('remisionesenviadas',$remisionesenviadas)->with('remisionesrecibidas',$remisionesrecibidas)->with('bodega',$bodega)->with('abrir', $abrir);

        }



        public function buscar_remision( Request $request)
        {
                $titulo = "REMISIONES SAN MAARCOS";

                $moldes = \DB::select('call moldes_remision(3)');

                $bodega = \DB::select('call traer_cantidad(:id_planta)',
                [
                    'id_planta' => (int)$request->id_planta
                ]);

                $fechai = $request->fecha_inicio;
                $fechaf = $request->fecha_fin;
                if ($request->fecha_inicio === null){
                $incio = "";
                }else{
                    $incio = $request->fecha_inicio;
                }


                if ($request->fecha_fin === null){
                    $fin = "";
                }else{
                    $fin = $request->fecha_fin;
                }

                $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
                    'id' => auth()->user()->id_planta ] );
                $remisionesenviadas = \DB::select('call buscar_remision(:fecha_inicio,:fecha_fin,:id_planta_remision)',
                [ 'fecha_inicio' => $incio,
                'fecha_fin' => $fin,
                'id_planta_remision' => $request->id_planta_remision]);

                $remisionesrecibidas = \DB::select("call mostrar_remisiones_recibidas('San Marcos')");

                $abrir = "3";

                return view('remisionessanmarcos')->with ('notificaciones', $notificaciones)->with('titulo',$titulo)->with('moldes',$moldes) ->with('fechai',$fechai)->with('fechaf',$fechaf)
                ->with('remisionesenviadas',$remisionesenviadas)->with('remisionesrecibidas',$remisionesrecibidas)->with('bodega',$bodega)->with('abrir', $abrir);

        }



        public function buscar_remision_recibida( Request $request)
        {
                $titulo = "REMISIONES SAN MARCOS";
                $fechai = $request->fecha_inicio;
            $fechaf = $request->fecha_fin;
                $moldes = \DB::select('call moldes_remision(3)');

                $bodega = \DB::select('call traer_cantidad(:id_planta)',
                [
                    'id_planta' => (int)$request->id_planta
                ]);

                if ($request->fecha_inicio === null){
                    $inicio = "";
                }else{
                    $inicio = $request->fecha_inicio;
                }

                if ($request->fecha_fin === null){
                    $fin = "";
                }else{
                    $fin = $request->fecha_fin;
                }

                $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
                    'id' => auth()->user()->id_planta ] );
                $remisionesrecibidas = \DB::select('call buscar_remision_recibidas(:fecha_inicio,:fecha_fin, "San Marcos")',
                [ 'fecha_inicio' => $inicio,
                'fecha_fin' => $fin]);

                $remisionesenviadas= \DB::select('call mostrar_remisiones_enviadas(3)');

                $abrir = "2";

                return view('remisionessanmarcos')->with ('notificaciones', $notificaciones)->with('titulo',$titulo)->with('moldes',$moldes) ->with('fechai',$fechai)->with('fechaf',$fechaf)
                ->with('remisionesenviadas',$remisionesenviadas)->with('remisionesrecibidas',$remisionesrecibidas)->with('bodega',$bodega)->with('abrir', $abrir);

        }


        public function imprimirdatosparaiso( Request $request){

            $fecha =Carbon::now();
            $fecha = $fecha->format('d-m-Y');

            $ffecha =Carbon::now();
            $fecha_imp = $ffecha->format('d-m-Y/h:i');


            $vitolaB = $request->vitolabuscar;
            $figuraB = $request->figurabuscar;
            $materialB = $request->materialbuscar;

            if ($request->vitolaimprimir === null ){
                $vit = "";
            }else{
                $vit = $request->vitolaimprimir;
            }


            if ($request->figuraimprimir === null ){
                $fig = "";
            }else{
                $fig = $request->figuraimprimir;
            }

            if ($request->materialimprimir === null ){
                $mat = "";
            }else{
                $mat = $request->materialimprimir;
            }


            $moldes = \DB::select('call moldes_sanMarcos(:vitola,:nombre_figura,:material)',
            [ 'vitola' => (string)$vit,
            'nombre_figura' => (string)$fig,
            'material' => (string)$mat
            ]);
            $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
                'id' => auth()->user()->id_planta ] );
            $vitolas = \DB::select('call mostrar_vitolas(?)', [$request->id]);

            $figuras = \DB::select('call mostrar_figura_tipos(?)', [$request->id]);
            $id_planta = [$request->id];

            $vista = view('imprimirtabla_sanmarcos',['fecha' =>$fecha])->with('vitolaB',$vitolaB)->with('figuraB',$figuraB) ->with('moldes',$moldes)->with('vitolas', $vitolas)->with( 'figuras',$figuras)
            ->with('id_planta', $id_planta)->with ('notificaciones', $notificaciones)->with('materialB', $materialB);

            $pdf =  \PDF::loadHTML($vista);
            return $pdf->stream('Inventario de moldes San Marcos '.$fecha_imp.'.pdf');

     }


        public function imprimir_remision_paraiso_enviadas( Request $request){

            $fecha =Carbon::now();
            $fecha = $fecha->format('d-m-Y');

         $ffecha =Carbon::now();
            $fecha_imp = $ffecha->format('d-m-Y/h:i');

            $fechai = $request->fecha_inicio;
            $fechaf = $request->fecha_fin;
            $titulo = "REMISIONES A OTRAS EMPRESAS";

            if ($request->fechainicio === null){
                $incio = "";
           }else{
               $incio = $request->fechainicio;
           }

           if ($request->fechafin === null){
               $fin = "";
           }else{
               $fin = $request->fechafin;
           }

           $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
            'id' => auth()->user()->id_planta ] );
           //$moldes = \DB::select('call mostrar_remisiones_otras_empresas_index');

           $moldes = \DB::select('call buscar_remision(:fecha_inicio,:fecha_fin,:id_planta_remision)',
           [ 'fecha_inicio' => $incio,
           'fecha_fin' => $fin,
           'id_planta_remision' => 3]);

            $vista = view('imprimir_remisiones_sanMarcos_enviadas')->with('titulo',$titulo)
            ->with('moldes', $moldes)->with ('notificaciones', $notificaciones)->with('fecha', $fecha)  ->with('fechai',$fechai)->with('fechaf',$fechaf);



            $pdf =  \PDF::loadHTML($vista);
            return $pdf->stream('Remisi??n de moldes enviados San Marcos '.$fecha_imp.'.pdf');

        }


        public function imprimir_remision_paraiso_recibidas( Request $request){

            $fecha =Carbon::now();
            $fecha = $fecha->format('d-m-Y');

            $ffecha =Carbon::now();
            $fecha_imp = $ffecha->format('d-m-Y/h:i');

            $fechai = $request->fecha_inicio;
            $fechaf = $request->fecha_fin;
            $titulo = "REMISIONES A OTRAS EMPRESAS";

            if ($request->fechainicio === null){
                $incio = "";
           }else{
               $incio = $request->fechainicio;
           }

           if ($request->fechafin === null){
               $fin = "";
           }else{
               $fin = $request->fechafin;
           }

           //$moldes = \DB::select('call mostrar_remisiones_otras_empresas_index');

           $moldes = \DB::select('call buscar_remision_recibidas(:fecha_inicio,:fecha_fin,:id_planta_remision)',
           [ 'fecha_inicio' => $incio,
           'fecha_fin' => $fin,
           'id_planta_remision' => $request->nombre_fa]);

           $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
            'id' => auth()->user()->id_planta ] );

            $vista = view('imprimir_remisiones_sanMarcos_recibidas')->with('titulo',$titulo)
            ->with('moldes', $moldes)->with ('notificaciones', $notificaciones)->with('fecha', $fecha)->with('fechai',$fechai)->with('fechaf',$fechaf);


            $pdf =  \PDF::loadHTML($vista);
            return $pdf->stream('Remisi??n de moldes recibidos San Marcos '.$fecha_imp.'.pdf');

        }

        public function insertar_notificaciones(Request $request){
            $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
                'id' => auth()->user()->id_planta ] );

            $descripcion = "Se necesitan ".(string)$request->cantidad_notificacion." moldes con las siguiente descripci??n: ".
            (string)$request->figura_notificacion." ".(string)$request->vitola_notificacion." para la planta ".(string)$request->nombreplanta_notificacion.".";


            $molde = \DB::select('call insertar_notificaciones(:tipo,:descripcion,:activo,:idplanta,:planta)',
            [ 'tipo' => (string)$request->tipo_notificacion,
           'descripcion' => $descripcion,
             'activo' => (int)$request->chequear_notificaciones,
           'idplanta' => (string)$request->id_planta_notificaciones,
            'planta' => (string)$request->planta_notificacion

            ]);


            $titulo = "REMISIONES SAN MARCOS";
            $moldes = \DB::select('call moldes_remision(3)');

            $bodega = \DB::select('call traer_cantidad(3)');

            $fechai = $request->fecha_inicio;
            $fechaf = $request->fecha_fin;

            if ($request->fecha_inicio === null){
                $incio = "";
           }else{
               $incio = $request->fecha_inicio;
           }


           if ($request->fecha_fin === null){
               $fin = "";
           }else{
               $fin = $request->fecha_fin;
           }

            $remisionesenviadas = \DB::select('call buscar_remision(:fecha_inicio,:fecha_fin,:id_planta_remision)',
            [ 'fecha_inicio' => $incio,
            'fecha_fin' => $fin,
            'id_planta_remision' => $request->id_planta_remision]);

            $remisionesrecibidas = \DB::select("call mostrar_remisiones_recibidas('San Marcos')");

            $abrir = "3";

            return REDIRECT('remisiones_sanMarcos/3')->with('titulo',$titulo)->with('moldes',$moldes)
            ->with('remisionesenviadas',$remisionesenviadas)->with('remisionesrecibidas',$remisionesrecibidas)->with('bodega',$bodega)->with('abrir', $abrir)
            ->with('fechai',$fechai)->with('fechaf',$fechaf)->with ('notificaciones', $notificaciones);
        }

        public function totales()
        {

                $titulo = "SUMATORIA TOTAL DE LOS MOLDES PLASENCIA";
                $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
                    'id' => auth()->user()->id_planta ] );
                $distintos = \DB::select('call distintos_moldes()');

                foreach($distintos as $distinto){
                    $insertar = \DB::select('call insertar_totales_plantas(?)' , [$distinto->figura_vitola]);
                }

                $totales_moldes = \DB::select('call mostrar_total_todas_plantas()');

                return view('sucursales_total')->with ('notificaciones', $notificaciones)->with('totales',$totales_moldes)->with('titulo',$titulo);

        }


        public function notificaciones(){
            $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
                'id' => auth()->user()->id_planta ] );

            return redirect('moldesprincipal')->with ('notificaciones', $notificaciones);
        }

        public function index_vitola(Request $request)
        {
        }
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create(Request $request)
        {


        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */

        /**
         * Display the specified resource.
         *
         * @param  \App\Models\Moldes  $moldes
         * @return \Illuminate\Http\Response
         */
        public function show(Request $request)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Models\Moldes  $moldes
         * @return \Illuminate\Http\Response
         */
        public static function edit($id)
        {

            $fila_moldes = \DB::select('call mostrar_datos_actualizar(?)',[$id]);

            return response()->json( $fila_moldes);


        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Models\Moldes  $moldes
         * @return \Illuminate\Http\Response
         */


        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\Moldes  $moldes
         * @return \Illuminate\Http\Response
         */
        public function destroy(Moldes $moldes)
        {
            //
        }



}

