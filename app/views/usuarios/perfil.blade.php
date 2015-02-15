@extends('layout')

@section('content')

<section class="home">
	<article class="max-container">
		{{ Form::model($estudiante, ['route' => 'cambiarPerfil', 'method' => 'PUT', 'class' => 'form-registro', 'novalidate']) }}

			{{ Campo::text('nombre', null, ['class' => 'input-registro', 'required']) }}
			{{ Campo::text('apellidos', null, ['class' => 'input-registro', 'required']) }}
			<div class="select-form">
				<div class="form-inline">
					<span class="texto-form">Fecha de nacimiento</span><br/>
					{{ Form::selectYear('fecha[year]', date('Y') - 14, date('Y') - 80, null, ['class' => 'combo-registro']) }}
					{{ Form::selectRange('fecha[month]', 01, 12, null, ['class' => 'combo-registro']) }}
					{{ Form::selectRange('fecha[day]', 01, 31, null, ['class' => 'combo-registro']) }}
				</div>
				<div class="form-inline">
					<span class="texto-form">Género</span><br/>
					{{ Form::select('genero', ['Masculino' => 'Masculino', 'Femenino' => 'Femenino'], null, ['class' => 'combo-genero']) }}
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
          	<div class="terms-container">
                {{ Form::checkbox('serv', '1', false, ['id' => 'check']) }}
                   	<label for="check">
                     		<span class="check"></span>
                     		<span class="box"></span>
                        		Servicio Social
                    </label>
            </div>
            <div class="terms-container2">
                {{ Form::checkbox('empleo', '1', false, ['id' => 'check2']) }}
                <label for="check2">
                    <span class="check2"></span>
                    <span class="box2"></span>
                    Empleo
                </label>
            </div>
			<button type="submit" class="boton-registro">Editar</button>

		{{ Form::close() }}
	</article>
</section>

@stop