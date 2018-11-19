<?php
date_default_timezone_set("Asia/Singapore");

//this file manages all the db connections
$user = 'root'; 
$pw = '';         // No password for localhost
$database       = 'awards_tracker'; 

$hostname = '127.0.0.1';

$dblink = new mysqli($hostname,$user,$pw,$database);
if ($dblink->connect_error) {
    die("Connection failed: " . $dblink->connect_error);
}

//$link = mysql_connect($HOST,$USERNAME,$PASSWORD);
//
//
//$db_selected = mysql_select_db('awards_tracker', $link);
//if (!$db_selected) {
//    die ('Can\'t use awards_tracker : ' . mysql_error());
//}


//$link = mysqli_connect($HOST,$USERNAME,$PASSWORD,$DB) or die(mysqli_connect_error());
//if (!$link) {
//    die(mysqli_error($link));
//}
?>
