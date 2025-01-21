<?php
include("./config/config.php");
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


  <title>Blogy </title>
</head>
<body>

<?php include("./layout/loginsignup.php"); ?>
<?php include("./layout/header.php"); ?>

  <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('images/hero_5.jpg');">
    <div class="container">
      <div class="row same-height justify-content-center">
        <div class="col-md-10">
          <div class="post-entry text-center">
            <?php
            $id= $_GET['id'];
            if($id>0){
              $sql = "update blogs_tbl set viewCount = viewCount+1 where id='$id'";
              $res = mysqli_query($conn,$sql);
            }
            $single_query = "select * from blogs_tbl where id='$id'";
            $res_single = mysqli_query($conn,$single_query);
            $single_blog=[];
            $postedby=[];
            if ($res_single) {
              if (mysqli_num_rows($res_single) > 0) {
                  // Fetch the blog data
                  $single_blog = mysqli_fetch_assoc($res_single);
              } else {
                  // No blog found for the given ID
                  echo "<h1>Blog not found.</h1>";
              }
              $postby = $single_blog['userMail'];
              $sql_postby = "select name,image,bio from user_tbl where email='$postby'";
              $res_postby = mysqli_query($conn,$sql_postby);
             
              if($res_postby){
                $postedby = mysqli_fetch_assoc($res_postby);
              }
          } else {
              // Query error
              die("Query failed: " . mysqli_error($conn));
          }
            ?>
            <h1 class="mb-4"><?php echo $single_blog['title']; ?></h1>
            <div class="post-meta align-items-center text-center">
              <figure class="author-figure mb-0 me-3 d-inline-block"><img src="images/upload/user/<?php echo $postedby['image']; ?>" alt="Image" class="img-fluid"></figure>
              <span class="d-inline-block mt-1">By <?php echo $postedby['name']; ?></span>
              <span>&nbsp;-&nbsp; <?php
               $date_string = $single_blog["createdAt"];;
               $date = new DateTime($date_string);

               $formatted_date = $date->format('M. jS, Y'); // 'M' for short month, 'jS' for day with suffix, 'Y' for year
               echo $formatted_date;
              ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="container">

      <div class="row blog-entries element-animate">

        <div class="col-md-12 col-lg-8 main-content">

          <div class="post-content-body">
            <p><?php echo $single_blog['description']; ?></p>
            <div class="row my-4">
              <div class="col-md-12 mb-4">
                <img src="images/upload/blogs/<?php echo $single_blog['image']; ?>" style="height: 574px;
    width: 100%;
    object-fit: cover;
    object-position: center;" alt="Image placeholder" class="img-fluid rounded">
              </div>
              
            </div>
          </div>


          <div class="pt-5">
            
            <p>
              <span class="mx-2">
            Categories: 
            <?php
            $removeSpace = str_replace(" ","",$single_blog['category']);
            ?>
            <a class="text-capitalize" href="search-result.php?search=<?php echo $removeSpace; ?>"><?php
            echo $single_blog['category'];
            ?></a> 
            </span>
            <span class="mx-2">
           Tags: 
           <?php
           $tags=explode(",",$single_blog['tags']);
           foreach($tags as $tag){
            $removeSpacetag = str_replace(" ","",$tag);
            ?>
            <a class="text-capitalize mx-1" href="search-result.php?search=<?php echo $removeSpacetag; ?>"><?php echo $tag; ?></a><?php
           }
           ?></span>
            <span class="mx-2">
           <?php echo $single_blog['viewCount']; ?> People read this blog</span>
           </p>
          </div>
            

          <div class="pt-5 comment-wrap">
          <?php
$que = "SELECT 
    COUNT(comment.id) AS total_comments
FROM 
    comment
JOIN 
    blogs_tbl ON comment.blogId = blogs_tbl.id
WHERE 
    blogs_tbl.id = $id
GROUP BY 
    blogs_tbl.id, blogs_tbl.title";
    $re =mysqli_query($conn,$que);
    $totalComment;
    if(mysqli_num_rows($re)>0){ 
     $totalComment= mysqli_fetch_assoc($re);?>
    
      <h3 class="mb-5 heading"><?php echo $totalComment['total_comments'];?> Comments</h3>
<?php
    }
?>
            
            <ul class="comment-list">
<?php
$sql = "SELECT 
    comment.id AS comment_id,
    comment.comment as commentText,
    comment.blogId,
    comment.createdAt as commenTime,
    user_tbl.name AS commenter_name,
    user_tbl.email AS commenter_email,
    user_tbl.image AS commenter_image
FROM 
    comment
JOIN 
    user_tbl ON comment.commentBy = user_tbl.email
WHERE 
    comment.blogId = $id;
";
$result_comment = mysqli_query($conn,$sql);
$comments=[];
if(mysqli_num_rows($result_comment)>0){ 
  // $comments = mysqli_fetch_assoc($result_comment);
  foreach($result_comment as $comment){?>
    <li class="comment">
    <div class="vcard">
      <img src="images/upload/user/<?php echo $comment['commenter_image']; ?>" alt="Image placeholder">
    </div>
    <div class="comment-body">
      <h3 class="text-capitalize"><?php echo $comment['commenter_name']; ?></h3>
      <div class="meta"><?php
      $date = $comment['commenTime']; // Original date in 'Y-m-d' format
      
      $timestamp = strtotime($date); // Convert to Unix timestamp
      $formattedDate = date('F j, Y', $timestamp);
      
      echo $formattedDate; // Output: January 16, 2025
      ?>
      
      </div>
      <p class="text-capitalize"><?php echo $comment['commentText']; ?></p>
      
    </div>
  </li><?php
  }
  
}
?>
           
              
            </ul>
            <!-- END comment-list -->
<?php
if(!empty($_SESSION['user'])){ ?>
  <div class="comment-form-wrap pt-5">
  <h3 class="mb-5">Leave a comment</h3>
  <form action="" method="post">
    <input type="text" name="comment" class="form-control" required placeholder="Write your comment">
    <button class="btn btn-primary"
     type="submit" name="postComment"
    >Post a comment</button>
  </form>
</div><?php
}else{ ?>
  <button type="button" class="btn btn-dark login-btn me-2" data-bs-toggle="modal" data-bs-target="#ModalFormLogin">
  login
</button><?php
}
?>
            
          </div>

        </div>

        <!-- END main-content -->

        <div class="col-md-12 col-lg-4 sidebar">
          <div class="sidebar-box search-form-wrap">
            <form action="#" class="sidebar-search-form">
              <span class="bi-search"></span>
              <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
            </form>
          </div>
          <!-- END sidebar-box -->
          <div class="sidebar-box">
            <div class="bio text-center">
              <img src="images/upload/user/<?php echo $postedby['image']; ?>" alt="Image Placeholder" class="img-fluid mb-3">
              <div class="bio-body">
                <h2 class="text-capitalize"><?php echo $postedby['name']; ?></h2>
                <p class="mb-4"><?php echo $postedby['bio']; ?></p>
                <p><a href="#" class="btn btn-primary btn-sm rounded px-2 py-2">Read my bio</a></p>
                <p class="social">
                  <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                  <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                  <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                  <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                </p>
              </div>
            </div>
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
        <!-- END sidebar -->

      </div>
    </div>
  </section>


  <!-- Start posts-entry -->
  <section class="section posts-entry posts-entry-sm bg-light">
    <div class="container">
      <div class="row mb-4">
        <div class="col-12 text-uppercase text-black">More Blog Posts</div>
      </div>
      <div class="row">
        <?php
        $sql_query_more = "SELECT * FROM `blogs_tbl` order by createdAt DESC limit 4";
        $more_blogs_res= mysqli_query($conn,$sql_query_more);
        // $more_blogs = [];
        if(mysqli_num_rows($more_blogs_res)>0){
          foreach($more_blogs_res as $blog){ ?>
            <div class="col-md-6 col-lg-3">
            <div class="blog-entry">
              <a href="single.php?id=<?php echo $blog["id"]; ?>" class="img-link">
                <img src="images/upload/blogs/<?php echo $blog['image']; ?>" style="height: 235px;
    width: 310px;
    object-fit: cover;"  alt="Image" class="img-fluid">
              </a>
              <span class="date"><?php
              
              $date_string = $blog["createdAt"];
               $date = new DateTime($date_string);

               $formatted_date = $date->format('M. jS, Y'); // 'M' for short month, 'jS' for day with suffix, 'Y' for year
               echo $formatted_date;?></span>
              <h2><a href="single.php?id=<?php echo $blog["id"]; ?>"><?php $shortTitle = substr($blog['title'],0,37) . " ..."; 
              echo $shortTitle;
              ?></a></h2>
              <p><?php
              $shortDesc = substr($blog['description'],0,110) . " ...";
              echo $shortDesc; ?></p>
              <p><a href="single.php?id=<?php echo $blog["id"]; ?>" class="read-more">Continue Reading</a></p>
            </div>
          </div>  <?php
          }
        }
        
        ?>
            
      </div>
    </div>
  </section>
  <!-- End posts-entry -->

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


  <?php 
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $blogId = $_GET['id'];
    $commentBy = $_SESSION['user'];
    $comment = $_POST['comment'];
  
    $query = "INSERT INTO comment (blogId, commentBy, comment) VALUES ('$blogId','$commentBy','$comment')";
    $res_comment = mysqli_query($conn,$query);
    if($res_comment){
      echo "<script>window.location.href='blog.php'</script>";
    }

  }
  ?>
