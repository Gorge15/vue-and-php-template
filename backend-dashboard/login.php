
<?php
    require "database-connect.php";
    header("Access-Control-Allow-Origin: *");
    header("content-type: application/json");
    // $data = array();
    // $sql = "SELECT * FROM accounts";
    // $result = mysqli_query($connect, $sql);
    // while ($row = $result->fetch_assoc()) {
    //      $data[] = $row;
        
    // }

    // $_POST = json_decode(file_get_contents("./login.php"),true);
    $keys = array_keys($_POST);
    $keys = $keys[0];
    $username = json_decode($keys)->username;
    $password = json_decode($keys)->password;

    $querry = "SELECT * FROM accounts WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connect, $querry);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows === 1) {
        echo json_encode("OK");
    } else {
        echo json_encode("NUOK");

    }

?>

