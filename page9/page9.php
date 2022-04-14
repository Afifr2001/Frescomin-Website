<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frescomin Back Store </title>

    <link rel="stylesheet" href="style7.css">
    <body style="background-color:rgb(88, 78, 78);"></body>
</head>
<body>


	<div class="navbar">
        <div class="container">
                    <ul class="primary-nav">
                        <li><a href="./page7.php">Products</a></li>
                        <li class="current"><a href="./page9.php" >Users</a></li>
                        <li><a href="./P11.html">Orders</a></li>
                    </ul>
        </div>
    </div>








    <h1>Users</h1>
    <div class="table_responsive">
        <table>
            <thead>
                <tr>
                    <th>Profile ID</th>
                    <th>Username</th>
					<th>Password</th>
					<th>Options</th>
                </tr>
            </thead>

            <tbody>
                
				<?php
					include_once "b.php";
				?>
                 
            </tbody>
        </table>
    </div>
    <br><a class="btn" href="#" onclick="send(-1)">Add User</a></br>
	
	<form action="page99.php" method="post" id="form" name="hipo" hidden>
			<input type="text"  name='neut'  id="heli"/>
			<input type="submit" name="sup" value="Submit" id="helll"/>
	</form>
	<form action="delete9.php" method="post" hidden>
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