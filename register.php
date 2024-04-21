<?php
/**
 * @file
 */
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'includes/head.php'; ?>
</head>

<body>
  <?php include 'includes/header.php';
  include 'includes/conn.php';

  if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (strlen($user) < 5) {
      echo "Username should not be less than 5";
    }
    elseif (strlen($user) >= 8) {
      echo "Username should not be more than 8 charcter";
    }
    elseif (strlen($password) < 8) {
      echo "Password must be exactly 8 digits long.";
    }
    else {
      $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':username', $user);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':password', $password);
      if ($stmt->execute()) {
        echo "Registretion successfully";
        header("Location:blogs.php");
        ob_end_flush();
      }
      else {
        echo "Error inserting record: " . $stmt->errorInfo()[2];
      }
    }
  }

  ?>
  <div class="form-container">
    <form action="" method="POST">
      <span>Register</span>
      <input type="text" name="username" placeholder="Username">
      <input type="text" name="email" placeholder="Email">
      <input type="password" name="password" placeholder="Password">
      <button class="btn" type="submit" name="submit"><span>Register</span></button>
      <!-- <input type="submit" name="submit" value="Submit" class="btn"> -->
    </form>
  </div>
  <?php include 'includes/footer.php'; ?>
</body>

</html>
