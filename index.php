<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Clima Laboral</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SuntimeStore">
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

    <script language="JavaScript">
        function CambiarFormulario(){
            switch(document.forms[0].lugar.selectedIndex){
                case 0: 
                    document.forms[0].tienda.disabled=true;
                    break;
                case 1: 
                    document.forms[0].tienda.disabled=false;
                    break;
                case 2: 
                    document.forms[0].tienda.disabled=false;
                    break;
            }
        }
        function controlar(obj, event){
          if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;
          if(obj.value.length>=2){
            alert('debe tener 2 digitos');
             limpiar();
          }} 
       function limpiar() {
         document.getElementById("inputEdad").value = "";
        }
    </script>

  <body onLoad="CambiarFormulario();">
    <!-- Multi step form --> 
    <section class="multi_step_form">
      <?php 
      if($result){
          echo "<div class='alert alert-success'> Registros agregados exitosamente";
      }?>  
      <form id="msform" method="POST" action="datos_clima.php"> 
        <!-- Tittle -->
        <div class="tittle">
          <img src="images/suntime.jpg" width="120" alt=""><br><br>
          <h2>Encuesta clima Laboral</h2>
        </div>
        <!-- progressbar -->
        <ul id="progressbar">
          <li class="active">Verifique sus Datos</li>  
          <li>Iniciar</li> 
          <li></li>
          <li>Agradecimiento</li>
        </ul>
        <!-- Verificar datos -->
        <fieldset>
        
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputUbicacion">Lugar de trabajo</label>
                        <select required="required" name="lugar" id="inputUbicacion" onChange="CambiarFormulario()" class="form-control">
                            <option>-- Selecciona --</option>
                            <option value="1">Tienda</option>
                            <option value="2">Oficina Principal</option>
                        </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputTienda">Si trabajas en tienda seleccionar en cual</label>
                        <select name="tienda" id="inputTienda" class="form-control">
                            
                            <?php 
                                $preguntas =$pdo->query("SELECT * FROM tiendas order by idTienda asc");?>
                                <?php foreach ($preguntas as $pregunta_key => $pregunta):?> 
                                    <option value="<?php echo $pregunta['idTienda']?>" name="<?php echo $pregunta['idTienda']?>"><?php echo $pregunta['tienda']?></option>
                                <?php endforeach ?>

                        </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputArea">Área</label>
                    <select required="required" name="area" id="inputArea" class="form-control">
                        <option value="0">-- Selecciona --</option>
                        <option value="1">Contabilidad</option>
                        <option value="2">Marketing</option>
                        <option value="3">Logística</option>
                        <option value="4">RR.HH - Administración</option>
                        <option value="5">Sistemas</option>
                        <option value="6">Ventas</option>
                        <option value="7">Gerencia</option>
                    </select>
                </div>

            </div>
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputECivil">Estado Civil</label>
                <select required name="estado" id="inputECivil" class="form-control">
                        <option value="0">-- Selecciona --</option>
                        <option value="1">Soltero</option>
                        <option value="2">Casado</option>
                        <option value="3">Viudo</option>
                        <option value="4">Divorciado</option>
                    </select>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress">Edad</label>
                <input required id="inputEdad" type="number" onKeypress="controlar(this, event);" max="2 maxlength="2" name="edad" class="form-control"  placeholder="Ingrese su edad">
            </div>
          </div>
          <button type="button" style="botton:0;" class="action-button previous_button">Atrás</button>
          <button type="button" id="btn-add" style="botton:0;" class="next action-button">Continuar</button>  
          <br><br><br><br>  
        </fieldset>

        <!-- Instrucciones -->
        <fieldset style="text-align:center">
          <h1 style="padding:6%" >AYÚDANOS A MEJORAR RESPONDIENDO ESTA ENCUESTA DE ESCALA DE OPINIONES</h1>
          <button type="button" class="action-button previous previous_button">Atrás</button>
          <button type="button" class="next action-button">Continuar</button>  
          <br><br><br><br>  
        </fieldset> 

        <!-- Preguntas --> 
        <?php 
          $preguntas =$pdo->query("SELECT * FROM preguntas order by idPregunta asc");?>
         
        
          <fieldset style="">
        <?php foreach ($preguntas as $pregunta_key => $pregunta):?> 
            <div style="border:1px solid ccc; background:#000000;text-align:center">

                <h3 style="color:#ffffff"><?php echo utf8_decode($pregunta['pregunta']);?></h3>
                <input type="hidden" name="idPregunta" value="<?php echo $pregunta['idPregunta']?>"/>
                <input type="hidden" name="IdGrupoPregunta" value="<?php echo $pregunta['idGrupoPregunta']?>"/>
            </div>
            <div style="border:1px solid ccc; background:#ececec;padding:4%;">
                <?php 
                    $opciones =$pdo->query("SELECT * FROM opciones");
                    foreach ($opciones as $opcion): ?>
                        <div class="opciones">
                            <input class="form-check-input" required="required" type="radio" name="idOpcion_<?php echo $pregunta['idPregunta'] ?>" id="<?php echo $opcion['idOpcion']?>" value="<?php echo $opcion['idOpcion']?>" >
                            <label class="form-check-label" for="<?php echo $opcion['idOpcion']?>"><?php echo $opcion['descOpcion']?></label>     
                        </div>
                <?php endforeach?>
            </div>
            
        <?php endforeach?>
                <br><br><br>
              <button type="button" class="action-button previous previous_button">Atrás</button> 
              <button type="submit" class="action-button">Continuar</button>
              <br><br><br><br> 
          </fieldset> 
       

        
        
        <!-- Agradecimiento -->

        <fieldset style="text-align:center">
          <h1 >GRACIAS POR CONTARNOS TU EXPERIENCIA</h1>
          <h2 class="code">CDSFSDEF</h2>
          <h3>USA ESTE CODE PARA CANJEAR PREMIOS, CLICK EN CONTINUAR PARA HACERLO VÁLIDO </h3>
          <button type="button" class="action-button previous previous_button">Atrás</button>
          <button type="button" class="action-button">Continuar</button> 
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
