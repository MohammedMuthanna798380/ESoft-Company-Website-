<?php
include('company_db_con.php');
if(!isset($_COOKIE['username'])){
    header('location:login.php');
    exit;
}
else{
    $useradmain=$_COOKIE['username'];
    $result=$con->query('SELECT id from users
                        WHERE UName = "'.$useradmain.'" ');
    if(!$result->num_rows){
        header('location:login.php');
        exit;
    }
}
$date = new DateTime();
$extensions=array("png","jpg","jpeg");

if(isset($_POST['add_dept'])){
    $dept_name=$_POST['dept_name'];
    $ssn=$_POST['ssn'];
    $start_date=$_POST['start_date'];
    $res=$con->query("INSERT INTO `department`(`dept_name`, `ssn`, `start_date`) VALUES
     (' $dept_name','$ssn','$start_date')");
     if($res){
            header('refresh:0');
     }
     else{
       echo "<script>alert('لم نستطيع إضافة القسم!!');</script>";
     }
}
if(isset($_POST['add_proj'])){
    $file_name1=$date->getTimestamp().$_FILES['image1']['name'];
    $file_size1=$_FILES['image1']['size'];
    $file_tmp1=$_FILES['image1']['tmp_name'];

    $tmp1=explode('.',$file_name1);
    $ext1=strtolower(end($tmp1));
    if(in_array($ext1,$extensions)){
        move_uploaded_file($file_tmp1,"users/".$file_name1);
    }
    else{
        echo "<script>alert('حدث خطا ما لم نستطيع إضافة الصورة!!');</script>";
    }
    $file_name2=$date->getTimestamp().$_FILES['image2']['name'];
    $file_size2=$_FILES['image2']['size'];
    $file_tmp2=$_FILES['image2']['tmp_name'];

    $tmp2=explode('.',$file_name2);
    $ext2=strtolower(end($tmp2));
    if(in_array($ext1,$extensions)){
        move_uploaded_file($file_tmp2,"users/".$file_name2);
    }
    else{
        echo "<script>alert('حدث خطا ما لم نستطيع إضافة الصورة!!');</script>";
    }
    $proj_name=$_POST['proj_name'];
    $proj_desc=$_POST['proj_desc'];
    $proj_dept_id=$_POST['proj_dept'];
    $proj_cust_id=$_POST['proj_cust'];
    $date_deliver=$_POST['date_deliver'];
    $res=$con->query("INSERT INTO `project`(`proj_name`, `proj_desc`,`dept_id`,`cust_id`, `date_deliver`,`image1`,`image2`) VALUES
     (' $proj_name','$proj_desc','$proj_dept_id','$proj_cust_id','$date_deliver','$file_name1','$file_name2')");
     if($res){
            header('refresh:0');
     }
     else{
       echo "<script>alert('لم نستطيع إضافةالمشروع!! ');</script>";
     }
}
if(isset($_POST['add_emp'])){
    $file_name=$date->getTimestamp().$_FILES['image_emp']['name'];
    $file_tmp=$_FILES['image_emp']['tmp_name'];

    $tmp=explode('.',$file_name);
    $ext=strtolower(end($tmp));
    if(in_array($ext,$extensions)){
        move_uploaded_file($file_tmp,"users/".$file_name);
        $SSN2=$_POST['SSN2'];
        $FName=$_POST['FName'];
        $LName=$_POST['LName'];
        $address=$_POST['address'];
        $Bdate=$_POST['Bdate'];
        $sex=$_POST['sex'];
        $E_mail=$_POST['E_mail'];
        $dept_id2=$_POST['dept_id2'];
        $phone_emp=$_POST['phone_emp'];
        $res=$con->query("INSERT INTO employee (`SSN`, `FName`, `LName`,`address`,`Bdate`,`sex`,`E_mail`,`dept_id`,`phon_emp` , `image` )
            VALUES
            (' $SSN2','$FName','$LName','$address','$Bdate','$sex','$E_mail','$dept_id2','$phone_emp','$file_name')");
        if($res){
         header('refresh:0');
        }
        else{
            echo "<script>alert('لم نستطيع إضافة الموظف!!');</script>";
        }
    }
    else{
        echo "<script>alert('حدث خطا ما لم نستطيع إضافة الصورة!!');</script>";
    }
}
if(isset($_POST['add_serv'])){
    $serv_name=$_POST['serv_name'];
    $serv_desc=$_POST['serv_desc'];
    $serv_dept_id=$_POST['serv_dept_id'];
    $color=$_POST['color'];
    $res=$con->query("INSERT INTO `service`(`serv_name`, `serv_desc`, `dept_id`,`color`) VALUES
     (' $serv_name','$serv_desc','$serv_dept_id','$color')");
     if($res){
            header('refresh:0');
     }
     else{
       echo "<script>alert('لم نستطيع إضافة الخدمة!!');</script>";
     }
}
if(isset($_POST['update_emp'])){
    $ssn3=$_POST['SSN3'];
    $file_name3=$date->getTimestamp().$_FILES['image_emp2']['name'];
    $file_tmp3=$_FILES['image_emp2']['tmp_name'];

    $tmp3=explode('.',$file_name3);
    $ext3=strtolower(end($tmp3));
    if(in_array($ext3,$extensions)){
        move_uploaded_file($file_tmp3,"users/".$file_name3);
        $res=$con->query("UPDATE employee SET `image` = '$file_name3' WHERE `SSN`='$ssn3'");
         if($res){
                header('refresh:0');
         }
         else{
           echo "<script>alert('لم نستطيع إضافة الصورة!!');</script>";
         }
    }
    else{
        echo "<script>alert('حدث خطا ما لم نستطيع إضافة الصورة!!');</script>";
    }
}
if(isset($_POST['update_proj'])){
    $proj_num=$_POST['proj_num'];
    $file_name4=$date->getTimestamp().$_FILES['image_proj1']['name'];
    $file_tmp4=$_FILES['image_proj1']['tmp_name'];
    $file_name5=$date->getTimestamp().$_FILES['image_proj2']['name'];
    $file_tmp5=$_FILES['image_proj2']['tmp_name'];

    $tmp4=explode('.',$file_name4);
    $ext4=strtolower(end($tmp4));
    $tmp5=explode('.',$file_name5);
    $ext5=strtolower(end($tmp5));
    if((in_array($ext4,$extensions))&&(in_array($ext5,$extensions))){
        move_uploaded_file($file_tmp4,"users/".$file_name4);
        move_uploaded_file($file_tmp5,"users/".$file_name5);
        $res=$con->query("UPDATE project SET `image1` = '$file_name4' , `image2` = '$file_name5'  WHERE `proj_id`='$proj_num'");
         if($res){
                header('refresh:0');
         }
         else{
           echo "<script>alert('لم نستطيع إضافة الصور!!');</script>";
         }
    }
    else{
        echo "<script>alert('حدث خطا ما لم نستطيع إضافة الصور!!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert to company database</title>
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
    <style>
        .topping{
            width:100%;
            height:100px;
        }
        fieldset{
            margin:20px;
        }
        table{
            width:100%;
            text-align:center;
            /* border:1px solid black !important; */
            border:none !important;
        }
        table tr td h3{
            font-size:24px;
        }
        table tr td input, table tr td textarea, table tr td select{
            width:90%;
            font-size:20px;
        }
    </style>
</head>
<body>
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="#" class="logo d-flex align-items-center" style="margin-left:15px;">
            <!-- <img src="assets/img/logo.png" alt=""> -->
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
            <li><a class="active"href="#">التحكم</a></li>
            <li><a class="nav-link scrollto" href="index.php">إتصل بنا</a></li>
            <li><a class="nav-link scrollto" href="#">تسجيل الدخول</a></li>
            <li><a class="getstarted scrollto" href="serv.php">طلب خدمة</a></li>
            <li><a class="getstarted scrollto" href="signup.php">إنشاء حساب</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <!-- <div>ادخال بيانات الاقسام:</div> -->
    <div class="topping"></div>
    <div class="container">
        <form  method="post">
            <fieldset class="form-group border p-3">
                    <legend class="w-auto p-2">إدخال بيانات الاقسام:</legend>
                    <table class="form-group">
                        <tr>
                            <td><h3>اسم القسم: </h3></td>
                            <td><input id="form3Example3" class="form-control" type="text" name="dept_name" id="" require></td>
                        </tr>
                        <tr>
                            <td><h3>رقم مدير القسم: </h3></td>
                            <td><input id="form3Example3" class="form-control" type="text" name="ssn" id=""></td>
                        </tr>
                        <tr>
                            <td><h3>تاريخ البداية: </h3></td>
                            <td><input id="form3Example3" class="form-control" type="date" name="start_date" id=""></td>
                        </tr>
                        <tr>
                            <td colspan="2"> <input class="btn btn-primary mb-3 mt-3" type="submit" name="add_dept" value="أضف قسم جديد"></td>
                        </tr>
                    </table>
            </fieldset>
        </form>
        <!-- <div>ادخال بيانات الموظف:</div> -->
        <form  method="post" enctype="multipart/form-data">
            <fieldset class="border p-2">
                    <legend class="w-auto">إدخال بيانات الموظف:</legend>
                    <table>
                        <tr>
                            <td><h3>الرقم الوظيفي: </h3></td>
                            <td><input id="form3Example3" class="form-control" type="text" name="SSN2" id=""></td>
                        </tr>
                        <tr>
                            <td><h3>الاسم الاول للموظف: </h3></td>
                            <td><input id="form3Example3" class="form-control" type="text" name="FName" id=""></td>
                        </tr>
                        <tr>
                            <td><h3>اللقب: </h3></td>
                            <td><input id="form3Example3" class="form-control" type="text" name="LName" id=""></td>
                        </tr>
                        <tr>
                            <td><h3>العنوان : </h3></td>
                            <td><input id="form3Example3" class="form-control" type="text" name="address" id=""></td>
                        </tr>
                        <tr>
                            <td><h3>تاريخ الميلاد: </h3></td>
                            <td><input id="form3Example3" class="form-control" type="date" name="Bdate" id=""></td>
                        </tr>
                        <tr>
                            <td><h3>الجنس: </h3></td>
                            <td><input id="form3Example3" class="form-control" type="text" name="sex" id=""></td>
                        </tr>
                        <tr>
                            <td><h3>البريد الالكتروني: </h3></td>
                            <td><input id="form3Example3" class="form-control" type="email" name="E_mail" id=""></td>
                        </tr>
                        <tr>
                            <td><h3>رقم القسم: </h3></td>
                            <td><input id="form3Example3" class="form-control" type="number" name="dept_id2" id=""min="1" max="12"></td>
                        </tr>
                        <tr>
                            <td><h3>رقم الهاتف: </h3></td>
                            <td><input id="form3Example3" class="form-control" type="text" name="phone_emp" id=""></td>
                        </tr>
                        <tr>
                            <td><h3>الصورة الشخصية: </h3></td>
                            <td><input id="form3Example3" class="form-control" type="file" name="image_emp" id=""></td>
                        </tr>
                        <tr>
                            <td colspan="2"> <input class="btn btn-primary mb-3 mt-3" type="submit" name="add_emp" value="أضف موظف جديد"></td>
                        </tr>
                    </table>
            </fieldset>
        </form>
        <!-- <div>ادخال بيانات الخدمات:</div> -->
        <form  method="post">
            <fieldset class="border p-2">
                <legend class="w-auto">إدخال بيانات الخدمات:</legend>
                <table>
                    <tr>
                        <td><h3>اسم الخدمة:</h3></td>
                        <td><input id="form3Example3" class="form-control" type="text" name="serv_name" id="" require></td>
                    </tr>
                    <tr>
                        <td><h3>وصف الخدمة: </h3></td>
                        <td><textarea id="form3Example3" class="form-control" rows="4" cols="20"  name="serv_desc" id="">اكتب الوصف....</textarea></td>
                    </tr>
                    <tr>
                        <td><h3>رقم القسم: </h3></td>
                        <td><input id="form3Example3" class="form-control" type="number" name="serv_dept_id" id=""></td>
                    </tr>
                    <tr>
                        <td><h3>لون الخدمة: </h3></td>
                        <td>
                            <select id="form3Example3" class="form-control" name="color[]" >
                                <option value="blue">blue</option>
                                <option value="red">red</option>
                                <option value="pink">pink</option>
                                <option value="green">green</option>
                                <option value="purple">purple</option>
                                <option value="orange">orange</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"> <input class="btn btn-primary mb-3 mt-3" type="submit" name="add_serv" value="أضف خدمة جديده"></td>
                    </tr>
                </table>
            </fieldset>
        </form>
        <!--بيانات المشروع-->
        <form  method="post" enctype="multipart/form-data">
            <fieldset class="border p-2">
                <legend class="w-auto">إدخال بيانات المشروع:</legend>
                <table>
                    <tr>
                        <td><h3>اسم المشروع:</h3></td>
                        <td><input id="form3Example3" class="form-control" type="text" name="proj_name" id="" require></td>
                    </tr>
                    <tr>
                        <td><h3>وصف المشروع: </h3></td>
                        <td><textarea id="form3Example3" class="form-control" rows="4" cols="20"  name="proj_desc" id="">اكتب الوصف....</textarea></td>
                    </tr>
                    <tr>
                        <td><h3>رقم القسم: </h3></td>
                        <td><input id="form3Example3" class="form-control" type="number" name="proj_dept" id=""></td>
                    </tr>
                    <tr>
                        <td><h3>رقم العميل الخاص بهذا المشروع: </h3></td>
                        <td><input id="form3Example3" class="form-control" type="number" name="proj_cust" id=""></td>
                    </tr>
                    <tr>
                        <td><h3>تاريخ التسليم: </h3></td>
                        <td><input id="form3Example3" class="form-control" type="date" name="date_deliver" id=""></td>
                    </tr>
                    <tr>
                        <td><h3>صورة للمشروع: </h3></td>
                        <td><input id="form3Example3" class="form-control" type="file" name="image1" id=""></td>
                    </tr>
                    <tr>
                        <td><h3>صورة اخرى للمشروع: </h3></td>
                        <td><input id="form3Example3" class="form-control" type="file" name="image2" id=""></td>
                    </tr>
                    <tr>
                        <td colspan="2"> <input class="btn btn-primary mb-3 mt-3" type="submit" name="add_proj" value="أضف مشروع جديد"></td>
                    </tr>
                </table>
            </fieldset>
        </form>
        <!--تحديث على صورة الموظف-->
        <form  method="post" enctype="multipart/form-data">
            <fieldset class="form-group border p-3">
                    <legend class="w-auto p-2">تحديث صورة موظف :</legend>
                    <table class="form-group">
                        <tr>
                            <td><h3>الرقم الوظيفي: </h3></td>
                            <td><input id="form3Example3" class="form-control" type="text" name="SSN3" id=""></td>
                        </tr>
                        <tr>
                            <td><h3>الصورة الشخصية: </h3></td>
                            <td><input id="form3Example3" class="form-control" type="file" name="image_emp2" id=""></td>
                        </tr>
                        <tr>
                            <td colspan="2"> <input class="btn btn-primary mb-3 mt-3" type="submit" name="update_emp" value="تحديث صورة الموظف"></td>
                        </tr>
                    </table>
            </fieldset>
        </form>
        <!--تحديث على صور المشروع-->
        <form  method="post" enctype="multipart/form-data">
            <fieldset class="form-group border p-3">
                    <legend class="w-auto p-2">تحديث صور مشروع :</legend>
                    <table class="form-group">
                        <tr>
                            <td><h3>رقم المشروع: </h3></td>
                            <td><input id="form3Example3" class="form-control" type="text" name="proj_num" id=""></td>
                        </tr>
                        <tr>
                            <td><h3>الصورة الاولى: </h3></td>
                            <td><input id="form3Example3" class="form-control" type="file" name="image_proj1" id=""></td>
                        </tr>
                        <tr>
                            <td><h3>الصورة الثانية: </h3></td>
                            <td><input id="form3Example3" class="form-control" type="file" name="image_proj2" id=""></td>
                        </tr>
                        <tr>
                            <td colspan="2"> <input class="btn btn-primary mb-3 mt-3" type="submit" name="update_proj" value="تحديث صور المشروع"></td>
                        </tr>
                    </table>
            </fieldset>
        </form>
    </div>

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
