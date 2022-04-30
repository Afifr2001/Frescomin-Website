<?php


	session_start();
	if (!isset($_SESSION["admin"])){
		header("location: ../index.php");
	}
	else if($_SESSION["admin"] != "admin"){
		header("location: ../index.php");
	}



	if(isset($_POST['mii'])){
			$titles = $_POST['title'];
			//var_dump($titles);
			$quantity = $_POST['quantity'];
			//var_dump($quantity);
			//$newt= $_POST['newt'];
			//$newq= $_POST['newq'];
			$id= $_POST['id'];
		//	var_dump($id);
			//$which= $_POST['which'];
			//$which= intval($which);
			//$which=$which-1;
			//var_dump($titles);
			//var_dump($quantity);
			
			
			$orders = file_get_contents('../josn/realorders.json');
			$array = json_decode($orders, true);
			if($id === "-1"){
				$idi = $_POST['idi'];
				$last = count($array);
				
				$costy = 0;
				$products = file_get_contents('../json/products.json');
				$arraying = json_decode($products, true);
				for($k =0; $k<count($arraying);$k++){
					if($arraying[$k]["name"] == $titles){
						$costy = $arraying[$k]["price"];
						break;
					}
					else if($k == count($arraying)-1){
						header("location: ./P11.php");
						exit();
					}
				}
				$array[$last]["id"] = intval($idi);
			    $array[$last]["cart"][0]["title"] =  $titles;
				$array[$last]["cart"][0]["price"] =  $costy;
				$array[$last]["cart"][0]["quantity"] =  intval($quantity);
			}
			else{
				
				$newt= $_POST['newt'];
				$newq= $_POST['newq'];
				$which= $_POST['which'];
				$which= intval($which);
			//	var_dump($which);
				
				$id = intval($id);
				$many = 1;
				for($i = 0; $i < count($array); $i++){
					if($array[$i]['id'] === $id && $which != $many){
						$many = $many + 1;
					}
					else if($array[$i]['id'] === $id && $which == $many){
						$perhaps = array();
						for($j = 0;$j < count($array[$i]["cart"]);$j++){
							$array[$i]["cart"][$j]["title"] = $titles[$j];
							$array[$i]["cart"][$j]["quantity"] = intval($quantity[$j]);
							if($titles[$j] == "" || $titles[$j] == null){
								$perhaps[] = $j;
							}
						}
						for($d = 0; $d < count($perhaps); $d++){
							unset($array[$i]["cart"][$perhaps[$d]]);
							$array[$i]["cart"] = array_values($array[$i]["cart"]);
						}
						if($newt != "" || $newt != null){
							$add = count($array[$i]["cart"]);
							
							
							$costy = 0;
							$products = file_get_contents('../json/products.json');
							$arraying = json_decode($products, true);
							for($k =0; $k<count($arraying);$k++){
								if($arraying[$k]["name"] == $newt){
									$costy = $arraying[$k]["price"];
									break;
								}
								else if($k == count($arraying)-1){
									header("location: ../P11.php");
									exit();
								}
							}
							$array[$i]["cart"][$add]["title"] = $newt;
							$array[$i]["cart"][$add]["price"] = $costy;
							$array[$i]["cart"][$add]["quantity"] = intval($newq);
						}
						$many = $many + 1;
					}
				}
			}
			$array2 = json_encode($array,JSON_UNESCAPED_SLASHES);
			file_put_contents('../json/realorders.json', $array2);
			header("location: ../P11.php");
	}
?>