<?php

function isloggedin()
{
  return isset($_SESSION['username']) && isset($_SESSION['password']);
}
?>
<header>
  <div class="top">
    <a href="./index.php"><img src="./assets/siteLogo.png" alt=""></a>
  </div>
  <div class="bottom">
    <div class="headerWrapper">
      <ul class="navLinks">
        <li><a href="./index.php">Home</a></li>
        <li><a href="./blogs.php">Blogs</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="navLinks">
        <?php
        // Example usage
        if (isloggedin()) {
          echo '<li><a href="./createBlog.php">Create Blog</a></li>';
          echo '<li><a href="./myBlogs.php">My Blogs</a></li>';
          echo '<li><a href="./logout.php">Logout</a></li>';
        } else {
          echo '<li><a href="./register.php">Register</a></li>';
          echo '<li><a href="./login.php">Login</a></li>';
        }
        ?>
      </ul>
    </div>
  </div>
</header>