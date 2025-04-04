 <?php include_once 'includes/header.php';
 include_once 'config/dal.php';
 ?>

<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/edit.css">
  <div class="container" id="container">
    <div class="row">
         <?php 
        $id=$_GET['id'];

        $editresult=editdata($id);
       if(mysqli_num_rows($editresult)>0){
       while($row=mysqli_fetch_assoc($editresult)){
       
        ?>
        <div class="col-md-12 col-sm-12">
        <h1>EDIT FORM</h1>
            <form action="<?php $_SERVER['PHP_SELF']?>" id="frmedit" method="POST">
                
            <div id="formdiv">
                <input type="hidden" name="txtpost" value="<?php echo $row['post_id'];?>">
                <strong for='newtitle'>TITLE</strong>
                <input type='text' name='newtitle' value='<?php echo $row['title'];?>'/>
            </div>

            <div id="formdiv">
                <strong for='newDescription'>Description</strong><br>
                <textarea name='newDescription' value=''><?php echo $row['description'];?></textarea>
            </div>

            <div id="formdiv">
                <strong >IMAGE</strong><br>
                <img   src='uploads/<?php echo $row['image'];?>' width="100%;"/>
            </div>

            <div id="formdiv">
                
               <button type="submit" id="updatepost" name="updatepost">Update</button>
            </div>
            </form>
        </div>
      
        
       
    <?php

    }
   }
  ?>





  <!-- code for image update form -->

<div class="col-md-12 col-sm-12" id="imgup">
        <h1>EDIT FORM IMAGE ONLY</h1>
            <form action="<?php $_SERVER['PHP_SELF']?>" id="frmedit" method="POST"  enctype="multipart/form-data">
            <div id="formdiv">
            <strong for="postimage">Image</strong>
            <input type="file"  id='frmimg' name="postimage[]"  multiple placeholder="choose File"  required/>
            </div>

            <div id="formdiv">
                
               <button type="submit" id="updatepost" name="updateimg">Update Image</button>
            </div>
            </form>
</div>



    </div>
</div>


<?php
if(isset($_POST['updatepost']))
{
  include_once('config/dal.php');
    
   $post=$_GET['id'];
   $title=$_POST['newtitle'];
   $description=$_POST['newDescription'];
   $date=date('d, M Y');

  $result=update_post($post,$title,$description,$date);

}

/*code for image update */

if(isset($_POST['updateimg']))
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
 $post=$_GET['id'];

 $result=update_image($post,$name);
}
?>