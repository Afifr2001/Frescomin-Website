<?php
	session_start();

	if(isset($_POST["submit"])){
		$newt = $_POST["hom"];
		$newt = json_decode($newt);
		$orders = file_get_contents("../json/orders.json");
		$array2 = json_decode($orders, true);
		//find which id
		for($i = 0; $i < count($array2); $i++){
			if($array2[$i]["id"]===$_SESSION["userid"]){
				$array2[$i]['cart']= $newt;
				$array3 = json_encode($array2);
				break;
			}
		}
		//$array2[$_SESSION["userid"]]['cart']= $newt;
		//$array3 = json_encode($array2);
		file_put_contents('../json/orders.json', $array3);
		//session_unset();
		//session_destroy();
		session_unset();
		session_destroy();
		header("location: ../index.php");
		exit();
	}
?>