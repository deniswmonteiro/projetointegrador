<?php
	function Connection(){
  	$server="localhost";
  	$user="root";
  	$pass="";
  	$db="dadosarduino_db";
     
  	$connection = mysqli_connect($server, $user, $pass);
           
  	if (!$connection) {
    	die('MySQL ERROR: ' . mysql_error());
  	}
  
  	mysqli_select_db($connection,$db) or die( 'MySQL ERROR: '. mysql_error() );
  
		return $connection;
 }