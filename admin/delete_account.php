<?php 
include_once 'includes/header.php';
  
include_once 'config/dal.php';
 $_SESSION['username'];

?>
<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/delete_account.css">


<!--container start -->
<div class="container" id="container">



<?php
$user= $_SESSION['username'];
include_once 'config/dal.php';
$result=get_user_detail($user);


if(mysqli_num_rows($result)>0){
    
    while($row=mysqli_fetch_assoc($result)){

    
?>

<div class="col-md-12 col-sm-12"  id="divfrm">

    <h1>USER ACCOUNT DELETE REQUEST FORM</h1>



  <form id="formdeleteaccound" method="POST" action="<?php $_SERVER['PHP_SELF']?>">
    <div id="formdiv">
        <input type="hidden" name="txtuser" value="<?php  echo $row['username'] ;?>">
        <strong>FULL NAME : </strong><?php echo  ' ' . $row['fname'] . " " . $row['lname'];?>
    </div>

    <div id="formdiv">
        <strong for="username">USERNAME : </strong> <?php echo $row['username'] ;?>

    </div>

    <div id="formdiv">
        <strong id="red">Warning if you delete account than all your data and post also get deleted. </strong> 

    </div>

    <div id="formdiv">
        <button type="submit" name="deleteaccount" id="deleteaccount">Delete</button>
    </div>
  
    <?php
       }
     }

    ?>

  </form>
</div>


</div>
<!-- container end -->
 <?php 
 
 if(isset($_POST['deleteaccount'])){
  include_once ('config/dal.php');
 
  $user=$_POST['txtuser'];

  $result=delete_account($user);
 }
 
 
 ?>