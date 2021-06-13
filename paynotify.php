<?php
	session_start();
	require_once "connect.php";
	// ซ่อน error
	error_reporting(0);

	if(isset($_POST['login'])) {

		include('connect.php');

		$email = $_POST['email'];
		$pass = $_POST['Password'];

		$query = "SELECT * FROM member WHERE memEmail ='$email' AND memPassword='$pass'";

		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) == 1){

			$row = mysqli_fetch_array($result);

			$_SESSION['member'] = $row['memName'];
			header("Location: index.php");
		}else{
			echo "<script>alert('email หรือ password ผิด');</script>";
		}
	}
	if(isset($_POST['logout'])){
		$_SESSION['member'] = "" ;
		header("Location: index.php");
	}
	

	if($_SESSION['member'] == ""){
		header("Location: login.php");
	}

	// ส่วนของการ Insert Orders การแจ้งชำระเงิน
	if (isset($_POST['submit_btn'])) {
		// Get image name
        $payName = $_POST['payName'];
        $payImg = $_FILES['payImg']['name'];
        //$orderbuyer =
		// image file directory
		$target = "assets/payImg/".basename($payImg);
		// ใช้คำสั่ง SQL ในการ INSERT ข้อมูล
		$sql = "INSERT INTO paynotify (payName,payImg) VALUES ('$payName','$payImg')";
		// execute query
		mysqli_query($conn, $sql);
		// ทำเงื่อนไขว่า ถ้าไฟล์ถูก upload ไปที่ target จะ echo ออกมา
		if (move_uploaded_file($_FILES['payImg']['tmp_name'], $target)) {
			echo "<script>alert('เรียบร้อยจ้า รอรับสินค้าได้เลย');</script>";
		}
	}
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FINNNNNSHOPs</title>
    <!-- รูปicon -->
    <link rel="shortcut icon" type="image/icon" href="assets/images/icon.ico"/>
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <!-- Slick slider -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!-- Gallery Lightbox -->
    <link href="assets/css/magnific-popup.css" rel="stylesheet">
    <!-- Skills Circle CSS  -->
	<link rel="stylesheet" type="text/css" href="https://unpkg.com/circlebars@1.0.3/dist/circle.css">
	
		<!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
	<!-- Slick slider -->
    <script type="text/javascript" src="assets/js/slick.min.js"></script>
    <!-- Progress Bar -->
    <script src="https://unpkg.com/circlebars@1.0.3/dist/circle.js"></script>
    <!-- Filterable Gallery js -->
    <script type="text/javascript" src="assets/js/jquery.filterizr.min.js"></script>
    <!-- Gallery Lightbox -->
    <script type="text/javascript" src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Counter js -->
    <script type="text/javascript" src="assets/js/counter.js"></script>
    <!-- Ajax contact form  -->
	<script type="text/javascript" src="assets/js/app.js"></script>
	<!-- Custom js -->
	<script type="text/javascript" src="assets/js/custom.js"></script>
    

    <!-- Main Style -->
    <link href="styleProject.css" rel="stylesheet">

    <!-- Fonts -->

    <!-- Google Fonts Raleway -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,500i,600,700" rel="stylesheet">
	<!-- Google Fonts Open sans -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,800" rel="stylesheet">
	<!-- Custom js -->
	<script type="text/javascript" src="assets/js/custom.js"></script>
 
 
	</head>
  <body>

   <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      
    </a>
  <!-- END SCROLL TOP BUTTON -->
  	
  	<!-- แถบเมนู -->
	<header id="mu-hero">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light mu-navbar">
				<a class="navbar-brand mu-logo" href="index.php"><img src="assets/images/logo.png" alt="logo"></a> 
			  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    	<span class="fa fa-bars"></span>
			  		</button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
			            <ul class="navbar-nav mr-auto mu-navbar-nav">
			    	        <li class="nav-item"> <a href="index.php">HOME</a> </li>
					        <li class="nav-item active"><a href="bucket.php">MY SHOPPING</a> </li>
					        <li class="nav-item"> <a href="paynotify.php">Paynotify</a> </li>
			    	        <li class="nav-item dropdown">
				            <a class="dropdown-toggle" href="product.php" role="button" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">product</a>
				                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
						            <a class="dropdown-item" href="typecase.php">Case</a>
				                    <a class="dropdown-item" href="typefilm.php">Film</a>
						            <a class="dropdown-item" href="typepowerbank.php">Powerbank</a>
						            <a class="dropdown-item" href="typecable.php">Cable</a>
						            <a class="dropdown-item" href="typeheadphone.php">Headphone</a>
				                </div>
					        </li>
					<li class="nav-item">
					<form method ="post" action ="<?php echo $_SERVER['PHP_SELF']; ?>">
							<?php
								if($_SESSION['member'] != "") {
									echo"<li class='nav-item dropdown'>
											<a class='dropdown-toggle' href='' role='button' id='navbarDropdown' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>".$_SESSION['member']."</a>
											<div class='dropdown-menu' aria-labelledby='navbarDropdown'>
											<a class='dropdown-item' href=''><input type='submit' value='Logout' name='logout'></a>
											</div>
										</li>";
									//echo "<p style=color:red;>".$_SESSION['customer']."</p>";
									//echo "<input type='submit' value='Logout' name='logout'>";
								}else{
									echo "<a href='login.php'>LOG IN</a>";
								}
							?>
					</li>
				</form>
				</ul>
			</div>
			</nav>
		</div>
	</header>
	<!-- แถบเมนู -->

	<!-- ส่วนซื้อสินค้า -->	
	<main>
		<section id="mu-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-contact-area">
						<!-- หัวข้อ -->
							<div class="row">
								<div class="col-md-12">
									<div class="mu-title">
                                        <h2>แจ้งการชำระเงิน</h2>
                                        <h4>กรุณาอัพโหลดไฟล์ภาพที่เป็นหลักฐานการชำระเงิน</h4>
									</div>
								</div>
							</div>
						<!-- จบหัวข้อ -->
							<div class="mu-contact-content">
								<div class="row">
             					   <div class="col-md-12">
										<div class="mu-contact-form-area">
											<div id="form-messages"></div>
												<form method="post" action="paynotify.php" class="mu-contact-form" enctype="multipart/form-data">							  
                                                    <div class="form-group">  
														<span class="fa fa-user mu-contact-icon"></span>              
														<input type="text" class="form-control" placeholder="Enter Name" id="payName" name="payName" required>
													</div>
                                                    <div class="form-group">
														<span class="fa fa-file mu-contact-icon"></span>               
														<input type="text" class="form-control" placeholder="๊Upload Image" readonly>
													</div>
													<div>              
														<input type="file" name="payImg">
                       							    </div>       																																						
														<input type="submit" class="mu-send-msg-btn" name="submit_btn" value="Submit" >
												</form>
											</div>
										</div>
									</div>
			    				</div>	
						<!-- End Contact Content -->
					</div>
				</div>
			</div>
		</div>
	</section>


    
    
	<!-- Start footer -->
	<footer id="mu-footer">
		<div class="mu-footer-top">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="mu-single-footer">
							<img class="mu-footer-logo" src="assets/images/logo.png" alt="logo">
							<p> Website collecting products from various games There are new games, discounted games, and many products to choose from. If found problems, can be contacted according to the information specified </p>
							<div class="mu-social-media">
								<a href="https://web.facebook.com/fern.finnn"><i class="fa fa-facebook"></i></a>
								<a class="mu-twitter" href=https://twitter.com/fernfinnnnn> <i class="fa fa-twitter"></i></a>   
								<a class="mu-youtube" href="https://www.youtube.com/user/HEARTROCKERChannel"><i class="fa fa-youtube"></i></a>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="mu-single-footer">
							<h3 style="color: #ff90edcc;">Contact Information</h3>
							<ul class="list-unstyled">
							  <li class="media">
							    <span class="fa fa-home"></span>
							    <div class="media-body">
							    	<p>349 Main St, bangkok ,Thailand</p>
							    </div>
							  </li>
							  <li class="media">
							    <span class="fa fa-phone"></span>
							    <div class="media-body">
							        <p>+00 123 456 789 00</p>
							     	<p>+00 254 632 548 00</p>
							    </div>
							  </li>
							  <li class="media">
							    <span class="fa fa-envelope"></span>
							    <div class="media-body">
							    	<p>support@finnngames.com</p>
							    </div>
							  </li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="mu-footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-footer-bottom-area">
							<p class="mu-copy-right">&copy; Copyright markups.io. All right reserved.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</footer>
	<!-- End footer -->

    <!-- Custom js -->
	<script type="text/javascript" src="assets/js/custom.js"></script>

    
  </body>
</html>