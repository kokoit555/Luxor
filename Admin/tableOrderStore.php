                    <table id="datatable-responsive4" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>id order</th>
                                <th>User</th>
                                <th>Date_order</th>
                                <th>Totalprice</th>
                                <th>Status</th>
                                <th>ข้อมูลเชิงลึก</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            include "./CodeBack/connectdb.php";
                            $idstore = $_GET['idstore'];
                            $select = "SELECT * FROM `order_product` op
                                        INNER JOIN user_member um ON um.id_user = op.id_user
                                        INNER JOIN store_product_shipment sps ON sps.id_order = op.id_order
                                        WHERE sps.id_store = '$idstore'
                                        ORDER BY op.id_order;";
                            $query = mysqli_query($connect,$select);

                            if(!empty($_POST['updateshipping'])){
                               $SetShipping = $_POST['SetShipping'];
                               $numbertrack = $_POST['numbertrack'];
                               $sqlupdateshipping = "UPDATE `store_product_shipment` SET `Status`= '1',`id_shipping`= '$SetShipping',`ShipCode`= '$numbertrack' 
                                                    WHERE `id_order` = '1' AND `id_store` = '$idstore'";
                                
                               mysqli_query($connect,$sqlupdateshipping);
                            }
                            if(mysqli_num_rows($query)>0){
                                while($row = mysqli_fetch_array($query)){

                                    $selectshipping = "SELECT * FROM `store_product_shipment` WHERE `id_order` = '".$row['id_order']."' AND `id_store` = '$idstore'";
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
                                </tr>
                                <?php
                                }
                            }
                            mysqli_close($connect);
                        ?>
                        </tbody>
                    </table>

                    
