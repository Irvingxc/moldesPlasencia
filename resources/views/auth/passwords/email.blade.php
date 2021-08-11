
<title>Placensia inventario móvil</title>
<link rel="shortcat icon" href="favicon.ico"> 
   
<html lang="es">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
<script src="/jquery.js"></script>
<script src="/build/jquery.datetimepicker.full.min.js"></script>
</head>

<div style="  display: flex;justify-content: center;align-items: center;height: 100%;
background: url('fondoperron.png') center center no-repeat;
    background-size:100% 100%;"  >
<div style=" -webkit-background-size: cover;  -moz-background-size: cover;  background-repeat:no-repeat;  -o-background-size: cover;  background-size: cover;  width: 400px;height:220px; background-size: 100% 100%;" >




<div class="card text-center" >

<div class="card-header">  
<strong> {{ __('Recuperación de Contraseña') }}</strong>
</div>

<div class="card-body" >
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group row">
            <label for="email"  style="padding-left:0px;">  <strong>{{ __('Correo Electrónico') }}</strong> </label>
                <input style="text-align:center;"   id="email" type="email" class="  form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="modal-footer" >
                <button style="width:100%;background: #d09c10; color: #fff;"  type="submit" class="form-control btn ">
                    {{ __('Enviar link de recuperación de contraseña') }}
                </button>
        </div>
    </form>
</div>
</div>





</div>
</div>    