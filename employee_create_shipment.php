
<?php

$username = $_GET['username'];

$emloyeeL = "<li class='nav-item'><a class='nav-link' href='employee_account.php?username=".$username."'>Home</a></li>";
$emloyeeLink = "<li class='nav-item'><a class='nav-link' href='employee_create_customer.php?username=".$username."'>Create Customer</a></li>";
$emloyeeLink1 = "<li class='nav-item'><a class='nav-link' href='employee_create_shipment.php?username=".$username."'>Create new shipment</a></li>";
$emloyeeLink2 = "<li class='nav-item'><a class='nav-link' href='employee_create_bill.php?username=".$username."'>Generate Bill</a></li>";
$emloyeeLink4 = "<li class='nav-item'><a class='nav-link' href='employee_check_track.php?username=".$username."'>Tracking Store</a></li>";

$emloyeeLink3 = "<form method='POST' action='op_emloyee_create_shipment.php?username=".$username."'>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
