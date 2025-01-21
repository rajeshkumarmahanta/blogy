<?php
include("./config/config.php");
$query = str_replace(" ","",$_GET['query']);

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

	<title>Blogy | <?php echo $query; ?></title>
</head>

<body>

	<?php include("./layout/loginsignup.php"); ?>
	<?php include("./layout/header.php"); ?>

	<div class="section search-result-wrap">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="heading text-capitalize">Search: '<?php echo $query; ?>'</div>
				</div>
			</div>
			<div class="row posts-entry">
				<div class="col-lg-8">
					<?php
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
ON user_tbl.email = blogs_tbl.userMail where blogs_tbl.category LIKE '%$query%' OR blogs_tbl.tags LIKE '%$query%' OR blogs_tbl.title LIKE '%$query%'
ORDER BY createdAt DESC";
					$blogs_result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($blogs_result) > 0) {
						foreach ($blogs_result as $blog) { ?>
							<div class="blog-entry d-flex blog-entry-search-item">
								<a href="single.php?id=<?php echo $blog["id"]; ?>" class="img-link me-4">
									<img src="images/upload/blogs/<?php echo $blog["image"]; ?>" alt="Image" style="height: 280px;width:496px;object-fit:cover;" class="img-fluid">
								</a>
								<div>
									<span class="date"><?php
														$date_string = $blog["createdAt"];;
														$date = new DateTime($date_string);

														$formatted_date = $date->format('M. jS, Y'); // 'M' for short month, 'jS' for day with suffix, 'Y' for year
														echo $formatted_date;
														?> &bullet; <a href="single.php?id=<?php echo $blog["id"]; ?>" class="text-capitalize"><?php echo $blog["category"]; ?></a></span>
									<h2><a href="single.php?id=<?php echo $blog["id"]; ?>"><?php
																							$blogTitle = $blog["title"];
																							$shortTitle = substr($blogTitle, 0, 60) . " ...";
																							echo $shortTitle;
																							?></a></h2>
									<div class="post-meta align-items-center ">
										<figure class="author-figure mb-0 me-3 d-inline-block"><img src="images/upload/user/<?php echo $blog["userImage"]; ?>" alt="Image" class="img-fluid"></figure>
										<span class="d-inline-block mt-1">By <?php echo $blog["userName"]; ?></span>
									</div>
									<p><?php $desc = $blog["description"];
										$shortDesc = substr($desc, 0, 190) . " ...";
										echo $shortDesc; ?></p>
									<p><a href="single.php?id=<?php echo $blog["id"]; ?>" class="btn btn-sm btn-outline-primary">Read More</a></p>
								</div>
							</div>
					<?php
						}
					}else{
						echo '<h1 class="text-capitalize">blog not found</h1>';
					} ?>
				</div>

				<div class="col-lg-4 sidebar">

					<div class="sidebar-box search-form-wrap mb-4">
						<!-- <form action="#" class="sidebar-search-form">
							<span class="bi-search"></span>
							<input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
						</form> -->
						<form action="#" class="d-none d-lg-inline-block">
							<div class="input-group d-flex align-items-center">
								<input
									type="text" id="search"
									class="form-control m-0 text-dark"
									name="query"
									placeholder="Search here..."
									aria-label="Search"
									required>
								<button class="btn btn-primary px-2 py-1" type="submit">Search</button>
							</div>
						</form>
					</div>
					<?php
					include("./layout/latest-post.php");
					?>
					<!-- END sidebar-box -->

					<?php
					include("./layout/category.php");
					?>
					<!-- END sidebar-box -->
					<?php
					include("./layout/tags.php");
					?>

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