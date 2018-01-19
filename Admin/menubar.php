<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><img src="../images/logo.png"> <span>LuxorFabric</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../images/logo.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['Admin_user_name']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
      <li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
      <!-- <li><a><i class="fa fa-edit"></i>จัดการข้อมูล<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="?link=liststore">รายชื่อร้านค้า</a></li>
          <li><a href="?link=listRegisterStore">ข้อมูลสมัครร้านค้า</a></li>
        </ul>
      </li> -->
      <li><a href="?link=liststore"> <i class="fa fa-shopping-bag"></i>รายชื่อร้านค้า</a></li>
      <li><a href="?link=listRegisterStore"><i class="fa fa-registered"></i>ข้อมูลสมัครร้านค้า</a></li>
      <li><a href="?link=hotproduct"><i class="fa fa-pencil-square-o"></i>เพิ่มสินค้าแนะนำ</a></li>
      <li>
        <a href="logout.php"><i class="fa fa-sign-out"></i>Log Out</a>
      </li>
    </ul>
    </div>
</div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small" style="display:none;">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>