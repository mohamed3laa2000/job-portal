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

// Get list of all jobs
$jobs = $pdo->query('SELECT * FROM jobs ORDER BY date_posted DESC')->fetchAll();
?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>وظيفتك</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap"
    rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
    <div class="container-fluid ">
      <a class="navbar-brand logo" href="index.php">وظيفتك</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="d-inline-flex p-2 navbar-nav me-4 ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active ms-4 me-5" aria-current="page" href="index.php">الرئيسية</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active ms-4" href="jobs.php">الوظائف</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="contact.php">تواصل معنا</a>
          </li>
        </ul>
        <a class="btn btn-primary" href="logout.php" role="button">تسجيل الخروج</a>
      </div>
    </div>
  </nav>
  <div class="add-job row">
    <div class="container col-6">
      <div class="title mb-5 mt-5 text-center">
        <h2 class="fw-bold"> أضف وظيفة</h2>
      </div>

      <form method="post" action="add_job_action.php">
        <div>
          <label for="title" class="form-label mt-3">اسم الوظيفة</label>
          <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div>
          <label for="description" class="form-label mt-3">الوصف</label>
          <textarea id="description" class="form-control" name="description" required></textarea>
        </div>
        <div>
          <label for="location" class="form-label mt-3">العنوان</label>
          <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <div>
          <label for="salary" class="form-label mt-3">الراتب</label>
          <input type="number" class="form-control" id="salary" name="salary" required>
        </div>
        <div>
          <button type="submit" class="btn btn-primary mt-3">أضف</button>
        </div>
      </form>
    </div>
  </div>
  <div class="delete-job">
    <div class="container">
      <div class="title mb-5 mt-5 text-center">
        <h2 class="fw-bold"> احذف وظيفة</h2>
      </div>
      <?php if (count($jobs) === 0): ?>
        <p class="text-center">لم يتم العثور على اي وظائف!</p>
      <?php else: ?>
        <ul>
          <?php foreach ($jobs as $job): ?>
            <li>
              <h3>
                <?php echo htmlspecialchars($job['title']); ?>
              </h3>
              <p>
                <?php echo htmlspecialchars($job['description']); ?>
              </p>
              <p>
                <?php echo htmlspecialchars($job['location']); ?>
              </p>
              <p>الراتب :
                <?php echo htmlspecialchars($job['salary']); ?> ريال سعودي
              </p>
              <p>تاريخ النشر :
                <?php echo htmlspecialchars($job['date_posted']); ?>
              </p>
              <form method="post" onsubmit="return confirm('Are you sure you want to delete this job?')">
                <input type="hidden" name="job_id" value="<?php echo htmlspecialchars($job['id']); ?>">
                <button type="submit">حذف</button>
              </form>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>
  </div>




</body>

</html>