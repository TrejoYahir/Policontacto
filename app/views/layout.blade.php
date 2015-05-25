<!DOCTYPE html>
<html lang="es">
	<head>
		<!--Meta tags-->
		<meta charset="UTF-8" />
		<meta name="description" content="Plataforma diseñada para facilitarles a los estudiantes el encontrar en donde hacer servicio social." />
		<meta name="author" content="CodeArt">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
		<!--icono y estilos-->
		<link rel="shortcut icon" href="{{ asset('favicon.png' ) }}" />
		<link rel="stylesheet" href="{{ asset('css/estilos.css') }}" />
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<title>Policontacto</title>
	</head>
	<body @yield('body-class')>
		<header @yield('header-class')>
			<div class="max min">
				<a class="title" href="{{ route('home') }}">
					<img src="{{ asset('img/logo-small.png') }}" alt="" class="logo">
					<h1 class="titulo">Poli<strong>contacto</strong></h1>
				</a>
				@if(Auth::check())
					<div class="busqueda">
						<i class="fa fa-search icono-buscar"></i>
						<input type="text" id="buscar" class="buscar" placeholder='Buscar'>
						<div id="resultados"></div>
					</div>
					<div class="info">
						@if(isset(Auth::user()->estudiante->nombre))
							<span class="elemento-info"><a href="{{ route('estudiante', [Auth::user()->estudiante->slug]) }}" class="nombre-avatar">{{ Auth::user()->estudiante->nombre }}</a></span>
								<a href="{{ route('estudiante', [Auth::user()->estudiante->slug]) }}"><img src="{{ asset(Auth::user()->estudiante->url_foto) }}" alt="" class="img-avatar elemento-info"></a>
						@else
							<span class="elemento-info"><a href="{{ route('cambiarPerfil') }}" class="nombre-avatar">{{ Auth::user()->email  }}</a></span>
					 	@endif	
						<div class="flecha-abajo"></div>
						 <span class="menu">
							 <a href="{{ route('cuenta') }}" class="item-link">Editar usuario</a>
							 <a href="{{ route('perfil') }}" class="item-link">Editar Perfil</a>
							 <a href="{{ route('logout') }}" class="item-link">Salir</a>
						 </span>
					</div>

				@else

					{{ Form::open(['route' => 'login', 'method' => 'POST', 'class' => 'login-form']) }}

					   {{ Form::email('email', null, ['class' => 'input-login', 'placeholder'=>'Email', 'maxlength' => '50', 'required']) }}<br class="res-br">
						{{ Form::password('password', ['class' => 'input-login', 'placeholder'=>'Contraseña','maxlength' => '30', 'required']) }}<br class="res-br">
						 <button type="submit" class="boton">Entrar</button><br>
						 <div class="terms-container2">
						 {{ Form::checkbox('remember', true, false, ['id' => 'remember']) }}
						 <label for="remember" class="remember">
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
					<button class="boton-login">Entrar</button>

				@endif
		</header>

	@yield('content')
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript" charset="utf-8"></script>
	<script>window.jQuery || document.write('<script src="{{ asset('js/lib/jquery-2.1.1.min.js') }}"><\/script>')</script>
	<script src="{{ asset('js/home.js') }}"></script>
	<script>var	 url_ruta = '{{ route("buscar") }}';</script>
	<script src="{{ asset('js/busqueda.js') }}"></script>
	@yield('custom-js')
	</body>
</html>