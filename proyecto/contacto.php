<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Contactos</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="contacto.css">
    <style type="text/css">
      textarea{
        resize: none;
      }
      
    </style>
</head>
<body>
    <div class="barra">

      <nav>
          <a href="inicio.html">INICIO</a>
          <a href="bienvenida.html">CURSOS</a>
          <a href="#">CONTACTOS</a>
          <a href="sobrenosotros.html">SOBRE NOSOTROS</a> 

      </nav>

      <h4 id="titulo">Learning-Em</h4>
      <img id="logo" src="img/logo.png" alt="Learning-Em">

  </div>


    <article id="article">
        <div class="container">
          <div class="row">
            <div class="span5">
            <h3>Contáctanos</h3>
            <div class="col-md-3">         
              <form class="form-main" name="ajax-form" id="ajax-form" action="#" method="post">
                
                <div class="form-group mb-1">
                  <div class="error" id="err-nombre">Nombre: <span><strong class="text-danger">*</strong></span></div>
                  <input class="label" type="text" name="Nombre"  autocomplete="off" required>
                </div>
                
                <div class="form-group mb-1">
                  <div class="error" id="err-correo">Correo: <span><strong class="text-danger">*</strong></span></div>
                  <input class="label" type="text" name="Correo" autocomplete="off" required>
                </div>
                
                <div class="form-group mb-1">
                  <div class="error" id="err-mensaje">Mensaje: <span><strong class="text-danger">*</strong></span></div>
                  <textarea class="tarea" name="Mensaje" autocomplete="off" required></textarea>
                </div>
                
                <button id="boton" class="btn btn-block mt-3">Enviar</button>
              </form>
            </div>
            </div>
          </div>    
        </div>
      </article>


      <footer>
        <div class="footer-content">
            <ul class="redes">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>

            </ul>
        </div>
        <div class="footer-a">
            <p>©Copyright all rights reserved.</p>

        </div>
      
      </footer>
</body>
</html>