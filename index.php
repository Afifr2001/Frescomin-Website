<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frescomin</title>
    <link rel="stylesheet" href="./css/cssTest.css">
</head>
<body>
	<div class="navbar">
		<div class = "container">
		
			<div class="item1">
				<div class="item1-flex">
					<a  href="./index.php">
						<img id="logo-image1" class="logo-image2" src="./pictures/palm.jpeg" alt="Logo">
					</a>
					<a class="logo" href="./index.php"><span>Fres</span>comin</a>
				</div>
			</div>
			
			<div id="nav" class="item2">
				
				<img id="mobile-exit" class="mobile-menu-exit" src="./pictures/exit.svg" alt="Close Navigation">
				
				
                <div class="item2-flex1">
					<ul class="primary-nav">
						<li class="current"><a href="./index.php">Home</a></li>
						<li><a href="./php/p2(all).php">All Products</a></li>
						<li><a href="./php/p2.php">Aisles</a></li>
					</ul>

					<?php
						include_once './php/user.php';
					?>
				</div>
			
			</div>
			
			<div id ="item33" class="item3">
			
				<img id="mobile" class="mobile-menu" src="./pictures/menu.svg" alt="Open Navigation">
			
			</div>
			
		</div>
	</div>
	
	<div class="navbar2">
		<div class = "container">
		
			<div class="item1">
				<input type="text" placeholder="Search for a product">
			</div>
			
		
			<div class="item2">
				<div class="item2-flex">
					<a  href="./php/shoppingcart.php">
						<img id="cart-image1" class="cart-image2" src="./pictures/cart.png" alt="Cart">
					</a>
					<a class="cart" href="./php/shoppingcart.php">Shopping Cart</a>
				</div>
			</div>
			
		</div>
	</div>
	
	<section class="special">
        <div class="container">
            <div class="special-title">
                <h1>Special <span>Fresh</span> Combo Of The Day</h1>

                <div class="special-section">
                    <a href="#" class="fresher">Fresher Than Fresh</a>
                </div>
            </div>
			<a href="#" class="special-image">
                <img class="special-image" src="./pictures/fresh.jpeg" alt="Special">
            </a>
        </div>
    </section>
	
	<section id = "aisles" class="aisle-section">
        <div class="container">
            <ul>
                <li>
					<a href="./php/p2.php" class =" fixx"><p>Protein</p></a>
					<a href="./php/p2.php" class="protein-image">
						<img src="./pictures/protein.jpeg" alt="Protein">
					</a>
                </li>
                <li>
					<a href="./php/p2(2).php" class =" fixx"><p>Fruits &amp Vegetables</p></a>
					<a href="./php/p2(2).php" class="fruit-image">
						<img src="./pictures/fruits.jpeg" alt="Fruits And Vegetables">
					</a>
				</li>
                <li>
					<a href="./php/p2(3).php" class =" fixx"><p>Dairy</p></a>
					<a href="./php/p2(3).php" class="dairy-image">
						<img src="./pictures/dairy.jpeg" alt="Dairy">
					</a>
			   </li>
            </ul>
        </div>
    </section>
	
	<section id = "bottom" class="info-section">
        <div class="container">
            <div class="info">
				<div class ="left">
					<h2>Get To Know Us</h2>
						
					<ul class="know-us">
						<li><a href="#">About Us</a></li>
						<li><a href="#">Careers</a></li>
					</ul>
				</div>
				
				<div class ="right">
					<h2>Customer Service</h2>
					
					<ul class="know-us">
						<li><a href="#">Contact Us</a></li>
						<li><a href="#">Terms And Conditions</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">FAQ</a></li>
					</ul>
					<form action="./php/logout.php" method="post" id="myForm" name="help" hidden>
						<input type="text"  name='hom'  id="whole"/>
						<input type="submit" name="submit" value="Submit" id="trigger-form"/>
					</form>
				</div>
		  
            </div>
        </div>
    </section>
	
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
	<?php
		//	include_once './php/lophp.php';
	?>
	<script>
		const back = document.getElementById('hum');
		const up = document.getElementById("whole");
		const submm = document.getElementById("trigger-form")
		back.addEventListener('click', () => {
			var hx = localStorage.getItem('cart');
			up.setAttribute('value', hx);
			submm.click();
        })
	</script>
	<form action="./php/noUser.php" method="post" id="form" name="hipo">
			<input type="text"  name='photon'  id="craz"/>
			<input type="submit" name="submittt" value="Submit" id="tri"/>
	</form>
	<script>
		const ub = document.getElementById("craz");
		const submt = document.getElementById("tri");
		function myFunc() {
			var kniv = localStorage.getItem('cart');
			ub.setAttribute('value', kniv);
			submt.click();
		}
	</script>
	
</body>
</html>