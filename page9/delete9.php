<?php
	
	
	if(isset($_POST['delet'])){
			$id = $_POST['del'];
			$profiles = file_get_contents('profiles.json');
			$array = json_decode($profiles, true);
			$id = intval($id);
			for($i = 0; $i < count($array); $i++){
				if($array[$i]['id'] === $id){
					unset($array[$i]);
					break;
				}
			}
			$array2 = json_encode($array,JSON_UNESCAPED_SLASHES);
			file_put_contents('profiles.json', $array2);
			header("location: ./page9.php");
	}