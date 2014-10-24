<div class="terms-container">
       	{{$control }}
        <label for="{{ $nombre  }}">
               	<span class="check"></span>
               	<span class="box"></span>
                 Acepto los <a href="" class="inicio">terminos y condiciones</a>
        </label>
         @if ($error)
            <span class="back-error">{{ $error }}</span>
         @endif
</div>