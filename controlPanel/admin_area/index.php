<?php
session_start();

if(!isset($_SESSION['username'])){
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../index.php','_self')</script>";
}
    ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="img/logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>پنل مدیریت</title>
</head>

<body style="background-color: #654A6C">
<div class="container-fluid" style="background-color:#654A6C; height: 180px">
    <img src="img/user.webp">
</div>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-3">
            <ul class="list-group d-flex flex-column text-center">
                <li class="list-group-item">
                    <a class="text-dark" href="../../index.php" target="_blank"> مشاهده سایت </a>
                </li>

                <li class="list-group-item">
                    <a class="text-dark" href="news/news.php"> اخبار </a>
                </li>
                <li class="list-group-item">
                    <a class="text-dark" href="news_cat/cats.php"> دسته بندی اخبار </a>
                </li>

                <li class="list-group-item">
                    <a class="text-dark" href="products/products.php"> محصولات </a>
                </li>

                <li class="list-group-item">
                    <a class="text-dark" href="rules/rules.php"> قوانین </a>
                </li>

                <li class="list-group-item">
                    <a class="text-dark" href="password/password.php"> ویرایش رمز عبور </a>
                </li>

                <li class="list-group-item">
                    <a class="text-dark" href="slider/slides.php"> اسلایدر </a>
                </li>

                <li class="list-group-item">
                    <a class="text-dark" href="contact_us/contact_us.php"> اطلاعات تماس با ما </a>
                </li>

                <li class="list-group-item">
                    <a class="text-dark" href="contact_form/contact_form.php"> فرم تماس </a>
                </li>

                <li class="list-group-item">
                    <a class="text-dark" href="questions/questions.php"> پرسش و پاسخ </a>
                </li>

                <li class="list-group-item">
                    <a class="text-dark" href="customers/customers.php">مشتریان-شرکا </a>
                </li>

                <li class="list-group-item">
                    <a class="text-dark" href="about_us/about_us.php">درباره ما </a>
                </li>

                <li class="list-group-item">
                    <a class="text-dark" href="members/members.php">اعضا </a>
                </li>

                <li class="list-group-item">
                    <a class="text-dark" href="honors/honors.php">افتخارات </a>
                </li>

                <li class="list-group-item">
                    <a class="text-dark" href="gallery/gallery.php">گالری تصاویر </a>
                </li>

                <li class="list-group-item">
                    <a class="text-dark" href="gallery_cat/cats.php">دسته بندی  تصاویر </a>
                </li>

                <li class="list-group-item">
                    <a class="text-dark" href="logout.php"> خروج </a>
                </li>
            </ul>
        </div>
        <div class="col-9">
            <div class="card d-flex justify-content-center align-content-center" style="height: 400px">
                <span class="card-text text-center"> سلام مدیر محترم ، مقدمتان گلباران ، موفق باشید </span>
            </div>
        </div>
    </div>
</div>
</body>
</html>

