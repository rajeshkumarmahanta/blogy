<?php
include('./config/config.php');
session_start();
if (empty($_SESSION['user'])) {
    header('location:index.php');
} else {
    $id = intval($_GET['id']);
    $fetch_query = "select * from blogs_tbl where id=$id";
    $res = mysqli_query($conn, $fetch_query);
    $blog = [];
    if (mysqli_num_rows($res) > 0) {
        $blog = mysqli_fetch_assoc($res);
    }
    $tags = $blog['tags'];
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

        <!-- <script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script>  -->
  <!-- <script type="text/javascript">
 
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  </script> -->
        <title>Blogy | Update blog</title>
    </head>

    <body>

        <?php include("./layout/header.php"); ?>
        <div class="hero overlay inner-page bg-primary py-4">
            <div class="container">
                <div class="row align-items-center justify-content-center text-center pt-5">
                    <div class="col-lg-6">
                        <h1 class="heading text-white mb-3 text-uppercase" data-aos="fade-up">Update Blog</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <div class="border p-4 ">
                <form action="" method="post">
                    <div class="mb-2">
                        <label for="" class="text-dark h4">Blog Title</label>
                        <input type="text" name="title" value="<?php echo $blog['title']; ?>" class="form-control text-dark">
                    </div>
                    <div class="mb-2">
                        <label for="" class="text-dark h4">Blog Category</label>
                        <input type="text" value="<?php echo $blog['category']; ?>" name="category" class="form-control text-dark">
                    </div>


                    <!-- <div class="mb-2">
                    <label for="" class="text-dark h4">Tags</label>
                    <input type="text" name="tag" class="form-control text-dark">
                </div> -->
                    <div class="mb-3">
                        <label for="tags-input" class="text-dark h4">Enter Tags:</label>
                        <input type="text" id="tags-input" class="form-control" placeholder="Type a tag and press Enter">
                        <div id="tags-container" class="mt-2"></div>
                    </div>

                    <!-- Hidden input to store the tags as a comma-separated string -->
                    <input type="hidden" name="tags" id="hidden-tags-input" value="<?php echo htmlspecialchars($tags); ?>" />
                    <div class="mb-2">
                    <label for="" class="text-dark h4">Blog Content</label>
                    <!-- FCKEditor Text Area -->
                    <textarea id="editor" class="blog-content" name="editor"><?php echo $blog['description']; ?></textarea>
                </div>


                    <button type="submit" name="updateBlog" class="btn btn-outline-dark">Submit</button>
                </form>
                <?php
                if (isset($_POST['updateBlog'])) {
                    $userEmail=$_SESSION['user'];
                    $title = $_POST['title'];
                    $category = $_POST['category'];
                    $tags = $_POST['tags'];
                    $description = mysqli_real_escape_string($conn, $_POST['editor']);
                    $update_blog = "UPDATE blogs_tbl SET title='$title',description='$description',tags='$tags',category='$category' WHERE id='$id'";
                    $update_result = mysqli_query($conn, $update_blog);
                    if ($update_result) {
                        echo '<script>window.location.href="my-blog.php"</script>';
                    } else {
                        echo '<script>alert("Some thing went wrong !")</script>';
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
        
        <script>
            const tagsInput = document.getElementById('tags-input');
            const tagsContainer = document.getElementById('tags-container');
            const hiddenTagsInput = document.getElementById('hidden-tags-input');

            // Initialize tags array from PHP
            let tags = <?php echo json_encode(explode(',', $tags)); ?>; // Convert PHP tags to JavaScript array

            // Render the existing tags from the database
            tags.forEach(tag => {
                addTagToContainer(tag);
            });

            // Add tag when pressing Enter
            tagsInput.addEventListener('keydown', (event) => {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    const tag = tagsInput.value.trim();
                    if (tag && !tags.includes(tag)) {
                        tags.push(tag);
                        addTagToContainer(tag);
                        updateHiddenInput();
                    }
                    tagsInput.value = ''; // Clear input
                }
            });

            // Add tag to the container
            function addTagToContainer(tag) {
                const tagElement = document.createElement('span');
                tagElement.classList.add('tag');
                tagElement.innerHTML = `${tag} <span class="remove">&times;</span>`;
                tagElement.querySelector('.remove').addEventListener('click', () => {
                    removeTag(tag);
                });
                tagsContainer.appendChild(tagElement);
            }

            // Remove tag
            function removeTag(tag) {
                tags = tags.filter(t => t !== tag);
                updateHiddenInput();
                renderTags();
            }

            // Update hidden input with tags
            function updateHiddenInput() {
                hiddenTagsInput.value = tags.join(',');
            }

            // Render tags
            function renderTags() {
                tagsContainer.innerHTML = '';
                tags.forEach(tag => addTagToContainer(tag));
            }
        </script>
    </body>

    </html>

<?php } ?>