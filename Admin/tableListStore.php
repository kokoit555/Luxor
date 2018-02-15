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
             <table id="datatable-responsive" ng-app="ListStore" ng-controller="UserListStore"  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                 <thead>
                     <tr>
                        <th>ID</th>
                        <th>name Store</th>
                        <th>Telephone</th>
                        <th>email</th>
                        <th>view</th>
                        <th>delete</th>
                     </tr>
                 </thead>
                 <tbody>
                 <?php
                    $select = "SELECT * FROM `store` s order by `id_store`";
                    $query = mysqli_query($connect,$select);
                    
                    if(mysqli_num_rows($query)>0){
                        while($row = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $row['id_store']; ?></td>
                            <td><?php echo $row['NameStore']; ?></td>
                            <td><?php echo $row['TelStore']; ?></td>
                            <td><?php echo $row['EmailStore']; ?></td>
                            <td><a href="?link=listproduct&&idstore=<?php echo $row['id_store']; ?>" class="btn btn-info btn-block">View</a></td>
                            <td><button ng-click="deleteData(<?php echo $row['id_store']; ?>)" class="btn btn-danger btn-block">ลบข้อมูล</button></td>
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
