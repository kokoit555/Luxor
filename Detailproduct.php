<!DOCTYPE html>
<html>

<head>
    <title>LuxorFabric</title>
    <link rel="icon" type="image/png" href="images/logo.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/detailproduct.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body>
<?php
		include 'Codephp/connectdb.php';
	?>
    <div id="wrapper">
        <?php include "header.php";?>

        <section class="Story">

            <div class="container">
                <?php include "Codephp/CodeFront/selectdetailproduct.php"; ?>
            </div>
        </section>

        <?php include "footer.php"; ?>

    </div>
    <!-- wrapper -->

</body>

</html>
