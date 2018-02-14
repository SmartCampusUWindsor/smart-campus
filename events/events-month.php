<html>

	<head>
		
		<meta charset="UTF-8">
		<title>SmartCampus - Events This Month</title>
		
	</head>
	<body class="qFont bg-warning">
		<?php
			$currentPage="events-month";
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
								
								//getting current date for comparison to json
								date_default_timezone_set('EST');
								$date = date("y-m-");
								
								foreach ($jsonArray as $jObj){
									if (strpos($jObj->date_start, $date) !== false)
									{
										echo "<tr>";
										echo "<td>".stripslashes($jObj->stitle)."</td>";
										echo "<td>".$jObj->date_start."</td>";
										echo "</tr>";
									}
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
