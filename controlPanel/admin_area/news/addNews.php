<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../../index.php','_self')</script>";
}

if (isset($_POST['submit'])) {

    include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/Newss.php';
    include_once '../jdf.php';
    $date = jdate("Y-m-d H:i:s",'','','','en');
    $title = $_POST["title"];
    $cat = $_POST["cat"];
    $body = $_POST["body"];
    $state = $_POST["state"];


//getting the image form the image fields
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $address_images = 'news_images/' . $image_name;
    move_uploaded_file($image_tmp, $address_images);

    $video_name = $_FILES['video']['name'];
    $video_tmp = $_FILES['video']['tmp_name'];
    $address_video = 'news_video/' . $video_name;
    move_uploaded_file($video_tmp, $address_video);
    $news = new News();
    $result = $news->insertData($address_images, $body, $address_video, $title, $cat, $state,$date);

//display message to user
    if ($result) {
        echo "<script>alert('تبریک...داده های مربوط به خبر شما به درستی وارد شد.')</script>";
        echo "<script>window.open('news.php','_self')</script>";
    }


}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-rtl.css">
    <link rel="stylesheet" href="">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src=""></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../img/logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>افزودن خبرها</title>
</head>

<body style="background-color: #654A6C">
<div class="container" style="margin-top: 100px; background-color: #EDEDED">
    <form action="" method="post" enctype="multipart/form-data">
        <h4 class="text-center p-5"> افزودن خبرها </h4>
        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                ویژگی های خبر
            </div>
            <div class="col-lg-8 p-2 text-center">
                مقدار ورودی برای هرکدام از ویژگی ها
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                عنوان خبر
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="title" class="form-control">
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                متن خبر
            </div>
            <div class="col-lg-8 p-2 text-center">
                <textarea name="body" class="form-control" style="resize: none"></textarea>
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                دسته بندی خبر
            </div>
            <div class="col-lg-8 p-2 text-center">
                <select name="cat" class="form-control">
                    <option>دسته ی مورد نظر خود را انتخاب کنید</option>
                    <?php
                    include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/newscat.php';

                    $news_cat = new Newscat();
                    $categories = $news_cat->ShowAll();

                    $i = 0;
                    $count = sizeof($categories);
                    while ($i < $count) {
                        $cat_id = $categories[$i]['id'];
                        $cat_title = $categories[$i]['title'];
                        $i++;
                        echo "<option value='$cat_id'>$cat_title</option>";
                    }

                    ?>
                </select>
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                عکس خبر
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="file" name="image" class="form-control">
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                فیلم خبر
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="file" name="video" class="form-control">
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                وضعیت
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="state" class="form-control">
            </div>
        </div>
        <input type="submit" name="submit" value="ثبت" class="btn px-3 text-white my-4"
               style="background-color:#654A6C ">
</div>
</form>

</body>
</html>
