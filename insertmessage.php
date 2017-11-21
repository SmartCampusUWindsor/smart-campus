<?php
		
		/*
			This script is triggered when a new message is being sent to the message board.
			Before any SQL, we verify that the message contains at least one character. 
			If so, we enter the message and its sender into the message user base.
			
			We then pull the email of every user that IS NOT the sender,
			and generate an email notification that someone has posted to the message board,
			and include a link to view.
			
			Redirect back to index.php.
		*/
		
		require_once ("db_info.php");
		session_start();
		if (isset($_POST['subtext'])){
			$Entry = $_POST['subtext'];
			if (strlen($Entry) >= 1){
				$add_stmt = $db->prepare("INSERT INTO messages (msg, username) VALUES (:mess, :name)");
				$add_stmt->bindValue(":mess",$Entry);
				$add_stmt->bindValue(":name", $_COOKIE['email']);
				$add_stmt->execute();
				
				$add_stmt = $db->prepare("SELECT email FROM users WHERE user_name !=:uid");
				$add_stmt->bindValue(":uid",$_SESSION['name']);
				$add_stmt->execute();

				
				
			}
		}
			
		
		header('Location: ./messageboard.php');
?>