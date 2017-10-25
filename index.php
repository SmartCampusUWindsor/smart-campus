<!DOCTYPE html>

<html>
	<head>
		
		<meta charset="UTF-8">
		<title>SmartCampus - Home</title>
		
	</head>
	<body class="qFont bg-warning">
		<?php
	   $currentPage="home";
	   include ("menu.php");
		?>
		<div class="container-fluid bg-warning section-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-2">
						<h1 class="text-info">Welcome to <br /> SmartCampus</h1>
						<p>
							Welcome to UWindsor SmartCampus. A place where you can find the most pertinent info for current students. 
							On this website you'll find a page with all of the events on campus, a campus map to help you get around, and other information to help make your student life easier.
						</p>
					</div>
					<div class="col-md-4">
						<img src="./assets/images/UWindsor-logo-crest.png"></img>
					</div>
				</div>	
			</div>
		</div>
		<div class="container-fluid bg-info section-padding">
			<div class="container">
				<div class="row section-padding bg-info">
					<h1 class="text-info text-center">Important Links</h1>
				
					<div class="col-md-4 col-md-offset-2">
						<img src="./assets/images/UWindsor-logo.png" class="img-responsive img-rounded"></img>
					</div>
					<div class="col-md-4">
						UWindsor SmartCampus is intended for current students! If you're looking for other information about the school,
						programs offered, classes, or anything else of that nature, please head over to <a href="http://www.uwindsor.ca/">the official University of Windsor homepage</a>.
					</div>
				</div>
				<div class="row section-padding bg-warning">
					<div class="col-md-4 col-md-offset-2">
						Looking for official transcripts, final grades, exam locations, or other information from the Office of the Registrar?
						Then head over to <a href="https://www.uwindsor.ca/sis">the UWindsor Student Information System</a> where you can find the latest official information relating to your courses.
					</div>
					<div class="col-md-4">
						<img src="./assets/images/sisUwindsor.jpg" class="img-responsive img-rounded"></img>
					</div>
				</div>
				<div class="row section-padding bg-info">
					<div class="col-md-4 col-md-offset-2">
						<img src="./assets/images/myUwindsor.png" class="img-responsive img-rounded"></img>
					</div>
					<div class="col-md-4">
						Are you currently enrolled and want to know more about what courses are available in the coming semester? Or maybe you're looking for financial, academic, or registration related information?
						If you want to know more about any of these, you should follow the link to <a href="https://my.uwindsor.ca/">MyUWindsor</a>.
					</div>
				</div>
			</div>
		</div>
	</body>
</html>