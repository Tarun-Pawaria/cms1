<?php
include 'config/constant.php';
/*Connecting a database server */


$hostname1="http://localhost/project";
$hostname="http://localhost/project/admin";
function getConnection(){
 $cn=mysqli_connect(SERVER,USER,PWD) OR die("could not connet to server");
 $db=mysqli_select_db($cn,DATABASE) OR die("could not find database");
 return($cn);
}

/* user registration  function*/


function reg_user($fname,$lname,$user,$pwd){
    $cn=getConnection();
    $sql1="SELECT username FROM user WHERE username='{$user}'";

    $result1=mysqli_query($cn,$sql1) or die("Query Failed.");

//Query for user if already exists//

   if(mysqli_num_rows($result1)>0){
      echo "<p style='color:red; margin-left:15px; text-align: center; margin:10px 0;' > User Name already exist</p>";
  }else{

   //query if user not exists 
    $sql="INSERT INTO user (fname,lname,username,password) value('$fname','$lname','$user','$pwd') ";
     
    $result2=mysqli_query($cn,$sql) or die("registration query failed");
    
    
    
    
  
    return($result2);
  
  }

   
  }



/* user login function*/

function login_user($user,$pwd){
 $cn=getConnection();
  $sql="SELECT * FROM user WHERE username='$user' AND password='$pwd' ";
     
  $result=mysqli_query($cn,$sql) or die("login query failed");
    
  return($result);
}

/*add post */
function add_post($user,$title,$description,$date,$name){
  $cn=getConnection();
  $sql="INSERT INTO post(username,title,description,date,image) VALUE('$user','$title','$description','$date','$name')";
  
  $result=mysqli_query($cn,$sql) or die("insert data in post query failed");
  
  //return($result);
  if(($result)>0)
  {
   header("location:index.php");

  }
 
}


/*get data function */
function getdata($username){
  $cn=getConnection();
  $sql="SELECT * FROM post Where username='$username' ORDER BY post_id DESC ";

  $result1=mysqli_query($cn,$sql) or die("select query for get data  failed");
  return($result1);
  
}


/*get search */
function getsearch($search_item){
  $cn=getConnection();
  $sql="SELECT * FROM post Where username LIKE '%{$search_item}%' OR title LIKE '%{$search_item}%' OR  description LIKE '%{$search_item}%' ";

  $result1=mysqli_query($cn,$sql) or die("select query for search data failed");
  return($result1);
}


/* edit data after going in the all post then after click on edit button*/
function editdata($id){
  $cn=getConnection();
  $sql="SELECT * FROM post  WHERE post_id='$id' ";

  $result1=mysqli_query($cn,$sql) or die("select  query for get data for edit failed");
  
  return($result1);
}

function update_post($post,$title,$description,$date){
  $cn=getConnection();
 echo $sql="UPDATE post set title='{$title}',description='{$description}',date='{$date}' WHERE post_id='$post' ";

  $result1=mysqli_query($cn,$sql) or die("update post query failed");
  
  if(($result1)>0)
  {
   header("location:index.php");

  }
}

function update_image($post,$name){
  $cn=getConnection();
  $sql="UPDATE post set image='{$name}' WHERE post_id='$post' ";

  $result1=mysqli_query($cn,$sql) or die("update post image query failed");
  
  if(($result1)>0)
  {
   header("location:index.php");

  }
}





/* delete post */
function delete_post($post_id){
  $cn=getConnection();
  echo $sql="DELETE FROM post WHERE post_id={$post_id}";
  
  $result1=mysqli_query($cn,$sql) or die("update post image query failed");
  
  if(($result1)>0)
  {
   header("location:allposts.php");

  }
}

/* get user detail */
function get_user_detail($user){
  $cn=getConnection();
    $sql="SELECT * FROM user WHERE username='$user' ";
       
    $result1=mysqli_query($cn,$sql) or die("add post query failed");
    return($result1);
}

/*delete user account */
function delete_account($user){
  $cn=getConnection();
  
   $sql="DELETE FROM post WHERE username='{$user}'; ";
     $sql .="DELETE FROM user WHERE username='{$user}'";
      
    $result1=mysqli_multi_query($cn,$sql) or die("add post query failed");

    if(($result1)>0)
  {
    

    session_unset();
    
    session_destroy();
    header("location:project/index.php");
    

  }
}
?>