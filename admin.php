<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="wnameth=device-wnameth, initial-scale=1, shrink-to-fit=no">
  <title>  ADMIN - DATENBANK  </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>

  <div class="container">
    <div class="jumbotron">

      <h3> You can add employee with this account please fill this form and submit it !</h3>

      <hr>

      <form method="POST" action = "employee_add.php">

        <div class="form-group">
          <label>Employee First Name</label>
          <input name="empl_first_name" type="text" class="form-control" placeholder="Enter First Name">
        </div>

        <div class="form-group">
          <label>Employee Mid Name</label>
          <input name="empl_mid_name" type="text" class="form-control" placeholder="Enter Mname Name">
        </div>

        <div class="form-group">
          <label>Employee Last Name</label>
          <input name="empl_last_name" type="text" class="form-control" placeholder="Enter Last Name">
        </div>

        <div class="form-group">
          <label>Employee User Name</label>
          <input name="empl_user_name" type="text" class="form-control" placeholder="Enter User Name">
        </div>

        <div class="form-group">
          <label>Employee E-mail</label>
          <input name="empl_email" type="email" class="form-control" placeholder="Enter E-mail">
        </div>

        <div class="form-group">
          <label>Password</label>
          <input name="empl_password" type="password" class="form-control" placeholder="Password">
        </div>

        <div class="form-group">
          <label>Employee Address: Street</label>
          <input name="empl_addr_street" type="text" class="form-control" placeholder="Enter Address: Street">
        </div>

        <div class="form-group">
          <label>Employee Address: District</label>
          <input name="empl_addr_district" type="text" class="form-control" placeholder="Enter Address: District">
        </div>

        <div class="form-group">
          <label>Employee Address: City</label>
          <input name="empl_addr_city" type="text" class="form-control" placeholder="Enter Address: City">
        </div>

        <div class="form-group">
          <label>Employee Address: Country</label>
          <input name="empl_addr_country" type="text" class="form-control" placeholder="Enter Address: Country">
        </div>

        <div class="form-group">
          <label>employee Phone Number</label>
          <input name="empl_phone_number" type="text" class="form-control" placeholder="Enter Phone Number">
        </div>

        <hr>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>
