<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../../index.php','_self')</script>";
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/gallery-pic.php';

if (isset($_POST['submit'])) {
    $id = $_GET['id'];

    //getting the text data form the fields

    $new_cat = $_POST['cat'];
    $new_body = $_POST['body'];
    $pic = new Gallery();
    $select = "select * from gallery_pic where id = '$id'";
    $row = $pic->details($select);

    //getting the image form the image fields
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $address_image = 'images/' . $image_name;
        move_uploaded_file($image_tmp, $address_image);
    } else {
        $address_image = $row['pic'];
    }

    $run_update = $pic->updatedata($id, $address_image, $new_body, $new_cat);
    if ($run_update) {
        echo "<script>alert('اطلاعات جدید جایگزین اطلاعات قبلی شد.')</script>";
        echo "<script>window.open('gallery.php','_self')</script>";
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
    <title>ویرایش تصویر</title>
</head>

<body style="background-color: #654A6C">
<div class="container" style="margin-top: 100px; background-color: #EDEDED">
    <form action="" method="post" enctype="multipart/form-data">
        <?php

        $id = $_GET['id'];
        $pic = new Gallery();
        $select = "select * from gallery_pic where id = '$id'";
        $row = $pic->details($select);
        $body = $row['body'];
        $img = $row['pic'];
        $cat_id = $row['fk_cat'];
        include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/Gallery_cat.php';
        $select_cat = "select title from gallery_cat where id = '$cat_id'";

        $cat = new Gallery_cat();
        $row_cat = $cat->details($select_cat);
        $title_cat = $row_cat['title'];
        ?>

        <h4 class="text-center p-5"> افزودن خبرها </h4>
        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                ویژگی های تصویر
            </div>
            <div class="col-lg-8 p-2 text-center">
                مقدار ورودی برای هرکدام از ویژگی ها
            </div>
        </div>


        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                متن تصویر
            </div>
            <div class="col-lg-8 p-2 text-center">
                <textarea name="body" class="form-control" style="resize: none"><?php echo $body; ?></textarea>
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                دسته بندی
            </div>
            <div class="col-lg-8 p-2 text-center">
                <select name="cat" class="form-control">
                    <optionvalue
                    ="<?php echo $cat_id; ?>"><?php echo $title_cat; ?></option>
                    <?php

                    $categories = $cat->ShowAll();

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
                عکس
            </div>
            <div class="col-lg-8 p-2 text-center">
                <img src="<?php echo $img; ?>" height="45" width="60"/><br/><br/>
                <input type="file" name="image" class="form-control">
            </div>
        </div>

        <input type="submit" name="submit" value="ثبت" class="btn px-3 text-white my-4"
               style="background-color:#654A6C ">
</div>
</form>
</body>
</html>

