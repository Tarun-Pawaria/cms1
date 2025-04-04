<?php include_once 'includes/header.php' ?>


<link rel="stylesheet" type="text/css" href="css/addpost.css" media="screen">
<link rel="stylesheet" type="text/css" media='screen'  href="css/bootstrap.min.css">






<!--add post form-->
<div class="col-md-12 col-sm-12 col" id="back">
  
    <h1 id="frmtitles">ADD A POST HERE</h1>


<form id="addpostfrm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

<div id="addpostfrmdiv">

    <input type="hidden" name="txtuser" value='<?php  echo $_SESSION['username']; ?>'/>

    <strong for="txttitle">Title</strong>
    <input type="text" name="txttitle" placeholder="Give Title" required/>
</div><br>


<div id="addpostfrmdiv">
    <strong for="txtdescription">Description</strong>
    <textarea  name="txtdescription" placeholder="Write Description"></textarea>
</div><br>


<div id="addpostfrmdiv">
    <strong for="postimage">Image</strong>
    <input type="file"  id='frmimg' name="postimage[]"  multiple placeholder="choose File"  required/>
</div><br>

<div id="addpostfrmdiv">
    
<button id="addfrmbtn" name="uplod" type="submit">Uplod</button>
</div>



</form>
</div>

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

          $path="uploads/";
           $filepath=$path.$name;
          
           move_uploaded_file($data,$filepath);
           
      
      }
  }


       
   }
 }

   
   
   $user=$_POST['txtuser'];
   $title=$_POST['txttitle'];
   $description=$_POST['txtdescription'];
   $date=date('d, M Y');



   

  $result=add_post($user,$title,$description,$date,$name);

}
?>