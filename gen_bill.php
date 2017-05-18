<?php

$username = $_GET['username'];
$shipmentID = $_GET['shipment'];

$emloyeeL = "<li class='nav-item'><a class='nav-link' href='employee_account.php?username=".$username."'>Home</a></li>";
$emloyeeLink = "<li class='nav-item'><a class='nav-link' href='employee_create_customer.php?username=".$username."'>Create Customer</a></li>";
$emloyeeLink1 = "<li class='nav-item'><a class='nav-link' href='employee_create_shipment.php?username=".$username."'>Create new shipment</a></li>";
$emloyeeLink2 = "<li class='nav-item'><a class='nav-link' href='employee_create_bill.php?username=".$username."'>Generate Bill</a></li>";
$emloyeeLink4 = "<li class='nav-item'><a class='nav-link' href='employee_check_track.php?username=".$username."'>Tracking Store</a></li>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Employee Panel | Datenbank</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<body>

  <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"><?php echo "Datenbank | Employee Page | E-Username: " . $username ?></a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

        <?php echo $emloyeeL; ?>
        <?php echo $emloyeeLink; ?>
        <?php echo $emloyeeLink1; ?>
        <?php echo $emloyeeLink2; ?>
        <?php echo $emloyeeLink4; ?>

      </ul>
    </div>
  </nav>
  <hr>
  <br>

  <div class="container">

    <?php

    include 'connect.php';

    $todaysDate = date("Y-m-d");

    $sql1 = "SELECT customer_type FROM customer WHERE ID=(SELECT c_id FROM shipment WHERE ID=".$shipmentID.")";
    $result = $con->query($sql1);
    $row = mysqli_fetch_assoc($result);
    $myVar = $row['customer_type'];
    if($myVar == "off"){
      echo "<h1> Generated Bill - Only Once </h1><hr>";
      echo "<h2> Shipment ID: $shipmentID </h2><hr>";
      echo "<h2> Bill DATE: $todaysDate</h2><hr>";

      $sql2 = "SELECT customer.first_name as c_f_n,customer.middle_name as c_m_n,customer.last_name as c_l_n,customer.street_name as c_s,customer.district as c_d,customer.city as c_c,customer.country as c_co,customer.phone_number as c_p,shipment.ID as tracking_number,count(package.shipment_id) as num_pack,store.street_name as s_s,store.district as s_d, store.city as s_c, store.country as s_co,shipment.price, package.p_date from customer join package join shipment join store where customer.ID=shipment.c_id and package.shipment_id=shipment.ID and store.ID=shipment.from_s_id AND shipment.ID=".$shipmentID." group by package.p_date";

      $result = $con->query($sql2);
      $row = mysqli_fetch_assoc($result);

      $customer_name = $row['c_f_n']." ".$row['c_m_n']." ".$row['c_l_n'];
      $customer_address = $row['c_s']." ".$row['c_d']." ".$row['c_c']." ".$row['c_co'];
      $customer_phone = $row['c_p'];
      $number_of_package = $row['num_pack'];
      $store_address = $row['s_s']." ".$row['s_d']." ".$row['s_c']." ".$row['s_co'];
      $price = $row['price'];
      $date = $row['p_date'];

      echo "<h5>Customer Name   : $customer_name </h5><hr>";
      echo "<h5>Customer Address: $customer_address </h5><hr>";
      echo "<h2> Shipments: </h2>";

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
        <tbody>
        <tr>";

        echo "<td>".$shipmentID ."</td>";
        echo "<td>".$number_of_package ."</td>";
        echo "<td>".$date ."</td>";
        echo "<td>".$store_address."</td>";
        echo "<td>".$price ."</td><tr>";

        echo " </tbody>
         </table>";

      $sql3 = "INSERT INTO bill (billing_date,ID) VALUES ('".$todaysDate."',NULL);";

      if(mysqli_query($con,$sql3)){

        echo "SUCCESS <hr> ";

      }else{

        echo("Error Creating Bill:" . mysqli_error($con)) . "<hr>";

      }

      $sql4 = "INSERT INTO bill_shipment(ID,b_id,s_id) VALUES (NULL,(SELECT max(ID) FROM bill),".$shipmentID.");";

      if(mysqli_query($con,$sql4)){

        echo "SUCCESS <hr> ";

      }else{

        echo("Error Creating Bill Phase 2: " . mysqli_error($con)) ."<hr>";

      }

      echo "<center><a href='employee_create_shipment.php?username=".$username."'> DONE </a></center>";

    }else{



      header("Location: employee_create_shipment.php?username=".$username);

    }
    ?>

    <?php    ?>

  </div>

</body>
</html>
