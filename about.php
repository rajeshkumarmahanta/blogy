<!-- /*
* Template Name: Blogy
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
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
	<title>Blogy | About</title>
</head>
<body>
<?php include("./layout/loginsignup.php"); ?>
<?php include("./layout/header.php"); ?>

	<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('images/hero_5.jpg');">
		<div class="container">
			<div class="row same-height justify-content-center">
				<div class="col-md-6">
					<div class="post-entry text-center">
						<h1 class="mb-4">About Us</h1>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="section sec-halfs py-0">
		<div class="container">
			<div class="half-content d-lg-flex align-items-stretch">
				<?php 
				$sql="select * from about";
				$result = $conn->query($sql);
				$about=[];
				if($result->num_rows>0){
					$about =mysqli_fetch_assoc($result);

				}
				?>
				<div class="img" style="background-image: url('images/<?php echo $about['about_1image']; ?>')" data-aos="fade-in" data-aos-delay="100">
					
				</div>
				<div class="text">
					<h2 class="heading text-primary mb-3"><?php echo $about['about_1']; ?></h2>
					<p class="mb-4"><?php echo $about['about_2desc']; ?></p>
					<p><a href="#" class="btn btn-outline-primary py-2">Read more</a></p>
				</div>
			</div>

			<div class="half-content d-lg-flex align-items-stretch">
				<div class="img order-md-2" style="background-image: url('images/<?php echo $about['about_2image']; ?>')" data-aos="fade-in">
					
				</div>
				<div class="text">
					<h2 class="heading text-primary mb-3"><?php echo $about['about_2']; ?></h2>
					<p class="mb-4"><?php echo $about['about_1desc']; ?></p>
					<p><a href="#" class="btn btn-outline-primary py-2">Read more</a></p>
				</div>
			</div>
		</div>

	</div>

	<div class="section sec-features">
		<div class="container">
			<div class="row g-5">
				<div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
					<div class="feature d-flex">
						<span class="bi-bag-check-fill"></span>
						<div>
							<h3>Building your blog</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
					<div class="feature d-flex">
						<span class="bi-wallet-fill"></span>
						<div>
							<h3>Resources and insights</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
					<div class="feature d-flex">
						<span class="bi-pie-chart-fill"></span>
						<div>
							<h3>Blog just for you</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<div class="section">
		<div class="container">
			
			<div class="row mb-5">
				<div class="col-lg-5 mx-auto text-center" data-aos="fade-up">
					<h2 class="heading text-primary">Our Team</h2>
					<?php
					$sql="select * from team_content";
					$result = $conn->query($sql);
					$team_content=[];
					if($result->num_rows>0){
						$team_content=mysqli_fetch_assoc($result);
					}
					?>

					<p><?php echo $team_content['content']; ?></p>
				</div>
			</div>

			<div class="row">

			<?php
			$sql="select * from team";
			$result = $conn->query($sql);
			if($result->num_rows>0){
				foreach($result as $team){ ?>
					<div class="col-lg-4 mb-4 text-center" data-aos="fade-up" data-aos-delay="0">
					<img src="images/<?php echo $team['image']; ?>" alt="Image" class="img-fluid w-50 rounded-circle mb-3">
					<h5 class="text-black"><?php echo $team['name']; ?></h5>
					<p><?php echo $team['bio']; ?></p>
				</div><?php
				}

			}
			?>
			</div>

		</div>
	</div>

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
