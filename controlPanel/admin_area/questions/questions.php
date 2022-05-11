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
    <link rel="stylesheet" href="">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src=""></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../img/logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>پرسش ها </title>
</head>

<body style="background-color: #654A6C">


<div class="row" style="margin-top: 100px">
    <div class="col-lg-12"></div>
</div>

<div class="container z-sub-header z-s-h-min">
    <div class="row">
        <div class="col-lg-12">

            <div class="card z-card p-2 mt-2 shadow border-0">

                <h6 class="card-title p-2 text-center mt-2" style="color: #654A6C; font-size: 27px;"> پرسش ها </h6>

                <div class="card-body border-0">
                    <!--شروع وضعیت-->
                    <div class="btn-group">
                        <a class="btn btn-primary ml-1" href=""> همه پرسش ها </a>
                        <a class="btn btn-primary ml-1" href="new.php"> جدید </a>
                        <a class="btn btn-primary" href="answered.php"> پاسخ داده شده </a>
                    </div>
                    <!--پایان وضعیت-->
                    <hr>
                    <table class="table table-bordered table-responsive-lg">
                        <thead>
                        <tr>
                            <th> شماره</th>
                            <th> عنوان</th>
                            <th> پاسخ</th>
                            <th> حذف</th>
                        </tr>
                        </thead>
                        <tbody class="fild-customer">
                        <tr class="roww">
                            <?php
                            include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/porsesh-pasokh.php';
                            $question = new Porseshpasokh();
                            $questions = $question->showAll();

                            $i = 0;
                            $count = sizeof($questions);
                            while ($i < $count)
                            {
                            $question = $questions[$i]['porsesh'];
                            $id = $questions[$i]['id'];
                            $i++;
                            ?>
                            <td align="center"><?php echo $i ?></td>
                            <td align="center"><a
                                        href="detail.php?id=<?php echo $id ?>"> <?php echo $question ?> </a></td>

                            <td>
                </div>
            </div>
            <a class="btn btn-success rounded" style="font-size: 12px; color: #fff;"
               href="answer.php?id=<?php echo $id ?>">
                <i class="fa fa-edit align-middle" style="font-size: 14px !important;"> </i> پاسخ </a>
            </td>
            <td>
                <a class="btn btn-danger rounded" style="font-size: 12px;"
                   href="delete.php?id=<?php echo $id ?>"
                   onclick="delet()">
                    <i class="fa fa-trash align-middle" style="font-size: 14px !important;"></i> حذف </a>
            </td>
            </tr>
            <?php } ?>
            </tbody>
            </table>
        </div>
    </div>

</div>

</div>
<!--فووتر-->

</body>
</html>
</html>

