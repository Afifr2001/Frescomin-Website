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
    <title>Frescomin Product Inventory</title>

    <link rel="stylesheet" href="../css/style7.css">
    <body style="background-color:rgb(88, 78, 78);"></body>
</head>
<body>


	<div class="navbar">
        <div class="container">
                    <ul class="primary-nav">
                        <li class="current"><a href="./page7.php">Products</a></li>
                        <li><a href="./page9.php">Users</a></li>
                        <li><a href="./P11.php">Orders</a></li>
						<li><a href="./loggo.php">Logout</a></li>
                    </ul>
        </div>
    </div>








    <h1>Inventory</h1>
    <div class="table_responsive">
        <table>
            <thead>
                <tr>
                    <th>Item Code </th>
                    <th>Name</th>
                    <th>Food Category</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Options</th>
                </tr>
            </thead>

            <tbody>
                
				<?php
					include_once "a.php";
				?>
                 
            </tbody>
        </table>
    </div>
    <br><a class="btn" href="#" onclick="send(-1)">Add Item</a></br>
	
	<form action="page88.php" method="post" id="form" name="hipo" hidden>
			<input type="text"  name='neut'  id="heli"/>
			<input type="submit" name="sup" value="Submit" id="helll"/>
	</form>
	<form action="delete8.php" method="post" hidden>
			<input type="text"  name='del'  id="dele"/>
			<input type="submit" name="delet" value="Submit" id="delete"/>
	</form>
	<script>
		const kk = document.getElementById("heli");
		const subb = document.getElementById("helll");
		function send(code) {
			kk.setAttribute('value', code);
			subb.click();
		}
		const de = document.getElementById("dele");
		const remove = document.getElementById("delete");
		function send2(code) {
			de.setAttribute('value', code);
			remove.click();
		}
	</script>
	
	
    
</body>


</html>