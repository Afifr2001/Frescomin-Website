<?php
	session_start();
	if (!isset($_SESSION["admin"])){
		header("location: ../index.php");
	}
	else if($_SESSION["admin"] != "admin"){
		header("location: ../index.php");
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Backstore.css">
	<link rel="stylesheet" href="../css/style7.css">
    <title>Back Store</title>
</head>

<body>

	<div class="navbar">
        <div class="container">
                    <ul class="primary-nav">
                        <li><a href="./page7.php">Products</a></li>
                        <li><a href="./page9.php" >Users</a></li>
                        <li class="current"><a href="./P11.php">Orders</a></li>
						<li><a href="./loggo.php">Logout</a></li>
                    </ul>
        </div>
    </div>


    <h1>List of Orders</h1>


     <?php
		include_once "meow.php";
	 ?>




<hr>

         <br><a class="btn" href="#" onclick="send(-1)">Add Order</a></br>
		 
		 <form action="page1111.php" method="post" id="form" name="hipo" hidden>
			<input type="text"  name='neut'  id="heli"/>
			<input type="submit" name="sup" value="Submit" id="helll"/>
	</form>
	<form action="delete11.php" method="post" hidden>
			<input type="text"  name='del'  id="dele"/>
			<input type="submit" name="delet" value="Submit" id="delete"/>
	</form>
	<script>
		const kk = document.getElementById("heli");
		const subb = document.getElementById("helll");
		function send(id) {
			kk.setAttribute('value', id);
			subb.click();
		}
		const de = document.getElementById("dele");
		const remove = document.getElementById("delete");
		function send2(id) {
			de.setAttribute('value', id);
			remove.click();
		}
	</script>




</body>

</html>