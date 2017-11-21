<?php
//open db
$db = new PDO('mysql:host=localhost;dbname=bento_journal', 'bento_user', 'jfR7T0Bm');
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

/*

TABLE STRUCTURE
-------------------------------------------------------------------------------	


	
CREATE TABLE `entries` (
 `logid` int(11) NOT NULL AUTO_INCREMENT,
 `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `log` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
 `userid` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
 `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`logid`)
) ;


	
CREATE TABLE `users` (
 `user_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
 `create_date` datetime DEFAULT NULL,
 `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
 `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `street` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
 `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
 `prov` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
 `postalcode` char(7) COLLATE utf8_unicode_ci DEFAULT NULL,
 `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
 `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 `isAdmin` int(11) NOT NULL,
 PRIMARY KEY (`user_name`)
) ;

CREATE TABLE `messages` (
 `msgid` int(11) NOT NULL AUTO_INCREMENT,
 `msg` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
 `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
 `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`msgid`)
);


*/
?>

