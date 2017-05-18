<?php

$username = $_GET['username'];
$p_id = $_POST['p_id'];

include 'connect.php';

$shipment_ids = array();

$sql = "SELECT ID FROM shipment WHERE c_id=".$p_id." AND bill='F';";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

    array_push($shipment_ids,$row['ID']);

  }
} else {


}

$todaysDate = date("Y-m-d");

$sql3 = "INSERT INTO bill (billing_date,ID) VALUES ('".$todaysDate."',NULL);";

if(mysqli_query($con,$sql3)){

  echo "SUCCESS <hr> ";

}else{

  echo("Error Creating Bill:" . mysqli_error($con)) . "<hr>";

}

for ($i=0; $i < count($shipment_ids) ; $i++) {

  $sql4 = "INSERT INTO bill_shipment(ID,b_id,s_id) VALUES (NULL,(SELECT max(ID) FROM bill), ".$shipment_ids[$i].");";

  if(mysqli_query($con,$sql4)){

    echo "SUCCESS <hr> ";

  }else{

    echo("Error Creating Bill Phase 2: " . mysqli_error($con)) ."<hr>";

  }


    $sql5 = "UPDATE shipment SET bill='T' WHERE ID=".$shipment_ids[$i];

    if(mysqli_query($con,$sql5)){

      echo "SUCCESS <hr> ";

    }else{

      echo("Error Creating Bill Phase 2: " . mysqli_error($con)) ."<hr>";

    }

}

header("Location: employee_create_bill.php?username=".$username);



?>
