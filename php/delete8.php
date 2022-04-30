<?php
	
	session_start();
	if ($_SESSION["admin"] !== "admin"){
		header("location: ../index.php");
	}
	
	
	if(isset($_POST['delet'])){
			$code = $_POST['del'];
			$products = file_get_contents('../json/products.json');
			$array = json_decode($products, true);
			$oldNAME = "";
			for($i = 0; $i < count($array); $i++){
				if($array[$i]['code'] === $code){
					$oldNAME = $array[$i]['name'];
					unset($array[$i]);
					$array = array_values($array);
					break;
				}
			}
			$array2 = json_encode($array,JSON_UNESCAPED_SLASHES);
			file_put_contents('../json/products.json', $array2);
			
			
			$orders = file_get_contents('../json/orders.json');
			$array5 = json_decode($orders, true);
			for($j = 0; $j < count($array5) ; $j++){
				for($k = 0; $k < count($array5[$j]["cart"]); $k++){
					if($array5[$j]["cart"][$k]["title"] === $oldNAME){
						unset($array5[$j]["cart"][$k]);
						$array5[$j]["cart"] = array_values($array5[$j]["cart"]);
					}
				}
			}
			$array6 = json_encode($array5,JSON_UNESCAPED_SLASHES);
			file_put_contents('../json/orders.json', $array6);
			
			
			$_SESSION["admin"] = "admin";
			header("location: ./page7.php");
	}
?>