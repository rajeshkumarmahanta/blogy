<?php
include('./config/config.php');
session_start();
if (empty($_SESSION['user'])) {
    header('location:index.php');
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
    <!-- <script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script> 
  <script type="text/javascript">
 
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  </script> -->
    <!-- <script src="fckeditor/fckeditor.js"></script> -->
    <title>Blogy | Create Blog</title>
</head>

<body>
    <?php include("./layout/header.php"); ?>
    <div class="hero overlay inner-page bg-primary py-4">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center pt-5">
                <div class="col-lg-6">
                    <h1 class="heading text-white mb-3 text-uppercase" data-aos="fade-up">Create Blog</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="border p-4 ">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-2">
                    <label for="" class="text-dark h4">Blog Title</label>
                    <input type="text" id="blogTitle" name="title" class="form-control text-dark">
                </div>
                <div class="mb-2">
                    <label for="" class="text-dark h4">Blog Category</label>
                    <input type="text" id="blogCategory" name="category" class="form-control text-dark">
                </div>
                <div class="mb-3">
                    <label for="img" class="text-dark h4">Image</label>
                    <input type="file" id="img" name="image" class="form-control">
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

                <input type="hidden" name="tags" id="hidden-tags-input" />
                <div class="mb-2">
                    <label for="" class="text-dark h4">Blog Content</label>
                    <!-- FCKEditor Text Area -->
                    <textarea id="blogContent" class="blog-content" name="editor"></textarea>
                </div>


                <button type="submit" name="createBlog" class="btn btn-outline-dark">Submit</button>
            </form>
            <?php
            if (isset($_POST['createBlog'])) {
                $title = mysqli_real_escape_string($conn,$_POST['title']);
                $category = mysqli_real_escape_string($conn,$_POST['category']);
                $tags =mysqli_real_escape_string($conn,$_POST['tags']);
                $description = mysqli_real_escape_string($conn,$_POST['editor']);
                $userMail = mysqli_real_escape_string($conn,$_SESSION['user']);
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

                    $sql_create_blog = "INSERT INTO blogs_tbl (title, description, userMail, tags, image, category) VALUES ('$title','$description','$userMail','$tags','$newFileName','$category')";
                    $result_blog_create = mysqli_query($conn, $sql_create_blog);
                    if ($result_blog_create) {
                        echo '<script>window.location.href="my-blog.php"</script>';
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                } else {
                    echo '<script>alert("some thing went wrong ! !")</script>';
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
    <!-- <script>
        // Initialize FCKEditor
        var editor = new FCKeditor('editor');
        editor.BasePath = 'fckeditor/';
        editor.ReplaceTextarea();
    </script> -->
    <script>
        const tagsInput = document.getElementById('tags-input');
        const tagsContainer = document.getElementById('tags-container');
        const hiddenTagsInput = document.getElementById('hidden-tags-input');

        let tags = [];

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