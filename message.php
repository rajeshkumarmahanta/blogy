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


        <title>Blogy | Message</title>
    </head>

    <body>



        <?php include("./layout/header.php"); ?>


        <div class="container my-5">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Message</th>
      <th scope="col">Replay From Admin</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $email=$_SESSION['user'];
    $sql = "select * from contact where email='$email'";
    $res = mysqli_query($conn,$sql);
    if($res->num_rows>0){
        $sl=1;
        foreach($res as $row){
           ?>
            <tr>
            <th scope="row"><?php echo $sl++; ?></th>
            <td><?php echo $row['message']; ?></td>
            <td><?php
            
            if($row['status']==2){
                echo $row['replay'];
            }else{
                echo "Pending from admin";
                } ?></td>
            <td>
                <a href="?action=delete&&id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete message ?')" class="bg-danger link-light px-2 py-1 rounded" >Delete</a>
            </td>
          </tr><?php
        }
    }else{
        echo "No Message !";
    }
    ?>
    
    
  </tbody>
</table>

<?php
if(isset($_GET['action'])){
    $id=intval($_GET['id']);
    $sql = "delete from contact where id=$id";
    $res = mysqli_query($conn,$sql);
    if($res){
echo '<script>window.location.href="message.php"</script>';
    }
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


        <?php include("./layout/jslink.php"); ?>
    </body>

    </html>

<?php } ?>