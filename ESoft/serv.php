<?php
if(!isset($_COOKIE['username'])){
  header('location:login.php');  
}
?>
<?php
include('company_db_con.php');
$results_serv=$con->query('select * from service');
$check_cook=$_COOKIE['username'];
$results_cust=$con->query('select cust_id from customer
     where cust_username = "'.$check_cook.'" ');
if($results_cust->num_rows){
    if(!isset($_SESSION)){
        session_start();
        session_regenerate_id();
    }
    $cust_r=$results_cust->fetch_assoc();
    $cust_i=$cust_r['cust_id'];
    $requst_time=time();
    if(isset($_POST['service'])){
        $service_id=$_POST['num_serv'];
        $service_name=$_POST['nam_serv'];
        $_SESSION['serv']["$service_id"]=$service_name;
        $in=$con->query("INSERT INTO `cust_serv` (`cust_id`,`serv_id`,`requst_date`)
                    VALUE ('$cust_i','$service_id','$requst_time')");
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EbharSoft - Services</title>
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
</head>
<body>
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="#" class="logo d-flex align-items-center" style="margin-right:-50px;">
            <span>إبحار</span>
            <span>سوفت</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
            <li><a class="nav-link scrollto " href="index.php">الرئيسية</a></li>
            <li><a class="nav-link scrollto" href="index.php">من نحن</a></li>
            <li><a class="nav-link scrollto active" href="#">الخدمات</a></li>
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
    </header>
    <div class="row" style="height:100px;" ></div>
    <section id="services" class="services">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h1>إبحار سوفت للبرمجيات</h1>
                <p>أفضل الحلول لادارة أعمالك</p>
                <p>سنجعلك علامة تجارية جذابة وتترك أثرا ربما أن مجموعتك المستهدفة لن تنساك أبدا</p>
            </header>

            <div class="row gy-4">

                <?php
                    if($results_serv->num_rows){
                        $num_div=200;
                        while($row_serv=$results_serv->fetch_assoc()){
                            $serv_id=$row_serv['serv_id'];
                            $serv_name=$row_serv['serv_name'];
                            $serv_desc=$row_serv['serv_desc'];
                            $color=$row_serv['color'];
                            echo '<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="'.$num_div.'">
                                <div class="service-box '.$color.'">
                                    <i class="ri-discuss-line icon"></i>
                                    <h3>'.$serv_name.'</h3>
                                    <p>'.$serv_desc.'</p>
                                    <form method="POST" style="background-color:inherit;">
                                        <input type="text" name="nam_serv" value="'.$serv_name.'" style="display:none;">
                                        <input type="text" name="num_serv" value="'.$serv_id.'" style="display:none;">
                                        <input type="submit" name="service" value="أضف الى السلة" class="read-more" style="border:none; background-color:inherit;">
                                        <i class="bi bi-arrow-left"></i>
                                    </form>
                                </div>
                                </div>
                            ';
                            $num_div+=100;
                            if($num_div>700)
                                $num_div=200;
                        }
                    }
                ?>
            </div>

        </div>
        <div class="container" style="height:200px;" >
            <div class="row" style="height:100px;" ></div>
            <div class="row" style="margin-bottom:100px;">
                <?php
                    if(isset($_SESSION['serv'])){
                        foreach($_SESSION['serv'] as $value){
                            echo '
                                <div class="col-lg-2 col-md-6 mt-4 pb-4">
                                    <div class="service-box">
                                        <h2>'.$value.'</h2>
                                    </div>
                                </div>
                            ';
                        }
                    }
                ?>
            </div>
        </div>
        <div class="row" style="height:100px;" ></div>
    </section>

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