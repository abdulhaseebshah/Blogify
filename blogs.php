<?php

/**
 * @file
 */

session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'includes/head.php'; ?>
</head>

<body>
  <?php include 'includes/header.php'; ?>
  <h2 class="title">Explore Blogs</h2>
  <div class="container">
    <?php
    include "includes/conn.php";
    $sql = "SELECT * FROM blogs ORDER BY id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      ?>
      <div class="cards">
        <div class="imgBx">
          <img src="<?php echo "assets/image/" . $row['image'] ?>" alt="">
        </div>
        <div class="txtBx">
          <a href="./singleBlog.php?id=<?php echo $row['id']; ?>">
            <?php echo $row['title']; ?>
          </a>
          <p>
            <?php echo $row['description']; ?>
          </p>
          <a href="./singleBlog.php?id=<?php echo $row['id']; ?>" class="btn">
            <span>Read More</span>
          </a>
          <span>
            <?php echo $row['date'] . " - " . $row['time']; ?>
          </span>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
  <?php include 'includes/footer.php'; ?>
</body>

</html>
