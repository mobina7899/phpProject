<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../../index.php','_self')</script>";
}
include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/porsesh-body.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/porsesh-pasokh.php';

include_once '../jdf.php';
if (isset($_POST['submit'])) {
    $date = jdate("Y-m-d H:i:s", '', '', '', 'en');
    $id = $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $body = $_POST['body'];
    $title = $_POST['title'];
    $answer = new Porsesh();
    $result = $answer->insertData($id, $body, $title, $date, $name, $email);

    $question = new Porseshpasokh();
    $select = "select * from porsesh_pasokh where id = '$id'";
    $row = $question->details($select);
    $title = $row['title'];
    $name = $row['name'];
    $coder = $row['coder'];
    $porsesh = $row['porsesh'];
    $date = $row['date'];
    $email = $row['email'];
    $state = $row['state'];
    $res = $question->updatedata($id, $porsesh, $title, $coder, $date, $name, $email, '1');
    if ($result) {
        echo "<script>alert('تبریک...داده های مربوط به پاسخ شما به درستی وارد شد.')</script>";
        echo "<script>window.open('questions.php','_self')</script>";
    }
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
    <link rel="shortcut icon" href="../img/logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> پاسخ مدیر </title>
</head>
<body>

<div id="HeaderContent"></div>
<!-- شروع عنوان -->
<div class="container-fluid z-srch-khbr">
    <div class="row d-flex justify-content-center">
        <div class="col-10 col-lg-5">
            <h2 class="text-center mt-5"> پاسخ سوال </h2>
        </div>
    </div>
</div>
<!-- پایان عنوان -->
<!-- شروع پاسخ -->
<div class="container" style="margin-top: 80px">
    <div class="media p-5 bg-white">
        <img src="../img/user.webp" class="align-self-start" width="100">
        <div class="media-body mr-2">
            <?php
            $id = $_GET['id'];
            $ans = new Porsesh();
            $answers = $ans->show($id);
            ?>
            <p style="font-size: 19px"><?php echo $answers[0]['body'] ?></p>
            <?php
            include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/user.php';
            $i = 1;
            $count = sizeof($answers);
            while ($i < $count) {
                $body = $answers[$i]['body'];
                $name = $answers[$i]['name'];
                $i++;
                $user = new User();
                $sql = "select * from user where name = '$name'";
                if ($user->details($sql))
                    $src = "../img/admin.jpg";
                else
                    $src = "../img/user.webp";
                ?>
                <div class="media mt-5">
                    <img src=<?php echo $src ?> width="100">
                    <div class="media-body mr-2">
                        <p style="font-size: 19px"><?php echo $body ?> </p>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- پایان پاسخ -->
<div id="FooterContent"></div>

<div class="container" style="margin-top: 100px; background-color: #EDEDED">
    <form action="" method="post" enctype="multipart/form-data">
        <!--<h4 class="text-center p-5">  </h4>!-->
        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                ویژگی های پاسخ
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
                <input type="text" name="name" class="form-control">
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                عنوان
            </div>
            <div class="col-lg-8 p-2 text-center">
                <textarea name="title" class="form-control" style="resize: none"></textarea>
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                پاسخ
            </div>
            <div class="col-lg-8 p-2 text-center">
                <textarea name="body" class="form-control" style="resize: none"></textarea>
            </div>
        </div>

        <div class="row table-bordered border-dark">
            <div class="col-lg-4 p-2 text-center border-left border-dark">
                ایمیل
            </div>
            <div class="col-lg-8 p-2 text-center">
                <input type="email" name="email" class="form-control">
            </div>
        </div>
        <input type="submit" name="submit" value="ثبت" class="btn px-3 text-white my-4"
               style="background-color:#654A6C ">
</div>
</form>

</body>
</html>
