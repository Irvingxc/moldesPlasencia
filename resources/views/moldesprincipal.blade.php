@extends('principal')


@section('content')




<div class="col">

        <div class="row">

                <div class="col">
                <div class="card border-dark mb-3"style="width: 100%;">
                <img src="sucursalParaiso.png" class="card-img-top" alt="Sucursal El Paraíso"  style=" height:10rem; -webkit-filter: brightness(50%);filter: brightness(50%);">
                <div class="card-body">



                <form action=  "{{Route('id_planta',1)}}" method= "POST">
                @csrf
                <button type="submit"  class="btn-info" style="width:100%;" >Sucursal <br>  El Paraíso</button>
                </form>
                </div>


                </div>
                </div>

                <div class="col">
                <div class="card border-dark mb-3" style="width: 100%;">
                <img src="sucursalMoroceli.png" class="card-img-top" alt="Sucursal Morocelí" style=" height:10rem; -webkit-filter: brightness(50%);filter: brightness(50%);">
                <div class="card-body">
                <form action=  "{{Route('id_planta_moroceli',2)}}" method= "POST">
                @csrf
                <button type="submit"  class="btn-info" style="width:100%;" >Sucursal <br> Morocelí</button>
                </form>
                </div>
                </div>
                </div>

                <div class="col">
                 <div class="card border-dark mb-3" style="width: 100%;">
                <img src="sucursalSanMarcos.png" class="card-img-top" alt="Sucursal San Marcos" style=" height:10rem; -webkit-filter: brightness(50%);filter: brightness(50%);">
                <div class="card-body">
                <form action=  "{{Route('id_planta_sanMarcos',3)}}" method= "POST">
                @csrf
                <button type="submit"  class="btn-info" style="width:100%;" >Sucursal <br>  San Marcos</button>
                </form>
                </div>
                </div>
                </div>

      </div>





        <div class="row">



                <div class="col">
                <div class="card border-dark mb-3" style="width: 100%;">
                <img src="logo.png" class="card-img-top" alt="Otras Empresas" style=" height:10rem; -webkit-filter: brightness(50%);filter: brightness(50%);">
                <div class="card-body">
                <form action=  "{{Route('remisiones_prestadas_otras')}}" method= "POST">
                @csrf
                <button type="submit"  class="btn-info" style="width:100%;" >Plasencia <br> prestados</button>
                </form>
                </div>
                </div>
                </div>






                <div class="col">
                <div class="card border-dark mb-3" style="width: 100%;">
                <img src="sucursalGualiqueme.png" class="card-img-top" alt="Sucursal Gualiqueme" style=" height:10rem; -webkit-filter: brightness(50%);filter: brightness(50%);">
                <div class="card-body">
                <form action=  "{{Route('id_planta_gualiqueme',4)}}" method= "POST">
                @csrf
                <button type="submit"  class="btn-info" style="width:100%;" >Sucursal <br>  Gualiqueme</button>
                </form>
                </div>
                </div>
                </div>


                <div class="col">
                <div class="card border-dark mb-3" style="width: 100%;">
                <img src="sucursalCollage.jpg"  class="card-img-top" alt="Total Sucursales" style=" height:10rem; -webkit-filter: brightness(50%);filter: brightness(50%);">
                <div class="card-body">
                <form action=  "{{Route('totales_moldes')}}"method="POST" >
                @csrf
                <button type="submit"  class="btn-info" style="width:100%;" >Sucursales <br> Total</button>
                </form>
                </div>
                </div>
                </div>



    </div>
    <div class="row">



        <div class="col">
        <div class="card border-dark mb-3" style="width: 100%;">
        <img src="moldesreales.png" class="card-img-top" alt="Otras Empresas" style=" height:10rem; -webkit-filter: brightness(50%);filter: brightness(50%);">
        <div class="card-body">
        <form action=  "{{Route('datos1')}}" method= "post">
        @csrf
        <button type="submit"  class="btn-info" style="width:100%;" >Plasencia <br> Vitolas y Figuras</button>
        </form>
      <!--  <a class="btn-info" style="width:100%;" href="{{Route('datos1')}}">Plasencia <br> Vitolas y Figuras</a> -->
        </div>
        </div>
        </div>






        <div class="col">
        </div>


<div class="col">

</div>



</div>







</div>




@endsection
