<html>

	<head>
		
		<meta charset="UTF-8">
		<title>SmartCampus - All Events</title>
		
	</head>
	<body class="qFont bg-warning">
		<?php
			$currentPage="events-all";
			include ("../menu.php");
		?>
		<div class="container-fluid bg-warning section-padding">
			<div class="container">
				<?php
					echo "<h1 class=\"h1\"> Events Coming Up</h1>";

					$json = file_get_contents('http://www.uwindsor.ca/event-calendar/all-events.json');

					$jsonArray = (json_decode($json));
				?>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th data-field="tevent"> Event </th> 
								<th 
							</tr>
						</thead>
							<?php
								//Opening tbody tag and filling it with JSON data using foreach loop
								echo "<tbody>";
								foreach ($jsonArray as $jObj){
										echo "<tr>";
										echo "<td>".stripslashes($jObj->stitle)."</td>";
										echo "<td>".$jObj->date_start."</td>";
										echo "</tr>";
								}

								//Closing tbody and table tags
								echo "</tbody>";
								echo "</table>";
							?>
				</div>
			</div>
		</div>
	</body>
</html>
