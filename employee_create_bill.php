<?php

$username = $_GET['username'];

$emloyeeL = "<li class='nav-item'><a class='nav-link' href='employee_account.php?username=".$username."'>Home</a></li>";
$emloyeeLink = "<li class='nav-item'><a class='nav-link' href='employee_create_customer.php?username=".$username."'>Create Customer</a></li>";
$emloyeeLink1 = "<li class='nav-item'><a class='nav-link' href='employee_create_shipment.php?username=".$username."'>Create new shipment</a></li>";
$emloyeeLink2 = "<li class='nav-item'><a class='nav-link' href='employee_create_bill.php?username=".$username."'>Generate Bill</a></li>";
$emloyeeLink4 = "<li class='nav-item'><a class='nav-link' href='employee_check_track.php?username=".$username."'>Tracking Store</a></li>";

$emloyeeLink3 = "<form method='POST' action='op_emloyee_bill_generate.php?username=".$username."'>";
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

    <?php echo $emloyeeLink3; ?>

    <div class="form-group">
      <label for="sel1">Select User ID for Contracted Users to generate bill</label>
      <select class="form-control" id="sel1" name="p_id">



    <?php

    include 'connect.php';

    $sql = "SELECT ID FROM customer WHERE customer_type='on'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {

        echo "<option>".$row['ID']."</option>";

      }
    } else {

    }

    ?>
  </select>
</div>

    <hr>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  </div>

</body>
</html>
