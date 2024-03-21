<?php

/**
 * @file
 */

session_start();
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
  // If the user is already logged in, you can redirect them to another page
  // header("Location: createBlog.php");
  // exit();
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <?php include 'includes/head.php'; ?>
  </head>

  <body>
    <?php include 'includes/header.php';
    include "includes/conn.php";

    if (isset($_POST['submit'])) {
      $title = $_POST['title'];
      $desc = $_POST['description'];
      $user_id = $_POST['user_id'];
      $date = $_POST['date'];
      $time = $_POST['time'];

      if (isset($_FILES['image'])) {
        $image = $_FILES['image']['name'];
        $tmp_image = $_FILES['image']['tmp_name'];

        // Specify the destination path where you want to move the file.
        $destination_path = "assets/image/$image";

        if (move_uploaded_file($tmp_image, $destination_path)) {
          $sql = "INSERT INTO blogs (title, description, image, user_id, date, time) VALUES (:title, :desc, :image, :user_id, :date, :time)";
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':title', $title);
          $stmt->bindParam(':desc', $desc);
          $stmt->bindParam(':image', $image);
          $stmt->bindParam(':user_id', $user_id);
          $stmt->bindParam(':date', $date);
          $stmt->bindParam(':time', $time);

          if ($stmt->execute()) {
            echo "Blog Post Successfully";
            header("location: myBlogs.php");
            exit();
          }
          else {
            echo "Blog Post Is Failed" . mysqli_error($con);
          }
        }
        else {
          echo "Failed to move uploaded file to destination";
        }
      }
      else {
        echo "Image Is Not Uploaded";
      }
    }
    // Echo $s_id;
    // echo $_SESSION['id'];.
    $user_id = $_SESSION['id'];
    $c_date = date('Y-m-d');
    $c_time = date('H:i:s');
    // date("Y-m-d H:i:s");.
    ?>
    <div class="form-container blog-form">
      <form action="" method="POST" enctype="multipart/form-data">
        <span>Create New Blogs</span>
        <input type="text" name="title" placeholder="Title">
        <textarea rows="6" placeholder="Description" name="description"></textarea>
        <input type="file" name="image" placeholder="Image URL">
        <input type="date" name="date" placeholder="Date" value='<?php echo $c_date ?>' hidden>
        <input type="time" name="time" placeholder="time" value='<?php echo $c_time?>' hidden>
        <input type="text" name="user_id" value="<?php echo $user_id; ?>" hidden>
        <button class="btn" type="submit" name="submit"><span>Create Blog</span></button>
      </form>
    </div>
    <?php include 'includes/footer.php'; ?>
  </body>

  </html>

  <?php
}
