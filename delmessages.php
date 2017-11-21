<?php
	/*
		This script receives the id for a message to be deleted
		and executes the appropriate query to delete from the table.
		
		Redirects back to index.php if the request was made from index,
		or view messages otherwise, which means it was triggered by admin.
	*/
	require_once ("db_info.php");
	if (isset($_POST['delete'])){
		$result = $db->prepare("DELETE FROM messages WHERE msgid=:uid");
		$result->bindValue(":uid", $_POST['token']);
		$result->execute();
	}
	
	
	
	header('Location: ./messageboard.php');



?>