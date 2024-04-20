<?php

/**
 * @file
 */

$host = 'pg';
// PostgreSQL port.
$port = '5432';
// Database name.
// $dbname = 'postgres';
$dbname = 'blogify';
// PostgreSQL username.
$user = 'root';
// PostgreSQL password (if any)
$password = 'root';

try {
  $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
  // Set PDO error mode to exception.
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo "Connected to PostgreSQL successfully";
}
catch (PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}

// Your PHP code for PostgreSQL interactions goes here.
