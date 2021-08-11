
@extends('principal')


@section('content')


<div class="row">

    <div class="col " style="text-align: left">


<div>

        <form action="{{Route('imprimirdatostotalmoldes')}}" method="POST" style="text-align: left">



          
            <button type="submit" class=" btn-info float-left " >

                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="20" fill="currentColor" class="bi bi-printer"
                      viewBox="0 0 16 16"  style="margin-right: 5px; margin-bottom: 0px;">
                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                    <path
                        d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                </svg>
            </button>
            @csrf
        </form>
      
        </div>
      </div>

      </div>  

      <div class="row">
      
    <div class="col " style="text-align: left">

    <h6></h6>
    </div> 

      </div>  
 
<div class="row">    
      <div class="col ">
<table class="table table-striped table-secondary table-bordered border-primary " 
>
        <thead class= "table-dark">
        <tr>
            
            <th scope="col" style ="text-align:center">Figura y tipo</th>
            <th scope="col" style ="text-align:center">Buenos</th>
            <th scope="col" style ="text-align:center">Malos</th>
            <th scope="col"style ="text-align:center">Bodega</th>
            <th scope="col"style ="text-align:center">Reparación</th>
            <th scope="col" style ="text-align:center">Salón</th>
            <th scope="col" style ="text-align:center">Disponibles</th>
            <th scope="col"style ="text-align:center">Total</th>
            
         </tr>
            
         </thead>
         <tbody>

       


         @foreach($totales as $total)
        
            <tr> 
           
                  <td > {{$total->figura_vitola}}</td> 
                  <td style ="text-align:right">{{$total->total_bueno}}</td>
                  <td style ="text-align:right">{{$total->total_malo}}</td>
                  <td style ="text-align:right">{{$total->total_bodega}}</td>
                  <td style ="text-align:right">{{$total->total_repacion}}</td>
                  <td style ="text-align:right">{{$total->total_salon}}</td>
                  <td style ="text-align:right">{{$total->total_irregulares}}</td>
                  <td style ="text-align:right" > <strong>{{$total->total_bueno+$total->total_malo}} </strong></td>
          
             </tr>
             @endforeach
             <tr >
            <td ><strong>Sumatoria total moldes plasencia</strong></td>          
             <td style ="text-align:right"><strong>
            
                <?php
                $suma_b=0;
                foreach ($totales as $total)
                 {
                  $suma_b+=$total->total_bueno;
                }
                
                ?>   {{$suma_b}}    </strong> </td>
            <td style ="text-align:right"><strong>
            <?php
             $suma_m=0;
             foreach ($totales as $total)
                 {
                  $suma_m+=$total->total_malo;
                }
                ?>   {{$suma_m}}
            </strong> </td>
            <td style ="text-align:right"><strong>
            <?php
            $suma_bo=0;
            foreach ($totales as $total)
                 {
                  $suma_bo+=$total->total_bodega;
                }
                ?>   {{$suma_bo}}
            </strong> </td>
            <td style ="text-align:right"><strong>
            <?php
            $suma_r=0;
            foreach ($totales as $total)
                 {
                  $suma_r+=$total->total_repacion;
                }
                ?>   {{$suma_r}}
            </strong> </td>
            <td style ="text-align:right"><strong>
            <?php
            $suma_s=0;
            foreach ($totales as $total)
             {
                  $suma_s+=$total->total_salon;
                }
                ?>   {{$suma_s}}
            </strong> </td>
            <td style ="text-align:right"> <strong>
            <?php
               $suma_i=0;
               foreach ($totales as $total)
                 {
                  $suma_i+=$total->total_irregulares;
                }
                ?>   {{$suma_i}}  </strong></td>
            <td style ="text-align:right"><strong>
            <?php
            $suma_total=0;
            foreach ($totales as $total)
                 {
                  $suma_total = $suma_b+$suma_m+$suma_i;
                 }
                ?>   {{$suma_total}}
            </strong> </td>
            </tr>
          <tbody>
    </table>

    </div>
    </div>
    </div>

    
<!-- SCRIPT COPIAR EL VALOR DE UN INPUT A OTRO PARA IMPRIMIR -->
<script type="text/javascript">
            function copiar(vitolabuscar, fivi) {
                var fivi = document.getElementById(vitolabuscar).value;
                document.getElementById(fivi).value = vitolabuscar;
            }

        </script> <!-- SCRIPT COPIAR EL VALOR DE UN INPUT A OTRO PARA IMPRIMIR -->


<script type="text/javascript">
            document.getElementById("vitolabuscar").addEventListener('keyup', autoCompleteNew);

            function autoCompleteNew(e) {
                var value = $(this).val();
                $("#vitolaimprimir").val(value.replace(/\s/g, ''));
            }
        </script>
@endsection