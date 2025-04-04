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

/*get data function */
function getdata(){
    $cn=getConnection();
    $sql="SELECT * FROM post ORDER BY post_id DESC";
  
    $result1=mysqli_query($cn,$sql) or die("add post query failed");
    return($result1);
    
  }
/*get search */
function getsearch($search_item){
  $cn=getConnection();
  $sql="SELECT * FROM post Where username LIKE '%{$search_item}%' OR title LIKE '%{$search_item}%' OR  description LIKE '%{$search_item}%' ";

  $result1=mysqli_query($cn,$sql) or die("add post query failed");
  return($result1);
}

/*get single data */
function get_single_data($id){
  $cn=getConnection();
    $sql="SELECT * FROM post WHERE post_id='$id' ";
  
    $result1=mysqli_query($cn,$sql) or die("add post query failed");
    return($result1);

}


?>