<?php
	//session_start();
	
	if(isset($_SESSION["userid"])){
		echo "<ul class='secondary-nav'>";
		echo "	<li> <a>" . $_SESSION["username"] . "</a></li>";
		echo " 	<li id='hum' class='SignIn'><a href='#'>Log Out</a></li>";
		echo "</ul>";
	}
	else{
		echo "<ul class='secondary-nav'>";
		echo "	<li><a href='#bottom'>More Info</a></li>";
		echo " 	<li class='SignIn'><a href='#' onclick=\"myFunc()\">Sign In</a></li>";
		echo "</ul>";
	}
?>