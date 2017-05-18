<?php

$username = $_GET['username'];
$trackID = $_POST['shipment_id'];

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

    <h1> Results... </h1>
    <?php
    include 'connect.php';

    $to_street = array();
    $to_district = array();
    $to_city = array();
    $to_country = array();

    $sql = "SELECT store.street_name as to_street,store.district as to_district, store.city as to_city,store.country as to_country FROM package join shipment join store where shipment.ID=".$trackID." AND package.shipment_id=".$trackID." AND store.ID=shipment.to_s_id;";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {

        array_push($to_street,$row['to_street']);
        array_push($to_district,$row['to_district']);
        array_push($to_city,$row['to_city']);
        array_push($to_country,$row['to_country']);
      }
    } else {

    }

    $sql = "SELECT * FROM package join shipment join store where shipment.ID=".$trackID." AND package.shipment_id=".$trackID." AND store.ID=shipment.from_s_id";
    $result = $con->query($sql);

     ?>

     <table class="table">
       <thead>
         <tr>
           <th>Pack Date</th>
           <th>Pack Size</th>
           <th>Pack Type</th>
           <th>Pack Statue</th>
           <th>Pack Weight</th>
           <th>Shipment Type</th>
           <th>EST</th>
           <th>Receiver Name</th>
           <th>Receiver Address</th>
           <th>Receiver Tel</th>
           <th>Receiver E-Mail</th>
           <th>Source Store</th>
           <th>Destination Store</th>
         </tr>
       </thead>
       <tbody>

         <?php

         $counter = 0;

         if ($result->num_rows > 0) {
           while($row = $result->fetch_assoc()) {

             echo "<tr><td> " . $row["p_date"]. "</td><td>" . $row["size"]. "</td><td>" . $row["pack_type"]. "</td><td>". $row['statue']."</td><td>". $row["weight"]."</td><td>". $row['shipment']."</td><td>".$row['e_delivery_date']."</td><td>".$row['r_first_name']." ".$row['r_middle_name']." ".$row['r_last_name']."</td><td>".$row['r_street']." ".$row['r_district']." ".$row['r_city']." ".$row['r_country']."</td><td>".$row['r_phone_number']."</td><td>".$row['r_email']."</td><td>".$row['street_name']." ".$row['district']." ".$row['city']." ".$row['country']."</td><td>".$to_street[$counter]." ".$to_district[$counter]." ".$to_city[$counter]." ".$to_country[$counter]."</td><td>";
             $counter++;

           }
         } else {
           echo "0 results";
         }

         ?>

       </tbody>
     </table>




    </div>
    <br>
    <hr>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
