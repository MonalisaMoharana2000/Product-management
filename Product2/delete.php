<?php
session_start();
$conn=mysqli_connect("localhost","root","","application");
$get_id=$_GET['id'];
// echo $get_id;
//  if($conn){
//       echo"connected";
//   }
  $sql="DELETE FROM `order` WHERE `id` = $get_id;";
  $exe=mysqli_query($conn,$sql);

 if($exe){
     echo "<script>alert('Success Deleted')</script>";  
     header("location:product1.php");
        
    

  }
?>