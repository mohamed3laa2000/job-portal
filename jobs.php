<?php
require_once 'database/database.php';

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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                <a class="btn btn-primary" href="login.php" role="button">تسجيل الدخول</a>

            </div>
        </div>
    </nav>
    <div class="jobs" id="jobs">
        <div class="container">
            <div class="title mb-5 mt-5 text-center">
                <h2 class="fw-bold"> الوظائف</h2>
            </div>
            <div class="row">
                <?php if (count($jobs) === 0): ?>
                    <p class="text-center">لم يتم العثور على اي وظائف!</p>
                <?php else: ?>
                    <?php foreach ($jobs as $job): ?>
                        <div class="col-12 col-md-6 col-lg-4 mb-3 ">
                            <div class="card " style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title   ">
                                        <?php echo htmlspecialchars($job['title']); ?>
                                    </h5>
                                    <h6 class="card-text mb-2 text-body-secondary">
                                        <?php echo htmlspecialchars($job['description']); ?>
                                    </h6>
                                    <p class="card-text">
                                        <?php echo htmlspecialchars($job['location']); ?>
                                    </p>
                                    <p>الراتب :
                                        <?php echo htmlspecialchars($job['salary']); ?> ريال سعودي
                                    </p>
                                    <p>تاريخ النشر :
                                        <?php echo htmlspecialchars($job['date_posted']); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>