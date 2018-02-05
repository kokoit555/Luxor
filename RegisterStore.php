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
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                
                                    <div class="x_title">
                                        <h2 class="text-center">ลงทะเบียนร้านค้าใหม่</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <br/>
                                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <fieldset>
                                            <!-- ชื่อสินค้า-->
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ชื่อร้านค้า*</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="name" name="namestore" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >รูปร้านค้า</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="file" accept="image/png, image/jpeg , image/jpg" name="input-file-preview" class="form-control" />
                                                </div>
                                            </div>


                                            <!-- ราคาสินค้า-->
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">เบอร์โทรศัพท์</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="telephone" type="text" placeholder="099xxxxxx" class="form-control">
                                                </div>
                                            </div>

                                            <!-- Email -->
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="email" name="email" type="text" placeholder="Email@info.com" class="form-control">
                                                </div>
                                            </div>

                                            <!-- Message body -->
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ที่อยู่</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <textarea class="form-control" name="address" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" rows="3"></textarea>
                                                </div>
                                            </div>

                                            <!-- ราคาสินค้า-->
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">อำเภอ</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="city" name="city" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">จังหวัด</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="state" name="state" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ประเทศ</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="country" name="country" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">รหัสไปรษณีย์</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="zip" name="zip" type="text" placeholder="10000" class="form-control">
                                                </div>
                                            </div>

                                            
                                            <!-- &nbsp
                                            <h4 class="text-center">บัญชีของร้านค้า</h4>
                                            &nbsp

                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ชื่อบัญชีร้านค้า</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input  name="nameAccountStore" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">เลขบัญชีร้านค้า</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="numberStorebank" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ธนาคารร้านค้า</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input name="namebank" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div> -->
                                            &nbsp
                                            <h4 class="text-center">รายละเอียดร้านค้า</h4>
                                            &nbsp
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="message">ประวัติร้านค้า</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <textarea class="form-control" id="message" name="storytextstore" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <!-- &nbsp
                                            <h4 class="text-center">กำหนดรหัสผ่านเข้าสู่ระบบของร้านค้า</h4>
                                            &nbsp
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="email" name="email" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="password" name="password" type="password" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div> -->
                                            &nbsp
                                            &nbsp
                                            <!-- Form actions -->
                                            <div class="form-group">
                                                <div class="col-md-12 text-center">
                                                    <input name="submitinsertstore" type="submit" class="btn btn-primary btn-lg" value="ส่งข้อมูลสินค้า">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div> <!--col-md-12 col-sm-12 col-xs-12-->
                    </div><!--row-->
                    <div class="clearfix"></div>
                </div>
            </div>
		<?php include "footer.php"; ?>

	</div>
	<!-- wrapper -->

</body>

</html>