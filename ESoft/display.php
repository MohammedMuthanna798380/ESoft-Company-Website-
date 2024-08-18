<?php
include('company_db_con.php');
if(!isset($_COOKIE['username'])){
    header('location:login.php');
    exit;
}else{
    $customer=$_COOKIE['username'];
    $result=$con->query('SELECT cust_id from customer
                        WHERE cust_username = "'.$customer.'" OR E_mail= "'.$customer.'" ');
    if(!$result->num_rows){
        header('location:login.php');
        exit;
    }else{
        session_start();
        session_regenerate_id();
        $select_id=$result->fetch_assoc();
        $_SESSION['user_id']=$select_id['cust_id'];
    }
}
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
   header('location:login.php');
   exit;
};


if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header('location:login.php');
    exit;
 };
 if(isset($_POST['add_to_cart'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
 
    $select_cart = $con->query("SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
 
    if($select_cart->num_rows){
       $message[] = 'المنتج أضيف بالفعل إلى عربة التسوق!';
    }else{
        $res_int=$con->query("INSERT INTO `cart`(user_id, name, price, image, qun)
                            VALUES
                            ('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')")
                             or die('query failed');
        if($res_int){
            $message[] = 'المنتج يضاف الى عربة التسوق!';
        }
    }
 
 };
 
 if(isset($_POST['update_cart'])){
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['cart_id'];
    $res_up=$con->query("UPDATE `cart` SET qun = '$update_quantity' WHERE id = '$update_id'")
                         or die('query failed');
    if($res_up){
        $message[] = 'تم تحديث كمية سلة التسوق بنجاح!';
    }
 }
 
 if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    $res_del=$con->query("DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
    if($res_del){
        header('location:display.php');
        exit;
    }
 }
   
 if(isset($_GET['delete_all'])){
    $res_dela=$con->query("DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    if($res_dela){
        header('location:display.php');
        exit;
    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>التسوق</title>
    <link rel="stylesheet" href="style.css">
    <style>
        *{
        font-family: Noto Kufi Arabic !important;
        }
    </style>
</head>
<body>
    <?php
    if(isset($message)){
        foreach($message as $message){
            echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
        }
    }
    ?>
    <div class="container">
        <div class="user-profile">
            <?php
                $select_user = $con->query("SELECT * FROM `customer` WHERE cust_id = '$user_id'") or die('query failed');
                if($select_user->num_rows){
                    $fetch_user = $select_user->fetch_assoc();
                };
            ?>

            <p>اسم العميل : <span><?php echo $fetch_user['FName'].' '.$fetch_user['LName']; ?></span> </p>
            <div class="flex">
                <a href="display.php?logout=<?php echo $user_id; ?>" onclick="return confirm('هل أنت متأكد أنك تريد تسجيل الخروج؟');" class="delete-btn">تسجيل الخروج</a>
            </div>

        </div>

        <div class="products">
            <h1 class="heading">أحدث المشاريع</h1>
            <div class="box-container">
                <?php
                    $result = $con->query("SELECT * FROM project");  
                    if($result->num_rows){    
                        while($row = $result->fetch_assoc()){
                ?>
                    <form method="post" class="box" action="">
                        <img src="users/<?php echo $row['image1']; ?>"  width="200">
                        <div class="name"><?php echo $row['proj_name']; ?></div>
                        <div class="price"><?php echo $row['price'].'$'; ?></div>
                        <input type="number" min="1" name="product_quantity" value="1">
                        <input type="hidden" name="product_image" value="<?php echo $row['image1']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $row['proj_name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
                        <input type="submit" value="إضافة الى السلة" name="add_to_cart" class="btn">
                    </form>
                <?php
                    };
                }
                ?>
            </div>
        </div>

        <div class="shopping-cart">
            <h1 class="heading"> سلة التسوق</h1>
            <table dir="rtl">
                <thead>
                    <th>الصورة</th>
                    <th>الاسم</th>
                    <th>السعر</th>
                    <th>العدد</th>
                    <th>السعر الكلي</th>
                    <th>العمل</th>
                </thead>
                <tbody>
                    <?php
                        $cart_query = $con->query("SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                        $grand_total = 0;
                        if($cart_query->num_rows){
                            while($fetch_cart = $cart_query->fetch_assoc()){
                    ?>
                    <tr>
                        <td><img src="users/<?php echo $fetch_cart['image']; ?>" height="75" alt=""></td>
                        <td><?php echo $fetch_cart['name']; ?></td>
                        <td><?php echo $fetch_cart['price']; ?>$ </td>
                        <td>
                        <form action="" method="post">
                            <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                            <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['qun']; ?>">
                            <input type="submit" name="update_cart" value="تعديل" class="option-btn">
                        </form>
                        </td>
                        <td><?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['qun']); ?>$</td>
                        <td><a href="display.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('إزالة العنصر من سلة التسوق؟');">حذف</a></td>
                    </tr>
                    <?php
                        $grand_total += $sub_total;
                            }
                        }else{
                            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">العربة فارغة</td></tr>';
                        }
                    ?>
                    <tr class="table-bottom">
                        <td colspan="4">المبلغ الإجمالي :</td>
                        <td><?php echo $grand_total; ?>$</td>
                        <td><a href="display.php?delete_all" onclick="return confirm('حذف كل المنتجات من العربة?');" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">حذف الكل</a></td>
                    </tr>
            </tbody>
            </table>



        </div>

    </div>


    
</body>
</html>