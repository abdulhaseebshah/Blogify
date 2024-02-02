<?php
session_start();
include("includes/conn.php"); // Include the connection file

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
  // If the user is already logged in, you can redirect them to another page
  header("Location: myBlogs.php");
  exit();
}
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (empty($username)) {
    echo "Username is Required";
    exit();
  } elseif (empty($password)) {
    echo "Password is Required";
    exit();
  }
  $sql = "SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$password'";
  $result = mysqli_query($con, $sql);

  if ($result) {
    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      echo "You Are Logged In";
      $_SESSION['username'] = $row['username'];
      $_SESSION['password'] = $row['password'];
      $_SESSION['id'] = $row['id'];
      header("Location: myBlogs.php");
      exit();
    } else {
      echo "Username or Password is incorrect";
    }
  } else {
    echo "Error: " . mysqli_error($con);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('includes/head.php'); ?>
</head>
<body>
  <?php include('includes/header.php'); ?>
  <div class="form-container">
    <form action="" method="POST">
      <span>Login</span>
      <input type="text" name="username" placeholder="Username">
      <input type="password" name="password" placeholder="Password">
      <button type="submit" name="submit" class="btn"><span>Login</span></button>
      <!-- <input type="submit" name="submit" value="Submit" class="btn"> -->
    </form>
  </div>
  <?php include('includes/footer.php'); ?>
</body>
</html>
<?php
// You might want to close the connection here if you are not using it elsewhere
mysqli_close($con);
?>