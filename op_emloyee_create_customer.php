<?php

include 'connect.php';

$user_name = $_GET["username"];

$c_first_name = $_POST["c_first_name"];
$c_mid_name = $_POST["c_mid_name"];
$c_last_name = $_POST["c_last_name"];
$c_user_name = $_POST["c_user_name"];
$c_email = $_POST["c_email"];
$c_password = $_POST["c_password"];
$c_addr_street = $_POST["c_addr_street"];
$c_addr_district = $_POST["c_addr_district"];
$c_addr_city = $_POST["c_addr_city"];
$c_addr_country = $_POST["c_addr_country"];
$c_phone_number = $_POST["c_phone_number"];
$c_customer_type = $_POST["c_user_type"];
$c_store_id = $_POST["c_store_location"];

// Take ID

$c_store_arr = explode("-",$c_store_id);
$c_store_id = $c_store_arr[0];

$sql = "insert into customer values(
'$c_password',
'$c_user_name',
'$c_email',
'$c_phone_number',
NULL,
'$c_customer_type',
'$c_store_id',
'$c_first_name',
'$c_mid_name',
'$c_last_name',
'$c_addr_street',
'$c_addr_district',
'$c_addr_city',
'$c_addr_country');";

if(mysqli_query($con,$sql)){

  echo "SUCESS <hr> ";
  header("Location: employee_create_customer.php?username=".$username);

}else{
  echo "FAIL <hr> ";
  echo("Error description: " . mysqli_error($con));

  header("Location: employee_create_customer.php?username=".$username);
}

?>
