<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Vitola_sanMarcos extends Controller
{
  

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */






public function store(Request $request)
{ $molde = \DB::select('call insertar_vitola(:id_planta,:vitola)',
    [ 'vitola' =>  (string)$request->vitola,
    'id_planta' => (int)$request->id_plantamo]);

    
    $moldes = \DB::select('call mostrar_datos_moldes(?)', [$request->id]);
                        
    $vitolas = \DB::select('call mostrar_vitolas(?)', [$request->id]);

    $figuras = \DB::select('call mostrar_figura_tipos(?)', [$request->id]);


    return REDIRECT('sucursal_sanMarcos/3')->with('moldes', $moldes)->with('vitolas', $vitolas)->with( 'figuras',$figuras)
    ->with('id_planta', $request->id) ->with('error', $molde);
}

/**
 * Display the specified resource.
 *
 * @param  \App\Models\Vitola  $vitola
 * @return \Illuminate\Http\Response
 */
public function show(Vitola $vitola)
{
    //
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  \App\Models\Vitola  $vitola
 * @return \Illuminate\Http\Response
 */
public function edit(Vitola $id)
{
    $vitola = Vitola::findOrFail($id);

    return ;// AQUI RETORNA A LA VISTA O TABLA QUE SE DESEE MANDAR

}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\Vitola  $vitola
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    $validateData = $request-> validate([
        'vitola'=>'requerid',
        'id_planta'=>'requerid'
    ]);

    $vitola = Store::FindOrFail($id);

    $vitola->vitola=$request->input('vitola');
    $vitola->id_planta=$request->input('id_planta');
    $vitola->save();

     return;
}

/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\Vitola  $vitola
 * @return \Illuminate\Http\Response
 */
public function destroy(Vitola $vitola)
{
    //
}
}

