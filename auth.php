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



  $sql = 'SELECT password, username FROM employee';



  $result = $con -> query($sql);



  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {



      if($username == $row['username'] && $password == $row['password']){

        
        header('Location: employee_account.php?username='.$username);

        return;
      }
    }
  }else{

    header('Location: index.html');


  }
}

?>
