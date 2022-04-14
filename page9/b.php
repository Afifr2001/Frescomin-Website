<?php			
				
	$profiles = file_get_contents('profiles.json');
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
			