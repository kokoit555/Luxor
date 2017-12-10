<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            
                <div class="x_title">
                    <h2 class="text-center">ลงทะเบียนสินค้าใหม่</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br/>
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <!-- ชื่อสินค้า-->
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ชื่อสินค้า*<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" name="product_name" type="text" required="required" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                </div>
                            </div>
                            <!-- ประเภทสินค้า-->
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ประเภทสินค้า*<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="SettypeProduct" class="form-control" required="required">
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
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">ราคาสินค้า*<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input name="priceproduct" type="number" class="form-control" required="required" min="1" value="1" data-validate-minmax="10,99999">
                                    </div>
                                </div>
                                &nbsp
                                <h3 class="text-center">
                                    รูปสินค้าและจำนวนสินค้า
                                </h3>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                    <div class="col-md-6 col-sm-6 col-xs-9">
                                        <button class="btn btn-info btn-block" type="button" onclick="addproduct();"> + เพิ่มลายสินค้า</button>
                                    </div>
                                </div>
                                &nbsp
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ลายสินค้า*<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-9">
                                        <input name="input-file-img-product-thumb[]" type="file" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">รูปสินค้า*<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-9">
                                        <input name="input-file-img-product[]" type="file" class="form-control" required="required">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">จำนวนสินค้า*<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-9">
                                        <input type="number" name="quant[]" class="form-control" value="1" min="1" max="999" data-validate-minmax="5,999" required="required">
                                    </div>
                                </div>
                                <div id="addimgproduct"></div>
                                &nbsp
                                <h4 class="text-center">รายละเอียดสินค้า</h4>
                                &nbsp
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">ข้อมูลสินค้า<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="email" name="detailproduct" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control" required="required">
                                    </div>
                                </div>
                                <!-- Message body -->
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="message">รายละเอียดเชิงลึก<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea class="form-control" id="textarea" required="required" name="message" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" rows="5"></textarea>
                                    </div>
                                </div>
                                <!-- Form actions -->
                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <input name="submitinsertproduct" type="submit" class="btn btn-primary btn-lg" value="ส่งข้อมูลสินค้า">
                                    </div>
                                </div>
                        </fieldset>
                    </form>
            </div>
        </div>
    </div> <!--col-md-12 col-sm-12 col-xs-12-->
</div><!--row-->
<div class="clearfix"></div>