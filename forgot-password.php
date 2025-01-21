
<?php include('./config/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stylish Form</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <style>
   
    .form-container {
        background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
    padding: 30px;
    max-width: 400px;
    width: 100%;
    border: 1px solid #e2d8d8;
    }
    .form-header {
      font-size: 1.5rem;
      font-weight: bold;
      text-align: center;
      margin-bottom: 20px;
      color: #495057;
    }
    .btn-custom {
      background-color: #007bff;
      color: #ffffff;
    }
    .btn-custom:hover {
      background-color: #0056b3;
    }
  </style>
   <?php include("./layout/csslink.php"); ?>
</head>
<body>
<?php include("./layout/loginsignup.php"); ?>
<?php include('./layout/header.php'); ?>
  <div class="form-container m-auto my-5">
    <div class="form-header">Forgot password ?</div>
    <form action="" method="post">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter your phone number" required>
      </div>
      <div class="mb-3">
        <label for="newPassword" class="form-label">New Password</label>
        <input type="password" name="password" class="form-control" id="newPassword" placeholder="Create a new password" required>
      </div>
      <div class="mb-3">
        <label for="reenterPassword" class="form-label">Re-enter New Password</label>
        <input type="password" name="rePassword" class="form-control" id="reenterPassword" placeholder="Re-enter your new password" required>
      </div>
      <button type="submit" name="forgot" class="btn btn-primary w-100">Submit</button>
    </form>
  </div>
<?php include('./layout/footer.php'); ?>
<?php include("./layout/jslink.php"); ?>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>

<?php
if(isset($_POST['forgot'])){
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$rePassword = $_POST['rePassword'];
if( $password !==$rePassword){
    echo "<script>alert('Password doesnot match !')</script>";
    echo "<script>window.location.href = 'forgot-password.php';</script>";
}else{
$sql = "select * from user_tbl where email='$email'";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    // Hash the new password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Update the password and clear the reset code
    $updateQuery = "UPDATE user_tbl SET password = '$hashedPassword' WHERE email = '$email'";
    mysqli_query($conn, $updateQuery);
    echo "<script>window.location.href='index.php'</script>";
} else {
    echo "<script>alert('No user found with that email.')</script>";
}
}
}
?>
