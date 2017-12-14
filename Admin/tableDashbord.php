        <!-- top tiles -->
        <div class="row tile_count">
                    <?php
                        $selecttotaluser = "SELECT COUNT(`id_user`) countitem FROM `User_member`";
                        $queryttotaluser = mysqli_query($connect,$selecttotaluser);
                        $rowttotaluser = mysqli_fetch_array($queryttotaluser);

                        $selecttotalstore = "SELECT COUNT(`id_store`) countitem FROM `Store`";
                        $queryttotalstore = mysqli_query($connect,$selecttotalstore);
                        $rowtotalstore = mysqli_fetch_array($queryttotalstore);

                        $selecttotalorder = "SELECT COUNT(`id_order`) countitem FROM `Order_product`";
                        $queryttotalorder = mysqli_query($connect,$selecttotalorder);
                        $rowtotalorder = mysqli_fetch_array($queryttotalorder);

                        $selecttotalproduct = "SELECT COUNT(`id_product`) countitem FROM `Product`";
                        $querytotalproduct = mysqli_query($connect,$selecttotalproduct);
                        $rowtotalproduct = mysqli_fetch_array($querytotalproduct);
                    ?>
                    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
                        <div class="count"><?php echo $rowttotaluser['countitem']; ?></div>
                        <!-- <span class="count_bottom"><i class="green">4% </i> From last Week</span> -->
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-clock-o"></i> Total Store</span>
                        <div class="count"><?php echo $rowtotalstore['countitem']; ?></div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-user"></i> Total Order</span>
                        <div class="count green"><?php echo $rowtotalorder['countitem']; ?></div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-user"></i> Total Product</span>
                        <div class="count"><?php echo $rowtotalproduct['countitem']; ?></div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-user"></i> Total ??</span>
                        <div class="count"><?php echo $rowttotaluser['countitem']; ?></div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-user"></i> Total ??</span>
                        <div class="count"><?php echo $rowttotaluser['countitem']; ?></div>  
                    </div>
                </div> <!-- /top tiles -->
            <div class="clearfix"></div>
        
        <!-- page content -->
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>ยอดออเดอร์ล่าสุด</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li>
                                    <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID Order</th>
                                    <th>Name</th>
                                    <th>LastName</th>
                                    <th>Date Order</th>
                                    <th>Email</th>
                                    <th>tel</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $select = "SELECT * FROM `Order_product` op
                                            INNER JOIN User_member um ON um.id_user = op.id_user
                                            Order By op.id_order desc;";
                                            
                                $query = mysqli_query($connect,$select);
                                if(mysqli_num_rows($query) > 0){
                                    while($row = mysqli_fetch_array($query)){
                                    ?>
                                    <tr>
                                        <td><?php echo $row['id_order']; ?></td>
                                        <td><?php echo $row['Name']; ?></td>
                                        <td><?php echo $row['LastName']; ?></td>
                                        <td><?php echo $row['Date_order']; ?></td>
                                        <td><?php echo $row['Send_email_order']; ?></td>
                                        <td><?php echo $row['Tel']; ?></td>
                                        <td><?php echo number_format($row['Totalprice']); ?></td>
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
