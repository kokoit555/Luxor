<!-- <!DOCTYPE html> -->
<html>

<head>
	<title>LuxorFabric</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/logo.png" />
    <link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style-mobi.css">
  	<link rel="stylesheet" type="text/css" href="css/media.css">
      <link rel="stylesheet" type="text/css" href="css/insertproduct.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
	<!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	<script type="text/javascript" src="js/sweetalert2.min.js"></script>
	<script type="text/javascript" src="slick/slick.min.js"></script>
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
</head>

<body>

	<?php
		include 'Codephp/connectdb.php';
	?>
<style>
    .field-box .form-control {
    display: block;
    width: 100%;
    height: 40px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #eaeaea;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: 0 2px 0px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
label.control-label {
    font-weight: 400;
}
input.btn.btn-primary.btn-lg.center-block {
    background-color: #d66300f2;
    border-color: #d66300f2;
    width: 40%;
        margin: 5% auto;
}
</style>
	<div id="wrapper">
		<?php include "header.php"; ?>
		<div class="container-fluid" style="padding: 5% 0;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <fieldset class="field-box" style="width: 70%;margin-left: 15%;margin-top: 0;margin-bottom: 5%;">
                                            <legend class="text-center" style="padding-bottom: 3%;">ลงทะเบียนสมาชิกใหม่</legend>
                                            <h4 class="text-center">สมัครสมาชิก</h4>
                                             &nbsp
                                            <!-- ชื่อสินค้า-->
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="name">ชื่อจริง</label>
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
                                                <label class="col-md-2 control-label">เบอร์โทรศัพท์*</label>
                                                <div class="col-md-9">
                                                    <input id="tel" name="tel" type="text" placeholder="ตัวเลขเท่านั้น" class="form-control">
                                                </div>
                                            </div>

                                            <!-- Message body -->
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">ที่อยู่</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" name="address" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" rows="5"></textarea>
                                                </div>
                                            </div>

                                             <!-- ราคาสินค้า-->
                                             <div class="form-group">
                                                <label class="col-md-2 control-label">อำเภอ</label>
                                                <div class="col-md-3" style="margin-bottom:5px;">
                                                    <input id="city" name="city" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                                <label class="col-md-2 control-label">จังหวัด</label>
                                                <div class="col-md-3">
                                                    <input id="state" name="state" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">ประเทศ</label>
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
                                                <label class="col-md-2 control-label">Email*</label>
                                                <div class="col-md-9">
                                                    <input id="email" name="email" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Password*</label>
                                                <div class="col-md-9">
                                                    <input id="password" name="password" type="password" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>

                                            <!-- Form actions -->
                                            <div class="form-group">
                                                <div class="col-md-12 text-right">
                                                    <input name="submitRegister" type="submit" class="btn btn-primary btn-lg center-block" value="สมัครสมาชิก">
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
            </div>
		<?php include "footer.php"; ?>

	</div>
	<!-- wrapper -->

</body>

</html>