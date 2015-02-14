<!DOCTYPE html>
<html lang="en" class='home'>
    <head>
        <!--Meta tags-->
        <meta charset="UTF-8" />
        <meta name="description" content="Plataforma diseñada para facilitarles a los estudiantes el encontrar en dónde hacer servicio social o encontrar empleo" />
        <meta name="author" content="CodeArt">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
        <!--icono y estilos-->
        <link rel="shortcut icon" href="{{ asset('favicon.png' ) }}" />
        <link rel="stylesheet" href="{{ asset('css/estilos.css') }}" />
        <title>Policontacto</title>
    </head>
    <body>
    	<header>
    		<div class="max min">
    			<a class="title" href="{{ route('home') }}">
    			    <img src="{{ asset('img/logo-small.png') }}" alt="" class="logo">
                    <h1 class="titulo">Poli<strong>contacto</strong></h1>
    			</a>
    			@if(Auth::check())

    			    <div class="info">
    			        <span>{{ Auth::user()->email }}</span>
    			        <div class="flecha-abajo"></div>
    			         <span class="menu">
                             <a href="{{ route('cuenta') }}" class="item-link">Editar usuario</a>
                             <a href="{{ route('perfil') }}" class="item-link">Editar Perfil</a>
                             <a href="{{ route('logout') }}" class="item-link">Salir</a>
                         </span>
    			    </div>

				@else

    			    {{ Form::open(['route' => 'login', 'method' => 'POST', 'class' => 'login-form', 'novalidate']) }}

    			       {{ Form::email('email', null, ['class' => 'input-login', 'placeholder'=>'Email', 'required']) }}<br class="res-br">
    			        {{ Form::password('password', ['class' => 'input-login', 'placeholder'=>'Contraseña', 'required']) }}<br class="res-br">
    			         <button type="submit" class="boton">Entrar</button><br>
    			         <div class="terms-container2">
                         {{ Form::checkbox('check2', null, false, ['id' => 'check2', 'required']) }}
                         <label for="check2">
                             <span class="check2"></span>
                             <span class="box2"></span>
                             Mantener sesión iniciada
                         </label>
                         </div>
                         @if(Session::has('login_error'))
                            <span class="back-login-error">Usuario o contraseña incorrectos</span>
                         @endif
    			    {{ Form::close() }}
    		        </div>
    		        <button class="boton-login">login</button>

    	        @endif
    	</header>

@yield('content')
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('js/home.js') }}"></script>
    <script>window.jQuery || document.write('<script src="{{ asset('js/lib/jquery-2.1.1.min.js') }}"><\/script>')</script>
    </body>
</html>