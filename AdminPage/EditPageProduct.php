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
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/angular.min.js"></script>
	<script type="text/javascript" src="../js/app.js"></script>
	<script type="text/javascript" src="../js/sweetalert2.min.js"></script>
</head>

<body>
        <div id="wrapper">
            
            <?php   include "../Codephp/connectdb.php";
                    include "../Codephp/CodeBack/EditProduct.php"; ?>
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
                                                    <input id="name" value="<?php echo $rowitem['NameProduct'] ?>" name="product_name" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>

                                            <!-- ประเภทสินค้า-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="email">ประเภทสินค้า*</label>
                                                <div class="col-md-9">
                                                    <select name="SettypeProduct" class="form-control">
                                                        <option value="">เลือกประเภทสินค้า</option>
                                                        <option value="1" <?php if($rowitem['id_type']==1){ echo "selected";} ?>>เสื้อผ้า</option>
                                                        <option value="2" <?php if($rowitem['id_type']==2){ echo "selected";} ?>>หมวก</option>
                                                        <option value="3" <?php if($rowitem['id_type']==3){ echo "selected";} ?>>ผ้าพันคอ</option>
                                                        <option value="4" <?php if($rowitem['id_type']==4){ echo "selected";} ?>>ของฝาก</option>
                                                        <option value="5" <?php if($rowitem['id_type']==5){ echo "selected";} ?>>กระเป๋า</option>
                                                        <option value="6" <?php if($rowitem['id_type']==6){ echo "selected";} ?>>อื่นๆ</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php if($rowitem['id_product'] != null){ for ($i=0; $i < count($urlimg); $i++) { ?>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">รูปสินค้า</label>
                                                <div class="col-md-9">
                                                    
                                                        <img src="../<?php echo $urlimg[$i]['url_img']."".$urlimg[$i]['Name_img'] ; ?>" style="height:250px;weight:200px;margin-bottom:5px;">
                                                    
                                                </div>
                                                <label class="col-md-3 control-label"></label>
                                                
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
                                                            <input type="file" accept="image/png, image/jpeg" name="input-file-preview[]" />
                                                            <!-- rename it -->
                                                        </div>
                                                    </span>
                                                </div>
                                                <!-- /input-group image-preview [TO HERE]-->
                                            </div>
                                            <?php }}?>
                                            <script type="text/javascript" src="../js/insertproduct.js"></script>
                                            
                                            <!-- ราคาสินค้า-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">ราคาสินค้า*</label>
                                                <div class="col-md-9">
                                                    <input id="email" value="<?php echo $rowitem['PriceProduct'] ?>" name="priceproduct" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>

                                            <!-- ราคาสินค้า-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">จำนวนสต้อค*</label>
                                                <div class="col-md-8">


                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-danger btn-number" data-type="minus" data-field="quant">
                                                                <span class="glyphicon glyphicon-minus"></span>
                                                            </button>
                                                        </span>
                                                        <input type="text" name="quant" class="form-control input-number" style="text-align:center;" value="<?php echo $rowitem['qty'] ?>" min="1" max="9999">
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant">
                                                                <span class="glyphicon glyphicon-plus"></span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <script type="text/javascript" src="js/qtystockproduct.js"></script> &nbsp
                                            <h4 class="text-center">รายละเอียดสินค้า</h4>
                                            &nbsp
                                            <!-- ราคาสินค้า-->
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="message">รายละเอียดที่ต้องการแก้</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" id="message" name="message" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" rows="5"> <?php echo $rowitem['textProductDetail'] ?></textarea>
                                                </div>
                                            </div>
                                            &nbsp
                                            <h4 class="text-center">เนื้อเรื่องสินค้า</h4>
                                            &nbsp
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="message">เนื้อเรื่องที่ต้องการใช้ในสินค้าชิ้นนี้</label>
                                                <div class="col-md-9">
                                                    <!-- <textarea class="form-control" id="message" name="message" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" rows="5"></textarea> -->
                                                    <?php 
                                                        $selectsqlstory = "SELECT * FROM `Story`";
                                                        $resutloutputstory = mysqli_query($connect,$selectsqlstory);
                                                    ?>
                                                    <select name="SetstoryProduct" class="form-control">
                                                        <option value="">เลือกเนื้อเรื่องสินค้า</option>
                                                        <?php
                                                        while($rowoutputstory = mysqli_fetch_array($resutloutputstory))
                                                        {
                                                        ?>
                                                            <option value="<?php echo $rowoutputstory['id_story']; ?>"<?php if($rowitem['id_story']== $rowoutputstory['id_story']){echo "selected";} ?> >
                                                            <?php echo $rowoutputstory['id_story']." )".$rowoutputstory['textStory']; ?></option>   
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Form actions -->
                                            <div class="form-group">
                                                <div class="col-md-12 text-right">
                                                    <input name="submiteditproduct" type="submit" class="btn btn-primary btn-lg" value="ส่งข้อมูลสินค้า">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
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
