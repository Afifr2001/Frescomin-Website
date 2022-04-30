<?php
	if(isset($_POST["signup"])){
		
		$username = $_POST["user1"];
		$pwd1 = $_POST["pwd1"];
		$pwd2 = $_POST["pwd2"];
		$profiles = file_get_contents("../json/profiles.json");
		$array = json_decode($profiles, true);
		$condition = false;
		for($i = 0; $i < count($array); $i++){
			if($array[$i]["username"] == $username){
				$condition = true;
			}
		}
		
		if($pwd1 === $pwd2 && $condition == false){
			//$profiles = file_get_contents("profiles.json");
			//$array = json_decode($profiles, true);
			$idd = count($array);
			$rightID = $array[$idd-1]["id"] + 1;
			$array[$idd]["id"] = $rightID;
			$array[$idd]["username"] = $username;
			$array[$idd]["password"] = $pwd1;
			$array2 = json_encode($array);
			file_put_contents('profiles.json', $array2);
			$orders = file_get_contents("orders.json");
			$array5 = json_decode($orders, true);
			$iddd = count($array5);
			$array5[$iddd]["id"] = $rightID;
			$array5[$iddd]["cart"] = [];
			$array6 = json_encode($array5,JSON_UNESCAPED_SLASHES);
			file_put_contents('orders.json', $array6);
			//need t ocreate new order
			header("location: ../index.php");
		}
		else if($condition == true){
			header("location: ./SignUpPage.php?error=username");
		}
		else if($pwd1 !== $pwd2){
			header("location: ./SignUpPage.php?error=password");
		}
	}
?>