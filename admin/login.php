

<!DOCTYPE html>

<link rel='stylesheet' type='text/css' media='screen' href='css/login.css'>


<!-- login form-->
<form id="loginfrm" action="<?php $_SERVER['PHP_SELF']?>" method="POST">

  <div id="formdiv1">
    <h1>Login Form</h1>
 </div>

 <div id="formdiv">
    <strong for="txtuser">Name</strong>
    <input type="text" name="txtuser" required/>
 </div>

 <div id="formdiv">
    <strong for="txtpwd">Password</strong>
    <input type="password" name="txtpwd" required/>
 </div>

 <div id="formdiv">
    <button id="loginfrmbtn" name="login" type="submit">Login</button>
 </div>

 <div id="formdiv">
  <a href='new_user.php'>register as a new user</a>

 </div>

 </form>

<div>

</div>


                     <!-- Query for login form --> 

<?php
 

if(isset($_POST['login']))
{

   include_once ('config/dal.php');

   $user=mysqli_real_escape_string(getConnection(),$_POST['txtuser']);
   $pwd=$_POST['txtpwd'];
   $result=login_user($user,$pwd);

   if(mysqli_num_rows($result)>0)
   {
      while($row= mysqli_fetch_assoc($result)){
          session_start();

          $_SESSION['username']=$row['username'];
          $_SESSION['user_id']=$row['user_id'];
           
      
         header("location:index.php");
       }
   
     }
  else
  {
   echo "<br/><p id='wrong'> Wrong username and  password</p>";
  }

 
}


?>