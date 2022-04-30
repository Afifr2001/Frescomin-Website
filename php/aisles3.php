<?php

	$products = file_get_contents("../json/products.json");
	$array = json_decode($products, true);
	$length = count($array);
	$list = "";
	for($i = 0; $i < $length; $i++){
		if($array[$i]["category"] === "Dairy"){
			$list .="	<li>
					<a href='#' class='spot1 hope' onclick=\"myFunction('" . $array[$i]["name"] . "')\">
						<img src='" . $array[$i]["image"] . "' alt=''>
					</a>
					<div class='spot-flex'>
						<a class='cart1 hope' href='#' onclick=\"myFunction('" . $array[$i]["name"] . "')\">
							<p>" . $array[$i]["name"] . "</p>
						</a>
						<a class='cart hope' href='#' onclick=\"myFunction('" . $array[$i]["name"] . "')\">
							<img id='cart-image1' class='cart-image2' src='../pictures/cart.png' alt='Cart'>
						</a>
					</div>
                </li>
							";
		}
	}
	echo $list;
?>