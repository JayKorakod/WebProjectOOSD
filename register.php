<?php
	session_start();

	require_once "connect.php";

	if(isset($_POST['regis_btn'])) {
		$name = $_POST['name'];
		$lname = $_POST['Lastname'];
		$email = $_POST['email'];
		$pass = $_POST['Password'];
		$phone = $_POST['Telephone'];
		$address = $_POST['Address'];

		$email_check = "SELECT * FROM member WHERE memEmail = '$email' LIMIT 1 ";
		$result = mysqli_query($conn, $email_check);
		$email0 = mysqli_fetch_assoc($result);

		if($email0['memEmail'] === $email) {
			echo "<script>alert('Email นี้มีผู้ใช้งานแล้ว');</script>";
		}else{
			$query = "INSERT INTO member (memName,memLName,memEmail,memPassword,memTel,memAddress,memLicense) 
			VALUES ('$name', '$lname', '$email', '$pass', '$phone', '$address','m')";

			$result = mysqli_query($conn, $query);

			if($result) {
				$_SESSION['success'] = "สมัครสมาชิกสำเร็จ";
				header("Location: index.php");
			}else{
				$_SESSION['error'] = "สมัครสมาชิกไม่สำเร็จ";
				header("Location: index.php");
			}
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
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="assets/images/favicon.ico"/>
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
					<li class="nav-item"><a href="bucket.php">MY SHOPPING</a> </li>
					<li class="nav-item"> <a href="paynotify.php">Paynotify</a> </li>
			    	<li class="nav-item dropdown">
				        <a class="dropdown-toggle" href="blog.html" role="button" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Product</a>
				       	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						   <a class="dropdown-item" href="typecase.php">Case</a>
				          <a class="dropdown-item" href="typefilm.php">Film</a>
						  <a class="dropdown-item" href="typepowerbank.php">Powerbank</a>
						  <a class="dropdown-item" href="typecable.php">Cable</a>
						  <a class="dropdown-item" href="typeheadphone.php">Headphone</a>
				        </div>
					</li>
					<li class="nav-item active"> <a href="index.php">LOG IN</a> </li>
			    </ul>
			  </div>
			</nav>
		</div>
	</header>
    <!-- จบแถบเมนู -->
    
    <!-- ลงทะเบียน -->
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
				<h2>ลงทะเบียนสมาชิก</h2>
				<p>กรุณาลงทะเบียนสมาชิกเพื่อเข้าใช้งานเว็บไซต์</p>
			</div>
			</div>
			</div>
			<!-- จบหัวข้อ -->
				<div class="mu-contact-content">
				<div class="row">
                <div class="col-md-12">
				<div class="mu-contact-form-area">
				<div id="form-messages"></div>
					<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" class="mu-contact-form">

						<div class="form-group">  
							<span class="fa fa-user mu-contact-icon"></span>              
							<input type="text" class="form-control" placeholder="Name" id="name" name="name" required>
                        </div>
                        
                        <div class="form-group">  
							<span class="fa fa-user mu-contact-icon"></span>              
							<input type="text" class="form-control" placeholder="Lastname" id="Lastname" name="Lastname" required>
						</div>

						<div class="form-group">  
							<span class="fa fa-envelope mu-contact-icon"></span>              
							<input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" required>
						</div>    

						<div class="form-group">
							<span class="fa fa-pencil-square-o mu-contact-icon"></span> 
							<input type="password" class="form-control" placeholder="Password" id="Password" name="Password" required>
                        </div>
                        
                        <div class="form-group"> 
							<span class="fa fa-phone mu-contact-icon"></span>                
							<input type="text" class="form-control" placeholder="Telephone" id="Telephone" name="Telephone" required>
                        </div>
						<div class="form-group"> 
							<span class="fa fa-home mu-contact-icon"></span>                
							<input type="text" class="form-control" placeholder="Address" id="Address" name="Address" required>
                        </div>
                        
                            <input type="submit" class="mu-send-msg-btn" name="regis_btn" value="Register" >
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
    <!-- จบลงทะเบียน -->


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