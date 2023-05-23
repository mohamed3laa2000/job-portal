<?php
try {
  // Connect to the SQLite database
  $pdo = new PDO('sqlite:database/database.sqlite');
  // Set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  // Handle any database connection errors
  echo 'Connection failed: ' . $e->getMessage();
}
?>