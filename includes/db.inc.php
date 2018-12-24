<?php
define("DB_HOST","localhost");
define("DB_USERNAME","root");
define("DB_PASS","");
define("DB_NAME","ithub");
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASS,DB_NAME);
if(!$conn)
{
	die("Connetion Failed: ".mysqli_connect_error());
}