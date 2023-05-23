<?php
session_start();

// Check if user is authenticated
if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
  header('Location: login.php');
  exit();
}

require_once 'database/database.php';

// Add job if the user submitted the add job form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title']) && isset($_POST['description']) && isset($_POST['location']) && isset($_POST['salary'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $location = $_POST['location'];
  $salary = $_POST['salary'];
  $date_posted = date('Y-m-d');
  $stmt = $pdo->prepare('INSERT INTO jobs (title, description, location, salary, date_posted) VALUES (?, ?, ?, ?, ?)');
  $stmt->execute([$title, $description, $location, $salary, $date_posted]);
}

header('Location: add_job.php');
exit();