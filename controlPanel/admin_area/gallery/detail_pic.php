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
    <script src='../js/jq.min.js'></script>
    <link rel="shortcut icon" href="../img/logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> جزییات تصویر</title>
</head>

<body>
<div id="HeaderContent"></div>
<a id="back"></a>
<div class="container mt-5">
        <?php
        include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/gallery-pic.php';

        $id = $_GET['id'];
        $pic = new Gallery();
        $select = "select * from gallery_pic where id = '$id'";
        $row = $pic->details($select);
        $body = $row['body'];
        $img = $row['pic'];

        $select_cat = "select gallery_cat.title from gallery_pic,gallery_cat where gallery_pic.fk_cat = gallery_cat.id";
        $cat = $pic->details($select_cat);
        ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card border-0">
                    <img src="<?php echo $img; ?>" height="290">
                    <div class="card-body">

                        <p class="text-center">
                            <?php echo $body ?>
                        </p>

                    </div>
                    <p class="text-right">
                        <?php echo $cat['title'] ?>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- دکمه برگشت -->
<div id="FooterContent"></div>
</body>
</html>

