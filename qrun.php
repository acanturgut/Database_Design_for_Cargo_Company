<?php include 'connect.php';

include 'index.html';

?>

<center>

  <?php
  $queryInfo = $_POST['query_info'];

  $selector = 0;

  if($queryInfo == "Customer who has shipped the most packages in the last year."){

    $sql = "SELECT * FROM customer WHERE ID IN (SELECT c_id FROM (SELECT c_id, count(c_id) AS num_ship FROM shipment WHERE ID IN (SELECT shipment_id FROM package WHERE year(p_date)=2016) GROUP BY c_id) AS T WHERE num_ship IN (SELECT max(number) FROM (SELECT count(c_id)  AS number FROM shipment WHERE ID IN (SELECT shipment_id FROM package where year(p_date)=2016) GROUP BY c_id) as S));";

    $result = $con -> query($sql);

    if ($result->num_rows > 0) {

      while($row = $result->fetch_assoc()) {
        echo  $row["first_name"]." ". $row["middle_name"]." ".$row["last_name"]. "<hr>";
      }
    } else {

    }

  }else if($queryInfo == "Customer who has spent the most money on shipping last year."){

    $sql = "SELECT * FROM customer WHERE ID IN (SELECT ID FROM V WHERE sum_price = (SELECT max(sum_price) FROM V));";

    $result = $con -> query($sql);

    if ($result->num_rows > 0) {

      while($row = $result->fetch_assoc()) {
        echo  $row["first_name"]." ". $row["middle_name"]." ".$row["last_name"]. "<hr>";
      }
    } else {

    }

  }else if($queryInfo == "Sorted List Customers with a contract according to the money that they have spent on shipping last year."){

    $sql = "SELECT c_id as customer_id, sum(price) as sum_price FROM shipment WHERE c_id IN (SELECT ID FROM customer WHERE customer_type='on') AND ID IN (SELECT shipment_id FROM package WHERE year(p_date)=2016) GROUP BY c_id ORDER BY sum_price DESC;";


    $result = $con -> query($sql);

    if ($result->num_rows > 0) {

      while($row = $result->fetch_assoc()) {
        echo  $row["customer_id"]." ". $row["sum_price"]. "<hr>";
      }
    } else {
    }


  }else if($queryInfo == "Customer that has sent the most hazardous packages."){

    $sql = 'SELECT * FROM customer WHERE ID IN (SELECT c_id as ID FROM shipment WHERE ID IN (SELECT shipment_id FROM (SELECT shipment_id, count(pack_type) AS c FROM package WHERE pack_type="hazardous" GROUP BY shipment_id) AS T WHERE c IN (SELECT max(c) FROM (select shipment_id, count(pack_type) AS c FROM package WHERE pack_type="hazardous" GROUP BY shipment_id) AS T)))';

    $result = $con -> query($sql);

    if ($result->num_rows > 0) {

      while($row = $result->fetch_assoc()) {
        echo  $row["first_name"]." ". $row["middle_name"]." ".$row["last_name"]. "<hr>";
      }
    } else {
    }

  }else if($queryInfo == "Store that has received the most hazardous packages."){

    $sql = 'SELECT * FROM store WHERE ID IN (SELECT to_s_id AS ID FROM shipment WHERE ID IN (SELECT shipment_id FROM (SELECT shipment_id, count(pack_type) AS c FROM package WHERE pack_type="hazardous" GROUP BY shipment_id) AS T WHERE c IN (SELECT max(c) FROM (SELECT shipment_id, count(pack_type) AS c FROM package WHERE pack_type="hazardous" GROUP BY shipment_id) AS T)))';

    $result = $con -> query($sql);

    if ($result->num_rows > 0) {

      while($row = $result->fetch_assoc()) {
        echo  $row["city"]." ". $row["country"]." ".$row["district"]." ".$row["street_name"]."<hr>";
      }
    } else {
    }

  }else if($queryInfo == "Frequently each store is used by customers for sending packages. Sort these stores from most to least frequently used store."){

    $sql = 'SELECT from_s_id, count(*) AS frequency FROM shipment GROUP BY from_s_id ORDER BY count(*) DESC';

    $result = $con -> query($sql);

    if ($result->num_rows > 0) {

      while($row = $result->fetch_assoc()) {
        echo $row["from_s_id"]." ".$row["frequency"]."<hr>";
      }
    } else {
    }


  }else if($queryInfo == "Store that has earned the most money from shipping packages."){

    $sql = 'SELECT * FROM store WHERE ID IN (SELECT S.from_s_id FROM (SELECT from_s_id, sum(price) AS sum_price FROM shipment GROUP BY from_s_id) AS S WHERE S.sum_price=(SELECT max(sum_price) as max_price FROM (SELECT sum(price) AS sum_price FROM shipment GROUP BY from_s_id) AS S))';

    $result = $con -> query($sql);

    if ($result->num_rows > 0) {

      while($row = $result->fetch_assoc()) {
        echo  $row["city"]." ". $row["country"]." ".$row["district"]." ".$row["street_name"]."<hr>";
      }
    } else {
    }

  }else if($queryInfo == "Cities that ships the most and least number of the packages between April 20, 2013 and May 15, 2013."){

    echo "<h2> MOST </h2> <hr>";

    $sql = 'SELECT city FROM store WHERE ID IN (SELECT from_s_id FROM shipment WHERE ID IN (SELECT shipment_id FROM (SELECT shipment_id, count(shipment_id) as num_pack FROM package WHERE p_date between "2013-04-20" and "2013-05-15" GROUP BY shipment_id) AS S WHERE S.num_pack=(SELECT max(S.num_pack) FROM (SELECT shipment_id, count(shipment_id) as num_pack FROM package WHERE p_date between "2013-04-20" and "2013-05-15"  GROUP BY shipment_id) AS S)))';

    $result = $con -> query($sql);

    if ($result->num_rows > 0) {

      while($row = $result->fetch_assoc()) {
        echo  $row["city"]."<hr>";
      }
    } else {
    }

    echo "<h2> LEAST </h2> <hr>";

    $sql = 'SELECT city FROM store WHERE ID IN (SELECT from_s_id FROM shipment WHERE ID IN (SELECT shipment_id FROM (SELECT shipment_id, count(shipment_id) as num_pack FROM package WHERE p_date between "2013-04-20" and "2013-05-15" GROUP BY shipment_id) AS S WHERE S.num_pack=(SELECT min(S.num_pack) FROM (SELECT shipment_id, count(shipment_id) as num_pack FROM package WHERE p_date between "2013-04-20" and "2013-05-15"  GROUP BY shipment_id) AS S)))';

    $result = $con -> query($sql);

    if ($result->num_rows > 0) {

      while($row = $result->fetch_assoc()) {
        echo  $row["city"]."<hr>";
      }
    } else {
    }

  }else if($queryInfo == "City that has received the most packages."){

    $sql = 'SELECT city FROM A WHERE total_pack = (SELECT max(total_pack) FROM A)';

    $result = $con -> query($sql);

    if ($result->num_rows > 0) {

      while($row = $result->fetch_assoc()) {
        echo  $row["city"]."<hr>";
      }
    } else {
    }

  }

  if (!mysqli_query($con,$sql)) {
    printf("Error: %s\n", mysqli_error($con));

  }

  ?>


</center>
