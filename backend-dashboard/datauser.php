<?php
    require "database-connect.php";
    header("Access-Control-Allow-Origin: *");
    header("content-type: application/json");

    $query = "SELECT * FROM users"; #iau useri din baza de date
    $data = array();
    $result = mysqli_query($connect, $query);

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
?>