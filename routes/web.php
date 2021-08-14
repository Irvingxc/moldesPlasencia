<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    //TODAS LAS RUTAS SON RESTRINGIDAS A SOLO GENTE LOGUIADA



Route::get('/', function () {
    $titulo = "PLASENCIA INVENTARIO MÓVIL";


    $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
        'id' => auth()->user()->id_planta ] );

    return view('principallogo')->with('titulo',$titulo)->with ('notificaciones', $notificaciones);
});

Route::get('/moldesprincipal', function () {
    $titulo = "SUCURSALES PLASENCIA";
    $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
        'id' => auth()->user()->id_planta ] );

    return view('moldesprincipal')->with('titulo',$titulo)->with ('notificaciones', $notificaciones);
});


///////////////////      EL PARAISO    //////////////////////////

// MOLDE
Route::get('/sucursal_elparaiso/{id}',[App\Http\Controllers\MoldesController::class, 'index' ])->name('datos_planta');
Route::post('/sucursal_elparaiso/{id}',[App\Http\Controllers\MoldesController::class, 'index' ])->name('id_planta');
Route::post('/sucursal_elparaiso/update/{id}',[App\Http\Controllers\MoldesController::class, 'update' ])->name('actualizar_moldes');
Route::post('/sucursal_elparaiso/crear/{id}',[App\Http\Controllers\MoldesController::class, 'store' ])->name('insertar_moldes');

// VITOLA
Route::post('/agregar_vitola/{id}',[App\Http\Controllers\VitolaController::class, 'store' ])->name('insertar_vitola');
Route::get('/crear_molde/{id}',[App\Http\Controllers\MoldesController::class, 'store' ])->name('datos');


//RUTAS PARA VER Y CREAR FIGURAS Y VITOLAS
Route::get('/verfiguraytipo',[App\Http\Controllers\VitolaController::class, 'index1' ])->name('datos1');
Route::post('/verfiguraytipo',[App\Http\Controllers\VitolaController::class, 'index1' ])->name('datos1');
Route::post('/storevitola/{id}',[App\Http\Controllers\VitolaController::class, 'guardar' ])->name('store_vitola');
Route::post('/updatevitola/{id}',[App\Http\Controllers\VitolaController::class, 'updatevitolas' ])->name('update_vitola');
Route::post('/storefigura/{id}',[App\Http\Controllers\VitolaController::class, 'guardarFigura' ])->name('store_figura');
Route::post('/updatefigura/{id}',[App\Http\Controllers\VitolaController::class, 'updateFigura' ])->name('update_figura');
Route::post('/excelimport',[App\Http\Controllers\VitolaController::class, 'import' ])->name('excel');


//FIGURA
Route::post('/agregar_figura/{id}',[App\Http\Controllers\FiguraTipoController::class, 'store' ])->name('insertar_figura');

//PDF
Route::post('/imprimirtablaparaiso/{id}',[App\Http\Controllers\MoldesController::class, 'imprimirdatosparaiso' ])->name('imprimirdatosparaiso');
//  REMISIONES

Route::get('/buscar_remision/{id}',[App\Http\Controllers\MoldesController::class, 'buscar_remision' ])->name('buscar_remision');
Route::post('/buscar_remision/{id}',[App\Http\Controllers\MoldesController::class, 'buscar_remision' ])->name('buscar_remision');


Route::get('/buscar_remision_re/{id}',[App\Http\Controllers\MoldesController::class, 'buscar_remision_recibida' ])->name('buscar_remision_re');
Route::post('/buscar_remision_re/{id}',[App\Http\Controllers\MoldesController::class, 'buscar_remision_recibida' ])->name('buscar_remision_re');
Route::post('/buscar_remision_imprimir_enviadas',[App\Http\Controllers\MoldesController::class, 'imprimir_remision_paraiso_enviadas' ])->name('imprimir_remision_paraiso_enviadas');
Route::post('/buscar_remision_imprimir_recibidas',[App\Http\Controllers\MoldesController::class, 'imprimir_remision_paraiso_recibidas' ])->name('imprimir_remision_paraiso_recibidas');

//REMISIONES
Route::get('/remisiones_paraiso/{id}',[App\Http\Controllers\MoldesController::class, 'remisiones' ])->name('remisiones');
Route::post('/remisiones_paraiso/{id}',[App\Http\Controllers\MoldesController::class, 'remisiones' ])->name('remisiones');
Route::delete('/eliminar_remision_Paraiso/{id}',[App\Http\Controllers\MoldesController::class, 'deleteremisiones' ])->name('eliminar_remision_Paraiso');
Route::get('/remisiones_paraiso/crear/{id}',[App\Http\Controllers\MoldesController::class, 'insertarremisiones' ])->name('insertarremisiones');
Route::post('/remisiones_paraiso/crear/{id}',[App\Http\Controllers\MoldesController::class, 'insertarremisiones' ])->name('insertarremisiones');

Route::post('/remisiones_paraiso/a/{id}',[App\Http\Controllers\MoldesController::class, 'actualizarremision' ])->name('actualizarremision');


Route::post('/solicitud_moldes',[App\Http\Controllers\MoldesController::class, 'insertar_notificaciones' ])->name('insertar_solicitud');
Route::post('/notificaciones',[App\Http\Controllers\MoldesController::class, 'notificaciones' ])->name('mostrar_notificaciones');


///////////////////      MOROCELI    //////////////////////////

Route::get('/sucursal_moroceli/{id}',[App\Http\Controllers\sucursal_moroceli::class, 'index' ])->name('datos_planta_moroceli');
Route::post('/sucursal_moroceli/{id}',[App\Http\Controllers\sucursal_moroceli::class, 'index' ])->name('id_planta_moroceli');
Route::post('/sucursal_moroceli/update/{id}',[App\Http\Controllers\sucursal_moroceli::class, 'update' ])->name('actualizar_moldes_moroceli');
Route::post('/sucursal_moroceli/crear/{id}',[App\Http\Controllers\sucursal_moroceli::class, 'store' ])->name('insertar_moldes_moroceli');
// VITOLA
Route::post('/agregar_vitola_moroceli/{id}',[App\Http\Controllers\Vitola_moroceli::class, 'store' ])->name('insertar_vitola_moroceli');
Route::get('/crear_molde/{id}',[App\Http\Controllers\sucursal_moroceli::class, 'store' ])->name('datos_moroceli');

//FIGURA
Route::post('/agregar_figuras_moroceli/{id}',[App\Http\Controllers\figura_moroceli::class, 'store' ])->name('insertar_figura_moroceli');

//PDF
Route::post('/imprimirtablamoroceli/{id}',[App\Http\Controllers\sucursal_moroceli::class, 'imprimirdatosparaiso' ])->name('imprimirdatos_moroceli');


//REMISIONES

Route::get('/remisiones_moroceli/{id}',[App\Http\Controllers\sucursal_moroceli::class, 'remisiones' ])->name('remisiones_moroce');
Route::post('/remisiones_moroceli/{id}',[App\Http\Controllers\sucursal_moroceli::class, 'remisiones' ])->name('remisiones_moroceli');
Route::get('/remisiones_moroceli/crear/{id}',[App\Http\Controllers\sucursal_moroceli::class, 'insertarremisiones' ])->name('insertarremisiones_moroc');
Route::post('/remisiones_moroceli/crear/{id}',[App\Http\Controllers\sucursal_moroceli::class, 'insertarremisiones' ])->name('insertarremisiones_moroceli');
Route::delete('/eliminar_remision_Moroceli/{id}',[App\Http\Controllers\sucursal_moroceli::class, 'deleteremisiones' ])->name('eliminar_remision_Moroceli');

Route::post('/remisiones_moroceli/a/{id}',[App\Http\Controllers\sucursal_moroceli::class, 'actualizarremision' ])->name('actualizarremision_moroceli');
Route::get('/remisiones_moroceli/a/{id}',[App\Http\Controllers\sucursal_moroceli::class, 'actualizarremision' ])->name('actualizarremision_moroceli');

Route::get('/buscar_remision_moroceli/{id}',[App\Http\Controllers\sucursal_moroceli::class, 'buscar_remision' ])->name('buscar_remision_moroceli');
Route::post('/buscar_remision_moroceli/{id}',[App\Http\Controllers\sucursal_moroceli::class, 'buscar_remision' ])->name('buscar_remision_moroceli');


Route::get('/buscar_remision_re_moroceli/{id}',[App\Http\Controllers\sucursal_moroceli::class, 'buscar_remision_recibida' ])->name('buscar_remision_re_moroceli');
Route::post('/buscar_remision_re_moroceli/{id}',[App\Http\Controllers\sucursal_moroceli::class, 'buscar_remision_recibida' ])->name('buscar_remision_re_moroceli');


Route::post('/buscar_remision_imprimir_enviadasmoroceli',[App\Http\Controllers\sucursal_moroceli::class, 'imprimir_remision_paraiso_enviadas' ])->name('imprimir_remision_moroceli_enviadas');
Route::post('/buscar_remision_imprimir_recibidasmoroceli',[App\Http\Controllers\sucursal_moroceli::class, 'imprimir_remision_paraiso_recibidas' ])->name('imprimir_remision_moroceli_recibidas');



Route::post('/solicitud_moldes_mo',[App\Http\Controllers\sucursal_moroceli::class, 'insertar_notificaciones' ])->name('insertar_solicitud_moroceli');


///////////////////      SAN MARCOS    //////////////////////////

Route::get('/sucursal_sanMarcos/{id}',[App\Http\Controllers\sucursal_sanMarcos::class, 'index' ])->name('datos_planta_sanMarcos');
Route::post('/sucursal_sanMarcos/{id}',[App\Http\Controllers\sucursal_sanMarcos::class, 'index' ])->name('id_planta_sanMarcos');
Route::post('/sucursal_sanMarcos/update/{id}',[App\Http\Controllers\sucursal_sanMarcos::class, 'update' ])->name('actualizar_moldes_sanMarcos');
Route::post('/sucursal_sanMarcos/crear/{id}',[App\Http\Controllers\sucursal_sanMarcos::class, 'store' ])->name('insertar_moldes_sanMarcos');
// VITOLA
Route::post('/agregar_vitola_sanMarcos/{id}',[App\Http\Controllers\Vitola_sanMarcos::class, 'store' ])->name('insertar_vitola_sanMarcos');
Route::get('/crear_molde/{id}',[App\Http\Controllers\sucursal_sanMarcos::class, 'store' ])->name('datos_sanMarcos');

//FIGURA
Route::post('/agregar_figuras_sanMarcos/{id}',[App\Http\Controllers\figura_sanMarcos::class, 'store' ])->name('insertar_figura_sanMarcos');

//PDF
Route::post('/imprimirtablasanMarcos/{id}',[App\Http\Controllers\sucursal_sanMarcos::class, 'imprimirdatosparaiso' ])->name('imprimirdatos_sanMarcos');

//REMISIONES

Route::get('/remisiones_sanMarcos/{id}',[App\Http\Controllers\sucursal_sanMarcos::class, 'remisiones' ])->name('remisiones_sanMarcos');
Route::post('/remisiones_sanMarcos/{id}',[App\Http\Controllers\sucursal_sanMarcos::class, 'remisiones' ])->name('remisiones_sanMarcos');
Route::get('/remisiones_sanMarcos/crear/{id}',[App\Http\Controllers\sucursal_sanMarcos::class, 'insertarremisiones' ])->name('insertarremisiones_sanMarcos');
Route::post('/remisiones_sanMarcos/crear/{id}',[App\Http\Controllers\sucursal_sanMarcos::class, 'insertarremisiones' ])->name('insertarremisiones_sanMarcos');

Route::post('/remisiones_sanMarcos/ac/{id}',[App\Http\Controllers\sucursal_sanMarcos::class, 'actualizarremision' ])->name('actualizarremision_sanMarcos');
Route::get('/buscar_remision_sanMarcos/{id}',[App\Http\Controllers\sucursal_sanMarcos::class, 'buscar_remision' ])->name('buscar_remision_sanMarcos');
Route::delete('/eliminar_remision_sanMarcos/{id}',[App\Http\Controllers\sucursal_sanMarcos::class, 'deleteremisiones' ])->name('eliminar_remision_sanMarcos');
Route::post('/buscar_remision_sanMarcos/{id}',[App\Http\Controllers\sucursal_sanMarcos::class, 'buscar_remision' ])->name('buscar_remision_sanMarcos');


Route::get('/buscar_remision_re_sanMarcos/{id}',[App\Http\Controllers\sucursal_sanMarcos::class, 'buscar_remision_recibida' ])->name('buscar_remision_re_sanMarcos');
Route::post('/buscar_remision_re_sanMarcos/{id}',[App\Http\Controllers\sucursal_sanMarcos::class, 'buscar_remision_recibida' ])->name('buscar_remision_re_sanMarcos');


Route::post('/buscar_remision_imprimir_enviadassanmarcos',[App\Http\Controllers\sucursal_sanMarcos::class, 'imprimir_remision_paraiso_enviadas' ])->name('imprimir_remision_sanMarcos_enviadas');
Route::post('/buscar_remision_imprimir_recibidassanmarcos',[App\Http\Controllers\sucursal_sanMarcos::class, 'imprimir_remision_paraiso_recibidas' ])->name('imprimir_remision_sanMarcos_recibidas');



Route::post('/solicitud_moldes_sa',[App\Http\Controllers\sucursal_sanMarcos::class, 'insertar_notificaciones' ])->name('insertar_solicitud_sanmarcos');



///////////////////      GUALIQUEME    //////////////////////////

Route::get('/sucursal_gualiqueme/{id}',[App\Http\Controllers\sucursal_gualiqueme::class, 'index' ])->name('datos_planta_gualiqueme');
Route::post('/sucursal_gualiqueme/{id}',[App\Http\Controllers\sucursal_gualiqueme::class, 'index' ])->name('id_planta_gualiqueme');
Route::post('/sucursal_gualiqueme/update/{id}',[App\Http\Controllers\sucursal_gualiqueme::class, 'update' ])->name('actualizar_moldes_gualiqueme');
Route::post('/sucursal_gualiqueme/crear/{id}',[App\Http\Controllers\sucursal_gualiqueme::class, 'store' ])->name('insertar_moldes_gualiqueme');
// VITOLA
Route::post('/agregar_vitola_gualiqueme/{id}',[App\Http\Controllers\Vitola_gualiqueme::class, 'store' ])->name('insertar_vitola_gualiqueme');
Route::get('/crear_molde/{id}',[App\Http\Controllers\sucursal_sanMarcos::class, 'store' ])->name('datos_sanMarcos');

//FIGURA
Route::post('/agregar_figuras_gualiqueme/{id}',[App\Http\Controllers\figura_gualiqueme::class, 'store' ])->name('insertar_figura_gualiqueme');

//PDF
Route::post('/imprimirtablagualiqueme/{id}',[App\Http\Controllers\sucursal_gualiqueme::class, 'imprimirdatosparaiso' ])->name('imprimirdatos_gualiqueme');


//REMISIONES

Route::get('/remisiones_gualiqueme/{id}',[App\Http\Controllers\sucursal_gualiqueme::class, 'remisiones' ])->name('remisiones_gualiqueme');
Route::post('/remisiones_gualiqueme/{id}',[App\Http\Controllers\sucursal_gualiqueme::class, 'remisiones' ])->name('remisiones_gualiqueme');
Route::delete('/eliminar_remision_Gualiqueme/{id}',[App\Http\Controllers\sucursal_gualiqueme::class, 'deleteremisiones' ])->name('eliminar_remision_Gualiqueme');
Route::get('/remisiones_gualiqueme/crear/{id}',[App\Http\Controllers\sucursal_gualiqueme::class, 'insertarremisiones' ])->name('insertarremisiones_gualiqueme');
Route::post('/remisiones_gualiqueme/crear/{id}',[App\Http\Controllers\sucursal_gualiqueme::class, 'insertarremisiones' ])->name('insertarremisiones_gualiqueme');
Route::post('/remisiones_gualiqueme/a/{id}',[App\Http\Controllers\sucursal_gualiqueme::class, 'actualizarremision' ])->name('actualizarremision_gualiqueme');
Route::get('/buscar_remision_gualiqueme/{id}',[App\Http\Controllers\sucursal_gualiqueme::class, 'buscar_remision' ])->name('buscar_remision_gualiqueme');
Route::post('/buscar_remision_gualiqueme/{id}',[App\Http\Controllers\sucursal_gualiqueme::class, 'buscar_remision' ])->name('buscar_remision_gualiqueme');


Route::get('/buscar_remision_re_gualiqueme/{id}',[App\Http\Controllers\sucursal_gualiqueme::class, 'buscar_remision_recibida' ])->name('buscar_remision_re_gualiqueme');
Route::post('/buscar_remision_re_gualiqueme/{id}',[App\Http\Controllers\sucursal_gualiqueme::class, 'buscar_remision_recibida' ])->name('buscar_remision_re_gualiqueme');

Route::post('/buscar_remision_imprimir_enviadasgualiqueme',[App\Http\Controllers\sucursal_gualiqueme::class, 'imprimir_remision_gualiqueme_enviadas' ])->name('imprimir_remision_gualiqueme_enviadas');
Route::post('/buscar_remision_imprimir_recibidasgualiqueme',[App\Http\Controllers\sucursal_gualiqueme::class, 'imprimir_remision_gualiqueme_recibidas' ])->name('imprimir_remision_gualiqueme_recibidas');



Route::post('/solicitud_moldes_gu',[App\Http\Controllers\sucursal_gualiqueme::class, 'insertar_notificaciones' ])->name('insertar_solicitud_gualiqueme');



///////////////////      OTRAS PLANTAS   //////////////////////////

Route::get('/moldes_prestados',[App\Http\Controllers\moldes_prestados::class, 'remisiones' ])->name('remisiones_prestadas');
Route::post('/moldes_prestados',[App\Http\Controllers\moldes_prestados::class, 'remisiones' ])->name('remisiones_prestadas');


Route::get('/moldes_prestados_otrasempresas',[App\Http\Controllers\moldes_prestados::class, 'remisiones_index' ])->name('remisiones_prestadas_otras');
Route::post('/moldes_prestados_otrasempresas',[App\Http\Controllers\moldes_prestados::class, 'remisiones_index' ])->name('remisiones_prestadas_otras');

Route::get('/moldes_prestados_fecha',[App\Http\Controllers\moldes_prestados::class, 'buscar_prestadas' ])->name('remisiones_prestadas_fecha');
Route::post('/moldes_prestados_fecha',[App\Http\Controllers\moldes_prestados::class, 'buscar_prestadas' ])->name('remisiones_prestadas_fecha');
Route::post('/moldes_prestados_imprimir',[App\Http\Controllers\moldes_prestados::class, 'imprimirdatos_otras_empresas' ])->name('remisiones_prestadas_impresion');





///////////////////      TOTAL PLANTAS    //////////////////////////
Route::get('/moldes_totales',[App\Http\Controllers\MoldesController::class, 'totales' ])->name('totales_moldes');
Route::post('/moldes_totales',[App\Http\Controllers\MoldesController::class, 'totales' ])->name('totales_moldes');
Route::post('/imprimirtotalmoldes',[App\Http\Controllers\MoldesController::class, 'imprimirdatototal' ])->name('imprimirdatostotalmoldes');



//USUARIO
Route::get('/usuarios',[App\Http\Controllers\UserController::class, 'index' ]);
Route::post('/usuarios',[App\Http\Controllers\UserController::class, 'update' ])->name('actualizar_usuario');
Route::post('/usuarios/a',[App\Http\Controllers\UserController::class, 'destroy' ])->name('eliminar_usuario');
Route::post('usuarios/contra', [App\Http\Controllers\UserController::class,'update_contrasenia'])->name('actualizar_usuario_contrasenia');


Route::post('notificaciones_actualizar', [App\Http\Controllers\notificaciones::class,'actualizar_notificaciones'])->name('actualizar_notificaciones');
Route::get('notificaciones_actualizar', [App\Http\Controllers\notificaciones::class,'actualizar_notificaciones'])->name('actualizar_notificaciones');

Route::get('noti', [App\Http\Controllers\notificaciones::class,'redireccionar'])->name('redireccionar');
Route::post('noti', [App\Http\Controllers\notificaciones::class,'redireccionar'])->name('redireccionar');

//RUTAS PARA CREAR MATERIALES
Route::get('/vermateriales',[App\Http\Controllers\VitolaController::class, 'index1' ])->name('materiales');
Route::post('/vermateriales',[App\Http\Controllers\VitolaController::class, 'index1' ])->name('materiales');
Route::post('/storematerailes',[App\Http\Controllers\VitolaController::class, 'guardarMaterial' ])->name('store_material');
Route::post('/updatemateriales',[App\Http\Controllers\VitolaController::class, 'updateMaterial' ])->name('updateMaterial');


Route::get('/ayuda', function () {
    $titulo= "Ayuda";
    $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
        'id' => auth()->user()->id_planta ] );
    return view('ayuda')->with('titulo',$titulo)->with('notificaciones',$notificaciones);
});


Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

});
//FIN DE LAS RUTAS RESTRINGIDAS
