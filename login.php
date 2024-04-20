<?php
session_start();
ob_start();
/**
 * @file
 */

// Include the connection file.
include "includes/conn.php";

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
  header("Location: myBlogs.php");
   exit();
}
else {
  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
      echo "Username is Required";
      exit();
    }
    elseif (empty($password)) {
      echo "Password is Required";
      exit();
    }

    $sql = "SELECT * FROM \"users\" WHERE \"username\" = :username AND \"password\" = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
      echo "You Are Logged In.";
      $_SESSION['username'] = $row['username'];
      $_SESSION['password'] = $row['password'];
      $_SESSION['id'] = $row['id'];
      header("Location: myBlogs.php");
      ob_end_flush();
      exit();
    }
    else {
      echo "Username or Password is incorrect";
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'includes/head.php'; ?>
</head>
<body>
  <?php include 'includes/header.php'; ?>
  <div class="form-container">
    <form action="" method="POST">
      <span>Login</span>
      <input type="text" name="username" placeholder="Username">
      <input type="password" name="password" placeholder="Password">
      <button type="submit" name="submit" class="btn"><span>Login</span></button>
      <!-- <input type="submit" name="submit" value="Submit" class="btn"> -->
    </form>
  </div>
  <?php include 'includes/footer.php'; ?>
</body>
</html>
<?php
// You might want to close the connection here if you are not using it elsewhere.
// mysqli_close($con);
