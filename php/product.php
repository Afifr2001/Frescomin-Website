<?php
		session_start();
		if(isset($_POST['submitt'])){
			$coding = $_POST['pho'];
			$products = file_get_contents('../json/products.json');
			$array = json_decode($products, true);
			$which = -1;
			for($i = 0; $i < count($array); $i++){
				if($array[$i]['name'] === $coding){
					$which = $i;
					break;
				}
			}
			
			echo"<!DOCTYPE html>
					<html lang='en'>

					<head>
						<meta charset='UTF-8'>
						<meta http-equiv='X-UA-Compatible' content='IE=edge'>
						<meta name='viewport' content='width=device-width, initial-scale=1.0'>
						<title>Shop with us</title>
						<link rel='stylesheet' href='../css/styles.css'>
						<link rel='stylesheet' href='../css/p2Css.css'>
					</head>

					<body>
						<div class='navbar'>
							<div class='container'>

								<div class='item1'>
									<div class='item1-flex'>
										<a href='./index.php'>
											<img id='logo-image1' class='logo-image2' src='../pictures/palm.jpeg' alt='Logo'>
										</a>
										<a class='logo' href='./index.php'><span>Fres</span>comin</a>
									</div>
								</div>

								<div id='nav' class='item2'>

									<img id='mobile-exit' class='mobile-menu-exit' src='../pictures/exit.svg' alt='Close Navigation'>


									<div class='item2-flex1'>
										<ul class='primary-nav'>
											<li><a href='./index.php'>Home</a></li>
											<li><a href='./p2(all).php'>All Products</a></li>
											<li class='current'><a href='./p2.php'>Aisles</a></li>
										</ul>

										";
										
										
										
											include_once('user.php');
											
											
											
											
											
										echo"
									</div>

								</div>

								<div id ='item33' class='item3'>

									<img id='mobile' class='mobile-menu' src='../pictures/menu.svg' alt='Open Navigation'>

								</div>

							</div>
						</div>

						<div class='navbar2'>
							<div class='container'>

								<div class='item1'>
									<input class='searchbar' type='text' placeholder='Search for a product'>
								</div>

								<div class='item3'>
									<div class='item3-flex'>
										<ul class='aisle-item'>
											<li><a href='./p2.php'>Protein</a></li>
											<li><a href='./p2(2).php'>Fruits &amp Vegetables</a></li>
											<li><a href='./p2(3).php'>Dairy</a></li>
										</ul>
									</div>
								</div>

								<div class='item2'>
									<div class='item2-flex'>
										<a class='cart2' href='./shoppingcart.php'>
											<img id='cart-image1' class='cart-image2' src='../pictures/cart.png' alt='Cart'>
										</a>
										<a class='cart' href='./shoppingcart.php'>Shopping Cart</a>
									</div>
								</div>

							</div>
						</div>

						<div class='ProdContainer'>
							<div class='ProdCont'>
								<div class='ProdImgCont'>
									<div class='ProdImg'>
										<img class='productImg'
											src='" . $array[$i]['image'] . "'
											alt=''>
									</div>
								</div>
								<div class='ProdDes'>
									<h3 class='Producttitle'>
										" . $array[$i]['name'] . "
									</h3>

									<p class='priceTag'>
										$ <span class='price'>" . $array[$i]['price'] . "</span> avg. ea.
									</p>

									<form class='formAction' action='#'>

										<label class='quantity' for='quantity'>Quantity: </label>

										<div class='qunatityContainer'>
											<input class='rangeButton' type='button' value='-' onClick='minus()'>
											<input class='quantityBotton ' type='number' value='1' id='quantity' name='quantity' min='1'
												disabled>
											<input class='rangeButton' type='button' value='+' onClick='plus()'>
										</div>

										<button class='AddCart' onClick='addToCart(event,this)'><strong>Add to Cart</strong></button>
									</form>


									<button class='AddCart' onclick='des(this)'><strong>More Description</strong></button>
									<p class='description hidden'>
										" . $array[$i]['description'] . "
									</p>


								</div>
							</div>
						</div>


						</div>




						<section id='bottom' class='info-section'>
							<div class='container'>
								<div class='info'>
									<div class='left'>
										<h2>Get To Know Us</h2>

										<ul class='know-us'>
											<li><a href='#'>About Us</a></li>
											<li><a href='#'>Careers</a></li>
										</ul>
									</div>

									<div class='right'>
										<h2>Customer Service</h2>

										<ul class='know-us'>
											<li><a href='#'>Contact Us</a></li>
											<li><a href='#'>Terms And Conditions</a></li>
											<li><a href='#'>Privacy Policy</a></li>
											<li><a href='#'>FAQ</a></li>
										</ul>
										<form action='logout.php' method='post' id='myForm' name='help' hidden>
											<input type='text'  name='hom'  id='whole'/>
											<input type='submit' name='submit' value='Submit' id='trigger-form'/>
										</form>
									</div>

								</div>
							</div>
						</section>
						<script src='../js/products.js'></script>
						<script>
							const mobileBtn = document.getElementById('mobile');
							const nav = document.getElementById('nav');
							const item3 = document.getElementById('item33');
							const mobileBtnExit = document.getElementById('mobile-exit');

							mobileBtn.addEventListener('click', () => {
								nav.classList.add('menu-btn');
								item3.classList.add('bb');
							})

							mobileBtnExit.addEventListener('click', () => {
								nav.classList.remove('menu-btn');
								item3.classList.remove('bb');
							})
						</script>
						<script>
							const back = document.getElementById('hum');
							const up = document.getElementById('whole');
							const submm = document.getElementById('trigger-form')
							back.addEventListener('click', () => {
								var hx = localStorage.getItem('cart');
								up.setAttribute('value', hx);
								submm.click();
							})
						</script>
						<form action='noUser.php' method='post' id='form' name='hipo' hidden>
								<input type='text'  name='photon'  id='craz'/>
								<input type='submit' name='submittt' value='Submit' id='tri'/>
						</form>
						<script>
							const ub = document.getElementById('craz');
							const submt = document.getElementById('tri');
							function myFunc() {
								var kniv = localStorage.getItem('cart');
								ub.setAttribute('value', kniv);
								submt.click();
							}
						</script>
					</body>

					</html>";

		}
?>