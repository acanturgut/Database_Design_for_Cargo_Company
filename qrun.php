<?php include 'connect.php';

$queryInfo = $_POST['query_info'];



if($queryInfo == "Customer who has shipped the most packages in the last year."){

  $sql = "SELECT * FROM customer WHERE ID IN (SELECT c_id FROM (SELECT c_id, count(c_id) AS num_ship FROM shipment WHERE p_id IN (SELECT p_id FROM package WHERE year(date)=2013) GROUP BY c_id) AS T WHERE num_ship IN (SELECT max(number) FROM (SELECT count(c_id)  AS number FROM shipment WHERE p_id IN (SELECT p_id FROM package where year(date)=2013) GROUP BY c_id) as S));";
  echo "GİRDI";


}else if($queryInfo == "Customer who has spent the most money on shipping last year."){

  $sql = 'select * from customer where ID in (select c_id as ID from shipment where p_id in (select p_id from (select ID as p_id, count(pack_type) as c from package where pack_type="hazardous" group by ID) as T where c in (select max(c) from (select ID as p_id, count(pack_type) as c from package where pack_type="hazardous" group by ID) as T)));';

}else if($queryInfo == "Sorted List Customers with a contract according to the money that they have spent on shipping last year."){

  $sql = '';

}else if($queryInfo == "Customer that has sent the most hazardous packages."){

  $sql = '';

}else if($queryInfo == "Store that has received the most hazardous packages."){

  $sql = '';

}else if($queryInfo == "Frequently each store is used by customers for sending packages. Sort these stores from most to least frequently used store."){

  $sql = '';

}else if($queryInfo == "Store that has earned the most money from shipping packages."){

  $sql = '';

}else if($queryInfo == "Cities that ships the most and least number of the packages between April 20, 2013 and May 15, 2013."){

  $sql = '';

}else if($queryInfo == "City that has received the most packages."){

  $sql = "select city from store where ID in (select to_s_id as ID from (select to_s_id, count(p_id) as c from shipment group by to_s_id) as T where c in (select max(c) from (select to_s_id, count(p_id) as c from shipment group by to_s_id) as T));";
}



$result = $con -> query($sql);

if (!mysqli_query($con,$sql)) {
    printf("Error: %s\n", mysqli_error($con));

}

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

  echo $row['first_name']. " ". $row['middle_name']." ".$row['last_name'];

}

?>
