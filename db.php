<?php
    $servername = "localhost";
    $username = "root";
    $dbname = "schooldb";

    $conn = mysqli_connect("localhost","root");
    mysqli_select_db($conn,$dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>