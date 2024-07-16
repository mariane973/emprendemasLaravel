<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="{!! asset('css/usuario.css') !!}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
  <body>

    <section>
        <div class="Login container">
            <div class="Contenedor row">
                <div class="Logo_Use col-5">
                    <div class="Iso_Log col">
                    <a href="/" class="fw-bold">
                    <img src="imagenes/tucan.png" alt="">
                    </a>
                        <div class="Text">
                            <h1 class="emprende">EMPRENDE</h1>
                            <h1 class="mas">MAS</h1>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <hr>
                </div>
                <div class="Info col-5">
                    <div class="Title">
                        <h1>INICIAR SESION</h1>
                    </div>
                    <div class="In_Use">
                        <input type="text"  class="fw-semibold" placeholder="Usuario">
                    </div>
                    <div class="In_Use">
                        <input type="text"  class="fw-semibold" placeholder="Contraseña">
                    </div>
                    <div class="btn-ingresar text-center">
                        <input type="button" class="fw-bold"  value="Ingresar">
                    </div>
                    <div class="Comentario">
                        <h1>¿Aún no tienes una</h1>
                        <h1 class="mb-4">cuenta?</h1>
                    </div>
                    <div class="Register text-center">
                        <a href="/register">Crear una cuenta</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>