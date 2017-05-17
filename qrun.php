<?php include 'connect.php';

$queryInfo = $_POST['query_info'];

$selector = 0;


if($queryInfo == "Customer who has shipped the most packages in the last year."){

  $sql = "SELECT * FROM customer WHERE ID IN (SELECT c_id FROM (SELECT c_id, count(c_id) AS num_ship FROM shipment WHERE p_id IN (SELECT p_id FROM package WHERE year(date)=2013) GROUP BY c_id) AS T WHERE num_ship IN (SELECT max(number) FROM (SELECT count(c_id)  AS number FROM shipment WHERE p_id IN (SELECT p_id FROM package WHERE year(date)=2013) GROUP BY c_id) as S));";
  $selector = 0;

}else if($queryInfo == "Customer who has spent the most money on shipping last year."){

  $sql = "";
  $selector = 1;
}else if($queryInfo == "Sorted List Customers with a contract according to the money that they have spent on shipping last year."){

  $sql = "";
  $selector = 2;

}else if($queryInfo == "Customer that has sent the most hazardous packages."){

  $sql = 'SELECT * FROM customer WHERE ID IN (SELECT c_id AS ID FROM shipment WHERE p_id IN (SELECT p_id FROM (SELECT ID AS p_id , count(pack_type) AS c FROM package WHERE pack_type="hazardous" GROUP BY ID) AS T WHERE c IN (SELECT max(c) FROM (SELECT ID AS p_id, count(pack_type) AS c FROM package WHERE pack_type="hazardous" GROUP BY ID) AS T)));';

  $selector = 3;

}else if($queryInfo == "Store that has received the most hazardous packages."){

  $sql = 'SELECT * FROM store WHERE ID IN (SELECT to_s_id AS ID FROM shipment WHERE p_id IN (SELECT p_id FROM (SELECT ID AS p_id, count(pack_type) AS c FROM package WHERE pack_type="hazardous" GROUP BY ID) AS T WHERE c IN (SELECT max(c) FROM (SELECT ID AS p_id, count(pack_type) AS c FROM package WHERE pack_type="hazardous" GROUP BY ID) AS T)))';
  $selector = 4;

}else if($queryInfo == "Frequently each store is used by customers for sending packages. Sort these stores from most to least frequently used store."){

  $sql = '';
  $selector = 5;

}else if($queryInfo == "Store that has earned the most money from shipping packages."){

  $sql = '';
  $selector = 6;

}else if($queryInfo == "Cities that ships the most and least number of the packages between April 20, 2013 and May 15, 2013."){

  $sql = '';
  $selector = 7;

}else if($queryInfo == "City that has received the most packages."){

  $sql = '';
  $selector = 8;
}



$result = $con -> query($sql);

if (!mysqli_query($con,$sql)) {
  printf("Error: %s\n", mysqli_error($con));

}


echo "<h2> RESULT </h2>";
echo "<hr>";

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

  if($selector == 0){
    echo $row['first_name']. " ". $row['middle_name']." ".$row['last_name']."<hr>";
  }else if($selector == 2){
    
  }



}

?>
