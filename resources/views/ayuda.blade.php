@extends('principal')


@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg2" style="margin-top:0px;margin-bottom:0px;">
  <div class="container-fluid">   
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a style="background:#b38d1d;" class="nav-link  mr-sm-2 download"  onclick="elegirmoldes()" id="a_moldes"  >Moldes</a>
        </li>
        <li class="nav-item">
          <a style="background:#b39f64;" class="nav-link download" onclick="elegircajones()" id="a_cajones" >Otro</a>
        </li>       
      </ul>
    </div>
  </div>
</nav>

<script type="text/javascript">    

      function elegirmoldes(){  
      var carouselMoldes = document.getElementById("carouselMoldes"); 
      var carouselCajones = document.getElementById("carouselCajones"); 
      var a_moldes = document.getElementById("a_moldes"); 
      var a_cajones = document.getElementById("a_cajones"); 
     
      carouselMoldes.style.display = 'block'; 
      carouselCajones.style.display = 'none'; 
      a_moldes.style.background = '#b38d1d'; 
      a_cajones.style.background = '#b39f64';       
      }


      function elegircajones(){  
      var carouselMoldes = document.getElementById("carouselMoldes"); 
      var carouselCajones = document.getElementById("carouselCajones"); 
      var a_moldes = document.getElementById("a_moldes"); 
      var a_cajones = document.getElementById("a_cajones");        
      carouselMoldes.style.display = 'none'; 
      carouselCajones.style.display = 'block';  
      a_moldes.style.background = '#b39f64'; 
      a_cajones.style.background = '#b38d1d';        
      }    
 </script>












<!-- INICIO CARRUSEL MOLDES -->
<div id="carouselMoldes" class="carousel slide carousel-dark" data-interval="5000" data-ride="carousel" >
  <div class="carousel-indicators">
    <button type="button" data-target="#carouselMoldes" data-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-target="#carouselMoldes" data-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-target="#carouselMoldes" data-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" style="heigth:80%;">
      <img src="carrusel_1.png" class="d-block " style=" height:30rem; width:100%" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Moldes</h5>
        <p class="p_carrusel" style="color:#000;"> Haz clic para ver el video</p>
      </div>
    </div>
 
  </div>
  <button class="carousel-control-prev" type="button" data-target="#carouselMoldes"  data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselMoldes"  data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- FIN CARRUSEL MOLDES -->




<!-- INICIO CARRUSEL CAJONES -->
<div id="carouselCajones" class="carousel slide carousel-dark" data-interval="5000" data-ride="carousel" style="display:none;">
  <div class="carousel-indicators">
    <button type="button" data-target="#carouselCajones" data-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-target="#carouselCajones" data-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-target="#carouselCajones" data-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" style="heigth:80%;">
      <img src="..." class="d-block" style=" height:30rem; width:100%"  alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>CAJONES</h5>
        <p class="p_carrusel">Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block" style=" height:30rem; width:100%"  alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p class="p_carrusel"> Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block" style=" height:30rem; width:100%"  alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p class="p_carrusel">Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-target="#carouselCajones"  data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselCajones"  data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- FIN CARRUSEL CAJONES -->

@endsection