<!-- LO QUE SE MUESTRA EN LA PESTANIA DEL NAVEGADOR -->
<title>Plasencia inventario móvil</title>
<link rel="shortcat icon" href="{{ URL::asset('favicon.ico') }}">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">


<!-- Bootstrap CSS CDN -->
<link rel="stylesheet"
    href="{{ URL::asset('https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css') }}"
    integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<!-- Our Custom CSS -->
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-selection {
  height: 50px !important;

}
  </style>





<div class="wrapper">

    <nav id="sidebar" style="background:black;">


        <div style="position: fixed;  width:250px;">

            <div class="sidebar-header" style="text-align:center;background:black;">
                <img src="{{ URL::asset('plasenciadorado2.png') }}" style="width: 150px;height:112px;">
                <button style="width:35px;height:35px;border-radius:20px;position:fixed;top:20px;left:20px;background:#b38d1d;"  data-toggle="modal" data-target="#modal_infousuario" >
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
 </button>
            </div>

            <ul class="list-unstyled components" style="background:black;">
                <li><a class="nav-link" id="moldes" href="/moldesprincipal">Moldes</a></li>


                <?php if ( auth()->user()->id_planta == 0 ): ?>
                <li><a class="nav-link" id="usuarios" href="/usuarios">Usuarios</a></li>
                <?php endif; ?>


                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
            </ul>
        </div>


        <div style="position: fixed; bottom: 0px; width:250px;background:black;">
            <ul class="list-unstyled CTAs " style="background:black;">
                <li><a data-toggle="modal" data-target="#modal_acercade" class="download">Acerca de</a></li>
                <li><a href="/ayuda" class="download" style="background:#b38d1d;">Ayuda</a></li>
            </ul>
        </div>

    </nav>



    <div id="content" style="background: url('fondoperron.png') center center no-repeat;
    background-size:100% 100%;">



        <nav class="navbar navbar-expand-lg navbar-light bg2 ">
            <div class="container-fluid">


                <button type="button" id="sidebarCollapse" class="navbar-btn " aria-label="Toggle navigation" style="font-size:20px">
                    <span>
<strong>
                    <svg style= "  margin-top:10px ;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
</svg>Menú</strong></span>
                </button>



                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                    <span></span>
                </button>


                <div class=" titulo mr-auto2">
                    <span style="margin-left:5px;">Contenido: <?php echo $titulo?></span>
                </div>



                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto navbar-btn" >

                        <li class="nav-item">
                            <form action="" method="Post">


                            <?php   if(count($notificaciones) === 0 || auth()->user()->id_planta == 0){
                                echo'<a class="nav-link"  id = "mo"  name="mo"data-toggle="modal" data-target="" onclick= "abrir()" style="position: static;">';


                                echo '  <div>';

                              echo ' <span display="none" id="notificacion" name="notificacion" hidden class="blue" >';
                              echo count($notificaciones);
                              echo ' </span>';


                                echo '  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"';
                                echo  '    class="bi bi-bell-fill , dropdown-toggle" style= "  margin-top:10px ;" ;" viewBox="0 0 16 16">';
                                echo   '   <path';
                                echo    '       d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />';
                                echo     '</svg>';


                              echo '  </div>';




                              echo '<script>document.formulario_noti.action = ""</script> ';
                              echo '<script>event.preventDefault()</script> ';

                              echo'</a>';
                            }else{
                                echo'<a class="nav-link"  id = "mo"  name="mo"data-toggle="modal" data-target="#modal_lista" onclick= "abrir()"    >';
                                echo '  <svg xmlns="http://www.w3.org/2000/svg" width="25" style=" margin-top:10px ;"  height="25" fill="currentColor"';
                                echo  '    class="bi bi-bell-fill, dropdown-toggle" viewBox="0 0 16 16">';
                                echo   '   <path';
                                echo    '       d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />';
                                echo     '</svg>';


                                echo ' <span display="none" id="notificacion" name="notificacion" class="blue">';
                                echo count($notificaciones);
                                echo '</span>';
                                echo '<script>document.formulario_noti.action = "/notificaciones"</script> ';
                                echo  '<script>document.getElementBy("mo").data-target="#modal_lista"</script> ';

                                echo'</a>';

                            }
                               ?>


                             </form>

                        </li>


                        <li class="nav-item">
                            <a class="nav-link" onclick="javascript:window.history.back();" autofocus>
                                <svg xmlns="http://www.w3.org/2000/svg" style=" margin-top:10px ;" width="25" height="25" fill="currentColor"
                                    class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                                </svg>
                            </a>
                        </li>


                        <li class="nav-item active">
                            <a class="nav-link" href="/">
                                <svg xmlns="http://www.w3.org/2000/svg"  style=" margin-top:10px ;" width="25" height="25" fill="currentColor"
                                    class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z" />
                                </svg>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" data-target="#modal_cerrarsesion">
                                <svg xmlns="http://www.w3.org/2000/svg" style= "margin-top:10px ;" width="25" height="25" fill="currentColor"
                                    class="bi bi-power" viewBox="0 0 16 16">
                                    <path d="M7.5 1v7h1V1h-1z" />
                                    <path
                                        d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
                                </svg>
                            </a>

                        </li>

                    </ul>
                </div>


            </div>
        </nav>

        <script>
function abrir(){

    event.preventDefault();
}



</script>



        <!-- INICIO MODAL lista -->
        <script>
            $('#texto_lista').click(function () {
                notificaciones();
                return false;
            });
        </script>

        <div class="moda " id="modal_lista" name = "modal_lista">

            <div hidden>{{$id_molde_basico=0}}</div>

            <div class="modal-dia ">
                <div class="modal-con">
                    <div class="modal-header" id="color_modal" style="background:white;">
                        <h5 class="modal-title" id="staticBackdropLabel" > <strong>Notificaciones</strong></h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div>
                        <form action="" methodo="POST" name="formulario_noti" id="formulario_noti">

                            <input id="id_notificacion" name="id_notificacion" value="" hidden> </input>
                            <input id="tipo_noti" name="tipo_noti" value="" hidden> </input>
                            <input id="para_noti" name="para_noti" value="" hidden> </input>
                            <input id="local" name="local" value="" hidden> </input>
                            <input id="id_planta" name="id_planta" value="" hidden> </input>


                            <ol id="ul_notificacion">
                                @foreach($notificaciones as $notificacion)
                                <li style="color:black"><button class="texto_lista"
                                        onclick="notificaciones({{ $notificacion->id_notificacion}})">
                                        {{$notificacion-> descripcion}}</button></li>
                                @endforeach
                            </ol>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>


        </div>

        <script type="text/javascript">
            function notificaciones(id) {

                var id_noti = document.getElementById('id_notificacion').value;

                var notificaciones = '<?php echo json_encode($notificaciones);?>';

                var notificacion = JSON.parse(notificaciones);

                var tipo;
                var empresa;
                var id_planta;

                for (var i = 0; i < notificacion.length; i++) {

                    if (notificacion[i].id_notificacion === id) {


                        document.formulario_noti.id_notificacion.value = notificacion[i].id_notificacion;
                        document.formulario_noti.tipo_noti.value = notificacion[i].tipo;
                        document.formulario_noti.para_noti.value = notificacion[i].para;
                        document.formulario_noti.id_planta.value = notificacion[i].id_planta;


                        id_notif = notificacion[i].id_notificacion;

                        tipo = notificacion[i].tipo;
                        empresa = notificacion[i].para;
                    }


                }




                if (tipo === "solicitud" && empresa === "3") {
                    document.formulario_noti.action = '../notificaciones_actualizar';
                    document.formulario_noti.id_notificacion.value = id_notif;
                    document.formulario_noti.tipo_noti.value = tipo;
                    document.formulario_noti.para_noti.value = empresa;


                } else
                if (tipo === "envio" && empresa === "3") {
                    document.formulario_noti.action = '../notificaciones_actualizar';
                    document.formulario_noti.id_notificacion.value = id_notif;
                    document.formulario_noti.tipo_noti.value = tipo;
                    document.formulario_noti.para_noti.value = empresa;



                } else
                if (tipo === "confirmacion" && empresa === "3") {
                    var localizacion = window.location.href;
                    document.formulario_noti.id_notificacion.value = id_notif;
                    document.formulario_noti.local.value = localizacion;


                    document.formulario_noti.action = '../noti';
                } else
                if (tipo === "solicitud" && empresa === "1") {
                    document.formulario_noti.action = '../notificaciones_actualizar';
                    document.formulario_noti.id_notificacion.value = id_notif;
                    document.formulario_noti.tipo_noti.value = tipo;
                    document.formulario_noti.para_noti.value = empresa;


                } else
                if (tipo === "envio" && empresa === "1") {
                    document.formulario_noti.action = '../notificaciones_actualizar';
                    document.formulario_noti.id_notificacion.value = id_notif;
                    document.formulario_noti.tipo_noti.value = tipo;
                    document.formulario_noti.para_noti.value = empresa;



                } else
                if (tipo === "confirmacion" && empresa === "1") {
                    var localizacion = window.location.href;
                    document.formulario_noti.id_notificacion.value = id_notif;
                    document.formulario_noti.local.value = localizacion;


                    document.formulario_noti.action = '../noti';


                } else
                if (tipo === "solicitud" && empresa === "2") {
                    document.formulario_noti.action = '../notificaciones_actualizar';
                    document.formulario_noti.id_notificacion.value = id_notif;
                    document.formulario_noti.tipo_noti.value = tipo;
                    document.formulario_noti.para_noti.value = empresa;


                } else
                if (tipo === "envio" && empresa === "2") {
                    document.formulario_noti.action = '../notificaciones_actualizar';
                    document.formulario_noti.id_notificacion.value = id_notif;
                    document.formulario_noti.tipo_noti.value = tipo;
                    document.formulario_noti.para_noti.value = empresa;



                } else
                if (tipo === "confirmacion" && empresa === "2") {
                    var localizacion = window.location.href;
                    document.formulario_noti.id_notificacion.value = id_notif;
                    document.formulario_noti.local.value = localizacion;


                    document.formulario_noti.action = '../noti';


                }else
                if (tipo === "solicitud" && empresa === "4") {
                    document.formulario_noti.action = '../notificaciones_actualizar';
                    document.formulario_noti.id_notificacion.value = id_notif;
                    document.formulario_noti.tipo_noti.value = tipo;
                    document.formulario_noti.para_noti.value = empresa;


                } else
                if (tipo === "envio" && empresa === "4") {
                    document.formulario_noti.action = '../notificaciones_actualizar';
                    document.formulario_noti.id_notificacion.value = id_notif;
                    document.formulario_noti.tipo_noti.value = tipo;
                    document.formulario_noti.para_noti.value = empresa;



                } else
                if (tipo === "confirmacion" && empresa === "4") {
                    var localizacion = window.location.href;
                    document.formulario_noti.id_notificacion.value = id_notif;
                    document.formulario_noti.local.value = localizacion;


                    document.formulario_noti.action = '../noti';


                }




                document.formulario_noti.addEventListener('submit', function (event) {});
            }
        </script>

        <!-- INICIO MODAL CERRAR SESION -->
        <div class="modal fade" id="modal_cerrarsesion" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true" style="opacity:.9;background:#212529;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Cerrar Sesión</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Estás seguro que quieres salir de la aplicación?
                    </div>
                    <div class="modal-footer">
                        <button style=" background: #b39f64; color: #ecedf1;" type="button" class=" btn-info-claro "
                            data-dismiss="modal">
                            <span>Cancelar</span>
                        </button>

                        <button type="button" class=" btn-info " href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                         Cerrar
                        </button>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN MODAL CERRAR SESION -->


        <!-- INICIO INFORMACION USUARRIO -->






        <div class="modausuario " id="modal_infousuario">
            <div class=" modal-d">
                <div class="modal-con2">
                    <div class="modal-header">
                        <h5 class="modal-title" style= "background-color: #ffffff; font-size:14px;  width : 395px; text-align:center;" id="staticBackdropLabel"><strong> Usuario: {{auth()->user()->name}}</strong> </h5>
                    </div>
                    <div  style= "background: rgb(43, 43, 43); font-size:12px; text-align:center;" class="modal-body" >
                      <p ><button  style=" text-align: justify; background-color: #000000; text-align:center; width : 395px; color:ffffff;  border-radius: .4em; margin: -0.7px 0.6em -0.5em -0.5em;"> Email: {{auth()->user()->email}}</button></p>
                      <p > <button style=" text-align: justify; background-color: #000000;   text-align:center; width : 395px; color:ffffff;   border-radius: .4em;  margin: -0.7px 0.6em -0.5em -0.5em; ">Código: {{auth()->user()->codigo}} </button></p>
                      <?php if(auth()->user()->id_planta === 0):?>
                       <p ><button style=" text-align: justify; background-color: #000000; text-align:center;  width : 395px; color:ffffff;  border-radius: .4em;   margin:-0.7px 0.6em -1em -0.5em;"> Sucursal: Todas las Sucursales</button></p>
                      <?php elseif(auth()->user()->id_planta === 1):?>
                       <p ><button style=" text-align: justify; background-color: #000000; text-align:center; width : 395px; color:ffffff;   border-radius: .4em;  margin: -0.7px 0.6em -1em -0.5em;"> Sucursal: Paraíso Cigars  </button></p>
                      <?php elseif(auth()->user()->id_planta === 2):?>
                       <p > <button style=" text-align: justify; background-color: #000000; text-align:center;  width : 395px; color:ffffff;  border-radius: .4em; margin:-0.7px 0.6em -1em -0.5em; ">>Sucursal: Morocelí </button> </p>
                      <?php elseif(auth()->user()->id_planta === 3):?>
                       <p ><button style=" text-align: justify; background-color: #000000;  text-align:center; width : 395px; color:ffffff;   border-radius: .4em; margin: -0.7px 0.6em -1em -0.5em;" > Sucursal: San Marcos </button> </p>
                      <?php elseif(auth()->user()->id_planta === 4):?>
                       <p > <button style=" text-align: justify; background-color: #000000; text-align:center;  width : 395px; color:ffffff;  border-radius: .4em;  margin:-0.7px 0.6em -1em -0.5em; ">Sucursal: Gualiqueme</button></p>
                      <?php endif ?>

                    </div>

                </div>
            </div>
        </div>
        <!-- FIN MODAL CERRAR SESION -->





        <!-- INICIO MODAL ACERCA_DE -->

        <div class="modal fade " id="modal_acercade" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true" style="opacity:.9;background:#212529;">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                            class="bi bi-info-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                        </svg>
                        <h5 class="modal-title" id="staticBackdropLabel">Inventario Movil Plasencia</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <!-- Card que es? -->
                        <div class="card border-light mb-7" style="max-width: 30rem;">
                            <b>
                                <div class="card-header"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-shield-fill-exclamation" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm-.55 8.502L7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0zM8.002 12a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                                    </svg> ¿Qué es Inventario Móvil Plasencia?</div>
                            </b>
                            <div class="card-body">

                                Es un Sistema dedicado al ingreso, manejo y visualización del inventario de la empresa,
                                en el cual podrás realizar busquedas
                                de información de acuerdo a tus necesidades.
                            </div>
                        </div>
                        <!-- Card  eficiencia -->
                        <div class="card border-light mb-7" style="max-width: 30rem;">
                            <b>
                                <div class="card-header"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-shield-fill-check" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm2.146 5.146a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647z" />
                                    </svg> Eficiencia & Accesibilidad</div>
                            </b>
                            <div class="card-body">
                                Es la manera más eficiente y productiva de interactuar con tu trabajo; ya que gracias a
                                él, podrás acceder y visualizar
                                la información que necesites en cualquier lugar con acceso a internet. Además, está
                                diseñado para que trabajes en conjunto
                                con tu ente corporativo.
                            </div>
                        </div>

                        <!-- Card  Seguridad -->
                        <div class="card border-light mb-7" style="max-width: 30rem;">
                            <b>
                                <div class="card-header"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5z" />
                                    </svg> Seguridad</div>


                            </b>
                            <div class="card-body">

                                La estructura con la que te encontraras es Segura y Confiable, ya que la información a
                                la cual tendrás acceso esta completamente
                                restringida para cada una de las sucursales y usuarios.
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button style=" background: #b39f64; color: #ecedf1;" type="button" class=" btn-info-claro "
                            data-dismiss="modal">
                            <span>Entendido</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {

            $(".select_search").select2({
            dropdownParent: $("#modal_enviarmoldes_paraiso")
        });



});

            </script>
        <!-- FIN MODAL CERRAR SESION -->

        @yield('content')





    </div>
    <!--  FIN DEL CONTENT -->



    <!-- Font Awesome JS -->

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
    <!-- CIERRA LA BARRA LATERAL -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>












    <!-- <datalist id="prediccionvitola">
                <option value="70x7-1/2">
                <option value="68x7-1/4">
                <option value="62x8">
                <option value="60x7-1/2">
                <option value="60x7-1/4">
                <option value="60x7">
                <option value="60x6-1/2">
                <option value="60x6-3/4">
                <option value="58x7-1/2">
                <option value="58x7-3/4">
                <option value="56x5">
                <option value="54x9-1/2">
                <option value="54x9">
                <option value="54x8">
                <option value="54x7-1/4">
                <option value="54x7-1/2">
                <option value="54x6-1/2">
                <option value="54x36x7-1/4">
                <option value="54x36x7">
                <option value="54x36x5-1/2">
                <option value="54x6">
                <option value="52x9">
                <option value="52x8">
                <option value="52x7-1/2">
                <option value="52x7">
                <option value="52x6">
                <option value="52x6-1/2">
                <option value="52x6-1/4">
                <option value="52x7-1/2">
                <option value="50x8-1/2">
                <option value="50x8-3/4">
                <option value="50x8">
                <option value="50x7-1/2">
                <option value="50x7-1/4">
                <option value="50x7">
                <option value="50x6-1/2">
                <option value="50x6-1/4">
                <option value="49x7-1/2">
                <option value="49x46x4-1/2">
                <option value="48x8-1/4">
                <option value="48x8">
                <option value="48x7-1/2">
                <option value="48x7-1/4">
                <option value="48x7">
                <option value="48x6">
                <option value="48x5-1/2">
                <option value="46x7-1/2">
                <option value="46x6">
                <option value="46x5-1/2">
                <option value="45x5-1/4">
                <option value="44x7-1/2">
                <option value="45x5-1/4">
                <option value="44x5">
                <option value="43x7-1/4">
                <option value="43x6-1/4">
                <option value="42x7-1/2">
                <option value="40x6-1/2">
                <option value="39x5-1/2">
                <option value="38x7-1/4">
                <option value="38x5">
                <option value="36x7-1/2">
                <option value="36x7-1/4">
                <option value="36x7-1/2">
                <option value="31x5">
                <option value="30x5">
                <option value="28x5">
                <option value="26x5">
                <option value="22x6-1/4">
                <option value="22x4">
                <option value="20x4">
                </datalist> -->


    <!-- <datalist id="prediccionfiguraytipo">
                <option value="Cabeza normal">
                <option value="Torpedo">
                <option value="Figurado">
                <option value="Piramide">
                <option value="Cabeza normalplatico">
                <option value="Cabeza normal plástico">
                <option value="Torpedo Habano">
                <option value="Short Story">
                <option value="Misiles">
                <option value="Punta lápiz">
                <option value="Cabeza normal M">
                <option value="Bering">
                </datalist> -->
