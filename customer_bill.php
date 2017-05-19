<?php

$username = $_GET['username'];

$customer1 = '<a class="nav-link" href="customer_personal_info.php?username='.$username.'">Personal Info</a>';
$customer2 = '<form method="POST" action="customer_result_show.php?username='.$username.'" class="form-inline navbar-form pull-right">';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Customer | Cargo Track</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-light bg-faded">
    <a class="navbar-brand" href="#">DATENBANK | Custemer: <?php echo $username ?></a>
    <ul class="nav navbar-nav">
      <li class="nav-item">
        <?php  echo $customer1; ?>
      </li>
      <li class="nav-item">
        <?php echo '<a class="nav-link" href="customer_bill.php?username='.$username.'">View Bills</a>' ?>

      </li>

      <li class="nav-item">
        <a class="nav-link" href="index.html">Log Out</a>
      </li>

      <li class="nav-item">
        <p> </p>
      </li>
    </ul>
    <?php echo $customer2 ?>
    <input name="shipment_id" class="form-control" type="text" placeholder="YOUR SHIPMENT'S ID">
    <button class="btn btn-success-outline" type="submit">Search</button>
  </form>
</nav>
<hr>
<br>

<div class="container">

  <h2> You can see your bills in this page</h2>

  <?php

  include 'connect.php';

  $sql3 = "SELECT ID,first_name as fn, middle_name as mn, last_name as lan, street_name as s, district as d, city as c, country as co, phone_number as p FROM customer WHERE username='".$username."';";
  $result = $con->query($sql3);
  $row3 = mysqli_fetch_assoc($result);

  $customer_id = $row3["ID"];
  $customer_name = $row3['fn']." ".$row3['mn']." ".$row3['lan'];
  $customer_address = $row3['s']." ".$row3['d']." ".$row3['c']." ".$row3['co'];
  $customer_phone = $row3['p'];

  $sql1 = "SELECT customer_type FROM customer WHERE username='".$username."';";
  $result = $con->query($sql1);
  $row = mysqli_fetch_assoc($result);
  $myVar = $row['customer_type'];

  if(true){

    $shipment_ids = array();

    $sql = "SELECT ID FROM shipment WHERE c_id=(SELECT ID FROM customer WHERE username='".$username."');";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {

        array_push($shipment_ids,$row['ID']);

      }
    }else{

    }

    $bill_ids = array();

    for ($i=0; $i < count($shipment_ids) ; $i++) {

      $sql3 = "SELECT distinct b_id FROM bill_shipment WHERE s_id=".$shipment_ids[$i];
      $result = $con->query($sql3);
      $row = mysqli_fetch_assoc($result);

      if(!in_array($row['b_id'],$bill_ids)){
        array_push($bill_ids,$row['b_id']);
      }
    }

    for ($j=0; $j < count($bill_ids) ; $j++) {

      $shipment_ids2 = array();

      $sql = "SELECT s_id FROM bill_shipment WHERE b_id=".$bill_ids[$j];
      $result = $con->query($sql);

      if ($result->num_rows > 0) {
        while($row12 = $result->fetch_assoc()) {

          array_push($shipment_ids2,$row12['s_id']);

        }
      }else{

      }

      echo "<h5>Customer ID     : $customer_id </h5><hr>";
      echo "<h5>Customer Name   : $customer_name </h5><hr>";
      echo "<h5>Customer Address: $customer_address </h5><hr>";

      $sql3 = 'SELECT billing_date FROM bill WHERE ID='.$bill_ids[$j];
      $result = $con->query($sql3);
      $row2 = mysqli_fetch_assoc($result);

      $billing_date = $row2['billing_date'];

      echo "<h5>Billing Date    : $billing_date </h5><hr>";

      echo "<table class='table'>
      <thead>
      <tr>
      <th>Tracking Number</th>
      <th>Number of Packages</th>
      <th>Shipment Date</th>
      <th>Shipmented From</th>
      <th>Price</th>
      </tr>
      </thead>
      <tbody>";

      for ($i=0; $i < count($shipment_ids2) ; $i++) {

        $sql2 = "SELECT customer.first_name as c_f_n,customer.middle_name as c_m_n,customer.last_name as c_l_n,customer.street_name as c_s,customer.district as c_d,customer.city as c_c,customer.country as c_co,customer.phone_number as c_p,shipment.ID as tracking_number,count(package.shipment_id) as num_pack,store.street_name as s_s,store.district as s_d, store.city as s_c, store.country as s_co,shipment.price, package.p_date from customer join package join shipment join store where customer.ID=shipment.c_id and package.shipment_id=shipment.ID and store.ID=shipment.from_s_id AND shipment.ID=".$shipment_ids2[$i]." group by package.p_date";

        $result = $con->query($sql2);
        $row = mysqli_fetch_assoc($result);

        $number_of_package = $row['num_pack'];
        $store_address = $row['s_s']." ".$row['s_d']." ".$row['s_c']." ".$row['s_co'];
        $price = $row['price'];
        $date = $row['p_date'];







        echo "<tr><td>".$shipment_ids2[$i] ."</td>";
        echo "<td>".$number_of_package ."</td>";
        echo "<td>".$date ."</td>";
        echo "<td>".$store_address."</td>";
        echo "<td>".$price ."</td><tr>";

      }

      echo " </tbody>
      </table>";

      echo "<hr>";
    }

  }else{

  }

  ?>

</div>
<br>
<hr>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
</body>
</html>
