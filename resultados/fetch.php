
<?php

//fetch.php

include('../php/conexion.php');



if(isset($_POST["idPregunta"]))
{
    $query = "
    SELECT idPregunta,idDatos,idOpcion,
    count(*) as contando from respuesta 
    where idPregunta ='".$_POST["idPregunta"]."' group by idOpcion";
 $statement = $pdo->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'idOpcion'   => $row["idOpcion"],
   'contando'  => $row["contando"]
  );

  
 }

 echo json_encode($output);

}
?>