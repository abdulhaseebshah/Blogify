<?php

session_start();
include('includes/conn.php');
$id = $_GET['d_id'];
$sql = "DELETE FROM `blogs` WHERE id = '$id'";

if(mysqli_query($con, $sql)){
    header("location: myBlogs.php");
    exit();
} else {
    echo "Error deleting record: " . mysqli_error($con);
}