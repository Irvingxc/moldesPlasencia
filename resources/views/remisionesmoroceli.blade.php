@extends('principal')


@section('content')

<!-- Libreria de las alertas -->
<script src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js') }}"></script>
<link rel="stylesheet"
    href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css') }}">


<!-- para saber la fecha -->
<script src="https://momentjs.com/downloads/moment.js"></script>




<head>

<body>

    <!-- INICIO DEL TABLA REMISIONES PARAISO -->


    <nav class="navbar navbar-expand-lg navbar-light bg2">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">




                <ul class="navbar-nav nav ">
                    <li class="nav-item active">
                        <a style="background:#b38d1d;" class="nav-link  mr-sm-2 download" onclick="enviadas()"
                            id="a_enviadas">Enviadas</a>
                    </li>
                    <li class="nav-item">
                        <a style="background:#b39f64;" class="nav-link mr-sm-2  download" onclick="recibidas()"
                            id="a_recibidas">Recibidas</a>
                    </li>
                    <li class="nav-item">
                        <a style="background:#b39f64;" class="nav-link mr-sm-2  download" data-toggle="modal"
                            data-target="#modal_enviarmoldes_paraiso">Enviar Moldes</a>
                    </li>
                    <li class="nav-item">
                        <a style="background:#b39f64;" class="nav-link mr-sm-2  download " data-toggle="modal"
                            data-target="#modal_solicitarmoldes_paraiso">Solicitud de Moldes</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <script type="text/javascript">
        function enviadas() {
            var tablaenviadas = document.getElementById("tablaenviadas");
            var tablarecibidas = document.getElementById("tablarecibidas");
            var a_enviadas = document.getElementById("a_enviadas");
            var a_recibidas = document.getElementById("a_recibidas");

            tablaenviadas.style.display = 'inline-table';
            tablarecibidas.style.display = 'none';
            a_enviadas.style.background = '#b38d1d';
            a_recibidas.style.background = '#b39f64';


            document.formulario_enviadas.action = '/buscar_remision_moroceli/2'
            document.formulario_imprimir.action = '/buscar_remision_imprimir_enviadasmoroceli'

        }


        function recibidas() {
            var tablaenviadas = document.getElementById("tablaenviadas");
            var tablarecibidas = document.getElementById("tablarecibidas");
            var a_enviadas = document.getElementById("a_enviadas");
            var a_recibidas = document.getElementById("a_recibidas");
            tablaenviadas.style.display = 'none';
            tablarecibidas.style.display = 'inline-table';
            a_enviadas.style.background = '#b39f64';
            a_recibidas.style.background = '#b38d1d';

            document.formulario_enviadas.action = '/buscar_remision_re_moroceli/2'
            document.formulario_imprimir.action = '/buscar_remision_imprimir_recibidasmoroceli'

        }
    </script>






    <div class="col form-inline">

        <form action="{{Route('buscar_remision_moroceli',2)}}" method="POST" class="form-inline"
            name="formulario_enviadas" id="formulario_enviadas">
            @csrf
            <input type="text" name="id_planta_remision" value="2" hidden>

            <div class="input-group ">
                <span class="input-group-text">De</span>
                <input type="date" value="" onKeyDown="copiar('fecha_inicio','fechainicio');" name="fecha_inicio"
                    id="fecha_inicio" style="width:150px;" class="form-control" placeholder="Fecha inicio"
                    onchange="obtenerFechaInicio(this)">
                <span class="input-group-text">hasta</span>
                <input type="date" value="" onKeyDown="copiar('fecha_fin','fechafin');" name="fecha_fin" id="fecha_fin"
                    style="width:150px;" class="form-control mr-sm-2" placeholder="Fecha final"
                    onchange="obtenerFechaFin(this)">
            </div>

            <button class="btn-info" type="submit">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </span>
            </button>
        </form>



        <form action="" method="POST" name="formulario_imprimir" id="formulario_imprimir " class=" form-inline">

            @csrf
            <input name="fechainicio" id="fechainicio" hidden value={{$fechai}}>
            <input name="fechafin" id="fechafin" hidden value={{$fechaf}}>

            <button type="submit" class=" btn-info float-right " style="margin-left: 5px; margin-bottom: 0px;">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-printer" viewBox="0 0 16 16">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                        <path
                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                    </svg>
                </span>
            </button>

            <input type="text" name="id_planta_re" id="id_planta_re" value="2" hidden>

            <input type="text" name="nombre_fa" id="nombre_fa" value="Moroceli" hidden>



        </form>

        <script type="text/javascript">
            function obtenerFechaInicio(e) {
                var fecha = moment(e.value);
                console.log("Fecha original:" + e.value);
            }

            function obtenerFechaFin(e) {
                var fecha = moment(e.value);
                console.log("Fecha original:" + e.value);
            }
        </script>



        <table class="table table-striped table-secondary table-bordered border-primary " id="tablaenviadas">
            <thead class="table-dark">
                <tr>
                    <th style='text-align: center;' scope="col">Fecha</th>
                    <th style='text-align: center;' scope="col">Para</th>
                    <th style='text-align: center;' scope="col">Estado</th>
                    <th style='text-align: center;' scope="col">Tipo de molde</th>
                    <th style='text-align: center;  width:80px;' scope="col">Cantidad</th>

            </thead>
            <tbody>

                @foreach($remisionesenviadas as $remision)
                <tr>
                    <td>{{$remision->fecha}}</td>
                    <td>{{$remision->nombre_fabrica}}</td>
                    <td>{{$remision->estado_moldes}}</td>
                    <td>{{$remision->tipo_moldes}}</td>
                    <td style="text-align:right; font:bold; width:80px;"><strong>{{$remision->cantidad}}</strong></td>

                </tr>

                @endforeach


            <tbody>
        </table>
        <!-- FIN DEL TABLA REMISIONES PARAISO -->




        <table class="table table-striped table-secondary table-bordered border-primary " id="tablarecibidas"
            style="display:none;">
            <thead class="table-dark">
                <tr>
                    <th style='text-align: center;' scope="col">Fecha</th>
                    <th style='text-align: center;' scope="col">De</th>
                    <th style='text-align: center;' scope="col">Estado</th>
                    <th style='text-align: center;' scope="col">Tipo de molde</th>
                    <th style='text-align: center;  width:80px;' scope="col">Cantidad</th>
                    <th style='text-align: center;' scope="col">Confirmar</th>
                </tr>
            </thead>
            <tbody>

                @foreach($remisionesrecibidas as $remision)
                <?php if ($remision->chequear == 0): ?>

                <tr>

                <tr>
                    <td>{{$remision->fecha}}</td>
                    <td>{{$remision->nombre_planta}}</td>
                    <td>{{$remision->estado_moldes}}</td>
                    <td>{{$remision->tipo_moldes}}</td>
                    <td style="text-align:right; font:bold; width:80px;"><strong>{{$remision->cantidad}}</strong></td>
                    <td class="table-warning" style="padding:0px; text-align:center;   vertical-align: inherit;">
                        <a data-toggle="modal" data-target="#modal_confirmar_remision"
                            onclick="datos_remisiones({{ $id_remision_basico = $remision->id_remision }})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="black"
                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                            </svg>
                        </a>
                    </td>

                </tr>

                <?php else:; ?>

                <tr>
                    <td>{{$remision->fecha}}</td>
                    <td>{{$remision->nombre_planta}}</td>
                    <td>{{$remision->estado_moldes}}</td>
                    <td>{{$remision->tipo_moldes}}</td>
                    <td style="text-align:right; font:bold; width:80px;"><strong>{{$remision->cantidad}}</strong></td>
                    <td style="text-align:center;" class="table-success"> Chequeado</td>

                </tr>


                <?php endif; ?>
                @endforeach



            <tbody>
        </table>
        <!-- FIN DEL TABLA REMISIONES PARAISO -->



        <script type="text/javascript">
            function datos_remisiones(id) {
                var datas = '<?php echo json_encode($remisionesrecibidas);?>';
                console.info(datas);
                var data = JSON.parse(datas);




                var datas_re = '<?php echo json_encode($remisionesrecibidas);?>';
                console.info(datas_re);
                var data_remi = JSON.parse(datas_re);



                for (var i = 0; i < data_remi.length; i++) {
                    if (data_remi[i].id_remision === id) {
                        document.formulario_mostrar.nombre_recibido.value = data_remi[i].nombre_planta;

                    }

                }


                if (document.getElementById('nombre_recibido').value === "San Marcos") {

                    document.formulario_mostrar.id_otra.value = "3";
                } else if (document.getElementById('nombre_recibido').value === "Paraíso Cigar") {

                    document.formulario_mostrar.id_otra.value = "1";
                } else
                if (document.getElementById('nombre_recibido').value === "Gualiqueme") {


                    document.formulario_mostrar.id_otra.value = "4";
                }

                var datas_id = '<?php echo json_encode($moldes);?>';
                console.info(datas_id);
                var data_i = JSON.parse(datas_id);


                for (var i = 0; i < data_i.length; i++) {
                    if (data_i[i].fivi === document.getElementById('id_tipo').value) {
                        document.formulario_mostrar.id_molde.value = data_i[i].id_molde;

                    }

                }
                for (var i = 0; i < data.length; i++) {
                    if (data[i].id_remision === id) {
                        document.formulario_mostrar.txt_id_remision.value = data[i].id_remision;
                        document.formulario_mostrar.txt_id_planta.value = data[i].id_planta;
                        document.formulario_mostrar.txt_nombre_fabrica.value = data[i].nombre_fabrica;
                        document.formulario_mostrar.txt_estado_moldes.value = data[i].estado_moldes;
                        document.formulario_mostrar.txt_tipo_moldes.value = data[i].tipo_moldes;
                        document.formulario_mostrar.cantidad.value = data[i].cantidad;
                        document.formulario_mostrar.txt_chequear.value = data[i].chequear;
                    }

                }



            }
        </script>



        <!-- INICIO MODAL CHEQUEAR REMISION -->
        <form id="formulario_mostrar" name="formulario_mostrar" action="{{Route('actualizarremision_moroceli',2)}}"
            method="POST">

            @csrf

            <div hidden>{{$id_remision_basico=0}}</div>

            <input name="id_usuarioE" id="id_usuarioE" value="" hidden />

            <div class="modal fade" id="modal_confirmar_remision" data-backdrop="static" data-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"
                style="opacity:.9;background:#212529;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Confirmación de Remisión</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input name="txt_id_remision" id="txt_id_remision" value="" hidden />
                            <input name="txt_id_planta" id="txt_id_planta" value="" hidden />
                            <input name="txt_nombre_fabrica" id="txt_nombre_fabrica" value="" hidden />
                            <input name="txt_estado_moldes" id="txt_estado_moldes" value="" hidden />
                            <input name="txt_tipo_moldes" id="txt_tipo_moldes" value="" hidden />
                            <input name="txt_chequear" id="txt_chequear" value="" hidden />
                            <input name="cantidad" id="cantidad" value="" hidden />
                            <input name="id_molde" id="id_molde" value="" hidden />
                            <input name="nombre_recibido" id="nombre_recibido" value="" hidden />
                            <input name="tipo_notificacion" id="tipo_notificacion" value="confirmacion" hidden />
                            <input name="id_planta" id="id_planta" value="2" hidden />
                            <input name="activo" id="activo" value="0" hidden />
                            <input name="id_otra_planta" id="id_otra_planta" value="" hidden />
                            <input name="id_otra" id="id_otra" value="" hidden />

                            ¿Estás seguro que la transacción coincide con la remisión?
                        </div>
                        <div class="modal-footer">
                            <button style=" background: #b39f64; color: #ecedf1;" type="button" class=" btn-info-claro "
                                data-dismiss="modal">
                                <span>Cancelar</span>
                            </button>
                            <button type="submit" class=" btn-info ">
                                <span>Confirmar</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <!-- FIN MODAL CHEQUEAR REMISION -->






        <!-- INICIO DEL MODAL SOLICITAR MOLDES -->
        <form action="{{Route('insertar_solicitud_moroceli')}}" method="POST">
            @csrf
            <div class="modal fade" role="dialog" id="modal_solicitarmoldes_paraiso" data-backdrop="static"
                data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"
                style="opacity:.9;background:#212529;width=800px;">
                <div class="modal-dialog modal-dialog-centered modal-xl"
                    style="opacity:.9;background:#212529;width=80%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel"
                                style="width:1100px; text-align:center; font-size:25px;">Solicitud de moldes</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>


                        <div class="modal-body">
                            <div class="card-body">



                                <div class="row">


                                    <div class="mb-5 col">

                                        <input name="id_planta_notificaciones" id="id_planta_notificaciones" value="2"
                                            style="display:none">
                                        <input name="chequear_notificaciones" id="chequear_notificaciones" value="0"
                                            style="display:none">
                                        <input name="tipo_notificacion" id="tipo_notificacion" value="solicitud"
                                            style="display:none">
                                        <input name="nombreplanta_notificacion" id="nombreplanta_notificacion"
                                            value="Morocelí" style="display:none">

                                        <label for="txt_sucursales" class="form-label"
                                            style="width:180px; text-align:center; font-size:20px;">Para</label>
                                        <select class="form-control" id="planta_notificacion" name="planta_notificacion"
                                            onchange="showDiv('hidden_div', this)" placeholder="Selecciona la sucursal"
                                            required
                                            style="width:180px; text-align:center; height: 50px; text-align:center; font-size:18px;">


                                            <option value="1" style=" text-align:center; font-size:16px;">Paraíso Cigar
                                            </option>
                                            <option value="3" style=" text-align:center; font-size:16px;">San
                                                Marcos</option>
                                            <option value="4" style=" text-align:center; font-size:16px;">
                                                Gualiqueme</option>
                                        </select>
                                    </div>

                                    <div class="mb-5 col">
                                        <label for="txt_estado" class="form-label"
                                            style="width:180px; text-align:center; font-size:20px;">Figura y
                                            tipo</label>
                                        <input class="form-control" id="figura_notificacion" name="figura_notificacion"
                                            autocomplete="off" placeholder="Ingrese la Figura y tipo" required
                                            style="width:180px; text-align:center; height: 50px; text-align:center; font-size:18px;">
                                        </input>
                                    </div>

                                    <div class="mb-5 col">
                                        <label for="id_tipo" class="form-label"
                                            style="width:180px; text-align:center; font-size:20px;">Vitola</label>
                                        <input class="form-control" id="vitola_notificacion" name="vitola_notificacion"
                                            autocomplete="off" placeholder="Ingrese la Vitola" required
                                            style="width:180px; text-align:center; height: 50px; text-align:center; font-size:18px;">

                                        </input>
                                    </div>




                                    <div class="mb-5 col">
                                        <label for="txt_cantidad" class="form-label"
                                            style="width:180px; text-align:center; font-size:20px;">Cantidad</label>
                                        <input class="form-control" type="number" id="cantidad_notificacion"
                                            style="width:180px; text-align:center; height: 50px; text-align:center; font-size:18px;"
                                            name="cantidad_notificacion" placeholder="Ingresa la cantidad" minLength="1"
                                            maxLength="10" required>
                                    </div>


                                </div>

                            </div>
                        </div>

                        <div class="modal-footer">
                            <button style=" background: #b39f64; color: #ecedf1;" type="button" class=" btn-info-claro "
                                data-dismiss="modal">
                                <span>Cancelar</span>
                            </button>
                            <button class=" btn-info " onclick="agregarremision()">
                                <span>Guardar</span>
                            </button>


                        </div>
                    </div>
                </div>
            </div>

        </form>







        <!-- INICIO DEL MODAL ENVIAR MOLDES -->
        <form action="{{Route('insertarremisiones_moroceli',2)}}" method="POST" id="FormRemisiones"
            name="FormRemisiones">
            @csrf
            <div class="modal fade" role="dialog" id="modal_enviarmoldes_paraiso" data-backdrop="static"
                data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"
                style="opacity:.9;background:#212529;width=800px;">
                <div class="modal-dialog modal-dialog-centered modal-xl"
                    style="opacity:.9;background:#212529;width=80%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel"
                                style="width:1100px; text-align:center; font-size:25px;">Enviar moldes</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="card-body">



                                <div class="row">


                                    <div class="mb-5 col">

                                        <input name="id_planta" id="id_planta" value="2" style="display:none">
                                        <input name="chequear" id="chequear" value="0" style="display:none">

                                        <input name="activo" id="activo" value="0" style="display:none">
                                        <input name="id_otra_plan" id="id_otra_plan" value="" style="display:none">



                                        <label for="txt_sucursales" class="form-label"
                                            style="width:180px; text-align:center; font-size:20px;">Para</label>
                                        <select class="form-control" id="txt_sucursales" name="txt_sucursales"
                                            onchange="showDiv('hidden_div', this)" placeholder="Selecciona la sucursal"
                                            required
                                            style="width:180px; text-align:center; height: 50px; text-align:center; font-size:18px;">


                                            <option value="Paraíso Cigar" style=" text-align:center; font-size:16px;">Paraíso Cigar</option>
                                            <option value="San Marcos" style=" text-align:center; font-size:16px;">San
                                                Marcos</option>
                                            <option value="Gualiqueme" style=" text-align:center; font-size:16px;">
                                                Gualiqueme</option>
                                            <option value="5" style=" text-align:center; font-size:16px;">Otra Fabrica
                                            </option>
                                        </select>
                                    </div>




                                    <div class="mb-5 col" style="display:none;" id="hidden_div">
                                        <label for="txt_otra_fabrica" class="form-label"
                                            style="width:180px; text-align:center; font-size:20px;">Otra empresa</label>
                                        <input class="form-control" type="text" id="txt_otra_fabrica"
                                            style="width:180px; text-align:center; height: 50px; text-align:center; font-size:18px;"
                                            name="txt_otra_fabrica" placeholder="Ingresa el nombre" minLength="1"
                                            autocomplete="off">

                                    </div>

                                    <div class="mb-5 col">
                                        <label for="txt_estado" class="form-label"
                                            style="width:180px; text-align:center; font-size:20px;">Estado</label>
                                        <select class="form-control" id="txt_estado" name="txt_estado"
                                            style="width:180px; text-align:center; height: 50px; text-align:center; font-size:18px;"
                                            placeholder="Selecciona la sucursal" required>
                                            <option value="Buenos">Buenos</option>
                                            <!-- <option value="Irregulares">Irregulares</option> !-->
                                        </select>
                                    </div>

                                    <div class="mb-5 col">
                                        <label for="id_tipo" class="form-label"
                                            style="width:180px; text-align:center; font-size:20px;">Tipo moldes</label>
                                        <select class="form-control" id="id_tipo" name="id_tipo"
                                            style="width:180px; text-align:center; height: 50px; text-align:center; font-size:18px;"
                                            placeholder="Selecciona la sucursal" required>
                                            @foreach($moldes as $molde)
                                            <option value="{{$molde-> fivi}}">{{$molde-> fivi}}</option>
                                            @endforeach
                                        </select>
                                    </div>




                                    <div class="mb-5 col">
                                        <label for="txt_cantidad" class="form-label"
                                            style="width:180px; text-align:center; font-size:20px;">Cantidad</label>
                                        <input class="form-control" type="number" id="txt_cantidad"
                                            style="width:180px; text-align:center; height: 50px; text-align:center; font-size:18px;"
                                            name="txt_cantidad" placeholder="Ingresa la cantidad" minLength="1"
                                            maxLength="10" required>
                                    </div>


                                </div>

                            </div>
                        </div>

                        <div class="modal-footer">
                            <button style=" background: #b39f64; color: #ecedf1;" type="button" class=" btn-info-claro "
                                data-dismiss="modal">
                                <span>Cancelar</span>
                            </button>
                            <button class=" btn-info " onclick="agregarremision()">
                                <span>Guardar</span>
                            </button>


                        </div>
                    </div>
                </div>
            </div>

        </form>


        <script>
            function showDiv(divId, element) {
                document.getElementById(divId).style.display = element.value == 5 ? 'block' : 'none';
                document.getElementById(divId).value = element.value == 5 ? '1' : '2';
            }
        </script>




        <script>
            function agregarremision() {
                var empresa = document.getElementById('txt_otra_fabrica').value;
                var select = document.getElementById('txt_sucursales').value;

                var cantidad_input = document.getElementById('txt_cantidad').value;

                var theForm = document.forms['FormRemisiones'];
                var select_estado = document.getElementById('txt_estado').value;

                var bodegas = '<?php echo json_encode($bodega);?>';
                var bodega = JSON.parse(bodegas);
                var cantidad = 0;
                var cantidad_disponible = 0;
                var cantidad_bueno = 0;
                var cantidad_irregular = 0;





                if (document.getElementById('txt_sucursales').value === "San Marcos") {

                    document.FormRemisiones.id_otra_plan.value = "3";
                } else if (document.getElementById('txt_sucursales').value === "Gualiqueme") {

                    document.FormRemisiones.id_otra_plan.value = "4";
                } else if (document.getElementById('txt_sucursales').value === "Paraíso Cigar") {

                    document.FormRemisiones.id_otra_plan.value = "1";
                }else
                    if (document.getElementById('txt_sucursales').value === "5") {

                    document.FormRemisiones.id_otra_plan.value = "0";
                    }


                for (var i = 0; i < bodega.length; i++) {

                    if (bodega[i].fivi === document.getElementById('id_tipo').value) {
                        cantidad = bodega[i].bodega;
                        cantidad_bueno = bodega[i].bueno;
                        cantidad_disponible = bodega[i].moldesDisponibles;
                        cantidad_irregular = bodega[i].irregulares;
                    }
                }
                if (cantidad_input > cantidad) {
                    toastr.error(
                        'Esta cantidad supera a la de su inventario de la bodega, verifique la cantidad a enviar',
                        'ERROR', {
                            "progressBar": true,
                            "closeButton": false,
                            "preventDuplicates": true,
                            "preventOpenDuplicates": true
                        });
                    event.preventDefault();

                } else
                if (cantidad_input > cantidad_disponible && select_estado === "Buenos") {
                        toastr.error(
                            'Esta cantidad supera a la de su inventario de moldes, verifique la cantidad de moldes disponibles',
                            'ERROR', {
                                "progressBar": true,
                                "closeButton": false,
                                "preventDuplicates": true,
                                "preventOpenDuplicates": true
                            });
                        event.preventDefault();
                    }else
                if (cantidad_input > cantidad_bueno && select_estado === "Buenos") {
                    toastr.error(
                        'Esta cantidad supera a la de su inventario de moldes buenos, verifique la cantidad a enviar',
                        'ERROR', {
                            "progressBar": true,
                            "closeButton": false,
                            "preventDuplicates": true,
                            "preventOpenDuplicates": true
                        });
                    event.preventDefault();
                } else if (cantidad_input > cantidad_irregular && select_estado === "Irregulares") {
                    toastr.error(
                        'Esta cantidad supera a la de su inventario de los moldes irregulares, verifique la cantidad a enviar',
                        'ERROR', {
                            "progressBar": true,
                            "closeButton": false,
                            "preventDuplicates": true,
                            "preventOpenDuplicates": true
                        });
                    event.preventDefault();
                } else
                if (empresa == "" && select == "5") {
                    toastr.error('Ingresa el nombre de la empresa', 'ERROR', {
                        "progressBar": true,
                        "closeButton": false,
                        "preventDuplicates": true,
                        "preventOpenDuplicates": true
                    });
                    event.preventDefault();
                } else
                    theForm.addEventListener('submit', function (event) {});


            }
        </script>

        <script>
            var inicio = '<?php echo $abrir; ?>';
            if (inicio === "3") {
                enviadas();
            } else {
                recibidas();
            }
        </script>

        <!-- FIN DEL MODAL AGREGAR MOLDE-->

        <!-- Libreria picker -->
        <script src="@@path/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

        @endsection
