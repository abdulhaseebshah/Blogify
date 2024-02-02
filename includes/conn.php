
<?php
$con = mysqli_connect("localhost", "root", "", "blog");

if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}
?>