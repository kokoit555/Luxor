 <!-- page content -->
 <div class="clearfix"></div>
 <div class="row">
     <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
             <div class="x_title">
                 <h2>รายชื่อสินค้าแนะนำ</h2>
             <div class="clearfix"></div>
         </div>
         <div class="x_content">
             <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                 <thead>
                     <tr>
                        <th>ID</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคาสินค้า</th>
                        <th>รายละเอียดสินค้า</th>
                        <th>Add to Hot</th>
                     </tr>
                 </thead>
                 <tbody>
                 <?php
                    $select = "SELECT p.id_product , p.NameProduct , p.PriceProduct , p.productDetail , h.id_product checkhot FROM `product` p
                                LEFT JOIN hotproduct h ON h.id_product = p.id_product";
                    $query = mysqli_query($connect,$select);
                    
                    if(mysqli_num_rows($query)>0){
                        while($row = mysqli_fetch_array($query)){
                            if($row['checkhot'] != null){
                        ?>
                        <tr>
                            <td><?php echo $row['id_product']; ?></td>
                            <td><?php echo $row['NameProduct']; ?></td>
                            <td><?php echo $row['PriceProduct']; ?></td>
                            <td><?php echo $row['productDetail']; ?></td>
                            <td><a href="#" class="btn btn-danger btn-block">DeleteHot</a></td>
                        </tr>
                        <?php
                            }
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
