<?php 

include('php/conexion.php');



    if (isset($_POST['lugar'])) {
        
    $idpregunta = $_POST['idPregunta'];

    $idgrupopregunta = $_POST['IdGrupoPregunta'];

  	$lugar = $_POST['lugar'];
    $tienda = $_POST['tienda'];
    $area = $_POST['area'];
    $cargo = 'oculto';
    $estado = $_POST['estado'];
    $edad = $_POST['edad'];
    
    $opcion = $_POST['idPregunta'];



    $fecha = date("Y-m-d H:i:s");


    $smt = $pdo->prepare("INSERT INTO datos(idLugar, idTienda, idArea , idCargo , eCivil, edad) VALUES (?,?,?,?,?,?)");

      $smt->execute([$lugar, $tienda, $area,$cargo, $estado, $edad]);
 

    $smt = $pdo->prepare("SELECT idDatos FROM datos ORDER BY idDatos DESC LIMIT 1;");
    $smt->execute();
    $result = $smt->fetch(PDO::FETCH_OBJ);
    
    $idDatos = $result === false ? 1 : $result->idDatos;


    // @todo: FROM key 'idOpcion_85' or 'idOpcion_34' we need to get the question id which is ithe number
    // so we need to loop all $_POST and find idOpcion in order to get the question id respectively and store
    // in an different array like $questionsAnswers[] => ['question_id' => 88, 'answer_id'];
    // then we can store them successfully.

    $contador_preguntas = 50;
    for ($i = 1; $i <= $contador_preguntas; $i++) {
        // Si no está vacio la pregunta.
        if (!empty($_POST['idOpcion_' . $i])) {
          $a = $_POST['idOpcion_' . $i];
    
          
            $smt1 = $pdo->prepare("INSERT INTO respuesta (idDatos,idGrupoPregunta,idPregunta,idOpcion,texto) VALUES (?,?,?,?,?);");
            $result = $smt1->execute([$idDatos, $idgrupopregunta, $i,$a,$fecha]);
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
    header("location: gracias.php");



