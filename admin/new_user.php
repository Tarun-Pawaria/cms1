

<!-- Query for Registration form --> 

<?php

include ('config/dal.php');
if(isset($_POST['login1']))
{  $fname=$_POST['fname'];
    $lname=$_POST['lname'];
   $user=$_POST['newuser'];
   $pwd=$_POST['password'];
   
   $result=reg_user($fname,$lname,$user,$pwd);

   if(($result)>0)
  {
    session_start();
    session_unset();
    session_destroy();
   header("location:admin/login.php");

  }
 
}


?>




<link rel='stylesheet' type='text/css' media='screen' href='css/new_user.css'>
<!-- Registration form-->
<form id='regfrm' action="<?php $_SERVER['PHP_SELF']?>" method="POST">
<div id='regdiv1'>
    <h1>User Registration</h1>
</div>

<div id='regdiv'>
    <label for='fname'>First Name</label>
    <input type='text' name='fname' required/>
</div>

<div id='regdiv'>
    <label for='lname'>Last Name</label>
    <input type='text' name='lname' required/>
</div>

<div id='regdiv'>
    <label for='newuser'>User Name</label>
    <input type='text' name='newuser' required/>
</div>

<div id='regdiv'>
    <label for='password'>Password</label>
    <input type='text' name='password' required/>
</div>

<div id='regdiv'>
   <button id="regfrmbtn" name="login1" type="submit">Creat user</button>
</div>




</form>