<?php  
//index.php
include("../php/conexion.php");

$query = "SELECT idPregunta,pregunta FROM preguntas GROUP BY pregunta ORDER BY idPregunta ";
$statement = $pdo->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

$cantidadPersonas = "select COUNT(d.idDatos)total, tienda.result1 as tienda,oficina.result2 as oficina,lima.result3 as lima,provincia.result4 as provincia from datos d, ( SELECT COUNT(idTienda)result1 from datos WHERE idTienda != 0)tienda, ( select COUNT(idTienda)result2 from datos where idTienda=0)oficina,( SELECT count(tt.ciudad)result3 FROM datos dd ,tiendas tt WHERE dd.idTienda = tt.idTienda and tt.ciudad = 1)lima,( SELECT count(tt.ciudad)result4 FROM datos dd ,tiendas tt WHERE dd.idTienda = tt.idTienda and tt.ciudad != 1)provincia";
$statement1 = $pdo->prepare($cantidadPersonas);
$statement1 -> execute();
$data = $statement1 ->fetchAll();
?>  

<!DOCTYPE html>  
<html>  
    <head>  
        <title>Resultados Encuesta Clima Laboral</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>  
    <body> 
        <br /><br />
        <div class="container" style="width:60%;text-align:center">  
            <h3 style="text-align:center">ESTADÍSTICA DE RESPUESTAS GENERALES</h3>  
            <br />  
            <form method="POST" action="index.php">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-9">
                        <select name="idPregunta" class="form-control" id="idPregunta">
                                <option value="">Seleciona Pregunta</option>
                            <?php
                            foreach($result as $row)
                            {
                                echo '<option value="'.$row["idPregunta"].'">'.$row["pregunta"].'</option>';
                            }
                            ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                        <input type="submit" value="Ver estadística">
                            
                        </div>

                    </div>

                 <?php include('draw.php')?>
    
                </div>
                        
                </form>    
            </div>

            <label>Más Detalles Generales </label> 

            <table   class="table table-bordered">
            <tr>
                <th class="bg-primary" scope="col">Cantidad Personas encuestadas</th>
                <th class="bg-primary" scope="col">De Tienda</th>
                <th class="bg-primary" scope="col">De Oficina</th>
            </tr>
                <?php foreach($data as $rowData)
                    {
                    echo '<tr>';
                        echo '<td >' . $rowData['total'] . '</td>';
                        echo '<td >' . $rowData['tienda'] . '</td>';
                        echo '<td >' . $rowData['oficina'] . '</td>';
                    echo '</tr>';
                    }
                ?>
            </table>
            <table   class="table table-bordered">
            <tr>
                <th class="bg-primary" scope="col">Cantidad Personas encuestadas</th>
                <th class="bg-primary" scope="col">Son de Lima</th>
                <th class="bg-primary" scope="col">Son de Provincia</th>
            </tr>
                <?php foreach($data as $rowData)
                    {
                    echo '<tr>';
                        echo '<td >' . $rowData['total'] . '</td>';
                        echo '<td >' . $rowData['lima'] . '</td>';
                        echo '<td >' . $rowData['provincia'] . '</td>';
                    echo '</tr>';
                    }
                ?>
            </table>
            
        </div>  
    </body>  
</html>