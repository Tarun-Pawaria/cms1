<!-- Query for login form --> 

<?php




if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='POST')
{
    include_once('config/dal.php');
  if(count($_FILES['postimage']['name'])>0)
  { 
    for($i=0;$i<count($_FILES['postimage']['name']);$i++)
     {
       $name=$_FILES['postimage']['name'][$i];
       $data=$_FILES['postimage']['tmp_name'][$i];
       $type=$_FILES['postimage']['type'][$i];
       $size=$_FILES['postimage']['size'][$i];
       $error=$_FILES['postimage']['error'][$i];
          

       if($error==0){
        if(substr($type,0,5)=="image"){

          $path="upload/";
           $filepath=$path.$name;
          
           move_uploaded_file($data,$filepath);
           
      
      }
  }


       
   }
 }

   //session_start();
   
   $user=$_POST['txtuser'];
   $title=$_POST['txttitle'];
   $description=$_POST['txtdescription'];
   $date=date('d, M Y');



   

   echo $result=add_post($user,$title,$description,$date,$name);
die();
   if(mysqli_num_rows($result)>0)
  {
   header("location:index.php");

  }
  else
  {
   echo "<br/><p id='wrong'> Wrong username and  password</p>";
  }

 
}
?>