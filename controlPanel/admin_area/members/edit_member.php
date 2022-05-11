<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../../index.php','_self')</script>";
}

if (isset($_POST['submit'])) {
    include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/company-member.php';
    $id = $_GET['id'];
    $new_name = $_POST['name'];
    $new_family = $_POST['family'];
    $new_body = $_POST['body'];
    $new_takhasos = $_POST['takhasos'];
    $new_email = $_POST['email'];

    $member = new companymember();
    $select = "select * from company_member where id = '$id'";
    $row = $member->details($select);
//getting the image form the image fields
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $address_image = 'images/' . $image_name;
        move_uploaded_file($image_tmp, $address_image);
    } else {
        $address_image = $row['pic'];
    }

    $res = $member->updatedata($id ,$new_name, $new_family, $new_takhasos, $new_body, $address_image, $new_email);

//display message to user
    if ($res) {
        echo "<script>alert('اطلاعات جدید جایگزین اطلاعات قبلی شد.')</script>";
        echo "<script>window.open('members.php','_self')</script>";
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
    <title>ویرایش عضو</title>
</head>

<body style="background-color: #654A6C">
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/company-member.php';
$id = $_GET['id'];
$member = new companymember();
$select = "select * from company_member where id = '$id'";
$row = $member->details($select);
$name = $row['name'];
$family = $row['family'];
$body = $row['body'];
$takhasos = $row['takhasos'];
$email = $row['email'];
$img = $row['pic'];

?>
<div class="container" style="margin-top: 100px; background-color: #EDEDED">
    <form action="" method="post" enctype="multipart/form-data">
        <h4 class="text-center p-5"> افزودن عضو </h4>
        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                ویژگی های عضو
            </div>
            <div class="col-lg-8 p-2 text-center">
                مقدار ورودی برای هرکدام از ویژگی ها
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                نام
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="name" value="<?php echo $name ?>" class="form-control">
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                نام خانوادگی
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="family" value="<?php echo $family ?>" class="form-control">
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                تخصص
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="text" name="takhasos" value="<?php echo $takhasos?>" class="form-control">
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                توضیحات
            </div>
            <div class="col-lg-8 p-2 text-center">
                <textarea name="body" class="form-control" style="resize: none">value="<?php echo $body?>" </textarea>
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
        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                ایمیل
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="email" name="email" value="<?php echo $email ?>" class="form-control">
            </div>
        </div>

        <input type="submit" name="submit" value="ثبت" class="btn px-3 text-white my-4"
               style="background-color:#654A6C ">
</div>
</form>

</body>
</html>
