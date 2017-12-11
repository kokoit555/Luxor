                    <table id="datatable-responsive2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>id order</th>
                                <th>User</th>
                                <th>Shipping</th>
                                <th>Date_order</th>
                                <th>Product</th>
                                <th>Totalprice</th>
                                <th>Status</th>
                                <th>แก้ไขสถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            include "../Codephp/connectdb.php";
                            $idstore = $_GET['idstore'];
                            $select = "SELECT DISTINCT op.id_order,um.Name,s.NameShipping , op.Date_order , p.NameProduct , op.Totalprice , sps.Status FROM `Order_product` op 
                                        INNER JOIN User_member um ON um.id_user = op.id_user 
                                        INNER JOIN Store_product_shipment sps ON sps.id_order = op.id_order 
                                        INNER JOIN Shipping s ON s.id_Shipping = sps.Id_shipping 
                                        INNER JOIN orderproductdetail opd ON opd.id_order = op.id_order 
                                        INNER JOIN product p ON p.id_product = opd.id_product
                                        WHERE p.id_store = '$idstore'
                                        ORDER BY opd.id_orderDetail DESC";
                                        
                            $query = mysqli_query($connect,$select);
                            
                            if(mysqli_num_rows($query)>0){
                                while($row = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?php echo $row['id_order']; ?></td>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><?php echo $row['NameShipping']; ?></td>
                                    <td><?php echo $row['Date_order']; ?></td>
                                    <td><?php echo $row['NameProduct']; ?></td>
                                    <td><?php echo number_format($row['Totalprice']); ?></td>
                                    <td><?php if($row['Status'] == '1'){echo "Success";}
                                              else if($row['Status'] == '0'){echo "Pedding";} ?></td>
                                    <td><a href="#infoOrder<?php echo $row['id_order']; ?>" data-toggle="modal"  class="btn btn-info">ดูข้อมูลเชิงลึก</a></td>
                                </tr>

                                <div class="modal fade" id="infoOrder<?php echo $row['id_order']; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Large Modal</h4>
                                            </div>
                                            <div class="modal-body">

                                                <h3><?php echo $row['id_order']; ?></h3>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
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

                    
