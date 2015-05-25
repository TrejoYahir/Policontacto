<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verifica tu cuenta en Policontacto.</h2>

        <div>
            ¡Gracias por unirte a Policontacto! Para confirmar tu cuenta solo haz click en el enlace siguiente y esta se verificará automáticamante:
            {{ URL::to('registro/v/' . $confirmation_code) }}.<br/>
            Si no te registraste a Policontacto ignora este correo.

        </div>

    </body>
</html>