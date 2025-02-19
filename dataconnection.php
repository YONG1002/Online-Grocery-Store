<?php

$connect= mysqli_connect("localhost","root","","online_grocery_store");// fill out database name

if(!$connect)
{
	echo"not connected to database";
}
?>
