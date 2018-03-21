<?php
// Fetch the contents of the uwindsor event page
// 
// Future work: Cache the result of the page, and only fetch it if the 
// timestamp is larger than a certain time interval
$json = file_get_contents('http://www.uwindsor.ca/event-calendar/all-events.json');
echo $json;
?>
