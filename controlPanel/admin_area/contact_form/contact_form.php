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
    <title>فرم تماس </title>
</head>

<body style="background-color: #654A6C">


<div class="row" style="margin-top: 100px">
    <div class="col-lg-12"></div>
</div>

<div class="container z-sub-header z-s-h-min">
    <div class="row">
        <div class="col-lg-12">

            <div class="card z-card p-2 mt-2 shadow border-0">

                <h6 class="card-title p-2 text-center mt-2" style="color: #654A6C; font-size: 27px;">  فرم های  تماس </h6>

                <div class="card-body border-0">

                    <hr>
                    <table class="table table-bordered table-responsive-lg">
                        <thead>
                        <tr>
                            <th> شماره </th>
                            <th> نام </th>
                        </tr>
                        </thead>
                        <tbody class="fild-customer">
                        <tr class="roww">
                            <?php
                            include_once $_SERVER['DOCUMENT_ROOT'] . '/kosharayan/models/form-tamas.php';
                            $form_contact = new Formtamas();
                            $form_contact = $form_contact->ShowAll();

                            $i=0;
                            $count = sizeof($form_contact);
                            while($i < $count)
                            {
                            $id = $form_contact[$i]['id'];
                            $name = $form_contact[$i]['name'];
                            $i++;
                            ?>
                            <td class="w-25" align="center"><?php echo $i?></td >
                            <td align="center"><a href = "detail_form_contact.php?id=<?php echo $id ?>"> <?php echo $name?> </a></td >

                </div>
            </div>

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

