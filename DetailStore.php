<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="images/logo.png" />
    <title>Luxor Fabric</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style-mobi.css">
    <link rel="stylesheet" type="text/css" href="css/media.css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" href="css/p_detail.css">
</head>
<body>
<html>
    <body>
        <?php 
            include "./Codephp/connectdb.php";
            require './header.php';
        ?>
            <div class="container-fluid product-details">
                <div class="container">
                    <div class="row">
                        <?php 
                            if(!empty($_GET['idstore'])){
                                $sql = "SELECT * FROM `store` WHERE `id_store` = '".$_GET['idstore']."'";
                                $query = mysqli_query($connect,$sql);
                                $row = mysqli_fetch_array($query);
                        ?>
                        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                            <div class="col-xs-12 col-md-6 col-sm-6 col-lg-6 item-photo">
                                <div class="img-area" id="area-0" >
                                    <img style="max-width:100%;" src="<?php echo $row['AvatarStore']; ?>" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-sm-6 col-lg-6" style="border:0px solid gray;padding: 1% 4%;">
                                <h2><?php echo $row['NameStore']; ?></h2>
                                <div class="section">
                                    <br>
                                    <h3>ข้อมูลที่อยู่ร้านค้า</h4>
                                        <h4><?php echo $row['AddressStore'] ." ". $row['CityStore'] ." ".$row['StateStore']." ".$row['ZipStore']; ?></h4>
                                        <h4><?php echo "เบอร์โทรศัพท์ : ".$row['TelStore']; ?></h4>
                                        <h4><?php echo "อีเมล์ : ".$row['EmailStore']; ?></h4>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <ul class="menu-items nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#menu1"><h3>ข้อมูลร้านค้า</h3></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="menu1" class="tab-pane fade in active" style="width:100%;border-top:1px solid silver">
                                        <p style="padding:15px;">
                                            <small>
                                                <?php echo $row['textStory']; ?>
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                            }  
                            mysqli_close($connect);
                        ?>
                    </div>
                </div>
            </div>
        <?php require 'footer.php' ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
    </body>
</html>