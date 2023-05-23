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
        <a class="btn btn-primary" href="login.php" role="button">تسجيل الدخول</a>

      </div>
    </div>
  </nav>
  <div class="landing" id="home">
    <div class="container text-end fs-1 fw-bold">
      <div class="row ">
        <div class="col mt-auto mb-auto">
          أعثر على وظيفتك الأن!
        </div>
        <div class="col">
          <img class="landing-img img-responsive " src="images/landing.svg" alt="landing">
        </div>
      </div>
    </div>
  </div>
  <div class="about" id="about">
    <div class="container mb-5 ">
      <div class="title mb-5 mt-5 text-center">
        <h2 class="fw-bold"> من نحن </h2>
      </div>
      <div class="row ">
        <div class="col">
          <img class="about-img img-responsive " src="images/about.svg" alt="about">
        </div>
        <div class="col mt-auto mb-auto text-end lh-lg">
          <p>نحن موقع توظيف يسعى لتسهيل عملية البحث عن فرص العمل وتوفير فرص العمل للأفراد في جميع أنحاء
            العالم
            نحن نؤمن بأن العمل هو جزء أساسي من الحياة وأن الحصول على فرص العمل المناسبة يمكن أن يساعد
            الأفراد
            على تحقيق أحلامهم وتحقيق طموحاتهم
          </p>
          <p>يهدف موقعنا إلى توفير منصة شاملة وفعالة للشركات والأفراد للتواصل وتبادل المعلومات حول الوظائف
            المتاحة والمهارات المطلوبة والمؤهلات المطلوبة لتلك الوظائف. نحن نسعى جاهدين لتوفير تجربة استخدام
            سلسة وسهلة لمستخدمينا، وذلك من خلال تصميم موقعنا بطريقة تتيح البحث عن الوظائف وتقديم الطلبات بكل
            سهولة ويسر</p>
          <p>نحن نفهم أن البحث عن فرص العمل يمكن أن يكون مرهقًا ومربكًا، ولذلك نحن نعمل بجدية على توفير مصادر
            موثوقة وفرص العمل الحقيقية لمستخدمينا. ونحن ملتزمون بالحفاظ على معايير الجودة العالية والنزاهة
            في
            جميع جوانب عملنا</p>

        </div>
      </div>
    </div>
  </div>
  <div class="footer" style="color: white; background-color:var(--main-color) ;">
    <div class="container text-center pt-3 pb-3">
      <span>copyright@2023</span>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>