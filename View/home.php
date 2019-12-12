<!DOCTYPE html>
<html lang="en">

<head>
	
	<?php
		require_once SITE_ROOT."/View/Layout/loadCSS.php";
	?>

</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="booking-cta">
							<h1>Welcome to Cloud Airline</h1>
							<p>Cloud Airline is pleased to serve you</p>
						</div>
					</div>

					<div class="col-md-7 col-md-offset-1" style="margin-bottom: 30px;">
						<div class="booking-form">
							<form action="?checking=on" method="post">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<span class="form-label">Ticket Code</span>
											<input class="form-control" type="text" name="ticket-code" placeholder="Your ticket code" required>
										</div>
									</div>
									<div class="col-md-12">
										<input type="hidden" name="checking" value="yes">
										<div class="form-btn">
											<button class="submit-btn">Checking ticket</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>

					<div class="col-md-7 col-md-offset-1">
						<div class="booking-form" style="background: none; padding: 0; margin-top: 30px;">
							<form action="?booking=on" method="post">
								<input type="hidden" name="booking" value="yes">
								<div class="form-btn">
									<button class="submit-btn">Booking ticket</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<script type="text/javascript" src="View/Resources/js/script.js"></script>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>