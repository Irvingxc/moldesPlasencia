<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use DB;
use App\Http\Requests\RegisterAuthRequest;
use Illuminate\Support\Facades\Auth;
use Mail;
use View;





class UserController extends Controller
{

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {       
        
        $titulo = "USUARIOS Y ADMINISTRADORES";
        $users = \DB::select('call mostrar_usuarios');  
        $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
            'id' => auth()->user()->id_planta ] );
        $sucursales = \DB::select("call mostrar_sucursal()");     

        return view('usuarios')->with('titulo',$titulo)->with('users',$users)->with('notificaciones',$notificaciones)->with('sucursales',$sucursales);   

    }


        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        
        $usuario = \DB::select('call actualizar_usuarios(:id_usuario, :codigo,:nombre_usuario,:id_planta)',
                    [
                        'id_usuario' => (int)$request->id_usuario,
                        'codigo' => (int)$request->txt_codigo,
                        'nombre_usuario' => (string)$request->txt_nombre_completo,
                        'id_planta' => (int)$request->txt_sucursales
                     ]);

            
                      

                     $titulo = "USUARIOS Y ADMINISTRADORES";
                     $users = \DB::select('call mostrar_usuarios');  
                     $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
                         'id' => auth()->user()->id_planta ] );
                     $sucursales = \DB::select("call mostrar_sucursal()");     
             
                     return view('usuarios')->with('titulo',$titulo)->with('users',$users)->with('notificaciones',$notificaciones)->with('sucursales',$sucursales);   
             

    }


    public function update_contrasenia(Request $request)
    {        


        $usuario = \DB::select('call actualizar_contrasenia(:id_usuario, :correo,:contrasenia)',
                    [
                        'id_usuario' => $request->txt_id_usuario,
                        'correo' => $request->emailcontra,
                        'contrasenia' => Hash::make($request->confirmacion_contraseniaA)
                     ]);           
                      

                     $titulo = "USUARIOS Y ADMINISTRADORES";
                     $users = \DB::select('call mostrar_usuarios');  
                     $notificaciones = \DB::select("call mostrar_notificaciones(:id)",[
                         'id' => auth()->user()->id_planta ] );
                     $sucursales = \DB::select("call mostrar_sucursal()");     
             
                     return view('usuarios')->with('titulo',$titulo)->with('users',$users)->with('notificaciones',$notificaciones)->with('sucursales',$sucursales);   
    }

    

    public function destroy(Request $request)
    {
        $usuario = \DB::select('call eliminar_usuario(:id_usuario)',
        [
            'id_usuario' => (int)$request->id_usuarioE
         ]);

        $titulo = "USUARIOS Y ADMINISTRADORES";
        $sucursales = \DB::select('call mostrar_sucursal'); 
        $usuarios = \DB::select('call mostrar_usuarios');   
        
        return REDIRECT('usuarios')->with('sucursales',$sucursales)->with('titulo',$titulo)->with('usuarios',$usuarios);
    }






}
