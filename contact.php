<?php
include('./config/config.php');
session_start();
if (empty($_SESSION['user'])) {
    header('location:index.php');
} ?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap5" />
	<?php include("./layout/csslink.php"); ?>

	<title>Blogy | Contact</title>
</head>

<body>
	<?php include("./layout/header.php"); ?>

	<div class="hero overlay inner-page bg-primary py-5">
		<div class="container">
			<div class="row align-items-center justify-content-center text-center pt-5">
				<div class="col-lg-6">
					<h1 class="heading text-white mb-3" data-aos="fade-up">Contact Us</h1>
				</div>
			</div>
		</div>
	</div>

	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
					<div class="contact-info">

						<div class="address mt-2">
							<i class="icon-room"></i>
							<h4 class="mb-2">Location:</h4>
							<p>43 Raymouth Rd. Baltemoer,<br> London 3910</p>
						</div>

						<div class="open-hours mt-4">
							<i class="icon-clock-o"></i>
							<h4 class="mb-2">Open Hours:</h4>
							<p>
								Sunday-Friday:<br>
								11:00 AM - 23:00 PM
							</p>
						</div>

						<div class="email mt-4">
							<i class="icon-envelope"></i>
							<h4 class="mb-2">Email:</h4>
							<p>info@Untree.co</p>
						</div>

						<div class="phone mt-4">
							<i class="icon-phone"></i>
							<h4 class="mb-2">Call:</h4>
							<p>+1 1234 55488 55</p>
						</div>

					</div>
				</div>
				<div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
					<?php
					$email=$_SESSION['user'];
					$sql = "select name,email from user_tbl where email='$email'";
					$res = mysqli_query($conn,$sql);
					$user=[];
					if($res->num_rows>0){
						$user = mysqli_fetch_assoc($res);
					}
					?>
					<form action="" method="post">
						<div class="row">
							<div class="col-6 mb-3">
								<input type="hidtextden" class="form-control text-dark" name="name" value="<?php echo $user['name'] ?>" required placeholder="Your Name">
							</div>
							<div class="col-6 mb-3">
								<input type="email" value="<?php echo $user['email'] ?>" class="form-control text-dark" name="email" required placeholder="Your Email">
							</div>
							<div class="col-12 mb-3">
								<input type="text" class="form-control" name="subject" required placeholder="Subject">
							</div>
							<div class="col-12 mb-3">
								<textarea name="message" id="" cols="30" required rows="7" class="form-control" placeholder="Message"></textarea>
							</div>

							<div class="col-12">
							
								<input type="<?php 
								if(empty($_SESSION['user'])){
									echo "button";
								}else{
									echo "submit";
								}
								?>" name="contact" 
								<?php if(empty($_SESSION['user'])){
									echo 'data-bs-toggle="modal" data-bs-target="#ModalFormLogin"';
								}else{
									echo "";
								} ?> value="<?php if(empty($_SESSION['user'])){
									echo 'Send Message';
								}else{
									echo "Send Message";
								} ?>" class="btn btn-primary">
							</div>
						</div>
					</form>
					<?php
					if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact'])) {
						$status=1;
						$name = $_POST['name'];
						$email = $_POST['email'];
						$subject = $_POST['subject'];
						$message = $conn->real_escape_string($_POST['message']);
						$sql = "INSERT INTO contact (name, email, subject, message,status) VALUES ('$name','$email','$subject','$message',$status)";
						$res = mysqli_query($conn, $sql);
						if ($res) {
							echo '<div class="alert alert-success alert-dismissible fade show mt-3 " role="alert">
  									Message sent !
  									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>';
						}
					}
					?>
				</div>
			</div>
		</div>
	</div> <!-- /.untree_co-section -->

	<?php include("./layout/footer.php"); ?>

	<!-- Preloader -->
	<div id="overlayer"></div>
	<div class="loader">
		<div class="spinner-border text-primary" role="status">
			<span class="visually-hidden">Loading...</span>
		</div>
	</div>
	<?php include("./layout/jslink.php"); ?>

</body>

</html>