<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('includes/head.php'); ?>

</head>

<body>
  <?php include('includes/header.php'); ?>
  
  <div class="single-blog">
    <?php
    include("includes/conn.php");  
    $id = $_GET['id'];
    $sql = "SELECT * FROM blogs WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
    <div class="cards">
    <div class="imgBx">
      <img src="<?php echo "assets/image/" . $row['image'] ?>" alt="">
    </div>
    <div class="txtBx">
      <a href="#">
        <?php echo $row['title']; ?>
      </a>
      <p>
        <?php echo $row['description']; ?>
      </p>
      <div><span>
          <?php echo $row['date']; ?>
        </span>
        <span>
          <?php echo $_SESSION['username']; ?>
        </span>
      </div>
    </div>
  </div>
    
    

  </div>
  <?php include('includes/footer.php'); ?>
</body>

</html>