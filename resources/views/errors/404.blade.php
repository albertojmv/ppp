<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>404</title>
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="assets/css/main.min.css">
  </head>
  <body class="error">
      <br>
      <br>
      <br>
      <br>
    <div class="container">
      <div class="col-lg-8 col-lg-offset-2 text-center">
        <div class="logo">
          <h1>404</h1>
        </div>
        <p class="lead text-muted">No se puede encontrar la página solicitada.</p>
        <div class="clearfix"></div>
        
        <div class="clearfix"></div>
        <br>
        <div class="col-lg-6 col-lg-offset-3">
          <div class="btn-group btn-group-justified">
            <a href="{{URL::to("login")}}" class="btn btn-info">Ir al Panel de Control</a> 
            <a href="{{URL::to("/")}}" class="btn btn-warning">Ir al Website</a> 
          </div>
        </div>
      </div><!-- /.col-lg-8 col-offset-2 -->
    </div>
  </body>
</html>