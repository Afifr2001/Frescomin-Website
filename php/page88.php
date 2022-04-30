<?php



	session_start();
	if (!isset($_SESSION["admin"])){
		header("location: ../index.php");
	}
	else if($_SESSION["admin"] != "admin"){
		header("location: ../index.php");
	}




	if(isset($_POST['sup'])){
			$code = $_POST['neut'];
			if($code === "-1"){
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
											<h2><strong> ADD / EDIT ITEM</strong>
											</h2>
											<hr>
										</div>
										<form class='file-upload' action='page8.php' method='post'>
											<div class='row mb-5 gx-5'>
												<div class='col-xxl-8 mb-5 mb-xxl-0'>
													<div class='bg-secondary-soft px-4 py-5 rounded'>
														<div class='row g-3'>
															<h3 class='mb-4 mt-0'>Product Detail</h3>
															<div class='col-md-6'>
																<label class='form-label'> Name </label>
																<input type='text' name='name2' class='form-control' value=''/>
															</div>
															<div class='col-md-6'>
																<label class='form-label'> Food Category </label>
																<input type='text' name='category2' class='form-control' value=''/>
															</div>
															<div class='col-md-6'>
																<label class='form-label'> Quantity </label>
																<input type='text' name='stock2'class='form-control' value=''/>
															</div>
															<div class='col-md-6'>
																<label class='form-label'> Image </label>
																<input type='text' name='image2' class='form-control' value=''/>
															</div>
															<div class='col-md-6'>
																<label class='form-label'>Price </label>
																<input type='text' name='price2'class='form-control' value=''/>
															</div>
															<div class='col-md-6'>
																<label class='form-label'>Description </label>
																<input type='text' name='description2' class='form-control' value=''/>
															</div>
															<div class='col-md-6' hidden>
																<input type='text' name='code2' class='form-control' value='-1'/>
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
			
			
				$products = file_get_contents('../json/products.json');
				$array = json_decode($products, true);
				$which = -1;
				for($i = 0; $i < count($array); $i++){
					if($array[$i]['code'] === $code){
						$which = $i;
						break;
					}
				}
				$name = $array[$which]['name'];
				$category = $array[$which]['category'];
				$stock = $array[$which]['stock'];
				$price = $array[$which]['price'];
				$image = $array[$which]['image'];
				$description = $array[$which]['description'];
				
				
				
				
				echo "<!DOCTYPE html>
						<html lang='en'>
						<head>
							<meta charset='UTF-8'>
							<meta http-equiv='X-UA-Compatible' content='IE=edge'>
							<meta name='viewport' content='width=device-width, initial-scale=1.0'>
							<title>Document</title>
							<link rel='stylesheet' href='../css/style8.css'>
							<body style='background-color:rgb(212, 212, 165);'></body>
						</head>
						<body>
							<div class='container'>
							<div class='row'>
									<div class='col-12'>
										<div class='my-5'>
											<h2><strong> ADD / EDIT ITEM</strong>
											</h2>
											<hr>
										</div>
										<form class='file-upload' action='./page8.php' method='post'>
											<div class='row mb-5 gx-5'>
												<div class='col-xxl-8 mb-5 mb-xxl-0'>
													<div class='bg-secondary-soft px-4 py-5 rounded'>
														<div class='row g-3'>
															<h3 class='mb-4 mt-0'>Product Detail</h3>
															<div class='col-md-6'>
																<label class='form-label'> Name </label>
																<input type='text' name='name2' class='form-control' value='". $name ."'/>
															</div>
															<div class='col-md-6'>
																<label class='form-label'> Food Category </label>
																<input type='text' name='category2' class='form-control' value='". $category ."'/>
															</div>
															<div class='col-md-6'>
																<label class='form-label'> Quantity </label>
																<input type='text' name='stock2'class='form-control' value='". $stock ."'/>
															</div>
															<div class='col-md-6'>
																<label class='form-label'> Image </label>
																<input type='text' name='image2' class='form-control' value='". $image ."'/>
															</div>
															<div class='col-md-6'>
																<label class='form-label'>Price </label>
																<input type='text' name='price2'class='form-control' value='". $price ."'/>
															</div>
															<div class='col-md-6'>
																<label class='form-label'>Description </label>
																<input type='text' name='description2' class='form-control' value='". $description ."'/>
															</div>
															<div class='col-md-6' hidden>
																<input type='text' name='code2' class='form-control' value='". $code ."'/>
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