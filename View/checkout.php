<!DOCTYPE html>
<html lang="en">

<head>

	<?php
		require_once SITE_ROOT."/View/Layout/loadCSS.php";
	?>

	<style>
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
			/* display: none; <- Crashes Chrome on hover */
			-webkit-appearance: none;
			margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
		}

		input[type=number] {
			-moz-appearance:textfield; /* Firefox */
		}
		.paymentWrap {
			padding: 50px;
		}

		.paymentWrap .paymentBtnGroup {
			max-width: 800px;
			margin: auto;
		}

		.paymentWrap .paymentBtnGroup .paymentMethod {
			padding: 40px;
			box-shadow: none;
			position: relative;
		}

		.paymentWrap .paymentBtnGroup .paymentMethod.active {
			outline: none !important;
		}

		.paymentWrap .paymentBtnGroup .paymentMethod.active .method {
			border-color: #4cd264;
			outline: none !important;
			box-shadow: 0px 3px 22px 0px #7b7b7b;
		}

		.paymentWrap .paymentBtnGroup .paymentMethod .method {
			position: absolute;
			right: 3px;
			top: 3px;
			bottom: 3px;
			left: 3px;
			background-size: contain;
			background-position: center;
			background-repeat: no-repeat;
			border: 2px solid transparent;
			transition: all 0.5s;
		}

		.paymentWrap .paymentBtnGroup .paymentMethod .method.visa {
			background-image: url("https://image.theleader.vn/upload/quangminh/2018/12/11/GHN.jpg");
		}

		.paymentWrap .paymentBtnGroup .paymentMethod .method.master-card {
			background-image: url("https://img.freepik.com/free-vector/hand-giving-money-other-hand_23-2147505626.jpg?size=338&ext=jpg");
		}

		.paymentWrap .paymentBtnGroup .paymentMethod .method:hover {
			border-color: #4cd264;
			outline: none !important;
		}
	</style>
	
</head>

<body>
<?php 
	$Ve = $bkModel->getVeById($_SESSION['id']); 
	if ($Ve->getLoaiVe() === "hard") $LoaiVe = "Business Ticket";
	else if ($Ve->getLoaiVe() === "medium") $LoaiVe = "Basic Ticket";
	else if ($Ve->getLoaiVe() === "normal") $LoaiVe = "Saving Ticket";
?>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-4" style="padding-top: 100px;">
						<div class="booking-cta">
							<h1><b><i>Checkout</i> &#9745</b></h1>
							<p>Cloud Airline is pleased to serve you</p>
						</div>
					</div>
					<div class="clock" style="margin:2em;"></div>
					<div class="message"></div>
					<div class="col-md-9 col-md-offset-1">
						<div class="booking-form">
							<form action="?checking=on" method="post">
								<div class="row">
									<div class="col-md-6">
										<div class="paymentCont">
											<div class="headingWrap">
													<h3 class="headingTop text-center">Select Your Payment Method</h3>	
											</div>
											<list class="paymentWrap">

												<div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
													<label class="btn paymentMethod">
														<div class="method visa" onclick="change(1)" id="1"></div>
														<input type="radio" name="options"id="11" required> 
													</label>
													<label class="btn paymentMethod">
														<div class="method master-card" id="2"  onclick="change(2)"></div>
														<input type="radio" name="options" id="22" required> 
													</label>
												</div>        
											</list>
										</div>
										<br>
										<lable title="required" for="email">Your Email(*): </lable>
										<input placeholder="Fill Your Email" type="email" name="email" required>	
									
									</div>
									<div class="col-md-6">
										<h4>Ticket Infomation (Core)</h4>
										<ul class="list-group">
											<li class="list-group-item">Your Name: <span class="badge"><?php echo $Ve->getTenKhachHang();?></span></li>
											<li class="list-group-item">Your Address: <span class="badge"><?php echo $Ve->getDiaChiKhachHang(); ?></span></li>
											<li class="list-group-item">Ticket Type: <span class="badge"><?php if ($Ve->getKieuVe() == 0) echo "One-way "; else echo "Two-way " ?><?php echo $LoaiVe?></span></li>
											
										</ul>
										<h3>Total: <?php if($Ve->getKieuVe() == 0) echo number_format($PRICE); else echo number_format($PRICE*2) ?> VND</h3>
									</div>
								</div>
								<input type="text" name="method" id="method" hidden>
								<br>
								<div class="form-btn">
									<button class="submit-btn">Checkout</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="Resources/FlipClock-master/compiled/flipclock.js"></script>	
<script type="text/javascript">
	var clock;
	$(document).ready(function() {
		clock = $('.clock').FlipClock(30*60, {
			clockFace: 'MinuteCounter',
			countdown: true,
			callbacks: {
				stop: function() {
					$('.message').html('The clock has stopped!');
				}
			}
		});
	});	
</script>
<script>
	function change(number){
		if(number==1){
			document.getElementById(2).style.borderColor="white";
			document.getElementById("method").value=1;
			document.getElementById("11").checked = true;
		}
		else{
			document.getElementById(1).style.borderColor="white";
			document.getElementById("method").value=2;
			document.getElementById("2").checked = true;
		}
		document.getElementById(number).style.borderColor="#4cd264";
	}
	function messPopup(result){
		confirm("wtf");
	}
</script>
<script type="text/javascript" src="View/Resources/js/script.js"></script>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>