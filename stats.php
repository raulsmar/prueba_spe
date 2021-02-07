<?php
session_start();
$rol = $_SESSION['rol'];

if (@!$_SESSION['user']) {
	header("Location:index.php");
}
else if ($rol != "2") {
		header("Location:inicio.php");
}

require("php/conexion.php");
$sql="select * from public.user where online = '2'";
$query = pg_query($dbconn, $sql);
$sql1="select COUNT(*) online from public.user where online = '2'";
$query1=pg_query($dbconn,$sql1);
$sql2="select COUNT(*) online from public.user where online = '1'";
$query2=pg_query($dbconn,$sql2);
?>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

    <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Actividad Usuario', 'Porcentaje'],  
                      <?php
                            $fila1 = pg_fetch_assoc($query1);
                            $fila2 = pg_fetch_assoc($query2);
                            echo "['Conectados', ".$fila1["online"]."],";
                            echo "['Desconectados', ".$fila2["online"]."],"; 
                          ?>
                     ]);  
                var options = {  
                      title: 'Porcentaje de conectados',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
    </script>  




  </head>
<body style="background-color: gray">
<header class="header">
</header>

<!-- ======================================== Contenedor=============================== -->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="jumbotron">
				<a href="php/salir.php" class="btn btn-info">Salir del sistema</a>
                <a href="admin.php" class="btn btn-info">Dashboard</a>
				<a href="inicio.php" class="btn btn-info">Inicio</a>
				<h2> Administración de usuarios registrados</h2>	
		        <div class="well well-small">
                    <hr class="soft"/>
                    
                    <h4>Tabla de Usuarios</h4>
                    <div class="row-fluid">


                        <?php
                            $ful = pg_num_rows($query);
                            echo " <p> Usuarios Conectados: ".$ful."</p>";

                            echo "<table id='table' border='1'; class='table table-hover';>";
                                echo "<tr class='warning'>";
                                    echo "<td>Id</td>";
                                    echo "<td>Nombre</td>";
                                    echo "<td>Apellido</td>";
                                    echo "<td>Identificacion</td>";
                                    echo "<td>Usuario</td>";
                                    echo "<td>Correo</td>";
                                echo "</tr>";

                            
                        ?>
                        
                        <?php 
                            while($arreglo=pg_fetch_array($query)){
                                
                                echo "<tr class='success'>";
                                    echo "<td>$arreglo[0]</td>";
                                    echo "<td>$arreglo[1]</td>";
                                    echo "<td>$arreglo[5]</td>";
                                    echo "<td>$arreglo[4]</td>";
                                    echo "<td>$arreglo[6]</td>";
                                    echo "<td>$arreglo[2]</td>";
                                    
                                echo "</tr>";
                            }

                            echo "</table>";

                        ?>

                        <br /><br />  
                    <div style="width:900px;">  
                                <h3 align="center">Grafica</h3>  
                                <br />  
                                <div id="piechart" style="width: 900px; height: 500px;"></div>  
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- ======================================== End Contenedor =============================== -->
	</style>
  </body>
</html>