                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name product</th>
                                    <th>Status</th>
                                    <th>price</th>
                                    <th>edit</th>
                                    <th>delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                include "../Codephp/connectdb.php";
                                $idstore = $_GET['idstore'];
                                $select = "SELECT * FROM `Product` p WHERE id_store = '$idstore' order by `id_product`";
                                $query = mysqli_query($connect,$select);
                                
                                if(mysqli_num_rows($query)>0){
                                    while($row = mysqli_fetch_array($query)){
                                    ?>
                                    <tr>
                                        <td><?php echo $row['id_product']; ?></td>
                                        <td><?php echo $row['NameProduct']; ?></td>
                                        <td><?php echo $row['Status']; ?></td>
                                        <td><?php echo $row['PriceProduct']; ?></td>
                                        <td>
                                            <a href="?link=editproduct&&idstore=<?php echo $_GET['idstore']; ?>&&idproduct=<?php echo $row['id_product']; ?>" class="btn btn-info">
                                                แก้ไข
                                            </a>
                                        </td>
                                        <td><button ng-click="deleteData(<?php echo $row['id_product']; ?>)" class="btn btn-danger">ลบข้อมูล</button></td>
                                    </tr>
                                    <?php
                                    }
                                }
                                mysqli_close($connect);
                            ?>
                            </tbody>
                        </table>
