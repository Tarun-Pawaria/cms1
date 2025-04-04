<?php

include_once 'config/dal.php';

include_once 'includes/header.php' ;

?>



<link rel="stylesheet" type="text/css" media='screen'  href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media='screen'  href="css/index.css">

<!-- container start -->
<div class="container" id="container">

     <div style="height: auto;" class="col-md-12">
       <div style="height: auto;" class="row">
       <?php
        $username= $_SESSION['username'];
        $result=getdata($username);

        if(mysqli_num_rows($result)>0){
        ?>

       <!-- div for article start-->
      <div class="col-md-12 col-sm-12" id="">
            <div id="" class="row">
                <!-- div for image-->
                <?php 
             
            
             while($row=mysqli_fetch_assoc($result)){

    
             ?>


              <div class="col-md-12 col-sm-12" id="articlediv">
               <div id="articlerowdiv" class="row">
                <div class="col-md-4 col-sm-12">

                    <img src="uploads/<?php echo $row['image'];?>" width="100%">
                
                 
                
                
                
                </div>
                <!-- div for content-->


                <div class="col-md-8 col-sm-8">
                    <h1><?php echo $row['title'] ;?></h1>
                    <div class="col-md-12 col-sm-12">
                        <ul>
                            <li id="li"><?php echo $row['username'];?></li>
                            <li id="li"><?php echo $row['date'];?></li>
                           
                        </ul>
                    </div>
                   
                    <div class="col-md-12 col-sm-12">
                      <?php echo $row['description'];?> 
                    </div>
                </div>


              </div>
             </div>
                <?php  }?>
            </div>
            
            
        </div>    
        <!-- div for article start-->
      <?php
             
        }else{
    echo "<h1>NO POST YET </h1>";
           }

?>

       </div>
    </div>
</div>
<!-- container end -->