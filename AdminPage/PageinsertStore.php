<!-- <!DOCTYPE html> -->
<html>

<head>
    <title>LuxorFabric</title>
    <link rel="icon" type="image/png" href="images/logo.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/insertproduct.css">
    <link rel="stylesheet" type="text/css" href="../css/sweetalert2.min.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/angular.min.js"></script>
	<script type="text/javascript" src="../js/app.js"></script>
	<script type="text/javascript" src="../js/sweetalert2.min.js"></script>
</head>

<body>
    
        <div id="wrapper">
            <section class="Story">
                <div class="container">
                    <div class="row">
                        <?php include "menustore.php" ?>
                        <div class="col-sm-9 col-md-9">
                            <div class="row">
                                <div class="col-md-8 ">
                                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <fieldset>
                                            <legend class="text-center">ลงทะเบียนร้านค้าใหม่</legend>
                                            <h4 class="text-center">ข้อมูลร้านค้าเบื้องต้น</h4>
                                            &nbsp
                                            <!-- ชื่อสินค้า-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="name">ชื่อร้านค้า*</label>
                                                <div class="col-md-9">
                                                    <input id="name" name="namestore" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label" >รูปร้านค้า</label>
                                                <div class="col-md-9 input-group image-preview">
                                                    <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                                    <!-- don't give a name === doesn't send on POST/GET -->
                                                    <span class="input-group-btn">
                                                        <!-- image-preview-clear button -->
                                                        <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                            <span class="glyphicon glyphicon-remove"></span>Clear
                                                        </button>
                                                        <!-- image-preview-input -->
                                                        <div class="btn btn-default image-preview-input">
                                                            <span class="glyphicon glyphicon-folder-open"></span>
                                                            <span class="image-preview-input-title">Browse</span>
                                                            <input type="file" accept="image/png, image/jpeg" name="input-file-preview" />
                                                            <!-- rename it -->
                                                        </div>
                                                    </span>
                                                </div>
                                                <!-- /input-group image-preview [TO HERE]-->
                                            </div>
                                            <script type="text/javascript" src="../js/insertproduct.js"></script>


                                             <!-- ราคาสินค้า-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">เบอร์โทรศัพท์</label>
                                                <div class="col-md-9">
                                                    <input id="email" name="telephone" type="number" placeholder="ตัวเลขเท่านั้น" class="form-control">
                                                </div>
                                            </div>

                                             <!-- Message body -->
                                             <div class="form-group">
                                                <label class="col-md-3 control-label">ที่อยู่</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" name="address" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" rows="3"></textarea>
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
                                            <h4 class="text-center">บัญชีของร้านค้า</h4>
                                            &nbsp

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">ชื่อบัญชีร้านค้า</label>
                                                <div class="col-md-9">
                                                    <input id="email" name="nameAccountStore" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">เลขบัญชีร้านค้า</label>
                                                <div class="col-md-9">
                                                    <input id="email" name="numberStorebank" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">ธนาคารร้านค้า</label>
                                                <div class="col-md-9">
                                                    <input id="email" name="namebank" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>
                                            &nbsp
                                            <h4 class="text-center">รายละเอียดร้านค้า</h4>
                                            &nbsp
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="message">ประวัติร้านค้า</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" id="message" name="storytextstore" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" rows="5"></textarea>
                                                </div>
                                            </div>
                                            &nbsp
                                            <h4 class="text-center">กำหนดรหัสผ่านเข้าสู่ระบบของร้านค้า</h4>
                                            &nbsp
                                             <!-- ราคาสินค้า-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Email</label>
                                                <div class="col-md-9">
                                                    <input id="email" name="email" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Password</label>
                                                <div class="col-md-9">
                                                    <input id="password" name="password" type="password" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>
                                            <!-- Form actions -->
                                            <div class="form-group">
                                                <div class="col-md-12 text-right">
                                                    <input name="submitinsertstore" type="submit" class="btn btn-primary btn-lg" value="ส่งข้อมูลสินค้า">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>

                                    <?php include "../Codephp/CodeBack/insertStore.php"; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <!-- wrapper -->




</body>

</html>
