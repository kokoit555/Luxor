 <!-- page content -->
 <div class="clearfix"></div>
 <div class="row">
     <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
             <div class="x_title">
                 <h2>รายชื่อร้านค้า</h2>
                 <a class="btn btn-primary pull-right" href="?link=insertstore" >Insert Store</a>
             <div class="clearfix"></div>
         </div>
         <div class="x_content">
             <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                 <thead>
                     <tr>
                        <th>ID</th>
                        <th>name Store</th>
                        <th>Telephone</th>
                        <th>email</th>
                        <th>Add to Hot</th>
                     </tr>
                 </thead>
                 <tbody>
                 <?php
                    $select = "SELECT * FROM `Product` p order by `id_product`";
                    $query = mysqli_query($connect,$select);
                    
                    if(mysqli_num_rows($query)>0){
                        while($row = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $row['id_product']; ?></td>
                            <td><?php echo $row['NameProduct']; ?></td>
                            <td><?php echo $row['PriceProduct']; ?></td>
                            <td><?php echo $row['productDetail']; ?></td>
                            <td><a href="./CodeBack/addhotproduct.php?id_product=<?php echo $row['id_product']; ?>" class="btn btn-info btn-block">Add to Hot</a></td>
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
