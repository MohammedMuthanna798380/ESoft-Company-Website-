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
        $result2=$con->query('SELECT SSN from employee
                        WHERE E_mail = "'.$useradmain.'" ');
        if(!$result2->num_rows){
            header('location:login.php');
            exit;
        }
    }
}
$date = new DateTime();
$extensions=array("png","jpg","jpeg");

if(isset($_POST['update_proj'])){
    $proj_num=$_POST['name'];
    $proj_price=$_POST['price'];
    $file_name=$date->getTimestamp().$_FILES['image']['name'];
    $file_tmp=$_FILES['image']['tmp_name'];

    $tmp=explode('.',$file_name);
    $ext=strtolower(end($tmp));
    if(in_array($ext,$extensions)){
        move_uploaded_file($file_tmp,"users/".$file_name);
        $res=$con->query("UPDATE project SET `image1` = '$file_name' , `price`=$proj_price  WHERE `proj_name`='$proj_num'");
         if($res){
             $massge[]='تم تحديث العنصر بنجاح';
         }
         else{
           echo "<script>alert('لم نستطيع إضافة الصور!!');</script>";
         }
    }
    else{
        echo "<script>alert('حدث خطا ما لم نستطيع إضافة الصور!!');</script>";
    }
}
if(isset($_POST['delete_proj'])){
    $proj_num=$_POST['name'];
    $res1=$con->query("DELETE FROM project WHERE `proj_name`='$proj_num'");
    if($res1){
        $massge[]='تم حذف العنصر بنجاح';
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EbharSoft - update</title>
    <link rel="stylesheet" href="index.css">
    <style>
        *{
        font-family: Noto Kufi Arabic !important;
        }
    </style>
</head>
<body>
    <?php
    if(isset($massge)){
        foreach($massge as $message){
            echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
        }
    }
    ?>
    <center>
        <div class="continare">
            <div class="main">
                <center>
                    <form method="post" enctype="multipart/form-data">
                        <h2>تحديث مشروع</h2>
                        <img src="assets/img/hero-img.png" alt="logo" width="450px">
                        <input type="text" name='name' placeholder="أدخل اسم المشروع" >
                        <br>
                        <input type="text" name='price' placeholder="أدخل السعر الجديد">
                        <br>
                        <input type="file" id="file" name='image' style='display:none;'>
                        <label for="file"> اختيار صورة للمشروع</label>
                        <button type="submit" name='update_proj'>تحديث المشروع ✅</button>
                    </form>
                </center>
            </div>
            <div class="main">
                <center>
                    <form method="post" enctype="multipart/form-data">
                        <h2>حذف مشروع</h2>
                        <img src="assets/img/hero-img.png" alt="logo" width="450px">
                        <input type="text" name='name' placeholder="أدخل اسم المشروع">
                        <br>
                        <button type="submit" name='delete_proj' style="background-color: #e74c3c; width:62%">حذف المشروع</button>
                    </form>
                </center>
            </div>
        </div>
    </center>
</body>
</html>