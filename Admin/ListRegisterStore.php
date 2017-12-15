
            <div class="page-title">
              <div class="title_left">
                <h3>List Register Store</h3>
              </div>
            </div>

                 <!-- page content -->
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content" ng-app="registerstore" ng-controller="Formregisterstore">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>NameStore</th>
                                        <th>Tel</th>
                                        <th>Email</th>
                                        <th>View</th>
                                        <th>Approved</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    
                                    $select = "SELECT * FROM `formRegisterStore`";
                                                
                                    $query = mysqli_query($connect,$select);
                                    
                                    if(mysqli_num_rows($query) > 0){
                                        while($row = mysqli_fetch_array($query)){
                                    ?>
                                        <tr>
                                            <td><?php echo $row['NameStore']; ?></td>
                                            <td><?php echo $row['TelStore']; ?></td>
                                            <td><?php echo $row['EmailStore']; ?></td>
                                            <td><a href="#" class="btn btn-default btn-block">ดูข้อมูล</a></td>
                                            <td><a href="" class="btn btn-info btn-block">อนุมัติข้อมูล</a></td>
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