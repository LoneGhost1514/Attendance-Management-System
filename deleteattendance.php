<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user'])) {
    header("location:index.php");
}

if (isset($_POST['btndelete'])) {
    $date= $_POST['txtdate'];  
    $deleteQry = "DELETE FROM attendance WHERE date='$date'";

    if (!mysqli_query($conn, $deleteQry)) {
        echo "Error deleting record: " . mysqli_error($conn);
    } 
}

header('location:dashboard.php');

?>

