<?php include_once 'includes/header.php' ?>



<link rel="stylesheet" type="text/css" media='screen'  href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/allposts.css" media="screen">


<!-- add post background start-->
 <div class="container">
<div class="col-md-12 col-sm-12 col" id="back">
<?php
$username= $_SESSION['username'];
$result=getdata($username);

if(mysqli_num_rows($result)>0){
?>


    <div class="row">
    <h1 id="allpostheader">All Posts</h1>
<!-- Start of the showing all post-->
        <div class="col-md-12 col-sm-12" id="start">
       
        <!-- table start-->
        <table id="tableallpost" border-width='2px solid black' style="width:80%; " cellpadding="7px" cellspacing="0" >
            <thead>
                <tr>
                 <th>POST ID</th>   
                <th>TITLE</th>
                <th>DATE</th>
                 
                <th>EDIT</th>
                <th>DELETE</th>
                </tr>
            </thead>

            <tbody>
             <?php 
             
            
             while($row=mysqli_fetch_assoc($result)){

    
             ?>
                <tr>
                    <td><?php echo $row['post_id'];?></td>
                    <td><?php echo $row['title'] ;?></td>
                    <td><?php echo $row['date'];?></td>
                    <td><a id="editpost" href="edit.php?id=<?php echo $row['post_id'];?>">EDIT</a></td>
                    <td><a id="deletepost" href="delete.php?id=<?php echo $row['post_id'];?>">DELETE</a></td>
                </tr>


            </tbody>
             <?php }?>
        </table>
        <!-- table end-->
<?php }else{
 echo "<h1>NO POST YET</h1>";
}
?>




        </div>
    </div>
</div>
 </div>
<!-- add post background end-->