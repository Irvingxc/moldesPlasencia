<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class figura_sanMarcos extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $figura = Figura_tipo::get();
       return response()->json($figura);//ESTA EN JSONN PERO SE PUEDE MANDAR A LA VISTA
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create(Request $request)
   {
       
       $validateData = $request-> validate([
           'nombre_figura'=>'requerid',
           'id_planta'=>'requerid'
       ]);

       $figura = new $figura();
  
       $figura->nombre_figura=$request->input('nombre_figura');
       $figura->id_planta=$request->input('id_planta');
        $figura->save();

        return;

   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       $molde = \DB::select('call insertar_figura(:id_planta,:nombre_figura)',
       [ 'nombre_figura' =>  (string)$request->figura,
       'id_planta' => (int)$request->id_plantamo]);

       
       $moldes = \DB::select('call mostrar_datos_moldes(?)', [$request->id]);
                           
       $vitolas = \DB::select('call mostrar_vitolas(?)', [$request->id]);

       $figuras = \DB::select('call mostrar_figura_tipos(?)', [$request->id]);

       return REDIRECT('sucursal_sanMarcos/3')->with('moldes', $moldes)->with('vitolas', $vitolas)->with( 'figuras',$figuras)
       ->with('id_planta', $request->id);
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Figura_tipo  $figura_tipo
    * @return \Illuminate\Http\Response
    */
   public function show(Figura_tipo $figura_tipo)
   {
       //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Figura_tipo  $figura_tipo
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $figura = Figura_tipo::findOrFail($id);

       return ;// AQUI RETORNA A LA VISTA O TABLA QUE SE DESEE MANDAR
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Figura_tipo  $figura_tipo
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
       

       $validateData = $request-> validate([
           'nombre_figura'=>'requerid',
           'id_planta'=>'requerid'
       ]);

       $figura = Store::FindOrFail($id);
  
       $figura->nombre_figura=$request->input('nombre_figura');
       $figura->id_planta=$request->input('id_planta');
        $figura->save();
        return;
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Figura_tipo  $figura_tipo
    * @return \Illuminate\Http\Response
    */
   public function destroy(Figura_tipo $figura_tipo)
   {
       //
   }
}



