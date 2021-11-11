<?php
    $connect = mysqli_connect("localhost", "root", "", "accounts");
    if (!$connect) {
        die(mysqli_connect_error());
    }
?>