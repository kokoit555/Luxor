
                <div ng-app="Listorder" ng-controller="UserListorder">
                    <table id="order" class="table table-hover table-condensed" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>id order</th>
                                <th>User</th>
                                <th>Shipping</th>
                                <th>Date_order</th>
                                <th>Totalprice</th>
                                <th>Status</th>
                                <th>แก้ไขสถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            include "../Codephp/connectdb.php";
            
                            $select = "SELECT * FROM `Order_product` op
                                        INNER JOIN User_member um ON um.id_user = op.id_user
                                        INNER JOIN Store_product_shipment sps ON sps.id_order = op.id_order
                                        INNER JOIN Shipping s ON s.id_Shipping = sps.Id_shipping";
                            $query = mysqli_query($connect,$select);
                            
                            if(mysqli_num_rows($query)>0){
                                while($row = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?php echo $row['id_order']; ?></td>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><?php echo $row['NameShipping']; ?></td>
                                    <td><?php echo $row['Date_order']; ?></td>
                                    <td><?php echo $row['Totalprice']; ?></td>
                                    <td><?php if($row['Status'] == '1'){echo "Success";}
                                              else if($row['Status'] == '0'){echo "Pedding";} ?></td>
                                    <td><button class="btn btn-info">ดูข้อมูลเชิงลึก</button></td>
                                </tr>
                                <?php
                                }
                            }
            
                            mysqli_close($connect);
                        ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>id order</th>
                                <th>User</th>
                                <th>Shipping</th>
                                <th>Date_order</th>
                                <th>Totalprice</th>
                                <th>Status</th>
                                <th>แก้ไขสถานะ</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>