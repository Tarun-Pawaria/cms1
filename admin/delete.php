<?php



include_once 'config/dal.php';


$post_id=$_GET['id'];
$result=delete_post($post_id);



?>