<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Encuesta Suntime</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/jpg" href="images/suntime.jpg"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/css/intlTelInput.css'>
    <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css'>
    <link rel="stylesheet" href="css/style.css">
  </head>
    <?php
      include_once 'php/conexion2.php';
        $result = false;
          $opciones =$pdo->query("SELECT * from opciones");
    ?>
  <body>
    <!-- Multi step form --> 
    <section class="multi_step_form">
      <?php 
      if($result){
          echo "<div class='alert alert-success'> Registros agregados exitosamente";
      }?>  
      <form id="msform" method="POST" action="sendsms.php"> 
        <!-- Tittle -->
        <div class="tittle">
          <img src="images/suntime.jpg" width="120" alt=""><br><br>
          <h2>Formulario de Apreciación del cliente</h2>
        </div>
        <!-- progressbar -->
        <ul id="progressbar">
          <li class="active">Verifique sus Datos</li>  
          <li>Iniciar</li> 
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li>Opcional</li>
          <li>Agradecimiento</li>
        </ul>
        <!-- Verificar datos -->
        <fieldset>
          <h3>Ingrese sus datos Personales</h3>
          <div class="form-group">
            <label for="inputEmail4">Nombre</label>
            <input type="text" name="nombres" class="form-control" id="inputEmail4" placeholder="Nombre">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Email</label>
              <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
              <label for="inputTelefono">Nro Telefónico</label>
              <input type="text" name="sms" class="form-control" id="inputTelefono" placeholder="Nro Telefónico">
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Edad</label>
            <input type="text" name="edad" class="form-control" id="inputEdad" placeholder="Ingrese su edad">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputAddress2">Nro Boleta</label>
              <input type="text" name="nroboleta" class="form-control" id="inputBoleta" placeholder="Ingrese Nro de boleta">
            </div>
            <div class="form-group col-md-6">
              <label for="inputState">Tienda</label>
              <input type="text" name="tienda" class="form-control" id="inputtienda" placeholder="Ingrese tienda">
            </div>
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck">
              <label class="form-check-label" for="gridCheck">
                  Acepto términos y condiciones
              </label>
            </div>
          </div>
          <button type="button" style="botton:0;" class="action-button previous_button">Atrás</button>
          <button type="button" id="btn-add" style="botton:0;" class="next action-button">Continuar</button>  
          <br><br><br><br>  
        </fieldset>

        <!-- Instrucciones -->
        <fieldset style="text-align:center">
          <h1 style="padding:6%" >AYÚDANOS A MEJORAR NUESTRA ATENCIÓN CON ESTAS 5 PREGUNTAS</h1>
          <button type="button" class="action-button previous previous_button">Atrás</button>
          <button type="button" class="next action-button">Continuar</button>  
          <br><br><br><br>  
        </fieldset> 

        <!-- Preguntas --> 
        <?php 
          $preguntas =$pdo->query("SELECT * FROM preguntas order by idPregunta asc");?>
         
        <?php foreach ($preguntas as $pregunta_key => $pregunta):?> 
          <fieldset style="text-align:center">
        
            <h2><?php echo $pregunta['pregunta'];?></h2>
            <br><br>
  
            <input type="hidden" name="idPregunta" value="<?php echo $pregunta['idPregunta']?>"/>
            <input type="hidden" name="IdGrupoPregunta" value="<?php echo $pregunta['idGrupoPregunta']?>"/>

            <?php 
            $idPregunta = $pregunta['idPregunta'];
            $opciones =$pdo->query("SELECT * FROM opciones where idPregunta=$idPregunta");
            foreach ($opciones as $opcion): ?>
              <div style="display:inline-flex">

              <input class="form-check-input" type="radio" name="idOpcion_<?php echo $pregunta['idPregunta'] ?>" id="<?php echo $opcion['idOpcion']?>" value="<?php echo $opcion['idOpcion']?>" >
              <label class="form-check-label" for="<?php echo $opcion['idOpcion']?>"><?php echo $opcion['descOpcion']?></label>
                        
              </div>
            <?php endforeach?>
              <br><br><br>
              <button type="button" class="action-button previous previous_button">Atrás</button> 
              <button type="button" class="next action-button">Continuar</button>
              <br><br><br><br>  
          </fieldset> 
        <?php endforeach?>

        
        
        <!-- Agradecimiento -->

        <fieldset style="text-align:center">
          <h1 >GRACIAS POR CONTARNOS TU EXPERIENCIA</h1>
          <h2 class="code">CDSFSDEF</h2>
          <h3>USA ESTE CODE PARA CANJEAR PREMIOS, CLICK EN CONTINUAR PARA HACERLO VÁLIDO </h3>
          <button type="button" class="action-button previous previous_button">Atrás</button>
          <button type="submit" class="action-button">Continuar</button> 
          <br><br>
          <h6>Este codigo llegará a su celular para poder canjear la promoción</h6>
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
