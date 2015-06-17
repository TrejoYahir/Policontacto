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
						@if(esEstudiante() && isset(Auth::user()->estudiante->nombre))
							<span class="elemento-info"><a href="{{ route('estudiante', [Auth::user()->estudiante->slug]) }}" class="nombre-avatar">{{ Auth::user()->estudiante->nombre }}</a></span>
								<a href="{{ route('estudiante', [Auth::user()->estudiante->slug]) }}"><img src="{{ asset(Auth::user()->estudiante->url_foto) }}" alt="" class="img-avatar elemento-info"></a>
						@elseif(esEstudiante() && !isset(Auth::user()->estudiante->nombre))
							<span class="elemento-info"><a href="{{ route('perfil') }}" class="nombre-avatar">{{ Auth::user()->email  }}</a></span>
					 	@endif
					 	@if(esEmpresa() && isset(Auth::user()->empresa->nombre))
							<span class="elemento-info"><a href="{{ route('empresa', [Auth::user()->empresa->slug]) }}" class="nombre-avatar">{{ Auth::user()->empresa->nombre }}</a></span>
								<a href="{{ route('empresa', [Auth::user()->empresa->slug]) }}"><img src="{{ asset(Auth::user()->empresa->url_foto) }}" alt="" class="img-avatar elemento-info"></a>
						@elseif(esEmpresa() && !isset(Auth::user()->empresa->nombre))
							<span class="elemento-info"><a href="{{ route('perfilEmpresa') }}" class="nombre-avatar">{{ Auth::user()->email  }}</a></span>
						@endif
						@if(!(isset(Auth::user()->empresa->nombre)) && !(isset(Auth::user()->estudiante->nombre)))
							<a href="{{ route('logout') }}" class="salir-p"><i class="fa fa-times-circle-o"></i></a>
						@endif
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
		@if(Auth::check() && isset(Auth::user()->empresa->nombre) || Auth::check() && isset(Auth::user()->estudiante->nombre))
			<div class="menu-navegacion @if(esEstudiante()) colapsado-e @elseif(esEmpresa()) colapsado @endif">
				<div class="elemento-menu menu-top">
					<div class="icono-menu menu-control"><span class="icono-control"> < </span></div>
					<span class="menu-titulo">Menú</span>
				</div>
				<div class="elemento-menu {{ (Request::is('/') ? 'active' : '') }}" onclick="window.location='{{ route('home') }}';">
					<i class="fa fa-home icono-menu"></i> <span>Inicio</span>
				</div>				
				@if(esEstudiante() && isset(Auth::user()->estudiante->nombre))
					<div class="elemento-menu {{ (Request::is('a/*') ? 'active' : '') }}" onclick="window.location='{{ route('area', [Auth::user()->estudiante->area->slug]) }}';">
						<i class="fa fa-compass icono-menu"></i> <span>Explorar</span>
					</div>
				@elseif(esEmpresa() && isset(Auth::user()->empresa->nombre))
					<div class="elemento-menu {{ (Request::is('a/*') ? 'active' : '') }}" onclick="window.location='{{ route('area', [Auth::user()->empresa->area->slug]) }}';">
						<i class="fa fa-compass icono-menu"></i> <span>Explorar</span>
					</div>
				@endif
				<div class="elemento-menu {{ ((Request::is('mensajes/*') || Request::is('mensajes')) ? 'active' : '') }}" onclick="window.location='{{ route('chat') }}';">
					<span id="mensajes-count"></span>
					<i class="fa fa-comments icono-menu"></i> <span>Mensajes</span>					
				</div>
				@if(esEstudiante() && isset(Auth::user()->estudiante->nombre))
					<div class="elemento-menu {{ (Request::is('perfil') ? 'active' : '') }}" onclick="window.location='{{ route('perfil') }}';">
						<i class="fa fa-user icono-menu"></i> <span>Editar perfil</span>
					</div>
				@elseif(esEmpresa() && isset(Auth::user()->empresa->nombre))
					<div class="elemento-menu {{ (Request::is('vacantes') ? 'active' : '') }}" onclick="window.location='{{ route('vacantes') }}';">
						<i class="fa fa-pencil-square-o icono-menu"></i> <span>Adm. vacantes</span>
					</div>
					<div class="elemento-menu {{ (Request::is('em/perfil') ? 'active' : '') }}" onclick="window.location='{{ route('perfilEmpresa') }}';">
						<i class="fa fa-user icono-menu"></i> <span>Editar perfil</span>
					</div>
				@endif
				<div class="elemento-menu {{ (Request::is('cuenta') ? 'active' : '') }}" onclick="window.location='{{ route('cuenta') }}';">
					<i class="fa fa-cog icono-menu"></i> <span>Editar cuenta</span>
				</div>
				<div class="elemento-menu" onclick="window.location='{{ route('logout') }}';">
					<i class="fa fa-sign-out icono-menu"></i> <span>Salir</span>
				</div>
			</div>
		@endif

	@yield('content')
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript" charset="utf-8"></script>
	<script>window.jQuery || document.write('<script src="{{ asset('js/lib/jquery-2.1.1.min.js') }}"><\/script>')</script>
	<script src="{{ asset('js/home.js') }}"></script>
	<script>
		var	 url_ruta_buscar = '{{ route("buscar") }}';
		var	 url_mensajes_count = '{{ route("mensajesCount") }}';
	</script>
	<script src="{{ asset('js/busqueda.js') }}"></script>
	@if(Auth::check() && isset(Auth::user()->estudiante->nombre) || Auth::check() && isset(Auth::user()->empresa->nombre))
		<script>
			(function getMensajesCount(){
			$.ajax({ 
					type: 'POST',
					url: url_mensajes_count,
					success: function(data){
						$("#mensajes-count").html(data);
					}, 
					complete: getMensajesCount,
					timeout: 30000 
				});
			})();
		</script>
	@endif
	@yield('custom-js')
	</body>
</html>