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

		
	$profiles = file_get_contents('../json/profiles.json');
	$array = json_decode($profiles, true);
	$table = "";
	for($i = 0; $i < count($array); $i++){
		$table .= "<tr>
                    <td>" . $array[$i]['id'] . "</td>
                    <td>" . $array[$i]['username'] . " </td>
                    <td> ******** </td>

                    <td>
                        <span class='action_btn'>
                            <a href='#' onclick=\"send(" . $array[$i]['id'] . ")\">Edit</a>
                            <a href='#' onclick=\"send2(" . $array[$i]['id'] . ")\">Remove</a>
                        </span>
                    </td>
                </tr>";
	}
	echo $table;
?>