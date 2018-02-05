
				<style>
					@media (max-width: 767px){
						.navbar-default .navbar-nav .open .dropdown-menu>li>a{
							color:#fff;
						}
					}
				</style>

				<nav class="navbar navbar-default noborder GRed Cusnav">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					  <a class="navbar-brand" href="./index.php">
						<img alt="" src="images/logo.png"><!-- <span>Luxor Fabric</span> -->
					  </a>
					</div>
					<!-- navber-header -->

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-left">
							<li style="margin-right:0;">
								<a href="index.php" class="active">หน้าแรก</a>
							</li>
							<li style="margin-right:0;">
								<a href="Listproduct.php">สินค้าทั้งหมด</a>
							</li>
							<li style="margin-right:0;">
								<a href="Blog.php">บทความ</a>
							</li>
						</ul>
							<ul class="nav navbar-nav navbar-right">
							<li style="margin-right:0;">
								<a href="Cartproduct.php" ><i class="fa fa-shopping-cart" aria-hidden="true"> 
									<?php if(!empty($_SESSION['cartproductID'])){ ?>
										<span class="badge badge-notify bade-cart">
											!
										</span>
									<?php } ?>
								</i></a>
							</li>
							<?php
							if(isset($_SESSION['idnumLoginWebsite']))
							{
								// echo "<script> alert('". $_SESSION['idnumLoginWebsite']."');</script>";
								?>
								
								

								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['nameLoginWebsite']; ?><span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li style="margin-right:0;">
											<a href="#">ข้อมูลส่วนตัว</a>
										</li>
										<li style="margin-right:0;">
											<a href="History.php">ประวัติการสั่งซื้อ</a>
										</li>
										<li style="margin-right:0;">
											<a href="Codephp/logout.php">ออกจากระบบ</a>
										</li>
									</ul>
								</li>
								<?php
							}
							else{
						?>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">เข้าสู่ระบบ<span class="caret"></span></a>
									<ul id="login-dp" class="dropdown-menu">
										<li style="margin-right:0;">
											<div class="row">
												<div class="col-md-12">
													<p class="text-black">เข้าสู่ระบบสมาชิก</p>
													<form class="form" role="form" method="post" accept-charset="UTF-8" id="login-nav">
														<div class="form-group">
															<label class="sr-only" for="exampleInputEmail2">อีเมล</label>
															<input type="text" name="IDUsernameMember" class="form-control" id="exampleInputEmail2" placeholder="Email" required>
														</div>
														<div class="form-group">
															<label class="sr-only" for="exampleInputPassword2">รหัสผ่าน</label>
															<input type="password" name="PassUsernameMember" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
															<div class="help-block text-right"><a class="text-black"href="">ลืมรหัสผ่าน ?</a></div>
														</div>
														<div class="form-group">
															<input type="submit" name="submitLoginWeb" class="btn btn-primary btn-block" value="Sign in">
														</div>
														<!-- <div class="checkbox">
															<label>
															   <input type="checkbox"> <span class="text-black">จดจำเข้าสู่ระบบ</span>
															   </label>
														</div> -->
													</form>
												</div>
												<div class="bottom text-center">
													<p class="text-black">เป็นส่วนหนึ่งกับเรา <a href="Register.php"><b>สมัครสมาชิก</b></a><p>
												</div>
											</div>
										</li>
									</ul>
								</li>
								<!-- end login -->

								<?php
							  if(isset($_POST['submitLoginWeb'])){
								  include 'Codephp/login.php';
							  }
						  ?>
									
									<?php
							}
						?>
						</ul>
					</div>
				</div>
				<!-- container -->
			</nav>
		