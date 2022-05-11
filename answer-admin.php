
<?php
include_once('models/porsesh-body.php');
include_once('models/porsesh-pasokh.php');
include_once('models/jdf.php');

$error="";

$porsesh= new Porsesh();
$porseshpasokh= new Porseshpasokh();


if (isset($_POST['send'])) {
    $messag = $_POST['message'];
    $date = jdate("Y-m-d H:i:s", '', '', '', 'en');
    $id = $_GET['id'];

    $result = $porsesh->insertData($id, $messag, '', $date, '', '');


    if ($result) {
        $error = "ثبت با موفقیت انجام شد";
        header('location:index.php');
    } else {
        $error = "خطا در ارسال";
    }
}

if(isset($_GET['id']))
{
	$id=$_GET['id'];
   // $row=$porsesh->show($id);

//	$rows=$porseshpasokh->getById($id);

?>

<!doctype html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-rtl.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/myscript.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="shortcut icon" href="img/logo.jpg">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title> پاسخ مدیر </title>
</head>

<body>
	<div id="HeaderContent"></div>
	<!-- شروع عنوان -->
	<div class="container-fluid z-srch-khbr">
		<div class="row d-flex justify-content-center">
			<div class="col-10 col-lg-5">
				<h2 class="text-center mt-5"> پاسخ سوال شما </h2>
			</div>
		</div>
	</div>	
	<!-- پایان عنوان -->
	<!-- شروع پاسخ -->
	<div class="container" style="margin-top: 80px">
		<div class="media p-5 bg-white">
			<img src="img/user.webp" class="align-self-start" width="100">
			<div class="media-body mr-2">
                <?php
                $answers = $porsesh->show($id);
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
                        $src = "img/admin.jpg";
                    else
                        $src = "img/user.webp";
                    ?>
                    <div class="media mt-5">
                        <img src=<?php echo $src ?> width="100">
                        <div class="media-body mr-2">
                            <p style="font-size: 19px"><?php echo $body ?> </p>

                        </div>
                    </div>
                <?php } ;}?>
                <button type="button" class="btn text-secondary px-3 float-left" style="font-size: 19px" data-toggle="modal" data-target="#myModal"><i class="fa fa-reply align-middle"></i> پاسخ  </button>

            </div>
	</div>
	<!-- پایان پاسخ -->
	<!-- شروع  مودال -->
	<div class="modal fade" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header border-0">
					<button class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="">
						<textarea type="text" name="message" class="form-control" placeholder="متن خود را وارد کنید..."></textarea>
						<input type="submit" name="send" value="ارسال" class="btn btn-block btn-primary float-left mt-2 ">
						<input type="hidden" name="id">
					</form>
				</div>
				<div class="modal-footer border-0">
					<button class="btn btn-danger btn-block" data-dismiss="modal">بستن</button>
				</div>
				<?php echo $error; ?>
			</div>
		</div>
	</div>
	<!-- پایان مودال -->
	
	<div id="FooterContent"></div>
</body>
</html>
