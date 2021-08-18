@extends('principal')


@section('content')

<!-- Libreria de las alertas -->
<script src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js') }}"></script>
<link rel="stylesheet"
    href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css') }}">


    <?php if ( auth()->user()->id_planta == 3 ||  auth()->user()->id_planta == 0): ?>
<div class="row">


    <div class="col form-inline">

        <form action="{{Route('id_planta_sanMarcos',3)}}" method="POST" class="form-inline">
            @csrf
            <input value="" onKeyDown="copiar('vitolabuscar','vitolaimprimir');" name="vitolabuscar" id="vitolabuscar"
                class="form-control mr-sm-2" placeholder="Vitola" style="width:150px;" autocomplete="off">
            <input value="" onKeyDown="copiar2('figurabuscar','figuraimprimir');" name="figurabuscar" id="figurabuscar"
                class="form-control mr-sm-2" placeholder="Figura y tipo" style="width:150px;" autocomplete="off">
            <input value="" onKeyDown="copiar3('materialbuscar','materialimprimir');" name="materialbuscar" id="materialbuscar"
                class="form-control mr-sm-2" placeholder="Material" style="width:150px;" autocomplete="off">
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

        <form action="{{Route('imprimirdatos_sanMarcos',3)}}" method="POST">
            @csrf
            <button type="submit" class=" btn-info float-right " style="margin-left: 5px; margin-bottom: 0px;">

                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-printer"
                    viewBox="0 0 16 16">
                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                    <path
                        d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                </svg>
            </button>
        </form>





    <div class="col">
        <button type="button" class=" btn-info float-right" data-toggle="modal" data-target="#modal_agregar_moldes">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path
                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
                Moldes</span>
        </button>

        @if(auth()->user()->id_planta==0)
        <button type="button" class=" btn-info float-right" data-toggle="modal" data-target="#modal_agregar_figuraytipo"
            style="margin-right: 10px">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path
                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
                Figura y tipo</span>
        </button>

        <button type="button" class=" btn-info float-right" data-toggle="modal" data-target="#modal_agregar_vitola"
            style="margin-right: 10px">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path
                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
                Vitola</span>
        </button>
        @endif


        <!-- SCRIPT COPIAR EL VALOR DE UN INPUT A OTRO PARA IMPRIMIR -->
        <script type="text/javascript">
            function copiar(vitolabuscar,
            ) {
                var vitolabuscar = document.getElementById(vitolabuscar).value;
                document.getElementById(vitolaimprimir).value = vitolabuscar;
            }

            function copiar2(figurabuscar, figuraimprimir) {
                var figurabuscar = document.getElementById(figurabuscar).value;
                document.getElementById(figuraimprimir).value = figurabuscar;
            }
            function copiar3(materialbuscar, materialimprimir) {
                var materialbuscar = document.getElementById(materialbuscar).value;
                document.getElementById(materialimprimir).value = materialbuscar;
            }
        </script> <!-- SCRIPT COPIAR EL VALOR DE UN INPUT A OTRO PARA IMPRIMIR -->




        <form action="{{Route('remisiones_sanMarcos',3)}}" method="POST">

            @csrf
            <button type="submit" class=" btn-info float-right" style="margin-right: 10px">
                <input name="id_planta" id="id_planta" value="3" style="display:none">

                <input name="nombre_planta" id="nombre_planta" value="San Marcos" style="display:none">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-plus-square" viewBox="0 0 16 16">
                        <path
                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                    <a>Remisiones</a></span>
            </button>
        </form>

        <script type="text/javascript">
            document.getElementById("vitolabuscar").addEventListener('keyup', autoCompleteNew);

            function autoCompleteNew(e) {
                var value = $(this).val();
                $("#vitolaimprimir").val(value.replace(/\s/g, ''));
            }
        </script>





    </div>
<?php endif; ?>

    <!-- INICIO DEL MODAL NUEVO MOLDE -->

    <form action="{{Route('insertar_moldes_sanMarcos',3)}}" method="POST" id="FormMoldes" name="FormMoldes">

        <div class="modal fade" role="dialog" id="modal_agregar_moldes" data-backdrop="static" data-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"
            style="opacity:.9;background:#212529;width=800px;">
            <div class="modal-dialog modal-dialog-centered modal-lg" style="opacity:.9;background:#212529;width=80%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Agregar Moldes</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="card-body">


                            <div class="row">

                                <div class="mb-3 col">
                                    <label for="txt_figuraytipo" class="form-label">Figura y tipo</label>
                                    <select class="form-control" style = "width:90%;"id="txt_figuraytipo" name="id_figura"
                                        placeholder="Ingresa figura y tipo" required>
                                        @foreach($figuras as $figura)
                                        <option> {{$figura-> nombre_figura}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 col">
                                    <label for="txt_vitola" class="form-label">Vitola</label>
                                    <select class="vitolas_search" style = "width:90%;" type="text" list="prediccionvitola" id="txt_vitola"
                                        name="id_vitola" placeholder="Ingresa la vitola" required>
                                        @foreach($vitolas as $vitola)
                                        <option>{{$vitola-> nombre_vitola}}</option>
                                        @endforeach

                                    </select>
                                </div>


                                <div class="mb-3 col">
                                    <label for="txt_vitola" class="form-label">Material</label>
                                    <select class="form-control" type="text" id="txt_material"
                                        name="id_material" placeholder="Ingresa el material" style="overflow-y: scroll;"required>
                                        @foreach($material as $material)
                                        <option style="overflow-y: scroll;" >{{$material-> material}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="mb-3 col">
                                    <label for="txt_total" class="form-label">Total</label>
                                    <input class="form-control" style = "width:90%;" id="txt_total" placeholder="Cantidad" name="total"
                                        required type="number" min="1" max="999999" minLength="1" maxLength="6"autocomplete="off">
                                </div>

                            </div>






                            <div class="row">

                                <div class="mb-3 col">
                                    <label for="txt_buenos" class="form-label">Buenos</label>
                                    <input class="form-control" id="txt_buenos" name="bueno" placeholder="Cantidad"
                                        type="number"autocomplete="off">
                                </div>
                                <!--
                                <div class="mb-3 col">
                                    <label for="txt_irregulares" class="form-label">Irregulares</label>
                                    <input class="form-control" id="txt_irregulares" name="irregulares"
                                        placeholder="Cantidad" type="number"autocomplete="off">
                                </div>
                                !-->
                                <div class="mb-3 col">
                                    <label for="txt_malos" class="form-label">Malos</label>
                                    <input class="form-control" id="txt_malos" name="malos" placeholder="Cantidad"
                                        type="number"autocomplete="off">
                                </div>

                            </div>


                            <div class="row">

                                <div class="mb-3 col">
                                    <label for="txt_salon" class="form-label">Salón</label>
                                    <input class="form-control" id="txt_salon" name="salon" placeholder="Cantidad"
                                        type="number"autocomplete="off">
                                </div>
                                <div class="mb-3 col">
                                    <label for="txt_bodega" class="form-label">Bodega</label>
                                    <input class="form-control" id="txt_bodega" name="bodega" placeholder="Cantidad"
                                        type="number"autocomplete="off">
                                </div>
                                <div class="mb-3 col">
                                    <label for="txt_reparacion" class="form-label">Reparación</label>
                                    <input class="form-control" id="txt_reparacion" name="reparacion"
                                        placeholder="Cantidad" type="number"autocomplete="off">
                                    <input name="id_plantamo" value='3' hidden />
                                    <input name="fivi" id="fivi" value="" hidden />

                                </div>

                            </div>



                        </div>
                    </div>

                    <div class="modal-footer">
                        <button style=" background: #b39f64; color: #ecedf1;" type="button" class=" btn-info-claro "
                            data-dismiss="modal">
                            <span>Cancelar</span>
                            @csrf
                        </button>
                        <button class=" btn-info " onclick="validar()">
                            <span>Guardar</span>
                        </button>


                    </div>
                </div>
            </div>
        </div>

    </form>
    <!-- FIN DEL MODAL NUEVO MOLDE -->





    <!-- INICIO MODAL VITOLA -->
    <form action="{{Route('insertar_vitola_sanMarcos',3)}}" method="POST" name="formvitola">
        <div class="modal fade" id="modal_agregar_vitola" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true" style="opacity:.9;background:#212529;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel" style="width:450px; text-align:center; font-size:20px;">Agregar Vitola</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 col">
                            <label for="txt_vitola" class="form-label" style="width:440px; text-align:center; font-size:20px;">Vitola</label>
                            <input class="form-control" id="vitola" type="text" name="vitola"
                                placeholder="Agregar vitola" maxLength="100"autocomplete="off"  style = "width: 440px">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button style=" background: #b39f64; color: #ecedf1;" type="button" class=" btn-info-claro "
                            data-dismiss="modal">
                            <span>Cancelar</span>
                        </button>
                        <button onclick="validar_vitola()" class=" btn-info float-right" style="margin-right: 10px">

                            <span>Guardar</span>
                        </button>
                        @csrf
                        <input name="id_plantamo" value='3' hidden />
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- FIN MODAL VITOLA -->



    <!-- INICIO MODAL FIGURA Y TIPO -->
    <form action="{{Route('insertar_figura_sanMarcos',3)}}" method="POST">
        <div class="modal fade" id="modal_agregar_figuraytipo" data-backdrop="static" data-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"
            style="opacity:.9;background:#212529;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel" style="width:450px; text-align:center; font-size:20px;">Agregar Figura y tipo</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 col">
                            <label for="txt_figuraytipo" class="form-label" style="width:440px; text-align:center; font-size:20px;">Figura y tipo</label>
                            <input class="form-control" id="figura" type="text" name="figura" placeholder="Agregar Figura y Tipo" style = "width: 440px"
                                maxLength="30"autocomplete="off" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button style=" background: #b39f64; color: #ecedf1;" type="button" class=" btn-info-claro "
                            data-dismiss="modal">
                            <span>Cancelar</span>
                        </button>
                        <button onclick="validar_figura()" class=" btn-info float-right" style="margin-right: 10px">
                            <span>Guardar</span>
                        </button>

                        @csrf
                        <input name="id_plantamo" value='3' hidden />
                    </div>
                </div>
            </div>
        </div>

    </form>
    <!-- FIN MODAL FIGURA Y TIPO -->


    <!-- INICIO DEL MODAL EDITAR MOLDE -->


    <form action="{{Route('actualizar_moldes_sanMarcos',3)}}" method="POST" name="formulario_actualizar">
        <?php use App\Http\Controllers\MoldesController; ?>

        <div hidden>{{$id_molde_basico=0}}</div>




        <div class="modal fade" id="modal_editar_moldes" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true" style="opacity:.9;background:#212529;width=800px;">
            <div class="modal-dialog modal-dialog-centered modal-xl" style="opacity:.9;background:#212529;width=80%">
                <div class="modal-content">
                    <div class="modal-header" id="titulo_figura" name="titulo_figura">

                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>



                    <div class="modal-body">
                        <div class="card-body">






                            <div class="row">

                                <div class="mb-3 col">
                                    <label for="txt_total" class="form-label" style= "width:125px; text-align:center;">Total</label>
                                    <input class="form-control" id="mo_total" placeholder="Cantidad" name="mo_total"style= "width:125px; text-align:right;"
                                        required type="number" min="1" max="999999" minLength="1" maxLength="6"autocomplete="off">
                                </div>

                                <div class="mb-3 col">
                                    <label for="txt_buenos" class="form-label" style= "width:125px; text-align:center;">Buenos</label>
                                    <input class="form-control" id="mo_bueno" name="mo_bueno" placeholder="Cantidad" style= "width:125px; text-align:right;"
                                        type="number" value=""autocomplete="off">
                                </div>
                                <div class="mb-3 col" hidden>
                                    <label for="txt_irregulares" class="form-label" style= "width:125px; text-align:center;"> Irregulares</label>
                                    <input class="form-control" id="mo_irregular" name="mo_irregular" style= "width:125px; text-align:right;"
                                        placeholder="Cantidad" type="number"autocomplete="off">
                                </div>
                                <div class="mb-3 col">
                                    <label for="txt_malos" class="form-label" style= "width:125px; text-align:center;">Malos</label>
                                    <input class="form-control" id="mo_malo" name="mo_malo" placeholder="Cantidad" style= "width:125px; text-align:right;"
                                        type="number"autocomplete="off">
                                </div>

                                <div class="mb-3 col">
                                    <label for="txt_salon" class="form-label" style= "width:125px; text-align:center;">Bodega</label>
                                    <input class="form-control" id="mo_bodega" name="mo_bodega" placeholder="Cantidad" style= "width:125px; text-align:right;"
                                        type="number"autocomplete="off">
                                </div>
                                <div class="mb-3 col">
                                    <label for="txt_bodega" class="form-label" style= "width:125px; text-align:center;">Reparación</label>
                                    <input class="form-control" id="mo_reparacion" name="mo_reparacion" style= "width:125px; text-align:right;"
                                        placeholder="Cantidad" type="number"autocomplete="off">
                                </div>
                                <div class="mb-3 col">
                                    <label for="txt_reparacion" class="form-label" style= "width:125px; text-align:center;">Salón</label>
                                    <input class="form-control" id="mo_salon" name="mo_salon" placeholder="Cantidad" style= "width:125px; text-align:right;"
                                        type="number"autocomplete="off">

                                    <input name="id_molde" id="id_molde" value=" " hidden />
                                </div>

                            </div>





                        </div>
                    </div>

                    <div class="modal-footer">
                        <button style=" background: #b39f64; color: #ecedf1;" type="button" class=" btn-info-claro "
                            data-dismiss="modal">
                            <span>Cancelar</span>
                            @csrf
                        </button>
                        <button class=" btn-info " onclick="validar_actualizar_moldes()">
                            <span>Guardar</span>
                        </button>


                    </div>
                </div>
            </div>
        </div>

    </form>
    <!-- FIN DEL MODAL EDITAR MOLDE -->


    <script type="text/javascript">
        function datos_modal(id) {



            var datas = '<?php echo json_encode($moldes);?>';

            var data = JSON.parse(datas);


            for (var i = 0; i < data.length; i++) {

                if (data[i].id_molde === id) {

                    console.info(data[i]);

                    document.formulario_actualizar.mo_bueno.value = data[i].bueno;
                    document.formulario_actualizar.mo_total.value = data[i].total;
                    document.formulario_actualizar.mo_irregular.value = data[i].irregulares;
                    document.formulario_actualizar.mo_malo.value = data[i].malos;
                    document.formulario_actualizar.mo_bodega.value = data[i].bodega;
                    document.formulario_actualizar.mo_reparacion.value = data[i].reparacion;
                    document.formulario_actualizar.mo_salon.value = data[i].salon;
                    document.formulario_actualizar.id_molde.value = data[i].id_molde;
                    document.getElementById("titulo_figura").innerHTML = "        ".concat("Figura y tipo: ", data[i]
                        .nombre_figura, "<br> ", "Vitola:", " ", data[i].vitola);
                    document.getElementById("titulo_vitola").innerHTML = "<br> ".concat("Vitola:", " ", data[i].vitola);



                }
            }

        }
    </script>

    <!-- INICIO DEL TABLA MOLDE -->
    <table class="table table-striped table-secondary table-bordered border-primary ">
        <thead class="table-dark">
            <tr>
                <th style='text-align: center;' scope="col">Planta</th>
                <th style='text-align: center;' scope="col">Vitola</th>
                <th style='text-align: center;' scope="col">Figura y tipo</th>
                <th style='text-align: center;' scope="col">Material</th>
                <th style='text-align: center;' scope="col">Buenos</th>
                <th style='text-align: center;' scope="col">Malos</th>
                <th style='text-align: center;' scope="col">Bodega</th>
                <th style='text-align: center;' scope="col">Reparación</th>
                <th style='text-align: center;' scope="col">Salón</th>
                <th style='text-align: center;' scope="col">Disponibles</th>
                <th style='text-align: center;' scope="col">Total</th>

    <?php if ( auth()->user()->id_planta == 3 ||  auth()->user()->id_planta == 0): ?>
                <th style='text-align: center;' scope="col">Editar</th>
                <?php endif ?>

            <tr>
        </thead>
        <tbody>
            @foreach($moldes as $molde)
            <tr>
                <td> {{$molde->nombre_planta}}</td>
                <td>{{$molde->vitola}}</td>
                <td>{{$molde->nombre_figura}}</td>
                <td>{{$molde->material}}</td>
                <td style ="text-align:right">{{$molde->bueno}}</td>
                <td style ="text-align:right">{{$molde->malos}}</td>
                <td style ="text-align:right">{{$molde->bodega}}</td>
                <td style ="text-align:right">{{$molde->reparacion}}</td>
                <td style ="text-align:right">{{$molde->salon}}</td>
                <td style ="text-align:right">{{$molde->disponible}}</td>
                <td style ="text-align:right"><strong>{{$molde->total}}</strong></td>

                <?php if ( auth()->user()->id_planta == 3 ||  auth()->user()->id_planta == 0): ?>
                <td style="padding:0px; text-align:center;    vertical-align: inherit;">

                    <a data-toggle="modal" data-target="#modal_editar_moldes"
                        onclick="datos_modal({{ $id_molde_basico = $molde->id_molde }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width=25 height="25" fill="black"
                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                    </a>
                </td>
                <?php endif ?>


            </tr>
            @endforeach

            <tr>
                <td colspan="4" style="text-align:center"><strong>Total General Moldes</strong></td>

                <td style ="text-align:right"><strong>
                    <?php
                $suma_b=0;
                foreach ($moldes as $molde)
                 {
                  $suma_b+=$molde->bueno;
                }

                ?> {{$suma_b}}
                </strong></td>
                <td style ="text-align:right"><strong>
                    <?php
               $suma_i=0;
                foreach ($moldes as $molde)
                 {
                  $suma_i+=$molde->malos;
                }
                ?> {{$suma_i}}
                </strong></td>
                <td style ="text-align:right"><strong>
                    <?php
             $suma_m=0;
                foreach ($moldes as $molde)
                 {
                  $suma_m+=$molde->bodega;
                }
                ?> {{$suma_m}}
               </strong> </td>
                <td style ="text-align:right"><strong>
                    <?php
            $suma_bo=0;
                foreach ($moldes as $molde)
                 {
                  $suma_bo+=$molde->reparacion;
                }
                ?> {{$suma_bo}}
               </strong> </td>
                <td style ="text-align:right"><strong>
                    <?php
            $suma_r=0;
                foreach ($moldes as $molde)
                 {
                  $suma_r+=$molde->salon;
                }
                ?> {{$suma_r}}
                </strong></td>
                <td style ="text-align:right"><strong>
                    <?php
            $suma_s=0;
                foreach ($moldes as $molde)
                 {
                  $suma_s+=$molde->disponible;
                }
                ?> {{$suma_s}}
                </strong></td>
                <td style ="text-align:right"><strong>
                <?php
               $suma_i=0;
                foreach ($moldes as $molde)
                 {
                  $suma_i+=$molde->total;
                }
                ?> {{$suma_i}}
                </strong></td>
            </tr>
        <tbody>
    </table>
    <!-- FIN DEL TABLA MOLDE -->




    <!-- VALIDACION VENTANA FIGURAS Y TIPOS -->

    <script type="text/javascript">
        function validar_figura() {
            var v_figura = document.getElementById('figura').value;

            var figura = '<?php echo json_encode($figuras);?>';

            var figuras = JSON.parse(figura);


            var nombre_f = 0;




            for (var i = 0; i < figuras.length; i++) {


                if (figuras[i].nombre_figura.toLowerCase() === v_figura.toLowerCase()) {
                    nombre_f++;
                }
            }


            if (v_figura === "") {
                toastr.error('Complete el nombre de la Figura', 'ERROR', {
                    "progressBar": true,
                    "closeButton": false,
                    "preventDuplicates": true,
                    "preventOpenDuplicates": true
                });
                event.preventDefault();

            } else if (nombre_f > 0) {
                toastr.error('Esta Figura ya existe, favor ingrese una nueva', 'ERROR', {
                    "progressBar": true,
                    "closeButton": false,
                    "preventDuplicates": true,
                    "preventOpenDuplicates": true
                });
                event.preventDefault();


            } else

                toastr.success('Tus datos se guardaron correctamente', 'BIEN', {
                    "progressBar": true,
                    "closeButton": false
                });
            theForm.addEventListener('submit', function (event) {});

        }
    </script>







    <!-- VALIDACION VENTANA VITOLA -->


    <script type="text/javascript">
        function validar_vitola() {
            var v_vitola = document.getElementById('vitola').value;

            var vitola = '<?php echo json_encode($vitolas);?>';

            var vitolas = JSON.parse(vitola);
            var nombre = 0;


            for (var i = 0; i < vitolas.length; i++) {


                console.info(vitolas[i]);

                if (vitolas[i].nombre_vitola === v_vitola) {
                    nombre++;
                }



            }

            if (v_vitola === "") {
                toastr.error('Llene el nombre de la vitola', 'ERROR', {
                    "progressBar": true,
                    "closeButton": false,
                    "preventDuplicates": true,
                    "preventOpenDuplicates": true
                });
                event.preventDefault();

            } else if (nombre > 0) {
                toastr.error('Esta vitola ya existe,  favor ingrese una nueva', 'ERROR', {
                    "progressBar": true,
                    "closeButton": false,
                    "preventDuplicates": true,
                    "preventOpenDuplicates": true
                });
                event.preventDefault();

            } else

                toastr.success('Tus datos se guardaron correctamente', 'BIEN', {
                    "progressBar": true,
                    "closeButton": false
                });
            theForm.addEventListener('submit', function (event) {});

        }
    </script>




    <!-- INICIO VALIDACION  DE MODAL,INGRESAR MOLDES -->
    <!-- INICIO VALIDACION  DE MODAL,INGRESAR MOLDES -->
    <script type="text/javascript">
        function validar() {
            var v_buenos = document.getElementById('txt_buenos').value;
            var v_irregulares = "";
            // document.getElementById('txt_irregulares').value;
            var v_malos = document.getElementById('txt_malos').value;
            var v_bodega = document.getElementById('txt_bodega').value;
            var v_reparacion = document.getElementById('txt_reparacion').value;
            var v_salon = document.getElementById('txt_salon').value;
            var v_total = document.getElementById('txt_total').value;
            var v_vitola = document.getElementById('txt_vitola').value;
            var v_figura = document.getElementById('txt_figuraytipo').value;
            var v_material = document.getElementById('txt_material').value;
            var concat_fivi = v_figura + "  " + v_vitola;
            document.FormMoldes.fivi.value = concat_fivi;

            var cadenas_json = '<?php echo json_encode($moldes);?>';
            var cadenas = JSON.parse(cadenas_json);
            var nombre = 0;


            for (var i = 0; i < cadenas.length; i++) {

                console.info(cadenas[i]);

                if (cadenas[i].nombre_figura + "  " + cadenas[i].vitola + "  " + cadenas[i].material=== v_figura + "  " + v_vitola + "  " + v_material) {
                nombre++;
            }

            }
            var theForm = document.forms['FormMoldes'];

            if (v_buenos == "") {
                v_buenos = "0";
            }
            if (v_irregulares == "") {
                v_irregulares = "0";
            }
            if (v_malos == "") {
                v_malos = "0";
            }
            if (v_bodega == "") {
                v_bodega = "0";
            }
            if (v_reparacion == "") {
                v_reparacion = "0";
            }
            if (v_salon == "") {
                v_salon = "0";
            }

            if (v_total == "" || parseInt(v_total) > 999999 || parseInt(v_total) < 1) {
                toastr.error('El total de ser mayor o igual a 1, o menor que 1000000', 'ERROR', {
                    "progressBar": true,
                    "closeButton": false
                });

            } else if (nombre > 0) {
                toastr.error('Este molde ya existe, favor ingrese uno nuevo', 'ERROR', {
                    "progressBar": true,
                    "closeButton": false,
                    "preventDuplicates": true,
                    "preventOpenDuplicates": true
                });
                event.preventDefault();
            } else if (v_vitola === "") {
                toastr.error('Favor complete el campo de la vitola del molde', 'ERROR', {
                    "progressBar": true,
                    "closeButton": false,
                    "preventDuplicates": true,
                    "preventOpenDuplicates": true
                });
                event.preventDefault();

            } else if (v_figura === "") {
                toastr.error('Favor complete el campo de la figura y tipo del molde', 'ERROR', {
                    "progressBar": true,
                    "closeButton": false,
                    "preventDuplicates": true,
                    "preventOpenDuplicates": true
                });
                event.preventDefault();

            } else if (parseInt(v_total) == (parseInt(v_buenos) + parseInt(v_irregulares) + parseInt(v_malos)) &&
                parseInt(v_total) == (parseInt(v_bodega) + parseInt(v_reparacion) + parseInt(v_salon))) {
                toastr.success('Tus datos se guardaron correctamente', 'BIEN', {
                    "progressBar": true,
                    "closeButton": false,
                    "preventDuplicates": true,
                    "preventOpenDuplicates": true
                });
                theForm.addEventListener('submit', function (event) {});

            } else if (v_total == "" || parseInt(v_total) > 999999 || parseInt(v_total) < 1) {
                toastr.error('El total de ser mayor o igual a 1, o menor que 1000000', 'ERROR', {
                    "progressBar": true,
                    "closeButton": false,
                    "preventDuplicates": true,
                    "preventOpenDuplicates": true
                });
                event.preventDefault();

            } else if (parseInt(v_total) != (parseInt(v_buenos) + parseInt(v_irregulares) + parseInt(v_malos)) &&
                parseInt(v_total) == (parseInt(v_bodega) + parseInt(v_reparacion) + parseInt(v_salon))) {
                toastr.error('Tus datos de estado coinciden con el total', 'ERROR', {
                    "progressBar": true,
                    "closeButton": false,
                    "preventDuplicates": true,
                    "preventOpenDuplicates": true
                });
                event.preventDefault();

            } else if (parseInt(v_total) == (parseInt(v_buenos) + parseInt(v_irregulares) + parseInt(v_malos)) &&
                parseInt(v_total) != (parseInt(v_bodega) + parseInt(v_reparacion) + parseInt(v_salon))) {
                toastr.error('Tus datos de ubicación coinciden con el total', 'ERROR', {
                    "progressBar": true,
                    "closeButton": false,
                    "preventDuplicates": true,
                    "preventOpenDuplicates": true
                });
                event.preventDefault();

            } else if (parseInt(v_total) != (parseInt(v_buenos) + parseInt(v_irregulares) + parseInt(v_malos)) &&
                parseInt(v_total) != (parseInt(v_bodega) + parseInt(v_reparacion) + parseInt(v_salon))) {
                toastr.error('Tus datos no coinciden con el total', 'ERROR', {
                    "progressBar": true,
                    "closeButton": false,
                    "preventDuplicates": true,
                    "preventOpenDuplicates": true
                });
                event.preventDefault();



            }
        }
    </script>
    <!-- FIN VALIDACION  DE MODAL,INGRESAR MOLDES -->



    <!--  VALIDACION  DE MODAL,EDITAR MOLDES -->
    <script type="text/javascript">
        function validar_actualizar_moldes() {
            var v_buenos = document.getElementById('mo_bueno').value;
            var v_irregulares = document.getElementById('mo_irregular').value;
            var v_malos = document.getElementById('mo_malo').value;
            var v_bodega = document.getElementById('mo_bodega').value;
            var v_reparacion = document.getElementById('mo_reparacion').value;
            var v_salon = document.getElementById('mo_salon').value;
            var v_total = document.getElementById('mo_total').value;
            var theForm = document.forms['formulario_actualizar'];

            if (v_buenos == "") {
                v_buenos = "0";
            }
            if (v_irregulares == "") {
                v_irregulares = "0";
            }
            if (v_malos == "") {
                v_malos = "0";
            }
            if (v_bodega == "") {
                v_bodega = "0";
            }
            if (v_reparacion == "") {
                v_reparacion = "0";
            }
            if (v_salon == "") {
                v_salon = "0";
            }

            if (v_total == "" || parseInt(v_total) > 999999 || parseInt(v_total) < 1) {

                toastr.error('El total de ser mayor o igual a 1, o menor que 1000000', 'ERROR', {
                    "progressBar": true,
                    "closeButton": false
                });



            } else
            if (parseInt(v_total) === (parseInt(v_buenos) + parseInt(v_irregulares) + parseInt(v_malos)) &&
                parseInt(v_total) === (parseInt(v_bodega) + parseInt(v_reparacion) + parseInt(v_salon))) {

                toastr.success('Tus datos se actualizaron correctamente', 'BIEN', {
                    "progressBar": true,
                    "closeButton": false
                });
                document.formulario_actualizar.submit();

            } else if (v_total == "" || parseInt(v_total) > 999999 || parseInt(v_total) < 1) {
                toastr.error('El total de ser mayor o igual a 1, o menor que 1000000', 'ERROR', {
                    "progressBar": true,
                    "closeButton": false,
                    "preventDuplicates": true,
                    "preventOpenDuplicates": true
                });
                event.preventDefault();
            } else if (parseInt(v_total) != (parseInt(v_buenos) + parseInt(v_irregulares) + parseInt(v_malos)) &&
                parseInt(v_total) == (parseInt(v_bodega) + parseInt(v_reparacion) + parseInt(v_salon))) {
                toastr.error('Tus datos de estado coinciden con el total', 'ERROR', {
                    "progressBar": true,
                    "closeButton": false,
                    "preventDuplicates": true,
                    "preventOpenDuplicates": true
                });
                event.preventDefault();
            } else if (parseInt(v_total) == (parseInt(v_buenos) + parseInt(v_irregulares) + parseInt(v_malos)) &&
                parseInt(v_total) != (parseInt(v_bodega) + parseInt(v_reparacion) + parseInt(v_salon))) {
                toastr.error('Tus datos de ubicación coinciden con el total', 'ERROR', {
                    "progressBar": true,
                    "closeButton": false,
                    "preventDuplicates": true,
                    "preventOpenDuplicates": true
                });
                event.preventDefault();
            } else if (parseInt(v_total) != (parseInt(v_buenos) + parseInt(v_irregulares) + parseInt(v_malos)) &&
                parseInt(v_total) != (parseInt(v_bodega) + parseInt(v_reparacion) + parseInt(v_salon))) {
                toastr.error('Tus datos no coinciden con el total', 'ERROR', {
                    "progressBar": true,
                    "closeButton": false,
                    "preventDuplicates": true,
                    "preventOpenDuplicates": true
                });
                event.preventDefault();
            }

        }
    </script>



    @endsection
