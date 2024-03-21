<?php

/**
 * @file
 */

session_start();
include 'includes/conn.php';
$id = $_GET['d_id'];
$sql = "DELETE FROM blogs WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
if ($stmt->execute()) {
  header("location: myBlogs.php");
  exit();
}
else {
  echo "Error deleting record: " . mysqli_error($con);
}
