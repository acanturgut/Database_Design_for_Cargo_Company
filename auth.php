<?php

require 'connect.php';

$username = $_POST["username"];
$password = $_POST["password"];

echo $username;
echo "<br><br>";
echo $password;


if($username == "admin" && $password == "admin"){

  require 'admin.php';

}else{

}

?>
