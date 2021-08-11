<!-- CSS only -->

<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<link href="http://donidrault.com.ar/nucleo/AOTCABA/css.css" rel="stylesheet" type="text/css">



<div style="  display: flex;justify-content: center;align-items: center;height: 100%;
 background-image: linear-gradient(315deg, #000 5%, #fff 81%);"   >
<div style=" -webkit-background-size: cover;  -moz-background-size: cover;  background-repeat:no-repeat;  -o-background-size: cover;  background-size: cover;  width: 400px;height:360px; background-size: 100% 100%;" >


           
           
           
           
            <div class="card text-center">
                <div class="card-header"><strong>{{ __('Recuperación Contraseña') }}  </strong> </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row" style="margin-top:10px;">
                           <label for="email" ><strong>{{ __('Correo Electrónico') }}</strong> </label>
                                <input style="text-align:center;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class=" row " style="margin-top:10px;">
                            <label for="password" >  <strong>{{ __('Contraseña') }}</strong> </label>
                                <input style="text-align:center;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class=" row" style="margin-top:10px;">
                            <label for="password-confirm">  <strong> {{ __('Confirmar Contraseña') }}</strong></label>

                            <input style="text-align:center;" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            
                        </div>

                        
                                <button type="submit" class="btn btn-dark"  style="margin-top:20px;width: 100%;">
                                    {{ __('Cambiar Contraseña') }}
                                </button>
                           
                    </form>
                </div>
            </div>
            
            </div>
            </div>
