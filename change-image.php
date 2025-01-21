
<?php
include('./config/config.php');
session_start();
if (empty($_SESSION['user'])) {
    header('location:index.php');
}
$id = intval($_GET['id']);
$fetch_query_img = "select image from blogs_tbl where id=$id";
$res_image = mysqli_query($conn, $fetch_query_img);
$blog_image = [];
if (mysqli_num_rows($res_image) > 0) {
    $blog_image = mysqli_fetch_assoc($res_image);
}
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

    <script src="fckeditor/fckeditor.js"></script>
    <title>Blogy | Update image</title>
</head>

<body>

    <?php include("./layout/header.php"); ?>
    <div class="hero overlay inner-page bg-primary py-4">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h1 class="heading text-white mb-3 text-uppercase" data-aos="fade-up">Update  Image</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="border p-4 ">
            <form action="" method="post" enctype="multipart/form-data">
                
                <div class="mb-3">
                    <label for="img" class="text-dark h4">Image</label>
                    <div class="mb-3">
                        <img src="images/upload/blogs/<?php echo $blog_image["image"]; ?>" class="w-25 " alt="">
                    </div>
                    <input type="file" id="img" name="image" class="form-control">
                </div>
                

                <button type="submit" name="updateBlogImage" class="btn btn-outline-dark">Change</button>
            </form>
            <?php
            if (isset($_POST['updateBlogImage'])) {
                $file = $_FILES['image'];
                
                // File properties
                $fileName = $file['name'];
                $fileTmpName = $file['tmp_name'];
                $fileSize = $file['size'];
                $fileError = $file['error'];
                $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                $uploadDir = 'images/upload/blogs/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true); // Create directory if not exists
                }
                
                // Generate unique file name
                $newFileName = uniqid('', true) . '.' . $fileExt;
                
                // Move the uploaded file
                $destination = $uploadDir . $newFileName;
                if (move_uploaded_file($fileTmpName, $destination)) {
                    $update_query = "update blogs_tbl set image='$newFileName' where id = $id";
                    $blog_result_ = mysqli_query($conn, $update_query);
                    if ($blog_result_) {
                        echo '<script>window.location.href="my-blog.php"</script>';
                    }
                }
                
            }
            ?>
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
