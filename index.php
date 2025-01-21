<?php include('./config/config.php');
?>

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


	<title>Blogy</title>
</head>

<body>



	<?php include("./layout/loginsignup.php"); ?>


	<?php include("./layout/header.php"); ?>

	<!-- Start retroy layout blog posts -->
	<section class="section bg-light">
		<div class="container">
			<div class="row align-items-stretch retro-layout">
				<div class="col-md-4">
					<?php
					$sql = "SELECT * FROM blogs_tbl ORDER BY createdAt DESC LIMIT 2";
					$res = mysqli_query($conn, $sql);
					if ($res) {
						foreach ($res as $row) { ?>
							<a href="single.php?id=<?php echo $row["id"]; ?>" class="h-entry mb-30 v-height gradient">

								<div class="featured-img" style="background-image: url('images/upload/blogs/<?php echo $row["image"]; ?>');"></div>

								<div class="text">
									<span class="date"><?php
														$date_string = $row["createdAt"];;
														$date = new DateTime($date_string);

														$formatted_date = $date->format('M. jS, Y'); // 'M' for short month, 'jS' for day with suffix, 'Y' for year
														echo $formatted_date;
														?></span>
									<h2><?php echo $row["title"]; ?></h2>
								</div>
							</a><?php
							}
						}
								?>

				</div>
				<div class="col-md-4">
					<?php
					$sql = "SELECT * FROM blogs_tbl ORDER BY createdAt DESC LIMIT 1 offset 4";
					$res = mysqli_query($conn, $sql);
					if ($res) {
						foreach ($res as $row) { ?>
							<a href="single.php?id=<?php echo $row["id"]; ?>" class="h-entry img-5 h-100 gradient">

								<div class="featured-img" style="background-image: url('images/upload/blogs/<?php echo $row["image"]; ?>');"></div>

								<div class="text">
									<span class="date"><?php
														$date_string = $row["createdAt"];;
														$date = new DateTime($date_string);

														$formatted_date = $date->format('M. jS, Y'); // 'M' for short month, 'jS' for day with suffix, 'Y' for year
														echo $formatted_date;
														?></span>
									<h2><?php echo $row["title"]; ?></h2>
								</div>
							</a><?php
							}
						}
								?>

				</div>
				<div class="col-md-4">
					<?php
					$sql = "SELECT * FROM blogs_tbl ORDER BY createdAt DESC LIMIT 2 offset 2";
					$res = mysqli_query($conn, $sql);
					if ($res) {
						foreach ($res as $row) { ?>
							<a href="single.php?id=<?php echo $row["id"]; ?>" class="h-entry mb-30 v-height gradient">

								<div class="featured-img" style="background-image: url('images/upload/blogs/<?php echo $row["image"]; ?>');"></div>

								<div class="text">
									<span class="date"><?php
														$date_string = $row["createdAt"];;
														$date = new DateTime($date_string);

														$formatted_date = $date->format('M. jS, Y'); // 'M' for short month, 'jS' for day with suffix, 'Y' for year
														echo $formatted_date;
														?></span>
									<h2><?php echo $row["title"]; ?></h2>
								</div>
							</a><?php
							}
						}
								?>

				</div>
			</div>
		</div>
	</section>
	<!-- End retroy layout blog posts -->

	<!-- Start posts-entry -->
	<section class="section posts-entry">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title text-uppercase">Technology</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="search.php?search=<?php echo "technology"; ?>" class="read-more">View All</a></div>
			</div>
			<div class="row g-3">
				<div class="col-md-9">
					<div class="row g-3">
						<?php
						$cate = "technology";
						$sql = "select * from blogs_tbl where category='$cate' order by createdAt desc limit 2";
						$res = mysqli_query($conn, $sql);
						if ($res->num_rows > 0) {
							foreach ($res as $row) { ?>
								<div class="col-md-6">
									<div class="blog-entry">
										<a href="single.php?id=<?php echo $row["id"]; ?>" class="img-link">
											<img src="images/upload/blogs/<?php echo $row["image"]; ?>" alt="Image" class="img-fluid">
										</a>
										<span class="date"><?php
															$date_string = $row["createdAt"];
															$date = new DateTime($date_string);

															$formatted_date = $date->format('M. jS, Y'); // 'M' for short month, 'jS' for day with suffix, 'Y' for year
															echo $formatted_date;
															?></span>
										<h2><a href="single.php?id=<?php echo $row["id"]; ?>"><?php
																								echo substr($row['title'], 0, 54) . " ...";

																								?></a></h2>
										<p><?php
											echo substr($row['description'], 0, 90) . " ...";

											?></p>
										<p><a href="single.php?id=<?php echo $row["id"]; ?>" class="btn btn-sm btn-outline-primary">Read More</a></p>
									</div>
								</div><?php
									}
								}
										?>
					</div>
				</div>
				<div class="col-md-3">
					<ul class="list-unstyled blog-entry-sm">
						<?php
						$cate = "technology";
						$sql = "select * from blogs_tbl where category='$cate' order by createdAt desc limit 3 offset 2";
						$res = mysqli_query($conn, $sql);
						if ($res->num_rows > 0) {
							foreach ($res as $row) {  ?>
								<li>
									<span class="date"><?php
														$date_string = $row["createdAt"];
														$date = new DateTime($date_string);

														$formatted_date = $date->format('M. jS, Y'); // 'M' for short month, 'jS' for day with suffix, 'Y' for year
														echo $formatted_date;
														?></span>
									<h3><a href="single.php?id=<?php echo $row["id"]; ?>"><?php
																							echo substr($row['title'], 0, 30) . " ...";

																							?></a></h3>
									<p><?php
										echo substr($row['description'], 0, 70) . " ...";

										?></p>
									<p><a href="single.php?id=<?php echo $row["id"]; ?>" class="read-more">Continue Reading</a></p>
								</li><?php

									}
								} ?>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- End posts-entry -->

	<!-- Start posts-entry -->
	<section class="section posts-entry posts-entry-sm bg-light">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title text-uppercase">Nature</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="search.php?search=<?php echo "nature"; ?>" class="read-more">View All</a></div>
			</div>
			<div class="row">



				<?php
				$cate = "nature";
				$sql = "select * from blogs_tbl where category='$cate' order by createdAt desc limit 4";
				$res = mysqli_query($conn, $sql);
				if ($res->num_rows > 0) {
					foreach ($res as $row) {  ?>
						<div class="col-md-6 col-lg-3">
							<div class="blog-entry">
								<a href="single.php?id=<?php echo $row['id']; ?>" class="img-link">
									<img src="images/upload/blogs/<?php echo $row["image"]; ?>" style="width: 467px;height: 266px; object-fit:cover;" alt="Image" class="img-fluid object-fit-cover">
								</a>
								<span class="date"><?php
													$date_string = $row["createdAt"];
													$date = new DateTime($date_string);

													$formatted_date = $date->format('M. jS, Y'); // 'M' for short month, 'jS' for day with suffix, 'Y' for year
													echo $formatted_date;
													?></span>
								<h2><a href="single.php?id=<?php echo $row['id']; ?>"><?php
																						echo substr($row['title'], 0, 26) . " ...";

																						?></a></h2>
								<p><?php
									echo substr($row['description'], 0, 70) . " ...";

									?></p>
								<p><a href="single.php?id=<?php echo $row['id']; ?>" class="read-more">Continue Reading</a></p>
							</div>
						</div><?php

							}
						}
								?>

			</div>
	</section>
	<!-- End posts-entry -->

	<!-- Start posts-entry -->
	<section class="section posts-entry">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Construction</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="search.php?search=<?php echo "construction"; ?>" class="read-more">View All</a></div>
			</div>
			<div class="row g-3">
				<div class="col-md-9 order-md-2">
					<div class="row g-3">
						<?php
						$cate = "construction";
						$sql = "select * from blogs_tbl where category='$cate' order by createdAt desc limit 2";
						$res = mysqli_query($conn, $sql);
						if ($res->num_rows > 0) {
							foreach ($res as $row) { ?>

								<div class="col-md-6">
									<div class="blog-entry">
										<a href="single.php?id=<?php echo $row['id']; ?>" class="img-link">
											<img src="images/upload/blogs/<?php echo $row["image"]; ?>" alt="Image" style="height: 292px;width:496px;object-fit:cover;object-position:top;" class="img-fluid object-fit-cover">
										</a>
										<span class="date"><?php
															$date_string = $row["createdAt"];
															$date = new DateTime($date_string);

															$formatted_date = $date->format('M. jS, Y'); // 'M' for short month, 'jS' for day with suffix, 'Y' for year
															echo $formatted_date;
															?></span>
										<h2><a href="single.php?id=<?php echo $row['id']; ?>"><?php
																								echo substr($row['title'], 0, 26) . " ...";

																								?></a></h2>
										<p><?php
											echo substr($row['description'], 0, 70) . " ...";

											?></p>
										<p><a href="single.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-primary">Read More</a></p>
									</div>
								</div><?php
									}
								} ?>
					</div>
				</div>
				<div class="col-md-3">
					<ul class="list-unstyled blog-entry-sm">
						<?php
						$sql = "select * from blogs_tbl where category='$cate' order by createdAt desc limit 3 offset 2";
						$res = mysqli_query($conn, $sql);
						if ($res->num_rows > 0) {
							foreach ($res as $row) { ?>
								<li>
									<span class="date"><?php
														$date_string = $row["createdAt"];
														$date = new DateTime($date_string);

														$formatted_date = $date->format('M. jS, Y'); // 'M' for short month, 'jS' for day with suffix, 'Y' for year
														echo $formatted_date;
														?></span>
									<h3><a href="single.php?id=<?php echo $row['id']; ?>"><?php
																							echo substr($row['title'], 0, 26) . " ...";

																							?></a></h3>
									<p><?php
										echo substr($row['description'], 0, 70) . " ...";

										?></p>
									<p><a href="single.php?id=<?php echo $row['id']; ?>" class="read-more">Continue Reading</a></p>
								</li><?php
									}
								} ?>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="section">
		<div class="container">

			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">History</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="search.php?search=<?php echo "history"; ?>" class="read-more">View All</a></div>
			</div>

			<div class="row">
				<?php
				$cate = "history";
				$sql = "SELECT 
    blogs_tbl.id AS id,
    blogs_tbl.title AS title,
    blogs_tbl.description AS description,
    blogs_tbl.image AS image,
    blogs_tbl.tags AS tags,
    blogs_tbl.category AS category,
    blogs_tbl.createdAt AS createdAt,
    user_tbl.image AS userImage,
    user_tbl.bio AS userBio,
    user_tbl.name AS userName
FROM blogs_tbl
INNER JOIN user_tbl
ON user_tbl.email = blogs_tbl.userMail WHERE blogs_tbl.category='$cate'
ORDER BY createdAt DESC
LIMIT 6";
				$res = mysqli_query($conn, $sql);
				if ($res->num_rows > 0) {
					foreach ($res as $row) { ?>
						<div class="col-lg-4 mb-4">
							<div class="post-entry-alt">
								<a href="single.php?id=<?php echo $row['id']; ?>" class="img-link"><img src="images/upload/blogs/<?php echo $row["image"]; ?>" style="height: 280px;width:
						460px;object-fit:cover;" alt="Image" class="img-fluid"></a>
								<div class="excerpt">
									<h2><a href="single.php?id=<?php echo $row['id']; ?>"><?php
																							echo substr($row['title'], 0, 26) . " ...";
																							?></a></h2>
									<div class="post-meta align-items-center text-left clearfix">
										<figure class="author-figure mb-0 me-3 float-start"><img src="images/upload/user/<?php echo $row["userImage"]; ?>" alt="Image" class="img-fluid"></figure>
										<span class="d-inline-block mt-1">By <a href="single.php?id=<?php echo $row['id']; ?>"><?php echo $row['userName']; ?></a></span>
										<span>&nbsp;-&nbsp;<?php
															$date_string = $row["createdAt"];
															$date = new DateTime($date_string);
															$formatted_date = $date->format('M. jS, Y'); // 'M' for short month, 'jS' for day with suffix, 'Y' for year
															echo $formatted_date;
															?></span>
									</div>
									<p><?php
										echo substr($row['description'], 0, 70) . " ...";

										?></p>
									<p><a href="single.php?id=<?php echo $row['id']; ?>" class="read-more">Continue Reading</a></p>
								</div>
							</div>
						</div><?php
							}
						} ?>
			</div>

		</div>
	</section>

	<div class="section bg-light">
		<div class="container">

			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Travel</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="search.php?search=<?php echo "travel"; ?>" class="read-more">View All</a></div>
			</div>

			<div class="row align-items-stretch retro-layout-alt">

				<div class="col-md-5 order-md-2"><?php
													$cate = "travel";
													$sql = "select * from blogs_tbl where category='$cate' order by createdAt desc limit 1 offset 2";
													$res = mysqli_query($conn, $sql);
													if ($res->num_rows > 0) {
														foreach ($res as $row) { ?>
							<a href="single.php?id=<?php echo $row['id']; ?>" class="hentry img-1 h-100 gradient">
								<div class="featured-img" style="background-image: url('images/upload/blogs/<?php echo $row["image"]; ?>');"></div>
								<div class="text">
									<span><?php
									$date_string = $row["createdAt"];
									$date = new DateTime($date_string);
									$formatted_date = $date->format('M. jS, Y'); // 'M' for short month, 'jS' for day with suffix, 'Y' for year
									echo $formatted_date;
									?></span>
									<h2><?php echo substr($row['title'], 0, 26) . " ...";
								?></h2>
								</div>
							</a>
					<?php
														}
													} ?>

				</div>

				<div class="col-md-7">
				<?php
													$cate = "travel";
													$sql = "select * from blogs_tbl where category='$cate' order by createdAt desc limit 1 offset 4";
													$res = mysqli_query($conn, $sql);
													if ($res->num_rows > 0) {
														foreach ($res as $row) {?>
														<a href="single.php?id=<?php echo $row['id']; ?>" class="hentry img-2 v-height mb30 gradient">
						<div class="featured-img" style="background-image: url('images/upload/blogs/<?php echo $row["image"]; ?>');');"></div>
						<div class="text text-sm">
							<span><?php
									$date_string = $row["createdAt"];
									$date = new DateTime($date_string);
									$formatted_date = $date->format('M. jS, Y'); // 'M' for short month, 'jS' for day with suffix, 'Y' for year
									echo $formatted_date;
									?></span>
							<h2><?php echo substr($row['title'], 0, 26) . " ...";
								?></h2>
						</div>
					</a>
														<?php

														}} ?>
					

					<div class="two-col d-block d-md-flex justify-content-between">

						<?php
						$cate = "travel";
						$sql = "select * from blogs_tbl where category='$cate' order by createdAt desc limit 2";
						$res = mysqli_query($conn, $sql);
						if ($res->num_rows > 0) {
							foreach ($res as $row) { ?>
								<a href="single.php?id=<?php echo $row['id']; ?>" class="hentry v-height img-2 gradient">
									<div class="featured-img" style="background-image: url('images/upload/blogs/<?php echo $row["image"]; ?>');"></div>
									<div class="text text-sm">
										<span><?php
												$date_string = $row["createdAt"];
												$date = new DateTime($date_string);
												$formatted_date = $date->format('M. jS, Y'); // 'M' for short month, 'jS' for day with suffix, 'Y' for year
												echo $formatted_date;
												?></span>
										<h2><?php echo substr($row['title'], 0, 26) . " ...";
											?></h2>
									</div>
								</a><?php
								}
							} ?>
					</div>

				</div>
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