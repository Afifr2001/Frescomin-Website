<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frescomin's Sign Up Form</title>
    <link rel="stylesheet" href="../css/registyles.css"/>
    <link rel="icon" type="image/png" sizes="16x16" href="../pictures/favicon-16x16.png">
</head>
<body>
    <form action="signup.php" method="post">
        <div class='container'>
        <h1>Register</h1>
        <p>Please fill in this form to register with us</p>
        <hr/>

        <label for="fn"><b>Username</b></label>
        <input maxlength="15" minlength="2" type="text" placeholder=" Enter First Name" name='user1' id='fn' onkeyup="lettersOnly(this)" required/>

        <label for="psw"><b>Password</b></label>
        <input maxlength="15" minlength="2" type="password" placeholder="Enter Password" name='pwd1' id='psw' onkeyup="lettersOnly(this)" required/>

        <label for="cpsw"><b> Confirm Password</b></label>
        <input maxlength="15" minlength="2" type="password" placeholder=" Enter Confirm Password" name='pwd2' id='cpsw' onkeyup="lettersOnly(this)" required/>

        <hr/>
        <button class='registration' type='submit' name ="signup">Register</button>
        
    </form>
<?php
	if(isset($_GET["error"])){
		if($_GET["error"] == "username"){
			echo "<p>";
			echo "Username Already Exist";
			echo "</p>";
		}
		else if($_GET["error"] == "password"){
			echo "<p>";
			echo "Passwords Do Not Match";
			echo "</pt>";
		}
	}
?>	
<script>
	function lettersOnly(input){
		var regex = /[^a-z0-9]/gi;
		input.value = input.value.replace(regex,"");
	}
</script>
</body>
</html>