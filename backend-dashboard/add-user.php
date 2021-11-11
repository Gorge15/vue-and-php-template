<?php
    require "database-connect.php";
    header("Access-Control-Allow-Origin: *");
    header("content-type: application/json");

    $keys = array_keys($_POST);
    $keys = $keys[0];
    $varsta = json_decode($keys)->varsta;
    $nume = json_decode($keys)->nume;
    $prenume = json_decode($keys)->prenume;
    $strada = json_decode($keys)->strada;
    $numar = json_decode($keys)->numar;
    $oras = json_decode($keys)->oras;
    $judet = json_decode($keys)->judet;
    $tara = json_decode($keys)->tara;


    $querry = "SELECT * FROM users WHERE name='$nume $prenume'";
    $result = mysqli_query($connect, $querry);
    $rows = mysqli_num_rows($result);
    if ($rows === 1) {
        echo json_encode("EXISTA");
    } else {
        $data = "INSERT INTO users (date, name, address) VALUES ('$varsta', '$nume $prenume', '$strada $numar $oras $judet $tara')";
        if (mysqli_query($connect, $data)) {
            echo json_encode("DONE");
        } else {
            print_r("a dat eroare");
        }
    }
?>