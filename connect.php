<?php
if (!@mysql_connect('localhost', 'root', '')) {
	
	echo "error while connecting to server: ".mysql_error();
	
	exit;
	
} 
if(!@mysql_select_db('module')) {
	
	echo "erroe while selecting database: ".mysql_error();
	
	exit;
}

?>