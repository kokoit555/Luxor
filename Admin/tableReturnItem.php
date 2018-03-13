 <!-- page content -->
 <div class="clearfix"></div>
 <div class="row">
     <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
             <div class="x_title">
                 <h2>รายการคืนสินค้า</h2>
                 <!-- <a class="btn btn-primary pull-right" href="?link=insertstore" >Insert Store</a> -->
             <div class="clearfix"></div>
         </div>
         <div class="x_content">
             <table id="datatable-responsive" ng-app="ListStore" ng-controller="UserListStore"  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                 <thead>
                     <tr>
                        <th>ID_order</th>
                        <th>Name Product</th>
                        <th>Qty</th>
                        <th>Remark</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th></th>
                     </tr>
                 </thead>
                 <tbody>
                 <?php
                    $select = "SELECT * FROM returnitem r
                                INNER JOIN store_product_shipment sps ON sps.id_shipment = r.id_shipment
                                INNER JOIN orderproductdetail opd ON opd.id_orderDetail = sps.id_orderDetail
                                INNER JOIN product p ON p.id_product = opd.id_product";
                    $query = mysqli_query($connect,$select);
                    
                    if(mysqli_num_rows($query)>0){
                        while($row = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $row['id_order']; ?></td>
                            <td><?php echo $row['NameProduct']; ?></td>
                            <td><?php echo $row['return_qty']; ?></td>
                            <td><?php echo $row['remark']; ?></td>
                            <td><?php echo $row['return_Price']; ?></td>
                            <td><?php echo $row['date_returnitem']; ?></td>
                            <?php if($row['status_ReturnItem'] == 0){ ?>
                                <td><a href="#" class="btn btn-block btn-info">ยืนยันคืนสินค้า</a></td>
                            <?php } else if($row['status_ReturnItem'] == 1){?>
                                <td><a href="#" class="btn btn-block btn-warning">ยืนยันคืนสินค้า</a></td>
                            <?php } else if($row['status_ReturnItem'] == 2){ ?>
                                <td><a href="#" class="btn btn-block btn-success">ยืนยันคืนสินค้า</a></td>
                            <?php } ?>
                        </tr>
                        <?php
                        }
                    }

                    mysqli_close($connect);
                 ?>
                 </tbody>
             </table>
         </div> <!--x_content-->
     </div> <!--col-md-12 col-sm-12 col-xs-12-->
   </div><!--row-->
 <div class="clearfix"></div>
<!-- /page content -->
