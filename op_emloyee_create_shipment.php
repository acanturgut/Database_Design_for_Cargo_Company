<?php

include 'connect.php';

$user_name = $_GET["username"];

$s_source_location_id = $_POST["s_source_location_id"];
$s_customer_ID = $_POST["s_customer_ID"];
$s_r_first_name = $_POST["s_r_first_name"];
$s_r_mid_name = $_POST["s_r_mid_name"];
$s_r_last_name = $_POST["s_r_last_name"];
$s_r_email = $_POST["s_r_email"];
$s_r_phone_number = $_POST["s_r_phone_number"];
$s_r_address_street = $_POST["s_r_address_street"];
$s_r_address_district= $_POST["s_r_address_district"];
$s_r_address_city = $_POST["s_r_address_city"];
$s_r_address_country = $_POST["s_r_address_country"];
$s_r_destination = $_POST["s_r_destination"];
$s_shipment_time =$_POST["s_shipment_time"];

$s_store_arr1 = explode("-",$s_source_location_id);
$s_source_location_id = $s_store_arr1[0];

$s_store_arr2 = explode("-",$s_r_destination);
$s_r_destination = $s_store_arr2[0];


$sql ="INSERT INTO shipment (ID,s_shipment_time,c_id,from_s_id,to_s_id,r_first_name,r_middle_name,r_last_name,r_street,r_district,r_city,r_country,r_email,r_phone_number,price) VALUES (
NULL,
'$s_shipment_time',
'$s_customer_ID',
'$s_source_location_id',
'$s_r_destination',
'$s_r_first_name',
'$s_r_mid_name',
'$s_r_last_name',
'$s_r_address_street',
'$s_r_address_district',
'$s_r_address_city',
'$s_r_address_country',
'$s_r_email',
'$s_r_phone_number',
NULL
);";

if(mysqli_query($con,$sql)){

  echo "SUCCESS <hr> ";
  include "emloyee_create_package.php";

}else{
  echo "FAIL <hr> ";
  echo("Error description: " . mysqli_error($con));
  include 'employee_create_shipment.php';

  //require "employee_create_customer.php?username=".$user_name;
}

?>
