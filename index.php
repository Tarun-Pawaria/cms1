<?php include_once 'includes/header.php'; 
include_once 'config/dal.php';


?> 
<link rel='stylesheet' type='text/css' media='screen' href='css/index.css'>

<!-- container start -->
<div class="container" id="container">

     <div id="aftercontainer" class="col-md-12">
       <div class="row">
        
<!-- div for article start-->



        <div class="col-md-7" id="articlediv">
            <div class="row">

            <?php
        
        $result=getdata();

        if(mysqli_num_rows($result)>0){
        ?>

       <!-- div for article start-->
      <div class="col-md-12" id="">
            <div id="" class="row">
                <!-- div for image-->
                <?php 
             
            
             while($row=mysqli_fetch_assoc($result)){

    
             ?>


              <div class="col-md-12" id="articlediv1">
                
               <div id="articlerowdiv" class="row">
                <div class="col-md-4">

                    <a href="single.php?id=<?php echo $row['post_id'] ?>"><img style="width:100%;" src="admin/uploads/<?php echo $row['image'];?>" height="150px"></a>
                
                 
                
                
                
                </div>



                <!-- div for content-->
                <div class="col-md-8 col-sm-8">
                    
                    <div class="col-md-12 col-sm-12">

                    <h1><a  style="text-decoration: none;" href="single.php?id=<?php echo $row['post_id'] ?>">
                        <?php echo $row['title'] ;?>
                    </a></h1>

                        <ul>
                        <li><?php echo $row['username'];?></li>
                        <li><?php echo $row['date'];?></li>
                        
                        </ul>
                    </div>



                    <div class="col-md-12 col-sm-12">
                    <?php echo $row['description'];?>
                    </div>
                </div>
               </div>
              </div>
              <?php  } ?>
               <!--content div end-->


               </div>




               </div>
               <?php
             
            }else{
        echo "<h1>NO POST YET </h1>";
               }
    
    ?>


           <!-- div for article second end-->
            </div>
            
        </div>    






        
<!-- div for article start-->
      <div class="col-md-1"></div>
<!-- div for search start-->
        <div  class="col-md-4" id="searchdiv">
            <h1>Search bar</h1>


            <form action="search.php">
               <div class="input-group mb-3">
                  <input type="text" class="form-control" name="search" placeholder="Search here ...." aria-label="Recipient's username" aria-describedby="button-addon2">
                  <button class="btn btn-outline-secondary" type="submit" id="searchbutton">Search</button>
                </div>

             </form>
        </div>  
<!-- div for end start-->

        </div>
    </div>
</div>
<!-- container end -->