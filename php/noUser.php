<?php
		
		if(isset($_POST['submittt'])){
			$coding = $_POST['photon'];
			$coding = json_decode($coding);
			$noCart = file_get_contents('../json/noCart.json');
			$array = json_decode($noCart, true);
			$array[0]= $coding;
			$array2 = json_encode($array);
			file_put_contents('../json/noCart.json', $array2);
			header("location: ./LoginPage.php");
			exit();
		}
?>