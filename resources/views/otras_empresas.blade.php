@extends('principal')


@section('content')
          
<!-- Libreria de las alertas -->
<script src= "{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css') }}">

<!-- INICIO DEL TABLA REMISIONES PARAISO -->

<div class="row">




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <form action="{{Route('remisiones_prestadas_fecha')}}" method="POST" class="form-inline" name="formulario_enviadas"
                id="formulario_enviadas">
                @csrf
               
                <div class="input-group " style="margin-left:20px">
                <input value="" name="txt_nombre" id="txt_nombre" onKeyDown="copiar('txt_nombre','nombre');"
                class="form-control  mr-sm-2" placeholder="Nombre empresa" style="width:200px;" autocomplete="off">
                    <span class="input-group-text ">De</span> 
                    <input type="date" value=""  onKeyDown="copiar('fecha_inicio','fechainicio');"name="fecha_inicio" id="fecha_inicio"   style="width:150px;" class="form-control"
                        placeholder="Fecha inicio" onchange="obtenerFechaInicio(this)" >
                    <span class="input-group-text">hasta</span>
                    <input type="date" value=""   name="fecha_fin" id="fecha_fin" style="width:150px;" class="form-control  mr-sm-2"
                        placeholder="Fecha final" onchange="obtenerFechaFin(this)" >
                </div>

                <button class="btn-info  mr-sm-2" type="submit">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </span>
                </button>


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
            </script>

           

          
        <form action="{{Route('remisiones_prestadas_impresion')}}" method="POST" class=" form-inline" >
            @csrf
            <input name="fechainicio" id="fechainicio" hidden value={{$fechai}} >
            <input name="fechafin" id="fechafin" hidden value={{$fechaf}} >
            <input name="nombre" hidden  id="nombre" value="{{$nombre}}" >
            
            <button type="submit" class=" btn-info " style="right: 20px;position: fixed">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="20" fill="currentColor"
                        class="bi bi-printer" viewBox="0 0 16 16">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                        <path
                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                    </svg>
                </span>
            </button>
        </form>


      
    
    </div>
<script type="text/javascript">    

      function enviadas(){  
      var tablaenviadas = document.getElementById("tablaenviadas"); 
      var tablarecibidas = document.getElementById("tablarecibidas"); 
      var a_enviadas = document.getElementById("a_enviadas"); 
      var a_recibidas = document.getElementById("a_recibidas"); 
     
      tablaenviadas.style.display = 'inline-table'; 
      tablarecibidas.style.display = 'none'; 
      a_enviadas.style.background = '#b38d1d'; 
      a_recibidas.style.background = '#b39f64';       
      }


      function recibidas(){  
      var tablaenviadas = document.getElementById("tablaenviadas"); 
      var tablarecibidas = document.getElementById("tablarecibidas"); 
      var a_enviadas = document.getElementById("a_enviadas"); 
      var a_recibidas = document.getElementById("a_recibidas");        
      tablaenviadas.style.display = 'none'; 
      tablarecibidas.style.display = 'inline-table';  
      a_enviadas.style.background = '#b39f64'; 
      a_recibidas.style.background = '#b38d1d';        
      }    
 </script>

<div class="row">
<div class="col">
<table class="table table-striped table-secondary table-bordered border-primary " id="tablaenviadas">
        <thead class= "table-dark">
        <tr>
            <th style='text-align: center;' scope="col">Fecha</th>
            <th style='text-align: center;' scope="col">De</th>
            <th style='text-align: center;' scope="col">Para</th>
            <th style='text-align: center;' scope="col">Estado</th>   
            <th style='text-align: center;' scope="col">Tipo de molde</th>   
            <th style='text-align: center;' scope="col">Cantidad</th>            
         </thead>
         <tbody>
        
         @foreach($moldes as $molde)
            <tr> 
                <td>{{$molde->fecha}}</td>
                <td>{{$molde->nombre_planta}}</td>
                <td>{{$molde->nombre_fabrica}}</td>
                <td>{{$molde->estado_moldes}}</td>
                <td>{{$molde->tipo_moldes}}</td>
                <td style ="text-align:right">{{$molde->cantidad}}</td>
              
            </tr>

            @endforeach 
             
           
          <tbody>
    </table>

    </div>
    </div>
<!-- FIN DEL TABLA REMISIONES PARAISO -->

   



@endsection