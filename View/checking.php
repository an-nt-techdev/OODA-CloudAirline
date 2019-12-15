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
		.alert {
		padding: 20px;
		background-color: #f44336;
		color: white;
		opacity: 1;
		transition: opacity 0.6s;
		margin-bottom: 15px;
		}

		.alert.success {background-color: #4CAF50;}
		.alert.info {background-color: #2196F3;}
		.alert.warning {background-color: #ff9800;}

		.closebtn {
		margin-left: 15px;
		color: white;
		font-weight: bold;
		float: right;
		font-size: 22px;
		line-height: 20px;
		cursor: pointer;
		transition: 0.3s;
		}

		.closebtn:hover {
		color: black;
		}	
	</style>

</head>

		<?php 
			$Ve = $bkModel->getVeById($code);
			$trangThaiVe=$bkModel->getTrangThaiVeById($code); 
			$tmpSanBay = $bkModel->getSanBayById($Ve->getDiemDi());
			$DiemDi = $tmpSanBay->getTenThanhPho();
			$tmpSanBay = $bkModel->getSanBayById($Ve->getDiemDen());
			$DiemDen = $tmpSanBay->getTenThanhPho();
			if ($Ve->getLoaiVe() === "hard") $LoaiVe = "Business Ticket";
			else if ($Ve->getLoaiVe() === "medium") $LoaiVe = "Basic Ticket";
			else if ($Ve->getLoaiVe() === "normal") $LoaiVe = "Saving Ticket";

			$GheBay = $bkModel->loadGheBayByIdVe($code);
			if ($Ve->getKieuVe() == 0)
			{
				$kq1 = "";
				for ($i = 0; $i < count($GheBay)-1; $i++) $kq1 = $kq1.$GheBay[$i]->getGhe().", ";
				$kq1 = $kq1.$GheBay[$i]->getGhe();
			}
			else 
			{
				$kq1 = "";
				for ($i = 0; $i < (count($GheBay)+1)/2 - 2; $i++) $kq1 = $kq1.$GheBay[$i]->getGhe().", ";
				$kq1 = $kq1.$GheBay[$i]->getGhe();
				$kq2 = "";
				for ($i = (count($GheBay)+1)/2; $i < count($GheBay)-1; $i++) $kq2 = $kq2.$GheBay[$i]->getGhe().", ";
				$kq2 = $kq2.$GheBay[$i]->getGhe();
			}
		?>

<body>
<?php
if(isset($_SESSION['id'])){
	echo "<div class='alert success'><span class='closebtn'>&times;</span><strong>Success!</strong>We have sent your ticket code to".$trangThaiVe->getEmail()."</div>";
}
?>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-4" style="padding-top: 100px;">
						<div class="booking-cta">
							<h1>YOUR TICKET</h1>
							<p>Cloud Airline is pleased to serve you</p>
						</div>
					</div>
					<div class="col-md-7 col-md-offset-1">
						<div class="booking-form" style="padding-top: 25px;">
							<form action="" method="get">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Ticket ID</span>
											<input class="form-control" type="text" placeholder="City or airport" value="<?php echo $Ve->getId(); ?>" disabled required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Ticket status</span>
											<input class="form-control" type="text" placeholder="City or airport" value="<?php echo $trangThaiVe->getTrangThai()?>" disabled>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Flying from</span>
											<input class="form-control" type="text" placeholder="City or airport" value="<?php echo $DiemDi; ?>" disabled required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Flyning to</span>
											<input class="form-control" type="text" placeholder="City or airport" value="<?php echo $DiemDen; ?>" disabled required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<span class="form-label">Departing</span>
											<input class="form-control" type="date" value="<?php echo $Ve->getNgayDi1(); ?>" disabled required>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<span class="form-label">Returning</span>
											<input class="form-control" type="date" value="<?php if ($Ve->getKieuVe() == 1) echo $Ve->getNgayDi2(); ?>" disabled>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<span class="form-label">Ticket way</span>
											<input class="form-control" type="text" placeholder="one way" value="<?php if ($Ve->getKieuVe() == 0) echo "One-way"; else echo "Two-way" ?>" disabled required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<span class="form-label">Adults (18+)</span>
											<input class="form-control" type="number" placeholder="Your Identity card" value="<?php echo $Ve->getNguoiLon(); ?>" disabled required>										
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<span class="form-label">Children (0-17)</span>
											<input class="form-control" type="number" placeholder="Your Identity card" value="<?php echo $Ve->getTreEm(); ?>" disabled required>											
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<span class="form-label">Ticket type</span>
											<input class="form-control" type="text" placeholder="Your Identity card" value="<?php echo $LoaiVe; ?>" disabled required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Your Name</span>
											<input class="form-control" type="text" placeholder="Your full name" value="<?php echo $Ve->getTenKhachHang(); ?>" disabled required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Your Identity card</span>
											<input class="form-control" type="number" placeholder="Your Identity card" value="<?php echo $Ve->getCmndKhachHang(); ?>" disabled required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Your Phone Number</span>
											<input class="form-control" type="number" placeholder="Your phone number" value="<?php echo $Ve->getSdtKhachHang(); ?>" disabled required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Your Address</span>
											<input class="form-control" type="text" placeholder="Your address" value="<?php echo $Ve->getDiaChiKhachHang(); ?>" disabled required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<span class="form-label">Flight ID</span>
											<input class="form-control" type="text" placeholder="Fly ID" value="<?php echo $GheBay[0]->getIdChuyenBay(); ?>" disabled required>
										</div>
									</div>
									<div class="col-md-9">
										<div class="form-group">
											<span class="form-label">Your Seats</span>
											<input class="form-control" type="text" placeholder="seats" value="<?php echo $kq1; ?>" disabled required>
										</div>
									</div>
								</div>
								<?php if ($Ve->getKieuVe() == 1){ ?>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<span class="form-label">Flight ID</span>
											<input class="form-control" type="text" placeholder="Fly ID" value="<?php echo $GheBay[Count($GheBay)-1]->getIdChuyenBay(); ?>" disabled required>
										</div>
									</div>
									<div class="col-md-9">
										<div class="form-group">
											<span class="form-label">Your Seats</span>
											<input class="form-control" type="text" placeholder="seats" value="<?php echo $kq2; ?>" disabled required>
										</div>
									</div>
								</div>
								<?php }?>
								<div class="form-btn">
									<button class="submit-btn">Back</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>
<script type="text/javascript" src="View/Resources/js/script.js"></script>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>