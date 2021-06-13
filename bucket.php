<?php
	session_start();
	require_once "connect.php";
	date_default_timezone_set('Asia/Bangkok');
	$orderdate = date("Y-m-d H:i:s");
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

			$_SESSION['member'] = $row['cus_name'];
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
	// เพิ่มข้อมูลลงตะกร้าสินค้า
	if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("มีสินค้าอยู่ในตะกร้าแล้ว")</script>';  
                echo '<script>window.location="index.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>window.location="bucket.php"</script>';  
                }  
           }  
      }  
 }

 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "deleteall")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"])  
                {  
                     unset($_SESSION["shopping_cart"]);  
                     echo '<script>window.location="bucket.php"</script>';  
                }  
           }  
      }  
 }
 
 // Insert ช่องทางการขนส่งสินค้า
 if(isset($_POST['buynow'])){
		$orderUnit = $_POST['hidden_unit'];
		$orderPrice = $_POST['pricecal'];
		$orderpay = $_POST['pay'];
		$ordertran = $_POST['tran'];

		// คำสั่ง SQL INSERT
		$bobo = "INSERT INTO orders (orderUnit,orderPrice,orderpay,ordertran,orderdate) 
			VALUES ('$orderUnit','$orderPrice','$orderpay','$ordertran','$orderdate')";
		// เชื่อมฐานแล้ว ตามด้วย $bobo
		mysqli_query($conn, $bobo);

		unset($_SESSION["shopping_cart"]);
		echo '<script>alert("บันทึก Order ของท่านเรียบร้อย")</script>';  
		echo '<script>window.location="index.php"</script>';  		 
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
    

	<!-- Function คิดราคารวมส่ง -->
	<script src = "calprice.js"></script>

    <!-- Main Style -->
    <link href="styleProject.css" rel="stylesheet">

    <!-- Fonts -->

    <!-- Google Fonts Raleway -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,500i,600,700" rel="stylesheet">
	<!-- Google Fonts Open sans -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,800" rel="stylesheet">
	<!-- Custom js -->
	<script type="text/javascript" src="assets/js/custom.js"></script>
 	<!--confirmpayment -->
	<script type="text/javascript" src = "assets/js/comfirmpay.js"></script>
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
						</form>
					</li>
				</ul>
			</div>
			</nav>
		</div>
	</header>
	<!-- แถบเมนู -->
	
	<section id="mu-portfolio" >
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-portfolio-area">
							<h3 align="center">My Shopping</h3>  
							<form method = "post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
								<div class="table-responsive">  
									<table class="table table-bordered">  
										<tr>  
											<th width="40%">Name</th>  
											<th width="10%">Quantity</th>  
											<th width="20%">Price</th>  
											<th width="15%">Total</th>  
											<th width="5%"></th>  
										</tr>  
										<?php   
										if(!empty($_SESSION["shopping_cart"]))  
										{  
											$totalunit = 0;
											$total = 0;  
											foreach($_SESSION["shopping_cart"] as $keys => $values)  
											{  
										?>  
										<tr>  
											<td><?php echo $values["item_name"]; ?></td>  
											<td><?php echo $values["item_quantity"]; ?></td>  
											<td> <?php echo $values["item_price"]; ?> ฿</td>  
											<td> <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?> ฿</td>  
											<td><a href="bucket.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="btn btn-danger">นำสินค้าออก</span></a></td>  
										</tr>  
										<?php  
													$totalunit = $totalunit +  $values["item_quantity"];
													$total = $total + ($values["item_quantity"] * $values["item_price"]);  
											}  
										?>  
										<tr>  
											<td  align="right">Total</td>
											<td  align="right"> <?php echo $totalunit; ?> </td>  
											<td colspan="2" align="right"> <?php echo number_format($total, 2); ?> ฿</td>  
											<td></td>  
										</tr>
										<?php  
										}  
										?>  
									</table class="table table-bordered"> <br>
										<h3 align="center">เลือกช่องทางการขนส่งสินค้า</h3>
										<div class="mu-contact-content">
											<input type="radio" id="tran1" name="tran" value="พัสดุธรรมดา" onclick="cal();" > พัสดุธรรมดา 30 ฿ <br>
											<input type="radio" id="tran2" name="tran" value="พัสดุเร่งด่วน EMS" onclick="cal();"> พัสดุเร่งด่วน EMS 50 ฿ <br>
											<input type="radio" id="tran3" name="tran" value="Kerry Express" onclick="cal();"> Kerry Express 60 ฿ <br>
											ราคาก่อนรวมค่าจัดส่ง : <input readonly size="10" type="text" name="hidden_price" id="hidden_price" value="<?php echo $total; ?>"  > ฿ 
											<input type="hidden" name="hidden_unit" value="<?php echo $totalunit; ?>"  > <br>
											ราคาหลังรวมค่าจัดส่ง : <input readonly size="10" type="text" name="pricecal" id="pricecal"> ฿
											<br><br>
										</div>	
										<h3 align="center">เลือกช่องทางการชำระเงิน</h3>
										<div class="mu-contact-content">
											<input type="radio" id="pay1" name="pay" value="True Wallet"> True Wallet หมายเลข 099-8268440 <br>
											<input type="radio" id="pay2" name="pay" value="SCB"> ระบบธนาคาร SCB เลขบัญชี 125-55555-11 <br>
											<input type="radio" id="pay3" name="pay" value="Paypal"> Paypal fernfinnnnn@hotmail.com <br>
											<br><br>
										</div>
										<div class="mu-contact-content">
											<br><br><button type="button" class="btn btn-warning" onclick="window.location='index.php';" >กลับไปเลือกสินค้า</button>
											<a href="bucket.php?action=deleteall"><span class="btn btn-danger">นำสินค้าออกทั้งหมด</span></a>
											<button type ="submit" class="btn btn-primary" name="buynow">ซื้อจ้า</button>
										</div>
								</div> 
								</form> 
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