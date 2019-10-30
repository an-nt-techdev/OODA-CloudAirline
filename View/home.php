<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Cloud Airline</title>

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

</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="booking-cta">
							<h1 style="padding-top: 100px;">Welcome to Cloud Airline</h1>
							<p>Cloud Airline is pleased to serve you</p>
						</div>
					</div>

					<div class="col-md-7 col-md-offset-1" style="margin-bottom: 30px;">
						<div class="booking-form">
							<form action="" method="post">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<span class="form-label">Ticket Code</span>
											<input class="form-control" type="text" placeholder="Your ticket code">
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
							<form action="" method="post">
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