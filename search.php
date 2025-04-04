<?php 

include_once 'includes/header1.php';
include_once 'config/dal.php';


?>
<link rel="stylesheet" type='text/css' media='screen' href="css/search.css">
<!--container start-->
<div class="container" id="container" >
    <div class="col-md-12 col-sm-12" id="container2" >
        <div class="row">
        
         <!-- article div start-->
              <?php 
              if(isset($_GET['search'])){
                include_once 'config/dal.php';
                $search_item=$_GET['search'];
              $search_result= getsearch($search_item);
              ?>
              <h2>Search : <?php echo $search_item; ?></h2>

              <?php

              if(mysqli_num_rows($search_result)>0)  {
               while($row=mysqli_fetch_assoc($search_result)){
             ?>


          <div class="col-md-12">
          
            <div class="row">
              
            <div class="col-md-12" id="articlediv" >
          
            <div class="row">
              <!--image div start -->
              <div class="col-md-4">
              <img style="width:100%;" src="admin/uploads/<?php echo $row['image'];?>" width="100%;">
              </div>
              <!--image div end -->

              <!--content div start --> 
              <div class="col-md-8">
                <div class="col-md-12"><h1><?php echo $row['title']; ?></h1></div>

                <div class="col-md-12">
                    <ul>
                        <li><?php echo $row['username']; ?></li>
                        <li><?php echo $row['date']; ?></li>
                    </ul>
                    </div>

                <div class="col-md-12"><?php echo $row['description']; ?></div>
              </div>
            </div>
            </div>
              <?php }?>

            </div>
            
          </div>
          <?php }
            }?>
         <!--article div end -->
        </div>
    </div>

</div>
<!--container end-->