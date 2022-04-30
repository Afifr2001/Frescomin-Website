<?php


	session_start();
	if (!isset($_SESSION["admin"])){
		header("location: ../index.php");
	}
	else if($_SESSION["admin"] != "admin"){
		header("location: ../index.php");
	}

	if(isset($_POST['sup'])){
			$id = $_POST['neut'];
			$id = intval($id);
			//var_dump($id);
			if($id === -1){
				echo "<!DOCTYPE html>
						<html lang='en'>
						<head>
							<meta charset='UTF-8'>
							<meta http-equiv='X-UA-Compatible' content='IE=edge'>
							<meta name='viewport' content='width=device-width, initial-scale=1.0'>
							<title>Document</title>
							
							<body style='background-color:rgb(212, 212, 165);'></body>
						</head>
						<body>
							<div class='container'>
							<div class='row'>
									<div class='col-12'>
										<div class='my-5'>
											<h2><strong> ADD / EDIT ORDER </strong>
											</h2>
											<hr>
										</div>
										<form class='file-upload' action='page12.php' method='post'>
															<div class=\"open\">
															 <input id=\"toggle\" class=\"hidden\" type=\"checkbox\" hidden>
															 <label for=\"toggle\" class=\"clicker\" tabindex=\"1\">
															 <h2> ADD </h2>
															
															 </label>
																<div class=\"hiddendiv open\">
																	<table class=\"orderlist\">
																		<tr class=\"orderlist\">
																			<td> ID </td>
																			<td> Item </td>
																			<td> Amount </td>
																</tr>
																<tr class=\"orderlist\" >
																						<td class=\"orderlist\"><span><input type='text' name='idi' class='form-control' value=''/></span></td>
																						<td class=\"orderlist\"><span><input type='text' name='title' class='form-control' value=''/></span></td>
																						<td class=\"orderlist\"><span><input type='text' name='quantity' class='form-control' value=''/></span></td>
																						<td class=\"orderlist\" hidden><span><input type='text' name='id' class='form-control' value='".$id."'/></span></td>
												
																					</tr>
																					<tr class=\"orderlist\"></tr>
																				 </table>
																				 
																				 
																				
																				 
																				 
																				  </div>
			
					
																						<input type='submit' name='mii' value='Submit'/>
																					</div>
																				 
																				 
																				 </form> 
																				 </body>
						</html>";
			}
			else{
			
			
				$orders = file_get_contents('../json/realorders.json');
				$array = json_decode($orders, true);
				$page = "";
				$many = 1;
				
				
				
				
		
				$page .= "<!DOCTYPE html>
						<html lang='en'>
						<head>
							<meta charset='UTF-8'>
							<meta http-equiv='X-UA-Compatible' content='IE=edge'>
							<meta name='viewport' content='width=device-width, initial-scale=1.0'>
							<title>Document</title>
							
							<body style='background-color:rgb(212, 212, 165);'></body>
						</head>
						<body>
							<div class='container'>
							<div class='row'>
									<div class='col-12'>
										<div class='my-5'>
											<h2><strong> ADD / EDIT ORDER </strong>
											</h2>
											<hr>
										</div>";
										
										for($i = 0; $i < count($array); $i++){
											if($array[$i]['id'] === $id){
												$page .=" <form class='file-upload' action='page12.php' method='post'>
															<div class=\"open\">
															 <input id=\"toggle\" class=\"hidden\" type=\"checkbox\" hidden>
															 <label for=\"toggle\" class=\"clicker\" tabindex=\"1\">
															 <h2> ID ".$array[$i]['id'].": Order  ".$many."</h2>
															
															 </label>
																<div class=\"hiddendiv open\">
																	<table class=\"orderlist\">
																		<tr class=\"orderlist\">
																			<td> Items </td>
																			<td> Amount </td>
																</tr>";
																			for($f=0;$f < count($array[$i]['cart']);$f++){
																				//var_dump($f);
																				$page .= "<tr class=\"orderlist\" >
																						<td class=\"orderlist\"><span><input type='text' name='title[]' class='form-control' value='".$array[$i]['cart'][$f]['title']."'/></span></td>
																						<td class=\"orderlist\"><span><input type='text' name='quantity[]' class='form-control' value='".$array[$i]['cart'][$f]['quantity']."'/></span></td>
												
																					</tr>
																					<tr class=\"orderlist\"></tr>";
																			}
																			$page.=
																				 "<tr class=\"orderlist\" >
																						<td class=\"orderlist\"><span><input type='text' name='newt' class='form-control' value=''/></span></td>
																						<td class=\"orderlist\"><span><input type='text' name='newq' class='form-control' value=''/></span></td>
																						<td class=\"orderlist\" hidden><span><input type='text' name='id' class='form-control' value='".$array[$i]['id']."'/></span></td>
																						<td class=\"orderlist\" hidden><span><input type='text' name='which' class='form-control' value='".$many++."'/></span></td>
												
																					</tr>
																					<tr class=\"orderlist\"></tr>
																				 </table>
																				 
																				 
																				
																				 
																				 
																				  </div>
			
					
																						<input type='submit' name='mii' value='Submit'/>
																					</div>
																				 
																				 
																				 </form> ";

												
											}
										}
										
										
					$page.=	"</body>
						</html>";
					echo $page;
			}
			//echo $page;
	}
?>