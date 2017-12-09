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
                                            <legend class="text-center">ลงทะเบียนสินค้าใหม่</legend>
                                            <h4 class="text-center">ข้อมูลสินค้าเบื้องต้น</h4>
                                            &nbsp
                                            <!-- ชื่อสินค้า-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="name">ชื่อสินค้า*</label>
                                                <div class="col-md-9">
                                                    <input id="name" name="product_name" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>

                                            <!-- ประเภทสินค้า-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="email">ประเภทสินค้า*</label>
                                                <div class="col-md-9">
                                                    <select name="SettypeProduct" class="form-control">
                                                        <option value="">เลือกประเภทสินค้า</option>
                                                        <option value="1">เสื้อผ้า</option>
                                                        <option value="2">หมวก</option>
                                                        <option value="3">ผ้าพันคอ</option>
                                                        <option value="4">ของฝาก</option>
                                                        <option value="5">กระเป๋า</option>
                                                        <option value="6">อื่นๆ</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- ราคาสินค้า-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">ราคาสินค้า*</label>
                                                <div class="col-md-9">
                                                    <input name="priceproduct" type="number"  class="form-control">
                                                </div>
                                            </div>
                                            
                                            
                                            &nbsp
                                            <h4 class="text-center">รูปภาพสินค้า</h4>
                                            &nbsp
                                            <div class="form-group">
                                                <label class="col-md-3"></label>
                                                <button class="btn btn-info col-md-9" type="button" onclick="addproduct();"> + เพิ่มลายสินค้า</button>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="name">ลายสินค้า*</label>
                                                <div class="col-md-9">
                                                    <input name="input-file-img-product-thumb[]" type="file" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="name">รูปสินค้า*</label>
                                                <div class="col-md-9">
                                                    <input name="input-file-img-product[]" type="file" class="form-control">
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label class="col-md-3 control-label">จำนวนสินค้า*</label>
                                                <div class="col-md-9">
                                                    <input type="number" name="quant[]" class="form-control" style="text-align:center;" value="1" min="1" max="999">
                                                </div>
                                            </div>
                                            <div id="addimgproduct"></div>


                                            &nbsp
                                            <h4 class="text-center">รายละเอียดสินค้า</h4>
                                            &nbsp
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">ข้อมูลสินค้า</label>
                                                <div class="col-md-9">
                                                    <input id="email" name="detailproduct" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>
                                            <!-- Message body -->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="message">รายละเอียดเชิงลึก</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" id="message" name="message" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" rows="5"></textarea>
                                                </div>
                                            </div>
                                            

                                            <!-- Form actions -->
                                            <div class="form-group">
                                                <div class="col-md-12 text-right">
                                                    <input name="submitinsertproduct" type="submit" class="btn btn-primary btn-lg" value="ส่งข้อมูลสินค้า">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                    <?php include "../Codephp/CodeBack/insertproduct.php"; ?>
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
