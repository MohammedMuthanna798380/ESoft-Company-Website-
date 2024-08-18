<?php
  // if(!isset($_COOKIE['username'])){
  //   header('location:login.php');  
  // }
?>
<?php
include('company_db_con.php');
$results=$con->query('select dept_name from department');
$results_serv=$con->query('select * from service');
$results_proj=$con->query('select * from project');
$results_cust=$con->query('select * from customer');
$results_emp=$con->query('select * from employee');
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EbharSoft - Home</title>
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

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="#" class="logo d-flex align-items-center" style="margin-right:-50px;">
        <span>إبحار</span>
        <span>سوفت</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">الرئيسية</a></li>
          <li><a class="nav-link scrollto" href="#about">من نحن</a></li>
          <li><a class="nav-link scrollto" href="#values">أعمالنا</a></li>
          <li><a class="nav-link scrollto" href="#services">الخدمات</a></li>
          <li><a class="nav-link scrollto" href="#team">الفريق</a></li>
          <li><a href="insert_data.php">التحكم</a></li>
          <li><a class="nav-link scrollto" href="#contact">إتصل بنا</a></li>
          <li><a class="nav-link scrollto" href="login.php">تسجيل الدخول</a></li>
          <li><a class="nav-link scrollto" href="update_proj.php">تعديل مشروع</a></li>
          <li><a class="getstarted scrollto" href="display.php">طلب مشروع</a></li>
          <li><a class="getstarted scrollto" href="signup.php"> إنشاء حساب جديد</a></li>
          </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <div class="home_text_block text-center">
            <h3><span> اهلا وسهلا بكم</span></h3>
            <h1 class="cd-headline clip">
                <span>إبحار سوفت</span>
                <span style="color: #7556e4;">للبرمجيات</span>
            </h1>
            <?php
              if($results->num_rows){
                for($i=0;$i<2;$i++){
                  $count=0;
                  echo'<div class="row mt-3">';
                  while($row=$results->fetch_assoc()){
                    $count++;
                    $dept=$row['dept_name'];
                    echo '
                      <div class="flip-box col-6">
                        <div class="flip-box-inner">
                          <div class="flip-box-front" style="background-color: #cad3ef;">
                            <h2>'.$dept.'</h2>
                          </div>';
                          $row=$results->fetch_assoc();
                          $dept=$row['dept_name'];
                          echo'
                          <div class="flip-box-back" style="background-color: #263179;">
                            <h2>'.$dept.'</h2>
                          </div>
                        </div>
                      </div>
                    ';
                    if($count>=2)
                      break;
                  }
                  echo'</div>';
                }
              }
              ?>
        </div>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="serv.php"
                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span style="margin-left:10px;">طلب خدمة</span>
                <i class="bi bi-arrow-left"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>من نحن</h3>
                <h2><div class="info">
                  <a class="footer_logo site_logo" href="index.html" style="color: black;"><span>إبحار</span>سوفت</a>
                  <h3> بحر في عالم التكنولوجيا</h3>
                  <h5> </h5>
              </div></h2>
              <p>التقنية تتغيّر بشكل دوري وبسرعة كبيرة جدًا، لذا احرص على تطوير مهاراتك لتلائم التغيير ولا تقف عند حد مُعيّن. لن تنفعك مهاراتك في تطوير صفحات الويب إذا كنت قد تعلمتها مع بداية الألفية الجديدة، ولم تطورها لتتقن مهارات تطوير الويب
                باستخدام HTML 5. مادام أن الاتجاه الذي اخترته ما زال مطلوبًا ويُواكب التطور، تبنّى جميع تقنياته الحديثة وأعمل على إتقانها، فالمبرمج الحقيقي يحتاج إلى تطوير أدواته بشكل مستمر.</p>
            <p>يجب التفكير دائمًا أنك بحاجة للبدء من نقطة ما ويجب أن تكون صغيرة، لأن الكثير من المفاهيم الخاطئة في مجال علوم الحاسوب تنص على تعلّم كميّة كبيرة من المعلومات قبل أن تتمكّن من بناء شيء عظيم.</p>
            
              <div class="text-center text-lg-start">
                <a href="about_us.html"
                  class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                  <span style="margin-left:10px;">قراءة المزيد</span>
                  <i class="bi bi-arrow-left"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>

        </div>
      </div>

    </section><!-- End About Section -->

    <!-- ======= Values Section ======= -->
    <section id="values" class="values">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>مشاريعنا</h2>
          <p>مشاريعنا يتم انجازها بكل مصداقية وحب وتتم علي ايدي افضل المبرمجين</p>
        </header>

        <div class="row">
          
          <?php
            if($results_proj->num_rows){
              for($pro=200;$pro<700;$pro+=200){
                $proj_row=$results_proj->fetch_assoc();
                $pro_name=$proj_row['proj_name'];
                $pro_desc=$proj_row['proj_desc'];
                $pro_img=$proj_row['image1'];
                echo '
                  <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="'.$pro.'">
                    <div class="box">
                      <img src="users/'.$pro_img.'" class="img-fluid" alt="">
                      <h3>'.$pro_name.'</h3>
                      <p>'.$pro_desc.'</p>
                    </div>
                  </div>
                ';
              }
            }
          ?>
        </div>

      </div>

    </section><!-- End Values Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <?php
            $arr=[
              ["bi-emoji-smile","blue","232","عميل سعيد"],
              ["bi-journal-richtext","#ee6c20","521","مشروع"],
              ["bi-headset","#15be56","1463","ساعات من الدعم"],
              ["bi-people","#bb0852","15","موظف نشط"]
            ];
            $i=0;
            for($j=0;$j<4;$j++){
              echo '
              <div class="col-lg-3 col-md-6">
                <div class="count-box">
                  <i class="bi '.$arr[$j][0].'" style="color: '.$arr[$j][1].';margin-left:10px;"></i>
                  <div>
                    <span data-purecounter-start="0" data-purecounter-end='.$arr[$j][2].' data-purecounter-duration="1"
                      class="purecounter"></span>
                    <p>'.$arr[$j][3].'</p>
                  </div>
                </div>
              </div>
              ';
            }
          ?>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>مميزاتنا</h2>
          <p>سنجعلك علامة تجارية جذابة وتترك أثرا ربما أن مجموعتك المستهدفة لن تنساك أبدا</p>
        </header>

        <div class="row">

          <div class="col-lg-6">
            <img src="assets/img/features.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
            <div class="row align-self-center gy-4">
              <?php
                $arr2=["تصميم واجهات احترافية","جعل برنامجك قابل لتطوير","جعل تطبيقك اكثر امانا","عمل استضافة لموقعك","سنجعلك علامة تجارية جذابة","قابلية التطوير والصيانة"];
                $x=200;
                for($i=0;$i<6;$i++)
                {
                  echo '
                    <div class="col-md-6" data-aos="zoom-out" data-aos-delay="'.$x.'">
                      <div class="feature-box d-flex align-items-center">
                        <h3>'.$arr2[$i].'</h3>
                        <i class="bi bi-check"></i>
                      </div>
                    </div>
                  ';
                }
              ?>
            </div>
          </div>

        </div> <!-- / row -->

      </div>

    </section><!-- End Features Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>الخدمات</h2>
          <p>سنجعلك علامة تجارية جذابة وتترك أثرا ربما أن مجموعتك المستهدفة لن تنساك أبدا</p>
        </header>

        <div class="row gy-4">

          <?php
            if($results_serv->num_rows){
              
              for($services=200;$services<=700;$services+=100){
                $row_serv=$results_serv->fetch_assoc();
                $serv_name=$row_serv['serv_name'];
                $serv_desc=$row_serv['serv_desc'];
                $color=$row_serv['color'];
                echo '<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="'.$services.'">
                    <div class="service-box '.$color.'">
                      <i class="ri-discuss-line icon"></i>
                      <h3>'.$serv_name.'</h3>
                      <p>'.$serv_desc.'</p>
                      <a href="serv.php" class="read-more"><span>قراءة المزيد</span> <i class="bi bi-arrow-left"></i></a>
                    </div>
                  </div>
                ';
              }
            }
          ?>
        </div>
      </div>

    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <!-- <section id="portfolio" class="portfolio">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>أعمالنا</h2>
          <p>إطلع على آخر أعمالنا</p>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">الكل</li>
              <li data-filter=".filter-app">التطبيقات</li>
              <li data-filter=".filter-card">بطاقات</li>
              <li data-filter=".filter-web">الويب</li>
            </ul>
          </div>
        </div>

        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery"
                    class="portfokio-lightbox" title="App 1"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery"
                    class="portfokio-lightbox" title="Web 3"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery"
                    class="portfokio-lightbox" title="App 2"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 2</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery"
                    class="portfokio-lightbox" title="Card 2"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 2</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery"
                    class="portfokio-lightbox" title="Web 2"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery"
                    class="portfokio-lightbox" title="App 3"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 1</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery"
                    class="portfokio-lightbox" title="Card 1"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 3</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery"
                    class="portfokio-lightbox" title="Card 3"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery"
                    class="portfokio-lightbox" title="Web 3"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section> -->
    <!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>شهادات</h2>
          <p>ما يُقال عننا</p>
        </header>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
          <div class="swiper-wrapper">
            <?php
              $x=0;
              if($results_cust->num_rows){
                while($cust_row=$results_cust->fetch_assoc()){
                  $custName=$cust_row['FName']." ".$cust_row['LName'];
                  $custType=$cust_row['cust_type'];
                  $x++;

                  echo '
                    <div class="swiper-slide">
                      <div class="testimonial-item">
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                          شركة تستحق الجدارة ونتمنى لها التميز والابداع وفعلا بخدمتها تجعلك علامة جذابة لا تنسى 
                        </p>
                        <div class="profile mt-auto">
                          <img src="assets/img/clients/client-'.$x.'.png" class="testimonial-img" alt="">
                          <h3>'.$custName.'</h3>
                          <h4>'.$custType.'</h4>
                        </div>
                      </div>
                    </div>
                  ';
                }
              }
            ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2> فريق العمل</h2>
          <p>مجموعة من المصممين ذو الخبرة في مجال البرمجة</p>
        </header>

        <div class="row gy-4">
          <?php
            if($results_emp->num_rows){
              for($i=1;$i<=400;$i+=100){
                $row_emp=$results_emp->fetch_assoc();
                $Fname_emp=$row_emp['FName'];
                $Lname_emp=$row_emp['LName'];
                $img_emp=$row_emp['image'];
                $dept_emp=$row_emp['dept_id'];
                $results_demp=$con->query('select dept_name from department where `dept_id` = '.$dept_emp.'');
                if($results_demp->num_rows){
                  $dept_name_emp=$results_demp->fetch_assoc();
                  $dept_n=$dept_name_emp['dept_name'];
                  echo '
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="'.$i.'">
                      <div class="member">
                        <div class="member-img">
                          <img src="users/'.$img_emp.'" class="img-fluid" alt="">
                          <div class="social">
                            <a href=""><i class="bi bi-twitter"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                          </div>
                        </div>
                        <div class="member-info">
                          <h4>'.$Fname_emp.' '.$Lname_emp.'</h4>
                          <span>مدير '.$dept_n.'</span>
                          <p>Velit aut quia fugit et et. Dolorum ea voluptate vel tempore tenetur ipsa quae aut. Ipsum
                            exercitationem iure minima enim corporis et voluptate.</p>
                        </div>
                      </div>
                    </div>
                  ';
                }

              }
            }
          ?>
        </div>
      </div>
    </section><!-- End Team Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>عملائنا</h2>
          <p>شعارات شركات من عملائنا</p>
        </header>

        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <?php
              for($i=1;$i<=8;$i++){
                echo'
                  <div class="swiper-slide"><img src="assets/img/clients/client-'.$i.'.png" class="img-fluid" alt=""></div>
                ';
              }
            ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>

    </section><!-- End Clients Section -->
    
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>تواصل</h2>
          <p>تواصل معنا</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-geo-alt"></i>
                  <h3>العنوان</h3>
                  <p>A108 Adam Street,<br>New York, NY 535022</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box ">
                  <i class="bi bi-telephone"></i>
                  <h3>إتصل بنا</h3>
                  <p>0096777777777<br>00967711111111</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-envelope"></i>
                  <h3>الإيميل</h3>
                  <p>masaadm97@gmail.com<br>contact@example.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-clock"></i>
                  <h3>ساعات العمل</h3>
                  <p>السبت - الخميس<br>9:00AM - 05:00PM</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="أدخل اسمك" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="ادخل بريدك الالكتروني" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="ادخل عنوان الرسالة" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="اكتب رسالتك هنا."
                    required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">جاري التحميل</div>
                  <div class="error-message"></div>
                  <div class="sent-message">تم إرسال رسالتك. شكرا!</div>

                  <button type="submit">إرسال</button>
                </div>

              </div>
            </form>

          </div>

        </div>

      </div>

    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12 text-center">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="assets/img/logo.png" alt="">
              <span>إبحار سوفت</span>
            </a>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies
              darta donna mare fermentum iaculis eu non diam phasellus.</p>
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