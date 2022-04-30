<?php
	
	if(isset($_POST["login"])){
	
		$username = $_POST["user"];
		$pwd = $_POST["pwd"];
	
		$profiles = file_get_contents("../json/profiles.json");
		$array = json_decode($profiles, true);
		
		for($i = 0; $i < count($array); $i++){
			
			if($username === "Admin" && $pwd === "Admin"){
				session_start();
				$_SESSION["admin"] = "admin";
				header("location: ./page7.php");
				break;
			}
			
			if($array[$i]["username"] === $username && $array[$i]["password"]=== $pwd){
				session_start();
				$_SESSION["userid"] = $array[$i]["id"];
				$_SESSION["username"] = $array[$i]["username"];
				header("location: ../index.php");
				break;
			}
			else{
				header("location: ./LoginPage.php?error=wrong");
			}
		}
		
	}
?>