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

    <h2> Personal Informations </h2>

    <?php

    include 'connect.php';

    $sql = "SELECT * FROM customer WHERE username='$username'";

    $result = $con->query($sql);
    $row = mysqli_fetch_assoc($result);

    $firstname = $row['first_name'];
    $middlename = $row['middle_name'];
    $lastname = $row['last_name'];
    $streetname = $row['street_name'];
    $district = $row['district'];
    $city = $row['city'];
    $country = $row['country'];
    $phonenumber = $row['phone_number'];
    $email = $row['email'];

    echo "<hr>";
    echo "First Name: ".$firstname;
    echo "<hr>";
    echo "Middle Name: ".$middlename;
    echo "<hr>";
    echo "Last Name: ".$lastname;
    echo "<hr>";
    echo "Street: ".$streetname;
    echo "<hr>";
    echo "District: ".$district;
    echo "<hr>";
    echo "City: ".$city;
    echo "<hr>";
    echo "Country: ".$country;
    echo "<hr>";
    echo "Phone: ".$phonenumber;
    echo "<hr>";
    echo "E-Mail: ".$email;
    echo "<hr>";

    echo "<h2> NOT DELIVERED PACKAGES </h2>";

    $sql2 = "SELECT * FROM package WHERE shipment_id IN (SELECT ID FROM shipment WHERE c_id=(SELECT ID FROM customer WHERE username= '".$username."' )) and statue='Not Delivered';";

    $result = $con->query($sql2);

    ?>

    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Date</th>
          <th>Size</th>
          <th>Type</th>
          <th>Shipment ID</th>
          <th>Shipment Type</th>
        </tr>
      </thead>
      <tbody>

        <?php

        if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {
            echo "<tr><td> " . $row["ID"]. "</td><td>" . $row["p_date"]. "</td><td>" . $row["size"]. "</td><td>". $row['pack_type']."</td><td>". $row["shipment_id"]."</td><td>". $row['shipment']."</td></tr>";
          }
        } else {
          echo "0 results";
        }

        ?>

      </tbody>
    </table>



    <?php

    echo "<h2> DELIVERED PACKAGES </h2>";

    $sql2 = "SELECT * FROM package WHERE shipment_id IN (SELECT ID FROM shipment WHERE c_id=(SELECT ID FROM customer WHERE username= '".$username."' )) and statue='Delivered';";

    $result = $con->query($sql2);

    ?>

    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Date</th>
          <th>Size</th>
          <th>Type</th>
          <th>Shipment ID</th>
          <th>Shipment Type</th>
        </tr>
      </thead>
      <tbody>

        <?php

        if ($result->num_rows > 0) {

          while($row = $result->fetch_assoc()) {
            echo "<tr><td> " . $row["ID"]. "</td><td>" . $row["p_date"]. "</td><td>" . $row["size"]. "</td><td>". $row['pack_type']."</td><td>". $row["shipment_id"]."</td><td>". $row['shipment']."</td></tr>";
          }
        } else {

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
