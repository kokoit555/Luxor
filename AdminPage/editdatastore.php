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
                                                <div class="col-md-9">
                                                    <input name="input-file-img-product[]" type="file" class="form-control">
                                                </div>
                                            </div>


                                             <!-- ราคาสินค้า-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">เบอร์โทรศัพท์</label>
                                                <div class="col-md-9">
                                                    <input id="email" name="priceproduct" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
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
                                            <h4 class="text-center">บัญชีของร้านค้า</h4>
                                            &nbsp

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">ชื่อบัญชีร้านค้า</label>
                                                <div class="col-md-9">
                                                    <input id="email" name="priceproduct" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">เลขบัญชีร้านค้า</label>
                                                <div class="col-md-9">
                                                    <input id="email" name="priceproduct" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">ธนาคารร้านค้า</label>
                                                <div class="col-md-9">
                                                    <input id="email" name="priceproduct" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>

                                            &nbsp
                                            <h4 class="text-center">กำหนด Email ใหม่</h4>
                                            &nbsp
                                             <!-- ราคาสินค้า-->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Email</label>
                                                <div class="col-md-9">
                                                    <input id="email" name="email" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>
                                            &nbsp
                                            <h4 class="text-center">กำหนด Password ใหม่</h4>
                                            &nbsp
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Password เก่า</label>
                                                <div class="col-md-9">
                                                    <input id="email" name="password" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Password ใหม่</label>
                                                <div class="col-md-9">
                                                    <input id="email" name="password" type="text" placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                </div>
                                            </div>
                                            &nbsp
                                            <!-- Form actions -->
                                            <div class="form-group">
                                                <div class="col-md-12 text-right">
                                                    <input name="submitinsertproduct" type="submit" class="btn btn-primary btn-lg" value="ส่งข้อมูลสินค้า">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>