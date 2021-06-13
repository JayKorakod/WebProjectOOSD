<?php
	session_start();
    require_once "connect.php";
    $ProductName = "";
    $ProductType = "";
    $ProductPrice = ""; 
	$update = false;
	// ซ่อน error
	error_reporting(0);

	if(isset($_POST['login'])) {

		include('connect.php');

		$email = $_POST['email'];
		$pass = $_POST['Password'];

		$query = "SELECT * FROM employee WHERE empEmail ='$email' AND empPassword='$pass'";

		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) == 1){

			$row = mysqli_fetch_array($result);

			$_SESSION['employee'] = $row['empName'];
			$_SESSION['userlevel'] = $row['empLicense'];
			
			if($_SESSION['userlevel'] == 'a'){
				header("Location: adminpage.php");
			}
			if($_SESSION['userlevel'] == 'm'){
				header("Location: index.php");
			}
		}else{
			echo "<script>alert('email หรือ password ผิด');</script>";
		}
	}
	if(isset($_POST['logout'])){
		$_SESSION['employee'] = "" ;
		header("Location: index.php");
	}
    // Check login หรือยัง
    if($_SESSION['employee'] == ""){
		header("Location: loginadmin.php");
    }
    // delete สินค้า
    if(isset($_GET['delete'])){
        $ProductID = $_GET['delete'];
        $conn->query("DELETE FROM product WHERE ProductID=$ProductID") or die($conn->error());
        echo "<script>alert('ลบสินค้าสำเร็จแล้ว');</script>";
    }
    // update สินค้า
    if(isset($_GET['edit'])){
        $ProductID2 = $_GET['edit'];
        $result2 = $conn->query("SELECT * FROM product WHERE ProductID=$ProductID2") or die($conn->error());
        if(count($result2)==1){
            $row = $result2->fetch_array();
            $ProductName = $row['ProductName'];
            $ProductType = $row['ProductType'];
            $ProductPrice = $row['ProductPrice'];
        }
    }

    if(isset($_POST['update'])){
        $ProductID3 = $_POST['ProductID'];
        $ProductName3 = $_POST['ProductName'];
        $ProductType3 = $_POST['ProductType'];
        $ProductPrice3 = $_POST['ProductPrice'];

        $conn->query("UPDATE product SET ProductName = '$ProductName3', ProductType ='$ProductType3', ProductPrice='$ProductPrice3' WHERE ProductID = $ProductID3 ") or
            die($conn->error);

    
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
				<a class="navbar-brand mu-logo" href="adminpage.php"><img src="assets/images/logo.png" alt="logo"></a> 
			  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    	<span class="fa fa-bars"></span>
			  		</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto mu-navbar-nav">
			    	<li class="nav-item active"> <a href="adminpage.php">หน้าแรก</a> </li>
			    	<li class="nav-item dropdown">
				        <a class="dropdown-toggle" href=".php" role="button" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">จัดการ</a>
				       	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				          <a class="dropdown-item" href="regisemployee.php">สิทธิ์พนักงาน</a>
				          <a class="dropdown-item" href="product.php">สินค้า</a>
				        </div>
					</li>
                    <li class="nav-item dropdown">
				        <a class="dropdown-toggle" href=".php" role="button" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">รายงาน</a>
				       	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				          <a class="dropdown-item" href="reportsale.php">สรุปยอดขาย</a>
				          <a class="dropdown-item" href="conpayment.php">สรุปกำไรสุทธิ</a>
				        </div>
					</li>
					<li class="nav-item">
					<form method ="post" action ="<?php echo $_SERVER['PHP_SELF']; ?>">
							<?php
								if($_SESSION['employee'] != "") {
									echo"<li class='nav-item dropdown'>
											<a class='dropdown-toggle' href='' role='button' id='navbarDropdown' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>".$_SESSION['employee']."</a>
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
    <!-- ส่วนหัวข้อแนะนำ -->
    <div class="row"align="center" style="background-color: rgba(24, 24, 27, 0.925);">
            <div class="col-md-12">
                <div class="mu-title">
                    <button type="button" class="btn btn-success" onclick="window.location='addproduct.php';" >เพิ่มสินค้า</button>
                </div>
            </div>
        </div>
        <!-- จบส่วนหัวข้อแนะนำ -->
	<!-- ส่วนซื้อสินค้า -->
		<section id="mu-portfolio" style="background-color: rgba(24, 24, 27, 0.925);">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-portfolio-area">
							<br/>  
                					<?php  
                					$query = "SELECT * FROM product ORDER BY ProductID ASC";  
                					$result = mysqli_query($conn, $query);  
                					if(mysqli_num_rows($result) > 0)  
                					{  
                     					 while($row = mysqli_fetch_array($result))  
                     					{  
                					?> 

                						<div class="col-md-4">  
                     						<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>"> 
                                                <input type = "hidden" name="ProductID" value="<?php echo $ProductID2 ?> " >
                          						<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                                						<?php echo "<img class='img-responsive' src='assets/product_img/".$row['ProductImg']."' >"; ?> <br />
                                                    <h8 class="text-info" ><?php echo $row["ProductName"]; ?></h8>
                                                    <h6 class="text-warning"><?php echo $row["ProductType"]; ?> </h6>  
                               						<h6 class="text-danger"><?php echo $row["ProductPrice"]; ?> ฿</h6>   
                               						<input type="text" name="ProductName" placeholder="ชื่อสินค้า" value="<?php echo $ProductName; ?>" />
                                                    <input type="text" name="ProductType" placeholder="ประเภทสินค้า" value="<?php echo $ProductType; ?>" />  
                               						<input type="text" name="ProductPrice" placeholder="ราคาสินค้า" value="<?php echo $ProductPrice; ?>" /> <br><br>
                                                   
                                                        <a href = "product.php?edit=<?php echo $row['ProductID']; ?>"  class ="btn btn-warning" name="edit" >แก้ไข</a>
                                                    
                                                        <button type ="submit" class = "btn btn-primary" name ="update"> Save </button>
                                                    
                                                    <a href = "product.php?delete=<?php echo $row['ProductID']; ?>"  class ="btn btn-danger" >ลบ</a>
                               						
                          						</div>  
                     						</form>  <br>
                						</div>  
                						<?php  
                     						}  
                						}  
                						?>  
                						<div style="clear:both"></div>  
                						<br />  
						</div>
					</div>
				</div>
			</div>
		</section>
	<!-- จบส่วนซื้อสินค้า -->

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