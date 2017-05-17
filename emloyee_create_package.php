
<?php

$username = $_GET['username'];

$emloyeeL = "<li class='active'><a href='employee_account.php?username=".$username."'>Home</a></li>";
$emloyeeLink = "<li><a href='employee_create_customer.php?username=".$username."'>Create Customer</a></li>";
$emloyeeLink1 = "<li><a href='employee_create_shipment.php?username=".$username."'>Create new shipment</a></li>";
$emloyeeLink2 = "<li><a href='employee_create_bill.php?username=".$username."'>Generate Bill</a></li>";
$emloyeeLink3 = "<form method='POST' action='op_emloyee_create_package.php?username=".$username."'>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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

    <?php echo $emloyeeLink3; ?>

    <div class="form-group">
      <label for="sel1">Package Type</label>
      <select class="form-control" id="sel1" name="c_store_location">
        <option>Normal</option>
        <option>Hazardous</option>
        <option>International</option>
      </select>
    </div>

    <div class="form-group">
      <label>Package Date</label>
      <input name="c_mid_name" type="text" class="form-control" placeholder="YYYY-MM-DD">
    </div>

    <div class="form-group">
      <label>Package Kilo</label>
      <input name="c_mid_name" type="text" class="form-control" placeholder="Enter Mname Name">
    </div>

    <div class="form-group">
      <label>Package Status</label>
      <input name="c_mid_name" type="text" class="form-control" placeholder="Enter Mname Name">
    </div>

    <hr>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <button type="submit" class="btn btn-primary">Pass This One</button>

  </div>

</body>
</html>
