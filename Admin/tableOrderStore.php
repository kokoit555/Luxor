                    <table id="datatable-responsive2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>id order</th>
                                <th>User</th>
                                <th>Date_order</th>
                                <th>Totalprice</th>
                                <th>Status</th>
                                <th>ข้อมูลเชิงลึก</th>
                                <th>Shipping</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            include "./CodeBack/connectdb.php";
                            $idstore = $_GET['idstore'];
                            $select = "SELECT * FROM `Order_product` op
                                        INNER JOIN User_member um ON um.id_user = op.id_user
                                        INNER JOIN Store_product_shipment sps ON sps.id_order = op.id_order
                                        WHERE sps.id_store = '$idstore'
                                        ORDER BY op.id_order;";
                            $query = mysqli_query($connect,$select);

                            if(!empty($_POST['updateshipping'])){
                               $SetShipping = $_POST['SetShipping'];
                               $numbertrack = $_POST['numbertrack'];
                               $sqlupdateshipping = "UPDATE `Store_product_shipment` SET `Status`= '1',`id_shipping`= '$SetShipping',`ShipCode`= '$numbertrack' 
                                                    WHERE `id_order` = '1' AND `id_store` = '$idstore'";
                                
                               mysqli_query($connect,$sqlupdateshipping);
                            }
                            if(mysqli_num_rows($query)>0){
                                while($row = mysqli_fetch_array($query)){

                                    $selectshipping = "SELECT * FROM `Store_product_shipment` WHERE `id_order` = '".$row['id_order']."' AND `id_store` = '$idstore'";
                                    $queryshipping = mysqli_query($connect,$selectshipping);
                                    $shipping = mysqli_fetch_array($queryshipping);
                                ?>
                                <tr>
                                    <td><?php echo $row['id_order']; ?></td>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><?php echo $row['Date_order']; ?></td>
                                    <td><?php echo number_format($row['Totalprice']); ?></td>
                                    <td><?php if($row['Status'] == '1'){echo "Success";}
                                              else if($row['Status'] == '0'){echo "Pedding";} ?></td>
                                    <td><a href="?link=infoorder&&idstore=<?php echo $idstore; ?>&&idorder=<?php echo $row['id_order']; ?>" class="btn btn-info">ดูข้อมูลเชิงลึก</a></td>
                                    <td><a href="#shipping<?php echo $row['id_order']; ?>" data-toggle="modal"  class="btn btn-success">จัดการข้อมูลจัดส่ง</a></td>
                                </tr>
                                <div class="modal fade" id="shipping<?php echo $row['id_order']; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Shipping</h4>
                                            </div>
                                            <div class="modal-body">
                                                <h2 class="text-center">จัดการจัดส่งรายการที่ <?php echo $row['id_order']; ?></h2>
                                                <div class="clearfix"></div>
                                                &nbsp
                                                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                                    <!-- ชื่อสินค้า-->
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">ชื่อบริษัทขนส่ง*</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <select name="SetShipping" class="form-control">
                                                                <option >เลือกบริษัทขนส่ง</option>
                                                                <option value="1" <?php if($shipping['id_shipping'] == 1){echo "selected";} ?>>ไปรษณีย์ไทย</option>
                                                                <option value="2" <?php if($shipping['id_shipping'] == 2){echo "selected";} ?>>Kerry</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    &nbsp
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">เลขรหัสไปรษณีย์*</label>
                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input id="name" name="numbertrack" type="text" 
                                                                    value="<?php if($shipping['ShipCode'] != NULL){echo $shipping['ShipCode'];} ?>"
                                                                    placeholder="ตัวอักษรภาษาไทยหรือภาษาอังกฤษเท่านั้น" class="form-control">
                                                        </div>
                                                    </div>
                                                
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <input name="updateshipping" type="submit" class="btn btn-primary" value="Save changes">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <?php
                                }
                            }
                            mysqli_close($connect);
                        ?>
                        </tbody>
                    </table>

                    
