<?php
	include("connect.php");
    
  $link=Connection();
	$sensorTemp=$_POST["temperatura"];
	$sensorGas=$_POST["gas"];
	$sensorChamas=$_POST["chamas"];
 	$query = "INSERT INTO dados_recebidos(dia_hora, temperatura, gas, chamas) VALUES (current_timestamp, '".$sensorTemp."', '".$sensorGas."', '".$sensorChamas."')"; 
   
  mysqli_query($link,$query);
 	mysqli_close($link);
     
  header("Location: index.php");
?>