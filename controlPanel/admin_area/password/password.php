<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../../index.php','_self')</script>";
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-rtl.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/myscript.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="img/logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>رمز عبور</title>
</head>
<style>
    .title {
        border: 1px solid #e4e4e4;
        padding: 15px;
        border-radius: 5px;
        font-size: 23px;
        color: #B43638;
        cursor: pointer;
    }

    .sub-title {
        display: none;
        font-size: 19px;
        color: #5B5B5B;
    }

    .sub-title1 {
        display: block;
    }

    .s-plus {
        font-size: 16px;
        color: #032064;
        margin-left: 10px;
    }
</style>

<body>

<div id="HeaderContent"></div>
<!-- شروع هدر -->
<div class="container-fluid z-srch-khbr">
    <div class="row d-flex justify-content-center">
        <div class="col-10 col-lg-5">
            <h2 class="text-center mt-3" style="margin-top: 40px !important"> ویرایش رمز عبور </h2>
        </div>
    </div>
</div>
<!-- پایان هدر -->
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/user.php';
$user = new User();
$id = $_SESSION['id'];
$pass = $_SESSION['pass'];
if (isset($_POST['submit'])) {
    if ($_POST['pass'] == $pass) {
        if ($_POST['new_pass'] === $_POST['new_pass2']) {
            $res = $user->updatedata($id, $_POST['new_pass']);
            if ($res) {
                echo "<script>alert('رمزعبور شما تغییر یافت ')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            }
        }
    }
}
?>
<form class="mt-5 mb-3" action="" method="post">
    <div class="row d-flex justify-content-center mb-3">
        <div class="col-12 col-lg-7">
            <div class=" custom-control form-group">
                <label for='pass'>رمز عبور قبلی :</label>
                <input type="text" id="pass" name="pass" class="form-control">
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-lg-7">
            <div class="form-group custom-control">
                <label for='new_pass'> رمز عبور جدید :</label>
                <input type="text" id="new_pass" name="new_pass" class="form-control">
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-lg-7">
            <div class="form-group custom-control">
                <label for='new_pass2'> تکرار رمز عبور جدید :</label>
                <input type="text" id="new_pass2" name="new_pass2" class="form-control">
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center mt-4">
        <div class="col-9 col-lg-6">
            <!--                                <a href="add-edit.html" class="btn btn-block mx-auto rounded text-white" style="font-size: 13px; background-image: linear-gradient(#0b7d83,#13adb5);">-->
            <!--                                    ورود-->
            <!--                                </a>-->
            <input type="submit" name="submit" value="ثبت" class="btn btn-block mx-auto rounded text-white"
                   style="font-size: 13px; background-image: linear-gradient(#0b7d83,#13adb5);">
        </div>
    </div>
</form>


<div id="FooterContent"></div>
</body>
</html>
