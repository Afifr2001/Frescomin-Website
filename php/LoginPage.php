<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Frescomin's Login Form</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="icon" type="image/png" sizes="16x16" href="../pictures/favicon-16x16.png">
<body>
        <div class="loginbox">
        <img src="../pictures/user-avatar-modified.png" class="user">
            <h1>Login Here</h1>
            <form action="login.php" method="post">
                <p>Username</p>
                <input maxlength="15" minlength="2" type = "text" name="user"  onkeyup="lettersOnly(this)" placeholder = "Enter Username">
                <p>Password</p>
                <input maxlength="15" minlength="2" type = "password" name="pwd"  onkeyup="lettersOnly(this)" placeholder="Enter Password">
                <input type="submit" name="login" value="Login">
                <a href="#">Forget password?</a><br>
                <a href="./SignUpPage.php">Don't have an account?</a><br>
				<?php
				if(isset($_GET["error"])){
						if($_GET["error"] == "wrong"){
							echo "Username or Password is Incorrrect or Username does not Exist";
						}
					}
				?>
            </form>
        </div>
<script>
	function lettersOnly(input){
		var regex = /[^a-z0-9]/gi;
		input.value = input.value.replace(regex,"");
	}
</script>	
</body>
</head>
</html>