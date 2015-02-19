@extends('layout')

@section('header-class')class='fixed-header'@stop
@section('body-class')class='perfil-estudiante'@stop

@section('content')

<section class="perfil-seccion">
	<div class="max-container max-perfil">
		<div class="contenedor-absoluto">
			<div class="contenedor-relativo">		
				<div class="info-container">
					<div class="info-section">
						<figure class="img-container">
							<img src="{{ asset($estudiante->url_foto)  }}" class="img-perfil">			
						</figure>
					</div>
					<div class="info-section">
						<span class="info-perfil nombre-perfil"><strong>{{ $estudiante->nombre  }} {{ $estudiante->apellidos  }}</strong></span><br>
						<span class="info-perfil correo-perfil">{{ $estudiante->user->email  }}</span><br>
					</div>
					<div class="info-section">
						<span class="info-perfil"><a href="{{ route('area', [$estudiante->area->slug, $estudiante->area->id]) }}">{{ $estudiante->area->nombre  }}</a></span><br>
					</div>
					<div class="info-section">
						<span class="info-perfil align-left">{{ $estudiante->curriculum  }}</span><br>
					</div>		
				</div>
			</div>		
		</div>
		<div class="contenido-perfil">
			<div class="compartir-form">
				{{ Form::open(['route' => 'publicar', 'method' => 'POST', 'class' => 'form-publicar']) }}
					{{ Form::textarea('contenido', null, ['class' => 'textarea-compartir','maxlength' => '500', 'required']) }}
					{{ $errors->first('check', '<span class="back-error">:message</span>') }}
					<button type="submit" class="boton-compartir">Compartir</button>
				{{ Form::close() }}
			</div>
			<div class="publicaciones" id="publicaciones">
				@foreach ($estudiante->user->publicaciones as $publicacion)
					<div class="publicacion">
						<div class="publicacion-header">
							<a href="{{ route('estudiante', [$estudiante->slug, $estudiante->id]) }}"><img src="{{ asset($estudiante->url_foto) }}" alt="" class="img-avatar avatar-publicacion"></a>
							<div class="info-publicacion">
								<a class="nombre-publicacion" href="{{ route('estudiante', [$estudiante->slug, $estudiante->id]) }}">{{ $estudiante->nombre_corto  }}</a><br>
								<span class="email-publicacion">{{ $estudiante->user->email }}</span><br>
								<span class="fecha-publicacion">{{ $publicacion->fecha }}</span>
							</div>							
						</div>						
						<span class="contenido-publicacion">{{ $publicacion->contenido }}</span>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</section>

@stop

@section('custom-js')

<script src="http://cdnjs.cloudflare.com/ajax/libs/masonry/3.2.2/masonry.pkgd.min.js"></script>


 <script>

	$('#publicaciones').masonry({
	  columnWidth: 93,
	  itemSelector: '.publicacion'
	});

	$(document).ready(function() {
    var form = $('.form-publicar');
        form.bind('submit',function () {
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(),
                beforeSend: function(){
                    console.log('enviando. . .');
                },
                complete: function(data){
                    console.log('enviado!');
                },
                success: function (data) {
                    console.log('insertando datos');
                    if(data.success == false){
                        var errores = '';
                        for(datos in data.errors){
                            console.log(data.errors[datos]);
                        }
                    }else{
                        $(form)[0].reset();//limpiamos el formulario
                        console.log(data.message);
                        obtenerPosts();
                    }
                },
                error: function(errors){
                	console.log(errors)
                }
            });
       return false;
    });
    
    //al pulsar el botón de ver usuarios mostramos la información con ajax
   function obtenerPosts(){
        $.ajax({
            type: 'GET',
            url: '../posts',
            beforeSend: function(){
                console.log('beforeSend');
            },
            success: function (data) {
                console.log(data.publicaciones);   
            },
            error: function(errors){
                console.log(errors)
            }
        })
    }
});
 </script>

@stop