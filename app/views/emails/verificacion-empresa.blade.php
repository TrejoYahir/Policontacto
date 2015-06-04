<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verifica tu cuenta en Policontacto.</h2>

        <div>
            ¡Gracias por unirte a Policontacto! Para confirmar tu cuenta solo haz click en el enlace siguiente y esta se verificará automáticamante:
            {{ URL::to('registro/v/e/' . $confirmation_code) }}.
            <br/>
            Despues de verificar tu cuenta tendrás que llenar tu información para que esta sea verifiada por un administrador y se te de el sello de aprobación para usar nuestra plataforma.
            <br>
            Si no te registraste a Policontacto ignora este correo.

        </div>

    </body>
</html>