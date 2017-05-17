
<?php

$username = $_GET['username'];

$emloyeeL = "<li class='active'><a href='employee_account.php?username=".$username."'>Home</a></li>";
$emloyeeLink = "<li><a href='employee_create_customer.php?username=".$username."'>Create Customer</a></li>";
$emloyeeLink1 = "<li><a href='employee_create_shipment.php?username=".$username."'>Create new shipment</a></li>";
$emloyeeLink2 = "<li><a href='employee_create_bill.php?username=".$username."'>Generate Bill</a></li>";
$emloyeeLink3 = "<form method='POST' action='op_emloyee_create_shipment.php?username=".$username."'>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kargo Company</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#"> <?php echo "Username: " . $username ?> </a>
      </div>
      <ul class="nav navbar-nav">

        <?php
        echo $emloyeeL."";
        echo $emloyeeLink."";
        echo $emloyeeLink1."";
        echo $emloyeeLink2."";
        ?>

      </ul>
    </div>
  </nav>

  <div class="container">

    <h1> Create Shipment </h1>

    <?php echo $emloyeeLink3;?>

    <div class="form-group">
      <label for="sel1">Source Store Location:</label>
      <select class="form-control" id="sel1" name="s_source_location_id">
        <option>1-Paris</option>
        <option>2-Helsinki</option>
        <option>3-Berlin</option>
        <option>4-Tokyo</option>
        <option>5-Stockholm</option>
        <option>6-Addis Ababa</option>
        <option>7-Osaka</option>
        <option>8-Seoul</option>
        <option>9-Hamburg</option>
        <option>10-Lisbon</option>
      </select>
    </div>

    <div class="form-group">
      <label for="sel1">Shipment Time:</label>
      <select class="form-control" id="sel1" name="s_shipment_time">
        <option>Regular</option>
        <option>Overnight</option>
        <option>Two-Day</option>

      </select>
    </div>

    <div class="form-group">
      <label>Customer ID</label>
      <input name="s_customer_ID" type="text" class="form-control" placeholder="Enter Customer ID">
    </div>

    <div class="form-group">
      <label>Receiver First Name</label>
      <input name="s_r_first_name" type="text" class="form-control" placeholder="Enter First Name">
    </div>

    <div class="form-group">
      <label>Customer Mid Name</label>
      <input name="s_r_mid_name" type="text" class="form-control" placeholder="Enter Middle Name">
    </div>

    <div class="form-group">
      <label>Receiver Last Name</label>
      <input name="s_r_last_name" type="text" class="form-control" placeholder="Enter Last Name">
    </div>

    <div class="form-group">
      <label>Receiver Customer E-mail</label>
      <input name="s_r_email" type="text" class="form-control" placeholder="Enter E-mail">
    </div>

    <div class="form-group">
      <label>Receiver Phone Number</label>
      <input name="s_r_phone_number" type="text" class="form-control" placeholder="Enter Phone Number">
    </div>

    <div class="form-group">
      <label>Receiver Address: Street</label>
      <input name="s_r_address_street" type="text" class="form-control" placeholder="Enter Address: Street">
    </div>

    <div class="form-group">
      <label>Receiver Address: District</label>
      <input name="s_r_address_district" type="text" class="form-control" placeholder="Enter Address: District">
    </div>

    <div class="form-group">
      <label>Receiver Address: City</label>
      <input name="s_r_address_city" type="text" class="form-control" placeholder="Enter Address: City">
    </div>

    <div class="form-group">
      <label>Receiver Address: Country</label>
      <input name="s_r_address_country" type="text" class="form-control" placeholder="Enter Address: Country">
    </div>

    <div class="form-group">
      <label for="sel1">Destination Store Location:</label>
      <select class="form-control" id="sel1" name="s_r_destination">
        <option>1-Paris</option>
        <option>2-Helsinki</option>
        <option>3-Berlin</option>
        <option>4-Tokyo</option>
        <option>5-Stockholm</option>
        <option>6-Addis Ababa</option>
        <option>7-Osaka</option>
        <option>8-Seoul</option>
        <option>9-Hamburg</option>
        <option>10-Lisbon</option>
      </select>
    </div>

    <hr>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>

</body>
</html>
