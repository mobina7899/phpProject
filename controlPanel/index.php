<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/myscript.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>ورود </title>
</head>
<body>

<div class="d-flex justify-content-center">
    <div class="container-fluid z-header">
        <div class="row">
            <div class="col-lg-12"></div>
        </div>
    </div>
    <div class="container z-sub-header">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-7">

                <div class="card z-card p-2 mt-2 shadow">

                    <h6 class="card-title p-2 text-center mt-2" style="color: #13adb5; font-size: 27px;"> ورود </h6>


                    <div class="card-body">
                        <!-- <button class="btn btn-primary rounded " style="background-color: #1784D9; font-size: 13px;"> کاربر جدید </button> -->
                        <hr>
                        <form class="mt-5 mb-3" action="admin_area/login/process.php" method="post">
                            <div class="row d-flex justify-content-center mb-3">
                                <div class="col-12 col-lg-7">
                                    <div class=" custom-control form-group">
                                        <label for='username'> نام کاربری :</label>
                                        <input type="text" id="username" name="username" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <div class="col-12 col-lg-7">
                                    <div class="form-group custom-control">
                                        <label for='pass'> کلمه عبور  :</label>
                                        <input type="text" id="pass" name="pass" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center mt-4">
                                <div class="col-9 col-lg-6">
                                    <!--                                <a href="add-edit.html" class="btn btn-block mx-auto rounded text-white" style="font-size: 13px; background-image: linear-gradient(#0b7d83,#13adb5);">-->
                                    <!--                                    ورود-->
                                    <!--                                </a>-->
                                    <input type="submit" value="ورود" class="btn btn-block mx-auto rounded text-white" style="font-size: 13px; background-image: linear-gradient(#0b7d83,#13adb5);">
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>



</div>
</body>
</html>