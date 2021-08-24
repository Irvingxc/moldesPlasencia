@extends('principal')


@section('content')

<script src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js') }}"></script>
<link rel="stylesheet"
    href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css') }}">

    <?php if ( auth()->user()->id_planta == 1 ||  auth()->user()->id_planta == 0): ?>

<div class="row">

    <div class="col form-inline">

       <!-- <form action="{{Route('id_planta',1)}}" method="POST" class="form-inline">
            @csrf
            <input value="" onKeyDown="copiar('vitolabuscar','vitolaimprimir');" name="vitolabuscar" id="vitolabuscar"
                class="form-control mr-sm-2" placeholder="Vitola" style="width:150px;" autocomplete="off">
            <input value="" onKeyDown="copiar2('figurabuscar','figuraimprimir');" name="figurabuscar" id="figurabuscar"
                class="form-control mr-sm-2" placeholder="Figura y tipo" style="width:150px;" autocomplete="off">
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
    -->

        <form action="{{Route('excel')}}" method="POST" enctype="multipart/form-data" class="form-inline">
            @csrf
            <input name="excel" type="file">
            <button class="btn-info" type="submit"> Subir Excel
            </button>
        </form>


        <form action="{{Route('imprimirdatosparaiso',1)}}" method="POST" class=" form-inline">
            @csrf
            <input name="vitolaimprimir" id="vitolaimprimir" hidden   >
            <input name="figuraimprimir" id="figuraimprimir"  hidden  >

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
        </form>



    </div>


    <div class="col">

    @if(auth()->user()->id_planta==0)
        <button type="button" class=" btn-info float-right" data-toggle="modal" data-target="#modal_agregar_material"
            style="margin-right: 10px">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path
                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
                Material</span>
        </button>
        @endif

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
                Tipo</span>
        </button>
        @endif

        @if(auth()->user()->id_planta==0)
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


    </div>


</div>


<?php endif; ?>


<!-- Inicio Modals de Materiales !-->

<form action="{{Route('store_material')}}" method="POST" name="formvitola">
    <div class="modal fade" id="modal_agregar_material" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" style="opacity:.9;background:#212529;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"  style="width:450px; text-align:center; font-size:20px;">Crear Material</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 col">
                        <label for="txt_vitola" class="form-label" style="width:440px; text-align:center; font-size:20px;">Material</label>
                        <input class="form-control" id="material" type="text" name="material" placeholder="Agregar material" style = "width: 440px"
                            maxLength="30"autocomplete="off">
                            <input id="id_material" name="id_material" hidden />
                    </div>
                </div>
                <div class="modal-footer">
                    <button style=" background: #b39f64; color: #ecedf1;" type="button" class=" btn-info-claro "
                        data-dismiss="modal">
                        <span>Cancelar</span>
                    </button>
                    <button onclick="validar_material()" class=" btn-info float-right" style="margin-right: 10px">

                        <span>Guardar</span>
                    </button>
                    @csrf
                    <input name="id_planta" value='1' hidden />
                </div>
            </div>
        </div>
    </div>
</form>


<form action="{{Route('updateMaterial')}}" method="POST" name="formvitola">
    <div class="modal fade" id="modal_agregar_materialupdate" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" style="opacity:.9;background:#212529;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"  style="width:450px; text-align:center; font-size:20px;">Actualizar Material</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 col">
                        <label for="txt_vitola" class="form-label" style="width:440px; text-align:center; font-size:20px;">Material</label>
                        <input class="form-control" id="materialupdate" type="text" name="materialupdate" placeholder="Agregar vitola" style = "width: 440px"
                            maxLength="30"autocomplete="off">
                            <input id="id_materialupdate" name="id_materialupdate" hidden />
                    </div>
                </div>
                <div class="modal-footer">
                    <button style=" background: #b39f64; color: #ecedf1;" type="button" class=" btn-info-claro "
                        data-dismiss="modal">
                        <span>Cancelar</span>
                    </button>
                    <button onclick="validar_materialupdate()" class=" btn-info float-right" style="margin-right: 10px">

                        <span>Guardar</span>
                    </button>
                    @csrf
                    <input name="id_planta" value='1' hidden />
                </div>
            </div>
        </div>
    </div>
</form>



<!-- INICIO MODAL VITOLA -->
<form action="{{Route('store_vitola',3)}}" method="POST" name="formvitola">
    <div class="modal fade" id="modal_agregar_vitola" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" style="opacity:.9;background:#212529;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"  style="width:450px; text-align:center; font-size:20px;">Agregar Vitola</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 col">
                        <label for="txt_vitola" class="form-label" style="width:440px; text-align:center; font-size:20px;">Vitola</label>
                        <input class="form-control" id="vitola" type="text" name="vitola" placeholder="Agregar vitola" style = "width: 440px"
                            maxLength="30"autocomplete="off">
                            <input id="actualizar" name="actualizar" hidden />
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
                    <input name="id_planta" value='1' hidden />
                </div>
            </div>
        </div>
    </div>
</form>


<form action="{{Route('update_vitola',3)}}" method="POST" name="formvitola">
    <div class="modal fade" id="modal_agregar_vitola_update" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" style="opacity:.9;background:#212529;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"  style="width:450px; text-align:center; font-size:20px;">Agregar Vitola</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 col">
                        <label for="txt_vitola" class="form-label" style="width:440px; text-align:center; font-size:20px;">Vitola</label>
                        <input class="form-control" id="vitolaupdate" type="text" name="vitola" placeholder="Agregar vitola" style = "width: 440px"
                            maxLength="30"autocomplete="off">
                            <input id="actualizarupdate" name="actualizarupdate" hidden />
                    </div>
                </div>
                <div class="modal-footer">
                    <button style=" background: #b39f64; color: #ecedf1;" type="button" class=" btn-info-claro "
                        data-dismiss="modal">
                        <span>Cancelar</span>
                    </button>
                    <button onclick="validar_vitolaupdate()" class=" btn-info float-right" style="margin-right: 10px">

                        <span>Guardar</span>
                    </button>
                    @csrf
                    <input name="id_planta" value='1' hidden />
                </div>
            </div>
        </div>
    </div>
</form>
<!-- FIN MODAL VITOLA -->



<!-- INICIO MODAL FIGURA Y TIPO -->
<form action="{{Route('store_figura',3)}}" method="POST">
    <div class="modal fade" id="modal_agregar_figuraytipo" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" style="opacity:.9;background:#212529;">
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
                            maxLength="30" autocomplete="off">
                            <input name="actualizar1" hidden />
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
                    <input name="id_planta" value='1' hidden />
                </div>
            </div>
        </div>
    </div>

</form>


<form action="{{Route('update_figura',3)}}" method="POST">
    <div class="modal fade" id="modal_agregar_figuraytipoupdate" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" style="opacity:.9;background:#212529;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel" style="width:450px; text-align:center; font-size:20px;">Agregar Figura y tipo</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 col">
                        <label for="txt_figuraytipo" class="form-label" style="width:440px; text-align:center; font-size:20px;">Figura y tipo</label>
                        <input class="form-control" id="figuraupdate" type="text" name="figuraupdate" placeholder="Agregar Figura y Tipo" style = "width: 440px"
                            maxLength="30" autocomplete="off">
                            <input name="actualizarupdate1" id="actualizarupdate1" hidden />
                    </div>
                </div>
                <div class="modal-footer">
                    <button style=" background: #b39f64; color: #ecedf1;" type="button" class=" btn-info-claro "
                        data-dismiss="modal">
                        <span>Cancelar</span>
                    </button>
                    <button onclick="validar_figuraupdate()" class=" btn-info float-right" style="margin-right: 10px">
                        <span>Guardar</span>
                    </button>

                    @csrf
                    <input name="id_planta" value='1' hidden />
                </div>
            </div>
        </div>
    </div>

</form>
<!-- FIN MODAL FIGURA Y TIPO -->


<!-- INICIO DEL MODAL EDITAR MOLDE -->


<!-- FIN DEL MODAL EDITAR MOLDE -->

<input type="button" hidden onclick="quitarOculto()">

<select name="planta-select" id="cambio" hidden>
    <option value="San Marcos">San Marcos</option>
    <option value="El Paraiso">El Paraiso</option>
</select>

<script>
    $('#cambio').change(function(){

        if($('#cambio').val() == 'El Paraiso'){
        $('#Para').removeAttr('hidden');
        $('#San').prop('hidden', true)
       // $('#San').show("slow");
       // $('#San').hide("slow");

        }else if($('#cambio').val() == 'San Marcos'){
            $('#San').removeAttr('hidden');
            $('#Para').prop('hidden', true);
        }
    })
</script>
<br>

<!-- INICIO DEL TABLA MOLDE -->
<div class="row">
    <div class="col-md-3">
<table class="table table-striped table-secondary table-bordered border-primary">
    <thead class="table-dark">
        <tr>
            <th style='text-align: center;' scope="col">Vitola</th>
            <?php if ( auth()->user()->id_planta == 1 ||  auth()->user()->id_planta == 0): ?>
            <th style='text-align: center;' scope="col">Editar</th>
            <?php endif  ?>

        <tr>
    </thead>
    <tbody id="San">

        <tr >
            <p id="borrar">@foreach($vitola as $vitola) </p>
            <td >{{$vitola->vitola}}</td>


            <?php if ( auth()->user()->id_planta == 1 ||  auth()->user()->id_planta == 0): ?>
            <td style="padding:0px; text-align:center;    vertical-align: inherit;">
                <a data-toggle="modal" data-target="#modal_agregar_vitola_update"
                    onclick="datos_modal('{{ $vitola->vitola }}', {{$vitola->id_vitola}})">
                    <svg xmlns="http://www.w3.org/2000/svg" width=25 height="25" fill="black"
                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd"
                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>

                </a>
            </td>
            <?php endif  ?>

        </tr @endforeach>


    <tbody>


        <tbody id="Para" hidden>

            <tr >
                <p id="borrar">@foreach($vitolaPara as $vitola) </p>
                <td >{{$vitola->vitola}}</td>


                <?php if ( auth()->user()->id_planta == 1 ||  auth()->user()->id_planta == 0): ?>
                <td style="padding:0px; text-align:center;    vertical-align: inherit;">
                    <a data-toggle="modal" data-target="#modal_agregar_vitola_update"
                        onclick="datos_modal('{{ $vitola->vitola }}', {{$vitola->id_vitola}})">
                        <svg xmlns="http://www.w3.org/2000/svg" width=25 height="25" fill="black"
                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>

                    </a>
                </td>
                <?php endif  ?>

            </tr @endforeach>


        <tbody>



</table>
</div>
<script>
    function cambioContenido(){

        var nuevo = document.createElement("p");
        nuevo.innerHTML= '@foreach($vitolaPara as $vitola)';
        var nada = '@endforeach';
        var cambio = document.getElementById('borrar');
        cambio.parentNode.replaceChild(nuevo,cambio);
    }

    function quitarOculto(){
        var quitar = $(".borrar");
        console.log(quitar)
        quitar.removeAttr('hidden');
    }

</script>


<script>
    function datos_modal(id_vi, id){

        $("#vitolaupdate").val(id_vi);
        $("#actualizarupdate").val(id);
    }
</script>


<div class="col-md-1"></div>
<div class="col-md-3">
<table class="table table-striped table-secondary table-bordered border-primary">
    <thead class="table-dark">
        <tr>
            <th style='text-align: center;' scope="col">Figura</th>
            <?php if ( auth()->user()->id_planta == 1 ||  auth()->user()->id_planta == 0): ?>
            <th style='text-align: center;' scope="col">Editar</th>
            <?php endif  ?>

        <tr>
    </thead>
    <tbody>
        @foreach($figura as $figura)
        <tr>
            <td >{{$figura->nombre_figura}}</td>


            <?php if ( auth()->user()->id_planta == 1 ||  auth()->user()->id_planta == 0): ?>
            <td style="padding:0px; text-align:center;    vertical-align: inherit;">
                <a data-toggle="modal" data-target="#modal_agregar_figuraytipoupdate"
                    onclick="datos_modal2('{{$figura->nombre_figura }}', {{$figura->id_figura}})">
                    <svg xmlns="http://www.w3.org/2000/svg" width=25 height="25" fill="black"
                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd"
                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>

                </a>
            </td>
            <?php endif  ?>


        </tr>
        @endforeach

    <tbody>
</table>
</div>

<div class="col-md-1"></div>

<div class="col-md-3">
<table class="table table-striped table-secondary table-bordered border-primary">
    <thead class="table-dark">
        <tr>
            <th style='text-align: center;' scope="col">Materiales</th>
            <?php if ( auth()->user()->id_planta == 1 ||  auth()->user()->id_planta == 0): ?>
            <th style='text-align: center;' scope="col">Editar</th>
            <?php endif  ?>

        <tr>
    </thead>
    <tbody>
        @foreach($material as $material)
        <tr>
            <td >{{$material->material}}</td>


            <?php if ( auth()->user()->id_planta == 1 ||  auth()->user()->id_planta == 0): ?>
            <td style="padding:0px; text-align:center;    vertical-align: inherit;">
                <a data-toggle="modal" data-target="#modal_agregar_materialupdate"
                    onclick="datos_modalmaterialupdate('{{$material->material }}', {{$material->id_material}})">
                    <svg xmlns="http://www.w3.org/2000/svg" width=25 height="25" fill="black"
                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd"
                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>

                </a>
            </td>
            <?php endif  ?>


        </tr>
        @endforeach

    <tbody>
</table>
</div>
<script>
    function datos_modalmaterialupdate(id_vi, id){

        $("#materialupdate").val(id_vi);
        $("#id_materialupdate").val(id)
    }
</script>

<script>
    function datos_modal2(id_vi, id){

        $("#figuraupdate").val(id_vi);
        $("#actualizarupdate1").val(id)
    }
</script>

</div>
<!-- FIN DEL TABLA MOLDE -->


<!-- VALIDACION VENTANA FIGURAS Y TIPOS -->
<!-- VALIDACION VENTANA VITOLA -->

<!-- <script type="text/javascript">
    function validar_figura() {
        var v_figura = document.getElementById('figura').value;

        var figura = '<?php echo json_encode($figura);?>';

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
!-->

<script type="text/javascript">
    function validar_vitola() {
        var v_vitola = $("#vitola").val();;

        var vitola = '<?php echo json_encode($vitola);?>';

        var vitolas = JSON.parse(vitola);
        var nombre = 0;


        for (var i = 0; i < vitolas.length; i++) {


            console.info(vitolas[i]);

            if (vitolas[i].vitola === v_vitola) {
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
            toastr.error('Esta vitola ya existe, favor ingrese una nueva', 'ERROR', {
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



<script type="text/javascript">
    function validar_figura() {
        var v_figura = document.getElementById('figura').value;

        var figura = '<?php echo json_encode($figura);?>';

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



<script type="text/javascript">
    function validar_figuraupdate() {
        var v_figura = document.getElementById('figuraupdate').value;

        var figura = '<?php echo json_encode($figura);?>';

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

<script type="text/javascript">
    function validar_vitolaupdate() {
        var v_vitola = $("#vitolaupdate").val();;

        var vitola = '<?php echo json_encode($vitola);?>';

        var vitolas = JSON.parse(vitola);
        var nombre = 0;


        for (var i = 0; i < vitolas.length; i++) {


            console.info(vitolas[i]);

            if (vitolas[i].vitola === v_vitola) {
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
            toastr.error('Esta vitola ya existe, favor ingrese una nueva', 'ERROR', {
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
       // theForm.addEventListener('submit', function (event) {});


    }
</script>





<!-- INICIO VALIDACION  DE MODAL,INGRESAR MOLDES -->
<script type="text/javascript">
    function validar_material() {
        var v_figura = document.getElementById('material').value;

        var figura = '<?php echo json_encode($material);?>';

        var figuras = JSON.parse(figura);


        var nombre_f = 0;




        for (var i = 0; i < figuras.length; i++) {


            if (figuras[i].material.toLowerCase() === v_figura.toLowerCase()) {
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


<script type="text/javascript">
    function validar_materialupdate() {
        var v_figura = document.getElementById('materialupdate').value;

        var figura = '<?php echo json_encode($material);?>';

        var figuras = JSON.parse(figura);


        var nombre_f = 0;




        for (var i = 0; i < figuras.length; i++) {


            if (figuras[i].material.toLowerCase() === v_figura.toLowerCase()) {
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

@endsection
