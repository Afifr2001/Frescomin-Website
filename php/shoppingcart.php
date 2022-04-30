<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/cssTest.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping cart</title>
</head>
<body>
   <div class="navbar">
		<div class = "container">
		
			<div class="item1">
				<div class="item1-flex">
					<a  href="../index.php">
						<img id="logo-image1" class="logo-image2" src="../pictures/palm.jpeg" alt="Logo">
					</a>
					<a class="logo" href="../index.php"><span>Fres</span>comin</a>
				</div>
			</div>
			
			<div id="nav" class="item2">
				
				<img id="mobile-exit" class="mobile-menu-exit" src="../pictures/exit.svg" alt="Close Navigation">
				
				
                <div class="item2-flex1">
					<ul class="primary-nav">
						<li><a href="../index.php">Home</a></li>
						<li><a href="./p2(all).php">All Products</a></li>
						<li><a href="./p2.php">Aisles</a></li>
					</ul>

					<?php
						include_once 'user.php';
					?>
				</div>
			
			</div>
			
			<div id ="item33"class="item3">
			
				<img id="mobile" class="mobile-menu" src="./menu.svg" alt="Open Navigation">
			
			</div>
			
		</div>
	</div>

    
    <div class="cartContainer">

        <h3 class= "contTitle"> Shopping cart</h3>
        <table class="cartTable">
        </table>
        <div class="totalAlign">
            <h6>
                NoProducts: <span class="price">0</span>
            </h6>
            <h6>
                Subtotal:   <span class="price">0</span>
            </h6>
            <h6>
                GST(5%):    <span class="price">0</span>
            </h6>
            <h6>
                QST (10%):  <span class="price">0</span>
            </h6>
            <h5>
                Total:     <span class="price">0$</span>
            </h5>
			
			<form action='ordering.php' method='post' hidden>
					<input type='text'  id="later" name='late'  id="fororder" />
					<input type='submit' id ="lat" name='amaz' value='Submit' />
			</form>
			<a href='#' onclick="myFunc2()">Submit</a>
			
        </div>

    </div>


    <section id="bottom" class="info-section">
        <div class="container">
            <div class="info">
                <div class="left">
                    <h2>Get To Know Us</h2>
    
                    <ul class="know-us">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                    </ul>
                </div>
    
                <div class="right">
                    <h2>Customer Service</h2>
    
                    <ul class="know-us">
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Terms And Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
					<form action='logout.php' method='post' id='myForm' name='help' hidden>
						<input type='text'  name='hom'  id='whole'/>
						<input type='submit' name='submit' value='Submit' id='trigger-form'/>
					</form>
                </div>
    
            </div>
        </div>
    </section>

    <script src="../js/cart.js"></script>

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
	<form action="noUser.php" method="post" id="form" name="hipo" hidden>
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
	<script>
		const ube = document.getElementById("later");
		const su = document.getElementById("lat");
		function myFunc2() {
			var knive = localStorage.getItem('cart');
			ube.setAttribute('value', knive);
			su.click();
		}
	</script>
</body>
</html>