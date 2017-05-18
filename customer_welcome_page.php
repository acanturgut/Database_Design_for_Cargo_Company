<?php

$username = $_GET['username'];

$customer1 = '<a class="nav-link" href="customer_personal_info.php?username='.$username.'">Personal Info</a>';

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
          <a class="nav-link" href="#">View Bills</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.html">Log Out</a>
        </li>

        <li class="nav-item">
          <p> </p>
        </li>
      </ul>
      <form class="form-inline navbar-form pull-right">
        <input class="form-control" type="text" placeholder="YOUR SHIPMENT'S ID">
        <button class="btn btn-success-outline" type="submit">Search</button>
      </form>
    </nav>
    <hr>
    <br>

    <div class="container">
      <h3> Datenbank - Customer Page </h3>
      <h1>Welcome <?php echo $username ?> </h1>
      <h5>Select action from navigation bar.</h5>
      <br>
      <hr>
      <p> You can track your shipment from search bar</p>
      <hr>
      <p> You can see your bills</p>

    </div>
    <br>
    <hr>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
