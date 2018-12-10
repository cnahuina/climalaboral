<?php  
    include("../php/conexion.php");
    if(isset($_POST["idPregunta"]))
{
    $query = "
    SELECT p.pregunta,r.idDatos,o.descOpcion,count(*) as contando from preguntas p,respuesta r, opciones o where p.idPregunta = r.idPregunta and r.idOpcion=o.idOpcion and r.idPregunta ='".$_POST["idPregunta"]."' group by r.idOpcion";  
    $statement = $pdo->prepare($query); 
    $statement->execute();
    $result = $statement->fetchAll();
}
?>


           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['idOpcion', 'contando'],  
                          <?php  
                          foreach($result as $row)  
                          {  
                               echo "['".$row["descOpcion"]."', ".$row["contando"]."],";  
                          } 
                          ?>  
                     ]);  
           
                var options = {  
                      title: 'Pregunta : <?php echo html_entity_decode($row["pregunta"])?>',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           } 

           </script>  
<script type="text/javascript" >
window.onload = function () {
  	chart.render();
  	document.getElementById("printChart").addEventListener("click",function(){
    	chart.print();
    });  
}
</script>
          
           <div style="width:100%!important;text-align:center">  
         
                <br>
                <div id="piechart" style="width: 100%; height: 500px;"></div>
             
           </div>  
