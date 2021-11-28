<!DOCTYPE html>
<html>
<head>
	<title> User Registration </title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div>
		<?php
		if(isset($_POST['create'])){

			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];

			$password = $_POST['password'];

			

		}?>
</div>                                            

       

<div>
	<form action="chat app.php" method="post">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
			
			<h1>Registration</h1>

			<p>Fill up the form</p>
			<hr class="mb-3">

			<label for="firstname"><b>First Name</b></label>
			<input class="form-control" type="text" name="firstname" required>

			<label for="lastname"><b>Last Name</b></label>
			<input class="form-control"type="text" name="lastname" required>

			<label for="email"><b>Email Address</b></label>
			<input class="form-control"type="email" name="email" required>

			<label for="phone number"><b>Phone Number</b></label>
			<input class="form-control"type="text" name="phone number" required>

			<label for="password"><b>Password</b></label>
			<input class="form-control"type="password" name="password" required>
			<hr class="mb-3">

			<input class="btn btn-primary" type="submit" name="create" value="Sign Up">
		</div>
	</form>
</div>


</body>
</html>
