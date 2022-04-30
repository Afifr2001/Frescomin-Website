<?php
	
	session_start();
	if (!isset($_SESSION["admin"])){
		header("location: ../index.php");
	}
	else if($_SESSION["admin"] != "admin"){
		header("location: ../index.php");
	}

	if(isset($_POST['mii'])){
			$code = $_POST['code2'];
			$name = $_POST['name2'];
			$category = $_POST['category2'];
			$stock = $_POST['stock2'];
			$stock = intval($stock);
			$image = $_POST['image2'];
			$price = $_POST['price2'];
			$price = floatval($price);
			$description = $_POST['description2'];
			$products = file_get_contents('../json/products.json');
			$array = json_decode($products, true);
			if($code === "-1"){
				$lastindex = count($array);
				$array[$lastindex]['name'] = $name;
				$array[$lastindex]['category'] = $category;
				$array[$lastindex]['stock'] = $stock;
				$array[$lastindex]['image'] = $image;
				$array[$lastindex]['price'] = $price;
				$array[$lastindex]['description'] = $description;
				$last = $array[$lastindex-1]['code'];
				$last = intval($last) + 1;
				$last = strval($last);
				$array[$lastindex]['code'] = $last;
			}
			else{
				$which = -1;
				for($i = 0; $i < count($array); $i++){
					if($array[$i]['code'] === $code){
						$which = $i;
						break;
					}
				}
				$oldNAME = $array[$which]['name'];
				//$oldPRICE = $array[$which]['price'];
				$array[$which]['name'] = $name;
				$array[$which]['category'] = $category;
				$array[$which]['stock'] = $stock;
				$array[$which]['image'] = $image;
				$array[$which]['price'] = $price;
				$array[$which]['description'] = $description;
				

				$orders = file_get_contents('../json/orders.json');
				$array5 = json_decode($orders, true);
				//var_dump($oldNAME);
				//var_dump($array5[0]["cart"][2]["title"]);
				for($j = 0; $j < count($array5) ; $j++){
					for($k = 0; $k < count($array5[$j]["cart"]); $k++){
						if($array5[$j]["cart"][$k]["title"] === $oldNAME){
							$array5[$j]["cart"][$k]["title"] = $name;
							$array5[$j]["cart"][$k]["price"] = $price;
						}
					}
				}
				$array6 = json_encode($array5,JSON_UNESCAPED_SLASHES);
				file_put_contents('../json/orders.json', $array6);
				
				
				
			}
			$array2 = json_encode($array,JSON_UNESCAPED_SLASHES);
			file_put_contents('../json/products.json', $array2);
			header("location: ./page7.php");
	}
?>