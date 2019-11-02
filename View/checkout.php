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
					<div class="col-md-7 col-md-offset-1">
						<div class="booking-form">
							<form action="?checked=true" method="post">
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
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Departing</span>
											<input class="form-control" type="date" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Returning</span>
											<input class="form-control" type="date" id="returning" required disabled>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<span class="form-label">Adults (18+)</span>
											<select class="form-control">
												<?php 
													for ($i=1; $i<=100; $i++)
													{
														echo "<option id='".$i."' value='".$i."'>".$i."</option>";
													}
												?>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<span class="form-label">Children (0-17)</span>
											<select class="form-control">
												<?php 
													for ($i=0; $i<=100; $i++)
													{
														echo "<option id='".$i."' value='".$i."'>".$i."</option>";
													}
												?>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<span class="form-label">Ticket type</span>
											<select class="form-control">
												<option>Basic ticket</option>
												<option>Business ticket</option>
												<option>First class ticket</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Your Name</span>
											<input class="form-control" type="text" placeholder="Your full name" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Your Identity card</span>
											<input class="form-control" type="number" placeholder="Your Identity card" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Your Phone Number</span>
											<input class="form-control" type="number" placeholder="Your phone number" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Your Address</span>
											<input class="form-control" type="text" placeholder="Your address" required>
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

<script type="text/javascript" src="View/Resources/js/script.js"></script>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>