<!DOCTYPE html>

<html>
	<head>
		
		<meta charset="UTF-8">
		<title>SmartCampus - Home</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		
		<script>
		/*
			Check scroll is always called after the body loads to ensure
			if there is overflow in the messages, that the scroll bar is always scrolled to the bottom.
		
		*/
		function checkScroll(){
			$('.sc').scrollTop($('.sc')[0].scrollHeight);
		}
		
		/*
			Form validation to make sure that when the user submits a message,
			it contains at least one character. If not, alert the user and set the 
			border colour to red.
		
		*/
		function validateForm() {
			var x = document.getElementById("msgtext").value;
					
					
			if (!x){
				alert ("Please enter a message before hitting send.");
				document.getElementById("msgtext").style.borderColor = "red";
				return false;
				
			}
		
		
			return true;
		}
		
	</script>
		
	</head>
	<body style="background-color:#fcf8e3;" onload="checkScroll()">
		<?php
			$currentPage="messages";
			include ("menu.php");
		?>
<div id="msgBoard">
	<div class="sc" style="height:90%;overflow:auto;">
	<?php
		require_once ("db_info.php");
		$stmt = $db->prepare("SELECT * FROM messages");
		$result;
		echo "<table id='tableID' style='width: 100%'>";
		echo "<tbody>";
		
		//Query the message table and display all messages.
		if ($stmt->execute()){
			
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				if (isset($_COOKIE['email'])){
					if ($_COOKIE['email'] == $row['username'])
						echo "<tr><td class='rightmsg' align='right'><b>Me: </b>" . trim(strip_tags($row['msg'])) . "<form style='display:inline' class='del' action='delmessages.php' method='post'>
																									<input id='del' type='submit' name='delete' value='Delete' /></td>
																									<input type='hidden' name='token' value='{$row['msgid']}'/>
																									<input type='hidden' name='isIndex' value='Yes'/>
																									</form></td></tr>";
					else
						echo "<tr><td class='leftmsg'><b>" . $row['username'] . "</b>: " . trim(strip_tags($row['msg'])) . "</td></tr>";
				}
				else
					echo "<tr><td class='leftmsg'><b>" . $row['username'] . "</b>: " . trim(strip_tags($row['msg'])) . "</td></tr>";
				
		
			}
		}	
		echo "</tbody>";
		echo "</table>";
		
	
	?>
	</div>
	<p class='error'></p>
	
	<div id="entryArea">
	<?php
	//If the user is logged in, they can submit messages. Therefore show the input form.
	if (isset($_COOKIE['name'])){
		echo "
			<form action='insertmessage.php' method='POST' name='sub' onsubmit='return validateForm()'>
				<input type='text' name='subtext' id='msgtext' placeholder='Message' autofocus />
				<input type='Submit' name='Button' id='submitmsg' value='Send' />
			</form>
		";
	}
	else{
		echo "<p id='msgsign'>Log in to be able to post a message!</p>";
	}
	?>
	</div>
</div>
		
		
		
		
	</body>
	
</html>