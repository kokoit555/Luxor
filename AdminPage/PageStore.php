<!-- <!DOCTYPE html> -->
<html>

<head>
<title>LuxorFabric</title>
    <link rel="icon" type="image/png" href="../images/logo.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/insertproduct.css">
    <link rel="stylesheet" type="text/css" href="../css/menuproduct.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/angular.min.js"></script>
    <script type="text/javascript" src="../js/app.js"></script>
    <script type="text/javascript" src="../js/sweetalert2.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</head>

<body>
    
        <div id="wrapper">
            <section class="Story">
                <div class="container">
                    <div class="row">
                        <?php include "menustore.php" ?>
                        <div class="col-sm-9 col-md-9">
                            <div class="row">
                                <div class="col-md-8 ">
                                <div class="panel panel-default">
                                    <div class="panel-heading">จัดการข้อมูลร้านค้า</div>
                                    <div class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <a href="?idstore=<?php echo $_GET['idstore']; ?>&&link=dashbord">ข้อมูลภาพรวมของร้านค้า</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="?idstore=<?php echo $_GET['idstore']; ?>&&link=listproduct">รายชื่อสินค้าของทางร้าน</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="PageinsertProduct.php?idstore=<?php echo $_GET['idstore']; ?>">ลงทะเบียนสินค้าใหม่</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="?idstore=<?php echo $_GET['idstore']; ?>&&link=listorder">ตรวจสอบออเดอร์</a>
                                            </td>
                                        </tr>
                                    </table>
                                    </div>
                                </div>
                                    <?php 
                                    if(!empty($_GET['idstore'])){
                                        if(!empty($_GET['link']) && $_GET['link'] == "dashbord"){
                                            include "Dashbord.php";
                                        }
                                        else if(!empty($_GET['link']) && $_GET['link'] == "listproduct"){
                                            include "Listproduct.php";
                                        }
                                        else if(!empty($_GET['link']) && $_GET['link'] == "listorder"){
                                            include "orderproduct.php";
                                        }
                                        else{
                                            include "Dashbord.php";
                                        }
                                    }
                                    else{
                                        echo "<script type='text/javascript'>window.location='./Liststore.php'</script>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <!-- wrapper -->




</body>

</html>
