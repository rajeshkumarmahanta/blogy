<?php
include('./config/config.php');
session_start();
if (empty($_SESSION['user'])) {
    header('location:index.php');
}

// Handle deletion of blogs
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = intval($_GET['id']); // Ensure the ID is an integer for safety
    $sql_delete = "DELETE FROM blogs_tbl WHERE id='$id'";
    $res_delete = mysqli_query($conn, $sql_delete);

    if ($res_delete) {
        echo '<script>window.location.href="my-blog.php"</script>';
    } else {
        echo '<script>alert("Something went wrong!")</script>';
    }
}

// Pagination logic
$email = $_SESSION['user'];
$limit = 5; // Number of blogs per page
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Current page
$offset = ($page - 1) * $limit; // Offset for SQL query

// Fetch total number of blogs for the user
$total_query = "SELECT COUNT(*) AS total FROM blogs_tbl WHERE userMail='$email'";
$total_result = mysqli_query($conn, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_blogs = $total_row['total'];

// Calculate total pages
$total_pages = ceil($total_blogs / $limit);

// Fetch blogs for the current page
$blogs_query = "SELECT * FROM blogs_tbl WHERE userMail='$email' ORDER BY createdAt DESC  LIMIT $limit OFFSET $offset";
$blogs_res = mysqli_query($conn, $blogs_query);
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
  <title>Blogy | My blogs</title>
</head>
<body>
<?php include("./layout/header.php"); ?>

<div class="hero overlay inner-page bg-primary py-5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center pt-5">
            <div class="col-lg-6">
                <h1 class="heading text-white mb-3" data-aos="fade-up">My Blogs</h1>
            </div>
        </div>
    </div>
</div>

<div class="section search-result-wrap">
    <div class="container">
        <div class="row posts-entry">
        <?php
        if (mysqli_num_rows($blogs_res) > 0) {
            while ($row = mysqli_fetch_assoc($blogs_res)) { ?>
                <div class="col-lg-12">
                    <div class="blog-entry d-flex blog-entry-search-item">
                        <a href="update-blog.php?id=<?php echo $row["id"]; ?>" class="img-link me-4">
                            <img src="images/upload/blogs/<?php echo $row["image"]; ?>" alt="Image" class="img-fluid blog-img object-fit-cover">
                        </a>
                        <div>
                            <span class="date"><?php 
                                $date_string = $row["createdAt"];
                                $date = new DateTime($date_string);
                                echo $date->format('M. jS, Y');
                            ?> &bullet; <a href="#" class="text-capitalize"><?php echo $row["category"]; ?></a><span class="mx-2 text-capitalize"><?php echo $row["viewCount"]; ?> people read</span></span>
                            <h2><a href="single.php?id=<?php echo $row["id"]; ?>"><?php 
                                $title = $row["title"];
                                echo substr($title, 0, 101);
                            ?></a></h2>
                            <p><?php 
                                $desc = $row["description"];
                                echo htmlentities(substr($desc, 0, 250)) . " ...";
                            ?></p>
                            <p>
                                <a href="update-blog.php?id=<?php echo $row["id"]; ?>" class="btn btn-sm btn-outline-primary">Update</a>
                                <a href="change-image.php?id=<?php echo $row["id"]; ?>" class="btn btn-sm btn-outline-primary">Change image</a>
                                <a href="my-blog.php?action=delete&id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure to delete your blog?')" class="btn btn-sm btn-outline-danger">Delete</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php }
        } else {
            echo "<p>No blogs found!</p>";
        }
        ?>
        </div>

        <!-- Pagination -->
        <div class="row text-start pt-5 border-top">
            <div class="col-md-12">
                <div class="custom-pagination">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?php echo $page - 1; ?>">Prev</a>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <a href="?page=<?php echo $i; ?>" <?php if ($i == $page) echo 'class="active"'; ?>><?php echo $i; ?></a>
                    <?php endfor; ?>
                    <?php if ($page < $total_pages): ?>
                        <a href="?page=<?php echo $page + 1; ?>">Next</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("./layout/footer.php"); ?>
<div id="overlayer"></div>
<div class="loader">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>
<?php include("./layout/jslink.php"); ?>
</body>
</html>
