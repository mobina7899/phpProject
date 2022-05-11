<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../../index.php','_self')</script>";
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/Product.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/product-pic.php';
include_once '../jdf.php';
if (isset($_POST['submit'])) {
    $id = $_GET['id'];

    //getting the text data form the fields
    $new_title = $_POST["title"];
    $new_body = $_POST["body"];
    $new_price = $_POST["price"];
    $new_date  = jdate("Y-m-d H:i:s",'','','','en');

//
    $product = new product();

    $run_update = $product->updatedata($id, $new_title, $new_body, $new_price, $new_date);
    $select_pic = "select * from `product_pic` where `fk_product` = '$id'";

    $product_pic = new productpic();
    $pic = $product_pic->details($select_pic);
    $img = $pic['pic'];
    $pic_id = $pic['id'];


    //getting the image form the image fields
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $address_images = 'product_images/' . $image_name;
        move_uploaded_file($image_tmp, $address_images);
    } else {
        $address_images = $img;
    }
    $res = $product_pic->updatedata($pic_id, $address_images, $id);
    if ($res && $run_update) {
        echo "<script>alert('اطلاعات جدید جایگزین اطلاعات قبلی شد.')</script>";
        echo "<script>window.open('products.php','_self')</script>";
    }

}

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-rtl.css">
    <link rel="stylesheet" href="">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src=""></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../img/logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>ویرایش محصول</title>
</head>

<body style="background-color: #654A6C">
<div class="container" style="margin-top: 100px; background-color: #EDEDED">
    <form action="" method="post" enctype="multipart/form-data">
        <?php
        include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/product-pic.php';

        $id = $_GET['id'];
        $product = new product();
        $select = "select * from product where id = '$id'";
        $row = $product->details($select);
        $title = $row['title'];
        $body = $row['body'];
        $price = $row['price'];
        $date = $row['created'];

        $select_pic = "select * from `product_pic` where `fk_product` = '$id'";

        $product_pic = new productpic();
        $product_pic = $product_pic->details($select_pic);
        $image = $product_pic['pic'];
        ?>

        <h4 class="text-center p-5"> افزودن محصول </h4>
        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                ویژگی های محصول
            </div>
            <div class="col-lg-8 p-2 text-center">
                مقدار ورودی برای هرکدام از ویژگی ها
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                نام محصول
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="title" value="<?php echo $title; ?>" class="form-control">
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                توضیحات
            </div>
            <div class="col-lg-8 p-2 text-center">
                <textarea name="body" class="form-control" style="resize: none"><?php echo $body; ?></textarea>
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                عکس خبر
            </div>
            <div class="col-lg-8 p-2 text-center">
                <img src="<?php echo $image; ?>" height="45" width="60"/><br/><br/>
                <input type="file" name="image" class="form-control">
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                قیمت
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="price" value="<?php echo $price; ?>" class="form-control">
            </div>
        </div>
        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                تاریخ ثبت
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="date" value="<?php echo $date; ?>" class="form-control" disabled>
            </div>
        </div>
        <input type="submit" name="submit" value="ثبت" class="btn px-3 text-white my-4"
               style="background-color:#654A6C ">
</div>
</form>
</body>
</html>

