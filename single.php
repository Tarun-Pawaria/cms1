<?php include_once 'includes/header1.php';

 
 include_once 'config/dal.php';

$id=$_GET['id'];
$result=get_single_data($id);

?>
<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/single.css">
<!-- container start -->
<div class="container" id="container">
    <div class="col-md-12 col-sm-12" id="contentdiv">
        <div class="row">


        <?php if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
            ?>
          <div class="col-md-12 col-sm-12" >


            <h1 style="background-color: black; color:aliceblue;padding:5px;text-align:center;"><?php echo $row['title'];?></h1>


            <!-- image div start -->
          <div class="col-md-12 col-sm-12" id="imgdiv">
          <img style="height:100%; width:600px;" src="admin/uploads/<?php echo $row['image'];?>" >
            </div>
            <!-- image div end -->

            <!-- content div start -->
            <div class="col-md-12 col-sm-12" id="contentdiv1" >
                <div class="col-md-12 col-sm-12">
                <ul>
                        <li id="li">User Name : <?php echo $row['username'];?></li>
                        <li id="li">   Date : <?php echo $row['date'];?></li>
                        
                        </ul>
                </div><br>
                  

                <!--description div -->
                <div class="col-md-12 col-sm-12">
                <?php echo $row['description'];?>
                </div>

            
            </div>
            <!-- content div end -->
          </div>

              <?php 
             }
            }
            ?>




        </div>
    </div>
</div>
<!-- container end -->