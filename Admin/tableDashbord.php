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
                                include "../Codephp/connectdb.php";
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
