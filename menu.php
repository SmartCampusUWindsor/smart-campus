<?php
/*  Note - Use a "/" to begin the reference to each link. 
 *  This allows the file to be pulled relative to the web server's root directory
 *  This is useful for calling the menu even with php files in subfolders
 */
?>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-signin-client_id" content="803315098158-ssu7hppidb2s9cvkbgemoh9a2a4vi8um.apps.googleusercontent.com">

	<!--Bootstrap CSS and JavaScript-->
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
	
	<!--Google Log In API script-->
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	
	<!--Questrial google font link-->
	<link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
	
	<!--Extra CSS added by students in CS on top of Bootstrap CSS-->
	<link rel="stylesheet" href="/css/custom-styles.css">
	
	<script>
		function onSignIn(googleUser) {

			var profile = googleUser.getBasicProfile();
			console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
			console.log('Name: ' + profile.getName());
			console.log('Image URL: ' + profile.getImageUrl());
			console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
			showOut();
		}
			
		function signOut() {
			var auth2 = gapi.auth2.getAuthInstance();
			auth2.signOut().then(function () {
				console.log('User signed out.');
			});
		}

		function showOut(){
			document.getElementById("out").style.display='block';
			document.getElementById("Welcome").style.display='block';
			document.getElementById("in").style.display='none';
		}
			
		function showIn(){
			document.getElementById("in").style.display='block';
			document.getElementById("out").style.display='none';
			document.getElementById("Welcome").style.display='none';
		}
	</script>

</head>
<body>
	<nav class="navbar-full navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<!--<a class="navbar-brand" href="#">SmartCampus</a>-->
				<a class="navbar-brand" href="./index.php"><img src="/assets/images/UWindsor-logo-crest.png" style="width:auto;height:20px;" align="left">&nbsp;&nbsp;SmartCampus</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li <?php if ($currentPage === "home"){ echo "class=\"active\"";} ?> ><a href="/index.php">Home</a></li>
					<li <?php if ($currentPage === "events-all" || $currentPage === "events-day" || $currentPage === "events-month"){ echo "class=\"active\"";} ?> class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Event Details<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li <?php if ($currentPage === "events-all"){ echo "class=\"active\"";} ?> ><a href="/events/events-all.php">All Events</a></li>
							<li <?php if ($currentPage === "events-month"){ echo "class=\"active\"";} ?> ><a href="/events/events-month.php">Monthly</a></li>
							<li <?php if ($currentPage === "events-day"){ echo "class=\"active\"";} ?> ><a href="/events/events-day.php">Daily</a></li>
						</ul>
					</li>
					<li <?php if ($currentPage === "map"){ echo "class=\"active\"";} ?> ><a href="/campusmap.php">Campus Map</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li id="in" style="display: block;" onClick="showOut();"><div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" data-width="300" data-height="49" data-longtitle="true"></div></li>
					<li id="out" style="display: none;" onClick="showIn();"><a href="#" onClick="signOut();"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
				</ul>
			</div>
		</div>
	</nav>
</body> 
											