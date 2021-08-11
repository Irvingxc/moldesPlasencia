<?php

namespace App\Http\Controllers;

use App\Models\Vitola;
use Illuminate\Http\Request;
use App\Imports\VitolasImport;
use Maatwebsite\Excel\Facades\Excel;

class VitolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function import(Request $request)
    {
       // return $request->all();
        $file = $request->excel;
        (new VitolasImport())->import($file);
       // Excel::import(new VitolasImport, $request->file('excel'));
        $titulo = "Moldes y Vitolas";
        $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
            'id' => auth()->user()->id_planta ] );
        $vitola = \DB::select('call MostrarTodasVitolas');
        $figura = \DB::select('call MostrarTodasFiguras');
        return REDIRECT('/verfiguraytipo')->with('vitola',  $vitola)->with('titulo', $titulo)->with('notificaciones', $notificaciones)
        ->with('figura', $figura);
    }
    public function index()
    {
        $vitola = \DD::select('call mostrar_vitolas(1)');
        return view('sucursal_elparaiso')->with('vitola',  $vitola);
    }



    public function index1()
    {
        $titulo = "Moldes y Vitolas";
        $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
            'id' => auth()->user()->id_planta ] );
        $vitola = \DB::select('call MostrarTodasVitolas');
        $figura = \DB::select('call MostrarTodasFiguras');
        $material = \DB::select('call MostrarTodosMateriales');
        return view('vitolas')->with('vitola',  $vitola)->with('titulo', $titulo)->with('notificaciones', $notificaciones)
        ->with('figura', $figura)->with('material', $material);
    }
    public function guardar(Request $request)
    {
        $molde = \DB::select('call insertar_vitola(:id_planta,:vitola)',
        [ 'vitola' =>  (string)$request->vitola,
        'id_planta' => 3]);
        $titulo = "Moldes y Vitolas";
        $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
            'id' => auth()->user()->id_planta ] );
        $vitola = \DB::select('call MostrarTodasVitolas');
        $figura = \DB::select('call MostrarTodasFiguras');
        return REDIRECT('/verfiguraytipo')->with('vitola',  $vitola)->with('titulo', $titulo)->with('notificaciones', $notificaciones)
        ->with('figura', $figura);
        //return $this->index1();
    }
    public function updatevitolas(Request $request)
    {
        $molde = \DB::select('call update_vitola(:vitola,:id_vitola,:id_planta)',
        [ 'vitola' =>  (string)$request->vitola,
        'id_vitola' =>  (int)$request->actualizarupdate,
        'id_planta' => (int)1]);
        $titulo = "Moldes y Vitolas";
        $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
            'id' => auth()->user()->id_planta ] );
        $vitola = \DB::select('call MostrarTodasVitolas');
        $figura = \DB::select('call MostrarTodasFiguras');
        return REDIRECT('/verfiguraytipo')->with('vitola',  $vitola)->with('titulo', $titulo)->with('notificaciones', $notificaciones)
        ->with('figura', $figura);
        //return $this->index1();
    }

    public function guardarFigura(Request $request)
    {
        $molde = \DB::select('call insertar_figura(:id_planta,:nombre_figura)',
        [ 'nombre_figura' =>  (string)$request->figura,
        'id_planta' => 3]);
        $titulo = "Moldes y Vitolas";
        $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
            'id' => auth()->user()->id_planta ] );
        $vitola = \DB::select('call MostrarTodasVitolas');
        $figura = \DB::select('call MostrarTodasFiguras');
       // return $this->index1();
        return REDIRECT('/verfiguraytipo')->with('vitola',  $vitola)->with('titulo', $titulo)->with('notificaciones', $notificaciones)
        ->with('figura', $figura);
    }

    public function updateFigura(Request $request)
    {
        $molde = \DB::select('call updateFiguras(:nombre_figura,:id_figura)',
        [ 'nombre_figura' =>  (string)$request->figuraupdate,
        'id_figura' => (int)$request->actualizarupdate1]);
        $titulo = "Moldes y Vitolas";
        $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
            'id' => auth()->user()->id_planta ] );
        $vitola = \DB::select('call MostrarTodasVitolas');
        $figura = \DB::select('call MostrarTodasFiguras');
       // return $this->index1();
        return REDIRECT('/verfiguraytipo')->with('vitola',  $vitola)->with('titulo', $titulo)->with('notificaciones', $notificaciones)
        ->with('figura', $figura);
    }



    public function guardarMaterial(Request $request)
    {
        $molde = \DB::select('call insertar_material(:vitola)',
        [ 'vitola' =>  (string)$request->material]);
        $titulo = "Moldes y Vitolas";
        $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
            'id' => auth()->user()->id_planta ] );
        $vitola = \DB::select('call MostrarTodasVitolas');
        $figura = \DB::select('call MostrarTodasFiguras');
        $material = \DB::select('call MostrarTodosMateriales');
        return REDIRECT('/verfiguraytipo')->with('vitola',  $vitola)->with('titulo', $titulo)->with('notificaciones', $notificaciones)
        ->with('figura', $figura);
        //return $this->index1();
    }

    public function updateMaterial(Request $request)
    {
        $molde = \DB::select('call updateMaterial(:id_material,:nombre_material)',
        [ 'nombre_material' =>  (string)$request->materialupdate,
        'id_material' => (int)$request->id_materialupdate]);
        $titulo = "Moldes y Vitolas";
        $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
            'id' => auth()->user()->id_planta ] );
        $vitola = \DB::select('call MostrarTodasVitolas');
        $figura = \DB::select('call MostrarTodasFiguras');
        $material = \DB::select('call MostrarTodosMateriales');
       // return $this->index1();
        return REDIRECT('/verfiguraytipo')->with('vitola',  $vitola)->with('titulo', $titulo)->with('notificaciones', $notificaciones)
        ->with('figura', $figura);
    }











    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validateData = $request-> validate([
            'vitola'=>'requerid',
            'id_planta'=>'requerid'
        ]);

        $vitola = new $vitola();

        $vitola->vitola=$request->input('vitola');
        $vitola->id_planta=$request->input('id_planta');
         $vitola->save();

         return;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */






    public function store(Request $request)
    { $molde = \DB::select('call insertar_vitola(:id_planta,:vitola)',
        [ 'vitola' =>  (string)$request->vitola,
        'id_planta' => (int)$request->id_planta]);


        $moldes = \DB::select('call mostrar_datos_moldes(?)', [$request->id]);

        $vitolas = \DB::select('call mostrar_vitolas(?)', [$request->id]);

        $figuras = \DB::select('call mostrar_figura_tipos(?)', [$request->id]);


        return REDIRECT('sucursal_elparaiso/1')->with('moldes', $moldes)->with('vitolas', $vitolas)->with( 'figuras',$figuras)
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
