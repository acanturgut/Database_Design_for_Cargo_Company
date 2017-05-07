<?php

require 'connect.php';

$username = $_POST["username"];
$password = $_POST["password"];

echo $username;
echo "<br><br>";
echo $password;


if($username == "admin" && $password == "admin"){

  require 'admin.php';

}else{

  echo "123- GIRDI- 123";

  $sql = 'SELECT password, username FROM employee';

  echo "123- GIRDI- 1234";

  $result = $con -> query($sql);

  echo "123- GIRDI- 12345";

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

      echo "123- GIRDI";

      if($username == $row['username'] && $password == $row['password']){

        echo "GIRDI";
        header('Location: employee_account.php?username='.$username);

        return;
      }
    }
  }else{



    echo "GIRDMEDI";

  }
}

?>
