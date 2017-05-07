
<?php $username = $_GET['username']; ?>

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

        <li class="active"><a href="#">Home</a></li>
        <li><a href="employee_create_customer.php?username= <?php ?>">Create Customer</a></li>
        <li><a href="#">Menage Customer</a></li>
        <li><a href="#">Create new shipment</a></li>
        <li><a href="#">Menage Shipment</a></li>
        <li><a href="#">Generate Bill</a></li>

      </ul>
    </div>
  </nav>

  <div class="container">
    <h3> Datenbank - Employee Page </h3>
    <h1>Welcome <?php echo $username ?> </h1>
    <p>Select action from navigation bar.</p>
  </div>

</body>
</html>
