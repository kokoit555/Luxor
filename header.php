<?php ob_start();
    session_start();?>
<header>
				<nav class="navbar navbar-inverse navbar-fixed-top">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
							<a href="index.php" class="navbar-brand" style="padding-top: 0;">
							<img style="width: 50px;" src="images/logo.png">
						</a>
						</div>
						<!-- navber-header -->

						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li>
									<a href="index.php" class="active">หน้าแรก</a>
								</li>
								<li>
									<a href="Listproduct.php">สินค้าทั้งหมด</a>
								</li>
								<li>
									<a href="#">บทความ</a>
								</li>
								<li>
									<a href="Cartproduct.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ตะกร้าสินค้า</a>
								</li>
								<?php
								if(isset($_SESSION['idnumLoginWebsite']))
								{
									// echo "<script> alert('". $_SESSION['idnumLoginWebsite']."');</script>";
									?>
									<li>
										<a href="Codephp/logout.php" style="color: #2E2EFE;">Logout</a>
									</li>
									<?php
								}
								else{
							?>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login/signup</b> <span class="caret"></span></a>
										<ul id="login-dp" class="dropdown-menu">
											<li>
												<div class="row">
													<div class="col-md-12">
														<p>Login Member</p>
														<form class="form" role="form" method="post" accept-charset="UTF-8" id="login-nav">
															<div class="form-group">
																<label class="sr-only" for="exampleInputEmail2">Email</label>
																<input type="text" name="IDUsernameMember" class="form-control" id="exampleInputEmail2" placeholder="Email" required>
															</div>
															<div class="form-group">
																<label class="sr-only" for="exampleInputPassword2">Password</label>
																<input type="password" name="PassUsernameMember" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
																<div class="help-block text-right"><a href="">Forget the password ?</a></div>
															</div>
															<div class="form-group">
																<input type="submit" name="submitLoginWeb" class="btn btn-primary btn-block" value="Sign in">
															</div>
															<div class="checkbox">
																<label>
																   <input type="checkbox"> keep me logged-in
																   </label>
															</div>
														</form>
													</div>
													<div class="bottom text-center">
														<p>เป็นส่วนหนึ่งกับเรา <a href="Register.php"><b>สมัครสมาชิก</b></a><p>
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
			</header>