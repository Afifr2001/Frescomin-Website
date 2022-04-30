<?php
	if(session_status() == PHP_SESSION_NONE){
    session_start();
	}

	if (!isset($_SESSION["admin"])){
		header("location: ../index.php");
	}
	else if($_SESSION["admin"] != "admin"){
		header("location: ../index.php");
	}
		
				
	$products = file_get_contents('../json/products.json');
	$array = json_decode($products, true);
	$table = "";
	for($i = 0; $i < count($array); $i++){
		$table .= "<tr>
                    <td>" . $array[$i]['code'] . "</td>
                    <td>
                        " . $array[$i]['name'] . "
                    </td>
                    <td>" . $array[$i]['category'] . "</td>
                    <td>" . $array[$i]['stock'] . "</td>
                    <td>" . $array[$i]['price'] . "</td>
                    <td>
                        <span class='action_btn'>
                            <a href='#' onclick=\"send(" . $array[$i]['code'] . ")\">Edit</a>
                            <a href='#' onclick=\"send2(" . $array[$i]['code'] . ")\">Remove</a>
                        </span>
                    </td>
                </tr>";
	}
	echo $table;
?>