<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Clima Laboral</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/jpg" href="images/suntime.jpg"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/css/intlTelInput.css'>
    <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css'>
    <link rel="stylesheet" href="css/style1.css">
  </head>
    <?php
      include_once 'php/conexion.php';
        $result = false;
          $opciones =$pdo->query("SELECT * from opciones");
    ?>
  <body>
    <!-- Multi step form --> 
    <section class="multi_step_form">
  
      <form id="msform" method="POST" action="datos_clima.php"> 
        <!-- Tittle -->
        <div class="tittle">
          <img src="images/suntime.jpg" width="120" alt=""><br><br>
          <h2>Encuesta clima Laboral</h2>
        </div>

        <!-- Agradecimiento -->

        <fieldset style="text-align:center">
          <h1 >GRACIAS POR RESOLVER LA ENCUESTA SOBRE CLIMA LABORAL</h1>
          <h2>Tu opinión importa</h2>
          <br><br>
          <a href="https://suntimestore.com" class="action-button">Volver</a> 
      
        </fieldset> 

      </form> 
    </section> 

    <!-- End Multi step form -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/js/intlTelInput.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js'></script>

      

    <script  src="js/index.js"></script>

  </body>
</html>
