<?php
include('./config/config.php');
session_start();
if (empty($_SESSION['user'])) {
    header('location:index.php');
} else {

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


        <title>Blogy | Profile</title>
    </head>

    <body>
        <?php
        $id = intval($_GET['id']);
        $query = "SELECT 
    comment.comment AS comment,
    blogs_tbl.title AS blogTitle
FROM 
    comment 
INNER JOIN 
    blogs_tbl 
ON 
    comment.blogId = blogs_tbl.id
WHERE 
    comment.id = $id";
        $result = mysqli_query($conn, $query);
        $comment = [];
        if ($result) {
            $comment = mysqli_fetch_assoc($result);
        }
        ?>


        <?php include("./layout/header.php"); ?>


        <div class="container my-5">
            <h2 class="my-3">Edit your comment</h2>
            <form action="" method="post">
                <div class="mb-2">
                    <label for="blogTitle" class="text-dark h4">Blog Title</label>
                    <input type="text" id="blogTitle" readonly name="title" value="<?php echo $comment['blogTitle']; ?>" class="form-control text-dark">
                </div>
                <div class="mb-2">
                    <label for="comment" class="text-dark h4">Comment</label>
                    <input type="text" id="comment" name="comment" value="<?php echo $comment['comment']; ?>" class="form-control text-dark">
                </div>
                <div class="mb-2">
                    <button type="submit" name="editBlog" class="btn btn-primary">Submit</button>
                    <a href="profile.php" class="btn btn-primary">Back</a>
                </div>
            </form>
            <?php
            if(isset($_POST['editBlog'])){
                $comment_text = $_POST['comment'];
                $sql = "update comment set comment='$comment_text' where id=$id";
                $res = mysqli_query($conn,$sql);
                echo "<script>window.location.href='profile.php';</script>";
            }
            ?>
        </div>
        <?php include("./layout/footer.php"); ?>



        <!-- Preloader -->
        <div id="overlayer"></div>
        <div class="loader">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <?php
        if ($_GET['deleteComment'] == "deleteComment") {
            $deleteid = $_GET['deleteid'];
            $query = "delete from comment where id='$deleteid'";
            $result_delete = mysqli_query($conn, $query);
            echo "<script>window.location.href='profile.php'</script>";
        }
        ?>
        


        <?php include("./layout/jslink.php"); ?>
    </body>

    </html>

<?php } ?>