<?php
	
	session_start();
	if ($_SESSION["admin"] !== "admin"){
		header("location: ../index.php");
	}
	
	
	
	if(isset($_POST['delet'])){
			$index = $_POST['del'];
			$orders = file_get_contents('../json/realorders.json');
			$array = json_decode($orders, true);
			$index = intval($index);

			unset($array[$index]);
			$array = array_values($array);


			$array2 = json_encode($array,JSON_UNESCAPED_SLASHES);
			file_put_contents('../json/realorders.json', $array2);
			header("location: ./P11.php");
	}
?>