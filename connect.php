<?php

require "dev.php";

$host = "localhost";
$user = "group5";
$password = "1491484838604949499";
$dp = "group5";
$con = mysqli_connect($host,$user,$password,$dp);

if(!$con){

	die("Error". mysqli_connect_error());

}else{

	echo "connection succed";
	echo "<br> <hr>";
}

?>
