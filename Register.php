<!-- <!DOCTYPE html> -->
<html>

<head>
	<title>LuxorFabric</title>
	<link rel="icon" type="image/png" href="images/logo.png" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/insertproduct.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
	<script type="text/javascript" src="js/angular.min.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	<script type="text/javascript" src="js/sweetalert2.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body>

	<?php
		include 'Codephp/connectdb.php';
	?>

	<div id="wrapper">
		<?php include "header.php"; ?>
		<section class="Story">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <fieldset>
                                            <legend class="text-center">สมัครสมาชิก</legend>
                                            &nbsp
                                            <!-- ชื่อสินค้า-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="name">ชื่อจริง</label>
                                                <!-- <div class="col-md-9">
                                                    <input id="name" name="product_name" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div> -->
                                                <div class="col-md-4">
                                                    <input type="text" name="firstname" class="form-control" placeholder="ชื่อจริง" style="margin-bottom:5px;">
				                                </div>
				                                <div class="col-md-4">
						                            <input type="text" name="lastname"  class="form-control" placeholder="นามสกุล">
				                                </div>
                                            </div>

                                            <!-- ราคาสินค้า-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">เบอร์โทรศัพท์*</label>
                                                <div class="col-md-9">
                                                    <input id="tel" name="tel" type="text" placeholder="ตัวเลขเท่านั้น" class="form-control">
                                                </div>
                                            </div>

                                            <!-- Message body -->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">ที่อยู่</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" name="address" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" rows="5"></textarea>
                                                </div>
                                            </div>

                                             <!-- ราคาสินค้า-->
                                             <div class="form-group">
                                                <label class="col-md-3 control-label">อำเภอ</label>
                                                <div class="col-md-3" style="margin-bottom:5px;">
                                                    <input id="city" name="city" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                                <label class="col-md-2 control-label">จังหวัด</label>
                                                <div class="col-md-3">
                                                    <input id="state" name="state" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">ประเทศ</label>
                                                <div class="col-md-3" style="margin-bottom:5px;">
                                                    <input id="country" name="country" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                                <label class="col-md-2 control-label">รหัสไปรษณีย์</label>
                                                <div class="col-md-3">
                                                    <input id="zip" name="zip" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>

                                            &nbsp
                                            <h4 class="text-center">กำหนดรหัสเข้าสู่ระบบ</h4>
                                            &nbsp
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Email*</label>
                                                <div class="col-md-9">
                                                    <input id="email" name="email" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Password*</label>
                                                <div class="col-md-9">
                                                    <input id="password" name="password" type="password" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>

                                            <!-- Form actions -->
                                            <div class="form-group">
                                                <div class="col-md-12 text-right">
                                                    <input name="submitRegister" type="submit" class="btn btn-primary btn-lg" value="สมัครสมาชิก">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                                <?php include "Codephp/CodeFront/insertmember.php"; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
		<?php include "footer.php"; ?>

	</div>
	<!-- wrapper -->

</body>

</html>