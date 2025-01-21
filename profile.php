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



        <?php include("./layout/header.php"); ?>


        <div class="container my-5">
            <div class="card">
                <div class="card-body">
                    <?php
                    $email = $_SESSION['user'];
                    // Fetch user details
                    $query = "SELECT id, name, email, phone, bio, image, createdAt, designation, country FROM user_tbl WHERE email='$email'";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        $user = mysqli_fetch_assoc($result);
                    }
                    ?>
                    <div class="d-flex align-items-center mb-4">
                        <img src="images/upload/user/<?php echo $user["image"]; ?>" class="me-2 rounded rounded-circle profile-picture-profile" />
                        <div>

                            <h4><?php echo $user['name']; ?></h4>
                            <p class="text-muted text-capitalize mb-0"><?php echo $user["designation"]; ?></p>
                            <p class="text-muted text-capitalize mb-0"><?php echo $user['country']; ?></p>
                        </div>
                    </div>

                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#overview">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#edit">Edit Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#change-password">Change Password</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#comment">My Comments</a>
                        </li>
                    </ul>

                    <div class="tab-content mt-4">
                        <!-- Overview Tab -->
                        <div class="tab-pane fade show active" id="overview">
                            <h5>About</h5>
                            <p><?php echo $user['bio']; ?></p>
                            <h5>Profile Details</h5>
                            <ul class="list-unstyled">
                                <li><strong class="text-capitalize">Name:</strong> <?php echo $user['name']; ?></li>
                                <li><strong class="text-capitalize">Designation:</strong> <?php echo $user['designation']; ?></li>
                                <li><strong class="text-capitalize">Country:</strong> <?php echo $user['country']; ?></li>
                                <li><strong class="text-capitalize">Phone:</strong> <?php echo $user['phone']; ?></li>
                                <li><strong class="text-capitalize">Email:</strong> <?php echo $user['email']; ?></li>
                                <li><strong class="text-capitalize">Last Update:</strong> <?php echo $user['createdAt']; ?></li>
                            </ul>
                        </div>

                        <!-- Edit Profile Tab -->
                        <div class="tab-pane fade" id="edit">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <!-- <label for="profileImage" class="form-label">Profile Image</label>
                <input type="file" class="form-control text-dark" id="profileImage"> -->
                                    <div class="profile-container d-flex align-items-center">
                                        <!-- Profile Picture -->
                                        <img src="images/upload/user/<?php echo $user["image"]; ?>" id="profilePicture" class="me-2 w-50 h-50 object-fit-cover">

                                        <!-- Buttons -->
                                        <div class="button-container">
                                            <!-- Upload Button -->
                                            <label class="upload-btn" for="fileInput">
                                                &#8593; <!-- Upload Icon -->
                                                <input type="file" name="image" id="fileInput">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="fullName" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control text-dark" id="fullName" value="<?php echo $user['name']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="about" class="form-label">About</label>
                                    <textarea class="form-control text-dark" id="about" name="bio" rows="3"><?php

                                                                                                            echo $user['bio']; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="company" class="form-label">Country</label>
                                    <input type="text" name="country" class="form-control text-dark" id="Country" value="<?php echo $user['country']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="job" class="form-label">Designation</label>
                                    <input type="text" class="form-control text-dark" id="job" name="designation" value="<?php echo $user['designation']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control text-dark" id="phone" name="phone" value="<?php echo $user['phone']; ?>">
                                </div>
                                <button type="submit" name="update" class="btn btn-primary">Save Changes</button>
                            </form>
                            <?php
                            if (isset($_POST['update'])) {
                                $name = mysqli_real_escape_string($conn, $_POST['name']);
                                $bio = mysqli_real_escape_string($conn, $_POST['bio']);
                                $country = mysqli_real_escape_string($conn, $_POST['country']);
                                $designation = mysqli_real_escape_string($conn, $_POST['designation']);
                                $phone = mysqli_real_escape_string($conn, $_POST['phone']);
                                $fileName = $user['image'];

                                // Handle file upload
                                if (!empty($_FILES['image']['name'])) {
                                    $uploadDir = 'images/upload/user/';
                                    if (!is_dir($uploadDir)) {
                                        mkdir($uploadDir, 0777, true);
                                    }
                                    $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
                                    $uploadFile = $uploadDir . $fileName;
                                    if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                                        echo '<script>alert("Failed to upload the image!");</script>';
                                    }
                                }

                                // Update query
                                $update_query = "UPDATE user_tbl SET 
                                name = '$name', bio = '$bio', country = '$country', 
                                designation = '$designation', phone = '$phone', image = '$fileName' 
                                WHERE email = '$email'";

                                if (mysqli_query($conn, $update_query)) {
                                    echo '<script>window.location.href="profile.php";</script>';
                                } else {
                                    echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
                                }
                            }
                            ?>
                        </div>

                        <!-- Change Password Tab -->
                        <div class="tab-pane fade" id="change-password">
                            <form>
                                <div class="mb-3">
                                    <label for="currentPassword" class="form-label">Current Password</label>
                                    <input type="password" class="form-control" id="currentPassword">
                                </div>
                                <div class="mb-3">
                                    <label for="newPassword" class="form-label">New Password</label>
                                    <input type="password" class="form-control" id="newPassword">
                                </div>
                                <div class="mb-3">
                                    <label for="reenterPassword" class="form-label">Re-enter New Password</label>
                                    <input type="password" class="form-control" id="reenterPassword">
                                </div>
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </form>


                        </div>
                        <div class="tab-pane fade" id="comment">
                            <div class="overflow-auto">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#Slno</th>
                                            <th>Comment</th>
                                            <th>Post</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $email = $_SESSION['user'];
                                        $query = "SELECT 
    blogs_tbl.title AS blog_title,
    comment.comment AS user_comment,
    comment.id AS commentId,
    comment.createdAt AS time
FROM 
    blogs_tbl
JOIN 
    comment ON blogs_tbl.id = comment.blogId
WHERE 
    comment.commentBy = '$email'";
                                        $result = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($result) > 0) {
                                            $slno = 1;
                                            foreach ($result as $comment) { ?>
                                                <tr>
                                                    <td><?php echo $slno++; ?></td>
                                                    <td><?php echo $comment['user_comment']; ?></td>
                                                    <td><?php echo $comment['blog_title']; ?></td>
                                                    <td>
                                                        <?php
                                                        $date_string = $comment["time"];
                                                        $date = new DateTime($date_string);

                                                        $formatted_date = $date->format('M. jS, Y'); // 'M' for short month, 'jS' for day with suffix, 'Y' for year
                                                        echo $formatted_date;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-danger text-light px-1 py-1" onclick="return confirm('Are you sure to delete your comment !');" href="?action=deleteComment&&deleteid=<?php echo $comment['commentId']; ?>"><i class="bi bi-trash-fill"></i></a>
                                                        <a class="btn btn-info ms-2 text-light px-1 py-1" href="edit-comment.php?id=<?php echo $comment['commentId']; ?>"><i class="bi bi-pencil-square"></i></a>
                                                    </td>
                                                </tr><?php
                                                    }
                                                }
                                                        ?>

                                    </tbody>
                                </table>
                            </div>
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