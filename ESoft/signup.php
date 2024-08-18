<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>إنشاء حساب</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

 
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/login.css" rel="stylesheet">

  <style>
    *{
      font-family: Noto Kufi Arabic !important;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="#" class="logo d-flex align-items-center" style="margin-right:-50px;">
        <span>إبحار</span>
        <span>سوفت</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">الرئيسية</a></li>
          <li><a class="nav-link scrollto" href="index.php">من نحن</a></li>
          <li><a class="nav-link scrollto" href="serv.php">الخدمات</a></li>
          <li><a class="nav-link scrollto" href="index.php">أعمالنا</a></li>
          <li><a class="nav-link scrollto" href="index.php">الفريق</a></li>
          <li><a href="insert_data.php">التحكم</a></li>
          <li><a class="nav-link scrollto" href="index.php">إتصل بنا</a></li>
          <li><a class="nav-link scrollto" href="login.php">تسجيل الدخول</a></li>
          <li><a class="nav-link scrollto" href="update_proj.php">تعديل مشروع</a></li>
          <li><a class="getstarted scrollto" href="display.php">طلب مشروع</a></li>
          <li><a class="getstarted scrollto" href="signup.php">إنشاء حساب</a></li>
          </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">
    <!-- Section: Design Block -->
    <section class="login align-items-center">
      <!-- Jumbotron -->
      <div class="px-4 mb-5 px-md-5">
        <div class="section_title py-5  text-center">
          <h2 class="title">
            <span>إنشاء حساب جديد</span>
          </h2>
        </div>
        <div class="container ">
          <div class="col-lg-6 mx-auto mb-5 mb-lg-0">
            <div class="card">
              <div class="card-body py-5 px-md-5">
                <form action="sign.php" method="GET">
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">الاسم الاول</label>
                    <input type="text" name="FName" id="form3Example3" class="form-control" require />
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">اللقب</label>
                    <input type="text" name="LName" id="form3Example3" class="form-control" require />
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">العنوان</label>
                    <input type="text" name="address" id="form3Example3" class="form-control" />
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">رقم الهاتف</label>
                    <input type="tel" name="cust_phon" id="form3Example3" class="form-control" />
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">تاريخ الميلاد</label>
                    <input type="date" name="Bdate" id="form3Example3" class="form-control" />
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">نوع الحساب خاص ب</label>
                    <select id="form3Example3" class="form-control" name="cust_type" id="">
                      <option value="شركة" >شركة</option>
                      <option value="شخصي">شخصي</option>
                      <option value="محل تجاري">محل تجاري</option>
                      <option value="مؤسسة">مؤسسة</option>
                   </select>
                  </div>
                  <!-- <input type="text" name="c" value="TRUE" style="display:none;"> -->
                  <!-- Submit button -->
                  <input type="submit" name="add_cust" value="التالي" class="btn btn-primary btn-block mb-4">
                  
                  <!-- Register buttons -->
                  <div class="text-center">
                    <p>أو سجل باستخدام:</p>
                    <button type="button" class="btn btn-link btn-floating mx-1">
                      <i class="bi bi-facebook"></i>
                    </button>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                      <i class="bi bi-google"></i>
                    </button>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                      <i class="bi bi-twitter"></i>
                    </button>

                    <button type="button" class="btn btn-link btn-floating mx-1">
                      <i class="bi bi-github"></i>
                    </button>
                    <div class="form-outline mb-4 mt-3">
                        <label class="form-label" for="form3Example4">اذا تملك حساب مسبقا</label>
                        <a href="login.php">قم بتسجل الدخول....؟؟</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->
  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="assets/img/logo.png" alt="">
              <span>إبحار سوفت</span>
            </a>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita
              valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>روابط تهمك</h4>
            <ul>
              <li><i class="bi bi-chevron-left"></i> <a href="#">الرئيسية</a></li>
              <li><i class="bi bi-chevron-left"></i> <a href="#">من نحن</a></li>
              <li><i class="bi bi-chevron-left"></i> <a href="#">الخدمات</a></li>
              <li><i class="bi bi-chevron-left"></i> <a href="#">شروط الاستخدام</a></li>
              <li><i class="bi bi-chevron-left"></i> <a href="#">سياسة الخصوصية</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>خدماتنا</h4>
            <ul>
              <li><i class="bi bi-chevron-left"></i> <a href="#">تصميم الويب</a></li>
              <li><i class="bi bi-chevron-left"></i> <a href="#">تطوير تطبيقات الويب</a></li>
              <li><i class="bi bi-chevron-left"></i> <a href="#">إدارة مشاريع</a></li>
              <li><i class="bi bi-chevron-left"></i> <a href="#">تسويق</a></li>
              <li><i class="bi bi-chevron-left"></i> <a href="#">بناء وتطوير أنظمة</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>تواصل معنا</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>الهاتف:</strong> 00967774373601<br>
              <strong>الإيميل:</strong> masaadm97@gmail.com<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; جميع الحقوق محفوظة <strong><span>EbharSoft</span></strong>.
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


</body>

</html>