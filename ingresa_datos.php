<?php 

include('php/conexion.php');

  print_r($_POST);

    if (isset($_POST['nombres'])) {
        
    $idpregunta = $_POST['idPregunta'];

    $idgrupopregunta = $_POST['IdGrupoPregunta'];

  	$nombres = $_POST['nombres'];
    $nroboleta = $_POST['nroboleta'];
    $email = $_POST['email'];
    $sms = $_POST['sms'];
    $edad = $_POST['edad'];
    $tienda = $_POST['tienda'];


    $opcion = $_POST['idPregunta'];

    $texto = "texto largooooo";


    $ahora = date("Y-m-d H:i:s");

    $subject = "CORREO";
    $message = "hola";
    $to = "cnahuina@gmail.com";

    $cabeceras = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $cabeceras .= 'From: Mi Nombre<'.$email.'>';

    //if (mail($to, $subject, $message, $cabeceras)) {
    $smt = $pdo->prepare("INSERT INTO datos (nombres, email, nro,edad,nroBoleta,idtienda) VALUES (?,?,?,?,?,?)");

      $smt->execute([$nombres, $email, $sms,$edad, $nroboleta, $tienda ]);
 

    $smt = $pdo->prepare("SELECT idDatos FROM datos ORDER BY idDatos DESC LIMIT 1;");
    $smt->execute();
    $result = $smt->fetch(PDO::FETCH_OBJ);
    
    $idDatos = $result === false ? 1 : $result->idDatos;






    // @todo: FROM key 'idOpcion_85' or 'idOpcion_34' we need to get the question id which is ithe number
    // so we need to loop all $_POST and find idOpcion in order to get the question id respectively and store
    // in an different array like $questionsAnswers[] => ['question_id' => 88, 'answer_id'];
    // then we can store them successfully.

    $contador_preguntas = 7;
    for ($i = 1; $i <= $contador_preguntas; $i++) {
        // Si no está vacio la pregunta.
        if (!empty($_POST['idOpcion_' . $i])) {
          $a = $_POST['idOpcion_' . $i];
            echo "<br>La pregunta: " . $i . " - tiene como respuesta la opción: " .$a."<br>";
          
            $smt1 = $pdo->prepare("INSERT INTO respuesta (idDatos,idGrupoPregunta,idPregunta,idOpcion,texto) VALUES (?,?,?,?,?);");
            $result = $smt1->execute([$idDatos, $idgrupopregunta, $i,$a,$texto]);
        }
    }
 

  /*  $smt1 = $pdo->prepare("SELECT idrespuesta FROM respuesta ORDER BY idrespuesta DESC LIMIT 1;");
    $smt1->execute();

    $result = $smt1->fetch(PDO::FETCH_OBJ);
    $idRespuesta = $result === false ? 1 : $result->idrespuesta;
    

    $smt2 = $pdo->prepare("INSERT INTO detalle_respuesta (idrespuesta,idOpcion,fecha) VALUES (?,?,?)");
    foreach ($variable as $key => $value) {
      $result = $smt2->execute([$idRespuesta, $idopcion,$ahora ]);
    }
      
*/
  



      
    }
    //header("location: index.php");



