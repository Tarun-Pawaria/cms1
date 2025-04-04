
<?php

include_once 'config/dal.php';
session_start();
if(!isset($_SESSION['username'])){
echo $_SESSION['username'];
  
    header("location:project/admin/index.php");
}
?>




<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>PROJECT</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/header.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.min.css'>
    <!--<script src='main.js'></script>-->
</head>
<body>
    <div class="col-md-12 col-sm-12 col1" id="heading">
      
    <a id="se">Hello <?php echo $_SESSION['username']; ?>, Welcome back</a>
    
        <h1 style="display: inline;">Project</h1>
         
<!-- log out button-->
        <a id="logoutbtn" href="logout.php">logout</a>

    </div>

    <!--Nav bar-->
    <div class="col-md-12 col-sm-12 col1" id="nav">
      <ul >
        <li ><a href="index.php">Post</a></li>
        <li><a href="addpost.php">Add post</a></li>
        <li><a href="allposts.php">All post</a></li>
        <li><a href="delete_account.php">Settings</a></li>
        
      </ul>



    </div>
