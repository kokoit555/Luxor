<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LuxorFabric</title>
    <link rel="icon" type="image/png" href="../images/logo.png" />
    <!-- Bootstrap -->
    <link href="./vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="./vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="./vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="./build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <?php
      include "./CodeBack/connectdb.php";
      session_start();
       if(!empty($_SESSION['Store_user_name'])){
        header("Location: ./index.php");
      }
    ?>
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST">
              <h1>Login Form</h1>
              <div>
                <input type="text" name="userstorenameemail" class="form-control" placeholder="Username"/>
              </div>
              <div>
                <input type="password" name="userstorepassword" class="form-control" placeholder="Password"/>
              </div>
              <div>
                <input type="submit" name="userstoresubmitlogin" class="btn btn-default btn-block" value="Log in" style="margin-left:0;">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">
                    สำหรับร้านค้าที่เป็นส่วนหนึ่งกับทางร้าน LuxorFabric
                </p>

                <div class="clearfix"></div>
                <br/>
                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>

    <?php
          if(!empty($_POST['userstoresubmitlogin'])){

            $user = mysqli_escape_string($connect,$_POST['userstorenameemail']);
            $pass = mysqli_escape_string($connect,$_POST['userstorepassword']);

            echo $select = "SELECT * FROM `store` WHERE `EmailStore` = '$user' AND `Password` = md5('$pass');";

            if($query = mysqli_query($connect,$select)){
              $row = mysqli_fetch_array($query);
              echo $_SESSION['id_store_user_name'] = $row['id_store'];
              echo $_SESSION['Store_user_name'] = $row['NameStore'];
              header("Location: ./index.php");
            }
            else{
              echo "ไม่สำเร็จ";
            }
            mysqli_close($connect);
          }
    ?>
  </body>
</html>
