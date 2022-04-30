<?php
	if(isset($_POST["amaz"])){
		session_start();
		if(isset($_SESSION["userid"])){
			//session_start();
			
			
			
			
			$newt = $_POST["late"];
		//	$newt = json_decode($newt);
		//	$orders = file_get_contents("orders.json");
		//	$array22 = json_decode($orders, true);
		//find which id
		//	for($i = 0; $i < count($array22); $i++){
			//	if($array22[$i]["id"]===$_SESSION["userid"]){
			//		$array22[$i]['cart']= $newt;
			//		$array33 = json_encode($array22);
		//			break;
			//	}
		//	}
		//	file_put_contents('orders.json', $array33);
			
			
			

			
			
			
			
			//$order = $_POST["buy"];
			$order = json_decode($newt);
			$realorders = file_get_contents("../json/realorders.json");
			$array = json_decode($realorders, true);
			$which = count($array);
			$array[$which]["id"] = $_SESSION["userid"];
			$array[$which]["cart"] = $order;
			$array2= json_encode($array,JSON_UNESCAPED_SLASHES);
			file_put_contents('../json/realorders.json', $array2);
			
			
			
			
			
			
			
			header("location: ../index.php");
		}
		else{
			//session_destroy();
			header("location: ../index.php");
		}
	}
?>