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
			if($id === "-1"){
				echo "<!DOCTYPE html>
						<html lang='en'>
						<head>
							<meta charset='UTF-8'>
							<meta http-equiv='X-UA-Compatible' content='IE=edge'>
							<meta name='viewport' content='width=device-width, initial-scale=1.0'>
							<title>Document</title>
							<link rel='stylesheet' href='style8.css'>
							<body style='background-color:rgb(212, 212, 165);'></body>
						</head>
						<body>
							<div class='container'>
							<div class='row'>
									<div class='col-12'>
										<div class='my-5'>
											<h2><strong> ADD / EDIT USER</strong>
											</h2>
											<hr>
										</div>
										<form class='file-upload' action='page10.php' method='post'>
											<div class='row mb-5 gx-5'>
												<div class='col-xxl-8 mb-5 mb-xxl-0'>
													<div class='bg-secondary-soft px-4 py-5 rounded'>
														<div class='row g-3'>
															<h3 class='mb-4 mt-0'>User Profile Detail</h3>
															<div class='col-md-6'>
																<label class='form-label'> Username </label>
																<input type='text' name='username2' class='form-control' value=''/>
															</div>
															<div class='col-md-6'>
																<label class='form-label'> Password </label>
																<input type='text' name='password2' class='form-control' value=''/>
															
															<div class='col-md-6' hidden>
																<input type='text' name='id2' class='form-control' value='-1'/>
															</div>
														</div>
													</div>
												</div>
										
											</div> 
											
												<input type='submit' name='mii' value='Submit'/>
											
										</form> 
									</div>
								</div>
								</div>
								
								
						</body>
						</html>";
			}
			else{
			
			
				$profiles = file_get_contents('../json/profiles.json');
				$array = json_decode($profiles, true);
				$which = -1;
				$id = intval($id);
				for($i = 0; $i < count($array); $i++){
					if($array[$i]['id'] === $id){
						$which = $i;
						break;
					}
				}
				$username = $array[$which]['username'];
				$password = $array[$which]['password'];
				
				
				
				
		
				echo "<!DOCTYPE html>
						<html lang='en'>
						<head>
							<meta charset='UTF-8'>
							<meta http-equiv='X-UA-Compatible' content='IE=edge'>
							<meta name='viewport' content='width=device-width, initial-scale=1.0'>
							<title>Document</title>
							<link rel='stylesheet' href='style8.css'>
							<body style='background-color:rgb(212, 212, 165);'></body>
						</head>
						<body>
							<div class='container'>
							<div class='row'>
									<div class='col-12'>
										<div class='my-5'>
											<h2><strong> ADD / EDIT USER </strong>
											</h2>
											<hr>
										</div>
										<form class='file-upload' action='page10.php' method='post'>
											<div class='row mb-5 gx-5'>
												<div class='col-xxl-8 mb-5 mb-xxl-0'>
													<div class='bg-secondary-soft px-4 py-5 rounded'>
														<div class='row g-3'>
															<h3 class='mb-4 mt-0'>User Profile Detail</h3>
															<div class='col-md-6'>
																<label class='form-label'> Username </label>
																<input type='text' name='username2' class='form-control' value='". $username ."'/>
															</div>
															<div class='col-md-6'>
																<label class='form-label'> Password </label>
																<input type='text' name='password2' class='form-control' value='". $password ."'/>
															</div>
															<div class='col-md-6' hidden>
																<input type='text' name='id2' class='form-control' value='". $id ."'/>
															</div>
														</div>
													</div>
												</div>
										
											</div> 
											
											
											
												<input type='submit' name='mii' value='Submit'/>
											
										</form> 
									</div>
								</div>
								</div>
								
								
						</body>
						</html>";
			}
	}
?>