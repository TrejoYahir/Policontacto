@extends('layout')

@section('content')

<section class="home">
	<article class="max-container">
		{{ Form::model($estudiante, ['route' => 'cambiarPerfil', 'method' => 'PUT', 'class' => 'form-registro', 'novalidate']) }}

			{{ Campo::text('nombre', null, ['class' => 'input-registro', 'required']) }}
			{{ Campo::text('apellidos', null, ['class' => 'input-registro', 'required']) }}
			<div class="select-form">
				{{--<div class="form-inline">--}}
					{{--<span class="texto-form">Fecha de nacimiento</span><br/>--}}
					{{--{{ Form::selectRange('fecha[day]', 1, 31, null, ['class' => 'combo-registro']) }}--}}
					{{--{{ Form::selectRange('fecha[month]', 1, 12, null, ['class' => 'combo-registro']) }}--}}
					{{--{{ Form::selectYear('fecha[year]', date('Y') - 14, date('Y') - 80, null, ['class' => 'combo-registro']) }}--}}
				{{--</div>--}}
				<div class="form-inline">
					<span class="texto-form">Género</span><br/>
					{{ Form::select('genero', ['Hombre' => 'Hombre', 'Mujer' => 'Mujer'], null, ['class' => 'combo-genero']) }}
				</div>
			</div>
			{{Campo::textarea('curriculum', null, ['class' => 'input-registro', 'required']) }}
            <div class="select-form">
            	<div class="form-inline">
          			<span class="texto-form">Área</span><br/>
            		{{ Campo::select('area_id', $areas, null, ['class' => 'combo-perfil']) }}
                    {{ Campo::select('plantel_id', $planteles, null, ['class' => 'combo-perfil']) }}
                    {{ Campo::select('especialidad_id', $especialidades, null, ['class' => 'combo-perfil']) }}
         		</div>
          	</div>
          	{{--<div class="terms-container">--}}
                {{--{{ Form::checkbox('serv', null, false, ['id' => 'check', 'required']) }}--}}
                   	{{--<label for="check">--}}
                     		{{--<span class="check"></span>--}}
                     		{{--<span class="box"></span>--}}
                        		{{--Servicio Social--}}
                    {{--</label>--}}
            {{--</div>--}}
            {{--<div class="terms-container2">--}}
                {{--{{ Form::checkbox('empleo', null, false, ['id' => 'check2', 'required']) }}--}}
                {{--<label for="check2">--}}
                    {{--<span class="check2"></span>--}}
                    {{--<span class="box2"></span>--}}
                    {{--Empleo--}}
                {{--</label>--}}
            {{--</div>--}}
			<button type="submit" class="boton-registro">Editar</button>

		{{ Form::close() }}
	</article>
</section>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/home.js') }}"></script>
<script>window.jQuery || document.write('<script src="{{ asset('js/lib/jquery-2.1.1.min.js') }}"><\/script>')</script>

@stop