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
    			<img src="{{ asset('img/logo-small.png') }}" alt="" class="logo">
    			<h1 class="titulo">Poli<strong>contacto</strong></h1>
    			<form action="" class="login-form" method="post">
    				<input type="text" name="correo" id="correo" placeholder="Correo" class="input-login" required><br class="res-br">
    				<input type="password" name="password" id="password" placeholder="Contraseña" class="input-login" required><br class="res-br">
    				<button type="submit" class="boton">Entrar</button><br>
    				<div class="terms-container2">
    					<input type="checkbox" id="check2">
    					<label for="check2">
    						<span class="check2"></span>
    						<span class="box2"></span>
    						Mantener sesión iniciada
    					</label>
    				</div>
    			</form>
    		</div>
    		<button class="boton-login">login</button>
    	</header>

@yield('content')

    </body>
</html>