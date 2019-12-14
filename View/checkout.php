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
	</style>
	
</head>

<body>
<!-- <?php echo $STRING;
// echo "<br>";
// echo $pos1." ".$pos2." ".$pos3;
echo "<br>";
echo $idChuyenBay;
echo "<br>";
echo $idVe;
echo "<br>";
echo $ngayBay;
echo "<br>";
echo $pos3."-".$test."-". strlen($STRING);
?> -->
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-4" style="padding-top: 100px;">
						<div class="booking-cta">
							<h1>BOOK YOUR FLIGHT TODAY</h1>
							<p>Cloud Airline is pleased to serve you</p>
						</div>
					</div>
					<div class="clock" style="margin:2em;"></div>
					<div class="message"></div>
					<div class="col-md-7 col-md-offset-1">
						<div class="booking-form">
							<form action="?checked=true" method="post">
								<!-- <div class="form-group"> -->
									
								<!-- </div> -->
								<div class="form-group">
									<div class="form-checkbox">
										<label for="one-way">
											<input type="radio" id="one-way" name="flight-type" checked onclick="TwoWay()">
											<span></span>One-way
										</label>
										<label for="two-way">
											<input type="radio" id="two-way" name="flight-type" onclick="TwoWay()">
											<span></span>Two-way
										</label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Flying from</span>
											<input class="form-control" type="text" placeholder="City or airport" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Flyning to</span>
											<input class="form-control" type="text" placeholder="City or airport" required>
										</div>
									</div>
								</div>
								<div class="form-btn">
									<button class="submit-btn">Show flights</button>
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
<script type="text/javascript" src="View/Resources/js/script.js"></script>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>