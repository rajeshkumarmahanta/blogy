<?php
include('./config/config.php');
session_start();
?>
<div class="modal fade" id="ModalFormLogin" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
				<div class="myform bg-dark">
					<h1 class="text-center">Login Form</h1>
					<form action="" method="post">
						<div class="mb-3 mt-4">
							<label for="emaillogin" class="form-label">Email address</label>
							<input type="email" name="email" class="form-control text-light" required id="emaillogin">
						</div>
						<div class="mb-3">
							<label for="passwordsign" class="form-label">Password</label>
							<input type="password" name="password" class="form-control text-light" required id="passwordsign">
						</div>
						<button type="submit" name="login" class="btn btn-light mt-3">LOGIN</button>
						<p class="signup-now"><a href="forgot-password.php">Forgot password?</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="ModalFormSignup" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
				<div class="myform bg-dark">
					<h1 class="text-center">Signup Form</h1>
					<form action="" method="post">
						<div class="mb-3 mt-4">
							<label for="name" class="form-label">Name</label>
							<input type="text" name="name" class="form-control text-light" required id="name">
						</div>
						<div class="mb-3 mt-4">
							<label for="email" class="form-label">Email</label>
							<input type="email" name="email" class="form-control text-light" required id="email">
						</div>
						<div class="mb-3 mt-4">
							<label for="phone" class="form-label">Phone</label>
							<input type="text" name="phone" class="form-control text-light" required id="phone">
						</div>
						<div class="mb-3">
							<label for="password" class="form-label">Password</label>
							<input type="password" name="password" class="form-control text-light" required id="password">
						</div>
						<button type="submit" name="signup" class="btn btn-light mt-3">Signup</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
if (isset($_POST['signup'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];

	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
	$query = "SELECT * FROM user_tbl WHERE email = '$email'";
    $result_user = mysqli_query($conn, $query);

    if (mysqli_num_rows($result_user) > 0) {
        echo "<script>alert('This email is already registered. Please use another email.')</script>";
    }else{
	
	$sql = "insert into user_tbl (name,email,phone,password) values ('$name','$email','$phone','$hashedPassword')";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		$_SESSION['user'] = $email;
		header("location:index.php");
	}
}
}

?>




<?php
if (isset($_POST['login'])) {

	$email = $_POST['email'];
	$password = $_POST['password'];

	// Fetch user data from the database
	$sql = "SELECT * FROM user_tbl WHERE email = '$email'";
	$result = mysqli_query($conn,$sql);

	if (mysqli_num_rows($result) > 0) {
		$user = mysqli_fetch_assoc($result);

		// Verify the password
		if (password_verify($password, $user['password'])) {
			$_SESSION['user'] = $user['email'];
			header('location:index.php');
		} else {
			echo "<script>alert('Invalid password.')</script>";
		}
	} else {
		echo "<script>alert('No user found with that username.')</script>";
	}
}
?>