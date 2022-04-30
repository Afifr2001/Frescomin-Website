<?php
	
	if(isset($_SESSION["userid"])){
		echo "<script>";
		$orders = file_get_contents("../json/orders.json");
		$array2 = json_decode($orders, true);
		$array3;
		for($i = 0; $i < count($array2); $i++){
			if($array2[$i]["id"] === $_SESSION["userid"]){
				//echo "alert('hi');";
				$array3 = json_encode($array2[$i]["cart"]);
				break;
			}
		}
		//find which id
		//$array3 = json_encode($array2[$_SESSION["userid"]]["cart"]);
		echo "localStorage.setItem('cart',JSON.stringify(" . $array3 . "));";
		echo "</script>";
	}
	else{
		echo "<script>";
		$orders1 = file_get_contents("../json/noCart.json");
		$array21 = json_decode($orders1, true);
		$array31 = json_encode($array21[0]);
		echo "localStorage.setItem('cart',JSON.stringify(" . $array31 . "));";
		echo "</script>";
	}
?>