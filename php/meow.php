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
				
	$orders = file_get_contents('../json/realorders.json');
	$array = json_decode($orders, true);
	$table = "";
    for($f=0;$f<count($array);$f++){
        $table.=
			"<div class=\"open\">
				 <input id=\"toggle\" class=\"hidden\" type=\"checkbox\" hidden>
				 <label for=\"toggle\" class=\"clicker\" tabindex=\"1\">
				 <h2> ".$array[$f]['id']."'s Order  </h2>
				
				 </label>
					<div class=\"hiddendiv open\">
						<table class=\"orderlist\">
							<tr class=\"orderlist\">
								<td> Items </td>
								<td> Amount </td>
					</tr>";
            for($i=0;$i < count($array[$f]['cart']);$i++){
                $table.=
                "<tr class=\"orderlist\" >
                    <td class=\"orderlist\"><span>".$array[$f]['cart'][$i]['title']."</span></td>
                    <td class=\"orderlist\"><span>".$array[$f]['cart'][$i]['quantity']."</span></td>
                </tr>
                <tr class=\"orderlist\"></tr>";
                }
         $table.=
         "</table>
             </div>
				 <a href='#' onclick=\"send(" . $array[$f]['id'] . ")\">Edit</a>
				 <a href='#' onclick=\"send2(" . $f . ")\">Delete</a>
			</div>";
            }

	echo $table;
?>