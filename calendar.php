<!doctype html>
<html lang="en">
<head>
	<title>Calendar</title>

	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

	<!-- CLNDR.js things -->
	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<script type="text/javascript" src="./js/underscore.js"></script>
	<script type="text/javascript" src="./js/moment.min.js"></script>
	<script type="text/javascript" src="./js/clndr.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/clndr.css" />

	<style>
		table.clndr-controls {
			text-align: center;
			width: 100%;
		}
		td.clndr-control-button {
			width: 33%;
		}

		td.calendar_day {
			width: 17%;
		}
	</style>
    <script>
        function onSignIn(googleUser) {

            var profile = googleUser.getBasicProfile();
            console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
            console.log('Name: ' + profile.getName());
            console.log('Image URL~: ' + profile.getImageUrl());
            console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
            createCookie("name", profile.getName(), 14);
            createCookie("email", profile.getEmail(), 14);
            showOut();
            //location.reload();
        }

        function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
                console.log('User signed out.');
            });
            eraseCookie("name");
            eraseCookie("email");
            //location.reload();
        }

        function showOut(){
            document.getElementById("out").style.display='block';
            document.getElementById("Welcome").style.display='block';
            document.getElementById("in").style.display='none';
            $('#entryArea').load(document.URL +  ' #entryArea');

        }

        function showIn(){
            document.getElementById("in").style.display='block';
            document.getElementById("out").style.display='none';
            document.getElementById("Welcome").style.display='none';
            $('#entryArea').load(document.URL +  ' #entryArea');
        }
        function createCookie(name, value, days) {
            var expires;
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toGMTString();
            }
            else {
              expires = "";
            }
            document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
        }

        function eraseCookie(name) {
            createCookie(name,"",-1);
        }

    </script>
</head>
<body>
    <?php
       $currentPage="calendar";
    ?>
	<nav class="navbar-full navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<a class="navbar-brand" href="#">SmartCampus</a>-->
                <a class="navbar-brand" href="/index.php"><img src="/assets/images/UWindsor-logo-crest.png" style="width:auto;height:20px;" align="left">&nbsp;&nbsp;SmartCampus</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li <?php if ($currentPage === "home"){ echo "class=\"active\"";} ?> ><a href="/index.php">Home</a></li>
                    <li <?php if ($currentPage === "events-all" || $currentPage === "events-day" || $currentPage === "events-month"){ echo "class=\"active\"";} ?> class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Event Details<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li <?php if ($currentPage === "calendar"){ echo "class=\"active\"";} ?> ><a href="/calendar.php">Events Calendar</a></li>
                            <li <?php if ($currentPage === "events-all"){ echo "class=\"active\"";} ?> ><a href="/events/events-all.php">All Events</a></li>
                            <li <?php if ($currentPage === "events-month"){ echo "class=\"active\"";} ?> ><a href="/events/events-month.php">Monthly</a></li>
                            <li <?php if ($currentPage === "events-day"){ echo "class=\"active\"";} ?> ><a href="/events/events-day.php">Daily</a></li>
                        </ul>
                    </li>
                    <li <?php if ($currentPage === "map"){ echo "class=\"active\"";} ?> ><a href="/campusmap.php">Campus Map</a></li>
                    <li <?php if ($currentPage === "messages"){ echo "class=\"active\"";} ?> ><a href="/messageboard.php">Message Board</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li id="Welcome" style="display: none"></li>
                    <!-- Removed the showOut call when the sign in button is clicked. -->
                    <li id="in" style="display: block;"><div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" data-width="300" data-height="49" data-longtitle="true"></div></li>
                    <li id="out" style="display: none;" onClick="showIn();"><a href="#" onClick="signOut();"><span class="glyphicon glyphicon-log-out"></span> Sign Out</a></li>
                </ul>
            </div>
        </div>
    </nav>

	<div id="full-clndr" class="clearfix">
	<script type="text/template" id="full-clndr-template">
		<table class="clndr-controls">
			<tbody>
				<tr>
					<td class="clndr-control-button clndr-previous-button bg-primary">
						<span>&lt;</span></td>
					<td class="clndr-control-button clndr-today-button current-month bg-primary ">
						<span><%= month %> <%= year %></span></td>
					<td class="clndr-control-button clndr-next-button bg-primary">
						<span>&gt;</span></td>
				</tr>
			</tbody>
		</table>
        <table class="clndr-table table table-striped table-bordered">
             <thead class="bg-info">
                 <tr class="days-of-the-week">
                     <% _.each(daysOfTheWeek, function(day) { %>
                         <td class="header-day"><%= day %></td>
                     <% }); %>
                 </tr>
             </thead>
             <tbody>
             <% for(var wk = 0; wk < numberOfRows; wk++) { %>
                 <tr>
                 <% for(var d = 0; d < 7; d++) { %>
                     <% var d_index = d + wk*7; %>

                     <td class='calendar_day <% days[d_index].classes %>'>
                         <div class='day-num'><%= days[d_index].day %></div>
			        		<ul>
			        		<% _.each(days[d_index].events, function(event) { %>
								<li class="events">
			        				<div class='event_info'>
			        				<a href="<%= event.url  %>">
			        						<div class="event_title"> <%= event.stitle %> </div>
			        					</a>
			        				</div>
								</li>
			        		<% }); %>
			        		</ul>
			        	 </div>
                     </td>
                 <% } %>
                 </tr>
             <% } %>
             </div>
             </tbody>
        </table>
    </script>
	</div>


	<div id="clndr_container" class="container-fluid"></div>
	<div id="errors"></div>
	<noscript>Please enable javascript to be able to view the calendar.</noscript>
</body>
<script>
	$(document).ready(function() {
		// Populate the events
	    var eventsurl="./get_events.php";

	    $.ajax({
	        url: eventsurl,
	        dataType: "json",
	
	        success: function( response ) {
				// Create the calendar with events
				$('#clndr_container').clndr({
					template: $('#full-clndr-template').html(),
					events: response,
					multiDayEvents:  {
						title: 'stitle',
						endDate: 'date_end',
						startDate: 'date_start', 
						location: 'location', 
						url: 'url'
					}
				});
	        },
	        failure: function(request, error) {
				// Something went wrong: Log the error, and create a blank calendar
				$("#errors").html("Error: " + error);
				$('#calendar').clndr({
					template: $('#full-clndr-template').html()
				});

				console.log("Something went wrong/.");
	        }
	    });
	
	    console.log("Done");
	});
	
</script>
</html>
