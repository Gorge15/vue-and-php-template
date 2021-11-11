<?php
    require "database-connect.php";
    header("Access-Control-Allow-Origin: *");
    header("content-type: application/json");

    $keys = array_keys($_POST);
    $keys = $keys[0];
    $username = json_decode($keys)->username;
    $password = json_decode($keys)->password;
    print_r($username);
    print_r($password);

    $querry = "SELECT * FROM accounts WHERE username='$username'";
    $result = mysqli_query($connect, $querry);
    $rows = mysqli_num_rows($result);
    if ($rows === 1) {
        echo json_encode("EXIST");
    } else {
        $data = "INSERT INTO accounts (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($connect, $data)) {
            echo json_encode("DONE");
        } else {
            print_r("nu merge");
        }
    }
?>