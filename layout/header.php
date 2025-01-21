<?php include('./config/config.php');

?>
<nav class="navbar navbar-expand-lg bg-primary sticky-top">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand text-light " href="index.php">Blogy<span>.</span></a>

        <!-- Toggler -->
        <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
        </button>

        <!-- Navbar Items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active link-light" href="index.php">Home</a>
                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle link-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pages
                    </a>
                    <ul class="dropdown-menu bg-transparent">
                        <li><a class="dropdown-item link-light" href="#">Page 1</a></li>
                        <li><a class="dropdown-item link-light" href="#">Page 2</a></li>
                    </ul>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link link-light" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light" href="blog.php">Blogs</a>
                </li>
                
               
                <?php 
                        if(!empty($_SESSION['user'])){
                        echo ' <li class="nav-item">
                    <a class="nav-link link-light" href="contact.php">Contact</a>
                </li>';
                        }                 
                        ?>
                <?php 
                        if(!empty($_SESSION['user'])){
                        echo '<li class="nav-item">
                    <a class="nav-link link-light" href="message.php">Message</a>
                </li>';
                        }                 
                        ?>
                
                        <!-- <li class="nav-item">
                        <a class="nav-link link-light" href="profile.php">Welcome 👋</a>
                        </li> -->
                        <?php 
                        if(!empty($_SESSION['user'])){
                        $email_user = $_SESSION['user'];
                            $sql_query = "select name,image from user_tbl where email='$email_user'";
                            $result_name = mysqli_query($conn,$sql_query);
                            $user_info=[];
                            if (mysqli_num_rows($result_name) > 0) {
                                $user_info = mysqli_fetch_assoc($result_name);
                                echo '<li class="nav-item">
                            <a class="nav-link link-light text-capitalize" href="profile.php">Welcome 👋 '.$user_info['name'].'</a>
                            </li> ';
                            }
                        }                 
                        ?>
                


            </ul>

            <!-- Search Bar -->
            <!-- <form class="d-flex me-2">
                    <input class="form-control search-bar me-2" type="search" placeholder="Search here..." aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form> -->
            <form action="search-result.php" class=" d-flex me-2">
                <div class="input-group d-flex align-items-center">
                    <input
                        type="text" id="search"
                        class="form-control m-0 text-light"
                        name="query"
                        placeholder="Search here..."
                        aria-label="Search"
                        required>
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>

            <!-- Buttons -->
            <div class="d-flex">

                <?php
                if (empty($_SESSION['user'])) { ?>
                    <button type="button" class="btn btn-dark login-btn me-2" data-bs-toggle="modal" data-bs-target="#ModalFormLogin">
                        login
                    </button>
                    <button type="button" class="btn btn-dark signup-btn" data-bs-toggle="modal" data-bs-target="#ModalFormSignup">
                        Signup
                    </button>
                <?php } else {
                ?>

                    <span class="dropdown">
                        <a class="nav-link dropdown-toggle link-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- <i class="bi bi-person-circle"></i> -->
                            <img src="images/upload/user/<?php echo $user_info['image']; ?>" alt="" class="profile-icon">
                        </a>
                        <ul class="dropdown-menu">
                            <li class="d-flex align-items-center"><i class="bi bi-person-fill px-2"></i><a class="dropdown-item link-dark" href="profile.php">My profile</a></li>
                            <li class="d-flex align-items-center"><i class="bi bi-folder2-open px-2"></i><a class="dropdown-item link-dark" href="my-blog.php">My Blogs</a></li>
                            <li class="d-flex align-items-center"><i class="bi bi-pencil-square px-2"></i><a class="dropdown-item link-dark" href="create-blog.php">Create Blog</a></li>
                            <li class="d-flex align-items-center"><i class="bi bi-box-arrow-right px-2"></i><a class="dropdown-item link-dark" href="logout.php">Logout</a></li>
                        </ul>
                    </span>
                <?php } ?>
            </div>
        </div>
    </div>
</nav>