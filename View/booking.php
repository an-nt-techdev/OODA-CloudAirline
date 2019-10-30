<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Cloud Airline Booking</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="View/Resources/css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="View/Resources/css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

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
					<div class="col-md-4">
						<div class="booking-cta">
							<h1>BOOK YOUR FLIGHT TODAY</h1>
							<p>Cloud Airline is pleased to serve you</p>
						</div>
					</div>
					<div class="col-md-7 col-md-offset-1">
						<div class="booking-form">
							<form>
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
											<input class="form-control" type="text" placeholder="City or airport">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Flyning to</span>
											<input class="form-control" type="text" placeholder="City or airport">
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
											<input class="form-control" type="text" placeholder="Your full name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Your Identity card</span>
											<input class="form-control" type="number" placeholder="Your Identity card">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Your Phone Number</span>
											<input class="form-control" type="number" placeholder="Your phone number">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Your Address</span>
											<input class="form-control" type="text" placeholder="Your address">
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