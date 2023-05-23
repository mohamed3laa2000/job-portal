<?php
session_start();

// Check if user is authenticated
if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
  header('Location: login.php');
  exit();
}

require_once 'database/database.php';

// Delete job if the user submitted the delete job form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['job_id'])) {
  $stmt = $pdo->prepare('DELETE FROM jobs WHERE id = ?');
  $stmt->execute([$_POST['job_id']]);
}

header('Location: add_job.php');
exit();