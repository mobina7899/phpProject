<?php
session_start();

if(!isset($_SESSION['username'])){
    echo "<script>alert('اجازه ی دسترسی به این صفحه را ندارید !')</script>";
    echo "<script>window.open('../../index.php','_self')</script>";
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
    <title>جزییات پرسش</title>
</head>

<body style="background-color: #654A6C">
<div class="container" style="margin-top: 80px">
    <div class="media p-5 bg-white">
        <img src="../img/user.webp" class="align-self-start" width="100">
        <div class="media-body mr-2">
            <?php
            include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/porsesh-body.php';

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
</body>
</html>
