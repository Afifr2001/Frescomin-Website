<?php
	
	session_start();
	if ($_SESSION["admin"] !== "admin"){
		header("location: ../index.php");
	}
	
	if(isset($_POST['delet'])){
			$id = $_POST['del'];
			$profiles = file_get_contents('../json/profiles.json');
			$array = json_decode($profiles, true);
			$id = intval($id);
			for($i = 0; $i < count($array); $i++){
				if($array[$i]['id'] === $id){
					unset($array[$i]);
					$array = array_values($array);
					break;
				}
			}
			$array2 = json_encode($array,JSON_UNESCAPED_SLASHES);
			file_put_contents('../json/profiles.json', $array2);
			
			
			$orders = file_get_contents('../json/orders.json');
			$array5 = json_decode($orders, true);
			$id = intval($id);
			for($i = 0; $i < count($array5); $i++){
				if($array5[$i]['id'] === $id){
					unset($array5[$i]);
					$array5 = array_values($array5);
					break;
				}
			}
			$array6 = json_encode($array5,JSON_UNESCAPED_SLASHES);
			file_put_contents('../json/orders.json', $array6);
			
			header("location: ./page9.php");
	}
?>