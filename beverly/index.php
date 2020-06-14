<?php
include("codes.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Beverly Event Management</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>
<body>

	<ul class="slideshow">
		<li><span></span></li>
		<li><span></span></li>
		<li><span></span></li>
		<li><span></span></li>
		<li><span></span></li>
	</ul>

	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-push-5">
						<div class="booking-cta">
							<h1>Make your reservation</h1>
							<p>Welcome to Beverly's Event Management Online Reservation, for inquiries you can kindly email us, Beverly's Host Debuts, Weddings, etc
								you can guarantee a success of your party on us, so what are you waiting for? Book your party with us.
							</p>
						</div>
					</div>
					<div class="col-md-4 col-md-pull-7">
						<div class="booking-form">
							<form method="POST" action="codes.php">
								<div class="form-group">
									<span class="form-label">What kind of event?</span>
									<select class="form-control" name="event" required>
										<option hidden>Choose your event</option>
										<option value="Wedding">Wedding</option>
										<option value="Debut">Debut</option>
										<option value="Silver Anniversary">Silver Anniversary</option>
										<option value="Golden Anniversary">Golden Anniversary</option>
										<option value="60th Birthday">60th Birthday</option>
									</select>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<span class="form-label">When this event will start?</span>
											<input class="form-control" type="date" name="start" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<span class="form-label">Your full name</span>
											<input class="form-control" type="text" name="client_name" placeholder="Lastname, Firstname, Initial" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<span class="form-label">Your active e-mail address</span>
											<input class="form-control" type="email" name="client_email" placeholder="example@gmail.com" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<span class="form-label">Your active mobile number</span>
											<input class="form-control" type="text" name="client_mobile" placeholder="09XXXXXXXXX" required>
										</div>
									</div>
								</div>
								<div class="form-btn">
									<input type="submit" class="submit-btn" value="BOOK MY EVENT" name="booking"></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>

<script type="text/javascript">
  $(document).ready(function() {
    $('.carousel').carousel({interval: 7000});
  });
</script>
