<?php

include 'connect.php';

$username = $_GET['username'];
$p_id = $_POST['p_id'];
$p_status = $_POST['p_status'];

$sql = "UPDATE package SET statue='".$p_status."' WHERE ID=".$p_id.";";

if(mysqli_query($con,$sql)){

  echo "SUCCESS <hr> ";
  include "employee_account.php";

}else{
  echo "FAIL <hr> ";
  echo("Error description: " . mysqli_error($con));
  include 'employee_account.php';

}



?>
