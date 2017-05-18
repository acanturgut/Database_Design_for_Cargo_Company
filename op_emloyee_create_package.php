<?php

include 'connect.php';

$user_name = $_GET["username"];

$p_type = $_POST["p_type"];
$p_date = $_POST["p_date"];
$p_weight = $_POST["p_weight"];
$p_status = $_POST["p_status"];

$sql1 = "SELECT max(ID) as maximum FROM shipment";
$result = $con->query($sql1);
$row = mysqli_fetch_assoc($result);
$myVar = $row['maximum'];

$sql3 = "SELECT s_time as timem FROM shipment WHERE ID=(select max(ID) FROM shipment);";
$result = $con->query($sql3);
$row = mysqli_fetch_assoc($result);
$timem = $row['timem'];

$sql2 ="INSERT INTO package (ID,shipment,p_date,size,pack_type,shipment_id,statue,weight) VALUES (
NULL,
'$timem',
'$p_date',
'0',
'$p_type',
'$myVar',
'$p_status',
'$p_weight'
);";

if(mysqli_query($con,$sql2)){

  echo "SUCCESS <hr> ";
  include "emloyee_create_package.php";

  echo "<center><a href='gen_bill.php?shipment=".$myVar."&username=$username'>Generate Bill</a></center>";

}else{
  echo "FAIL <hr> ";
  echo("Error description: " . mysqli_error($con));
  include "emloyee_create_package.php";

  //require "employee_create_customer.php?username=".$user_name;
}



?>
