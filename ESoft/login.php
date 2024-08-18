<?php
    include('company_db_con.php');
    if(isset($_POST['login'])){
        $user_name=$_POST['user_name'];
        $user_pass=$_POST['user_pass'];

        $result=$con->query('select id from users
                            WHERE UName = "'.$user_name.'" and UPass = "'.$user_pass.'" ');
        if($result->num_rows){
            $row1=$result->fetch_assoc();
            setcookie('username',$user_name,time()+(60*60));
            header("location:index.php");
            exit;
        }
        else{
            $result2=$con->query('select cust_id from customer
                                WHERE (cust_username = "'.$user_name.'" or E_mail = "'.$user_name.'" )
                                 and cust_password = "'.$user_pass.'" ');
            if($result2->num_rows){
                $row1=$result2->fetch_assoc();
                setcookie('username',$user_name,time()+(60*60*24));
                header("location:index.php");
                exit;
            }
            else{
                $result3=$con->query('select SSN from employee
                                WHERE  E_mail = "'.$user_name.'" and SSN = "'.$user_pass.'" ');
                if($result3->num_rows){
                    setcookie('username',$user_name,time()+(60*60*24));
                    header("location:index.php");
                    exit;
                }else{
                    echo "<script>alert('اسم المستخدم هذا غير موجود او كلمة المرور خاطئة!');</script>";
                }
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>EbharSoft - login</title>
    <meta content="" name="description">

    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <style>
        *{
        font-family: Noto Kufi Arabic !important;
        }
    </style>


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
                    <li><a class="nav-link scrollto active" href="#">تسجيل الدخول</a></li>
                    <li><a class="nav-link scrollto" href="update_proj.php">تعديل مشروع</a></li>
                    <li><a class="getstarted scrollto" href="display.php">طلب مشروع</a></li>
                    <li><a class="getstarted scrollto active" href="signup.php">إنشاء حساب</a></li>
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
                        <span>تسجيل الدخول</span>
                    </h2>
                </div>
                <div class="container ">

                        <div class="col-lg-6 mx-auto mb-5 mb-lg-0">
                            <div class="card">
                                <div class="card-body py-5 px-md-5">
                                    <form method="POST">
                                       <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example3">اسم المستخدم أو البريد الالكتروني :</label>
                                            <input type="text" id="form3Example3" name="user_name" class="form-control" />
                                        </div>

                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example4">كلمة المرور أو الرقم الوظيفي</label>
                                            <input type="password" id="form3Example4" name="user_pass" class="form-control" />
                                        </div>

                                        <!-- Submit button -->
                                        <input type="submit" name="login" value="تسجيل الدخول" class="btn btn-primary btn-block mb-4">
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
                                                <label class="form-label" for="form3Example4">اذا لم تملك حساب مسبقا</label>
                                                <a href="signup.php">قم بإنشاء حساب جديد....؟؟</a>
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