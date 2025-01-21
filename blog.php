<?php
include("./config/config.php");
// Pagination setup
$limit = 5; // Number of blogs per page
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Current page number
if ($page < 1) $page = 1; // Ensure the page number is valid
$offset = ($page - 1) * $limit; // Calculate offset

// Fetch total number of blogs
$total_query = "SELECT COUNT(*) as total FROM blogs_tbl";
$total_result = mysqli_query($conn, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_blogs = $total_row['total'];

// Calculate total pages
$total_pages = ceil($total_blogs / $limit);

// Fetch blogs for the current page
// $query = "SELECT * FROM blogs_tbl ORDER BY createdAt ASC LIMIT $limit OFFSET $offset";
$query = "SELECT 
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
ON user_tbl.email = blogs_tbl.userMail
ORDER BY createdAt DESC
LIMIT $limit OFFSET $offset;
";
$result = mysqli_query($conn, $query);
$blogs = mysqli_fetch_all($result, MYSQLI_ASSOC);

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

  <title>Blogy | blogs</title>
</head>

<body>
  <?php include("./layout/loginsignup.php"); ?>
  <?php include("./layout/header.php"); ?>

  <div class="hero overlay inner-page bg-primary py-5">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center pt-5">
        <div class="col-lg-6">
          <h1 class="heading text-white mb-3" data-aos="fade-up">Blog</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="section search-result-wrap">
    <div class="container">


      <div class="row posts-entry">
        <div class="col-lg-8">
          <?php if (!empty($blogs)) {
            foreach ($blogs as $blog) { ?>
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
              </div><?php
                  }
                } else { ?>
            <div class="col-12">
              <p class="text-center">No blogs found!</p>
            </div> <?php
                  }
                    ?>
          <nav>
            <ul class="pagination justify-content-center">
              <?php
              // Check for previous page
              if ($page > 1) {
                echo '<li class="page-item mx-2">
                            <a class="page-link" href="?page=' . ($page - 1) . '" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>';
              }

              // Display current page and other pages (simplified)
              if ($page > 1) {
                echo '<li class="page-item mx-2">
                            <a class="page-link" href="?page=1">1</a>
                        </li>';
              }

              if ($page > 2) {
                echo '<span>...</span>';
              }

              echo '<li class="page-item active mx-2">
                        <a class="page-link" href="?page=' . $page . '">' . $page . '</a>
                    </li>';

              if ($page < $total_pages - 1) {
                echo '<span>...</span>';
              }

              if ($page < $total_pages) {
                echo '<li class="page-item mx-2">
                            <a class="page-link" href="?page=' . $total_pages . '">' . $total_pages . '</a>
                        </li>';
              }

              // Check for next page
              if ($page < $total_pages) {
                echo '<li class="page-item mx-2">
                            <a class="page-link" href="?page=' . ($page + 1) . '" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>';
              }
              ?>
            </ul>
          </nav>

        </div>

        <div class="col-lg-4 sidebar">

          <div class="sidebar-box search-form-wrap mb-4">
            <form action="search-result.php" class="sidebar-search-form">
              <span class="bi-search"></span>
              <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
            </form>
          </div>
          <!-- END sidebar-box -->
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