<?php

session_start();
$conn=mysqli_connect("localhost","root","","application");
$get_id=$_GET['id'];
//  echo $get_id;
$sq = "select * from `order` where id=$get_id";
$ex=mysqli_query($conn,$sq);
while ($my = mysqli_fetch_array($ex))
{
    $product=$my['productname'];
    $rate=$my['price'];
    // print_r($my);
}
//  if($conn){
//       echo"connected";
//  }


 
    



?>

<!DOCTYPE html>
<html>
<head>
	<title>UPDATE FORM</title>
	<link rel="stylesheet" type="text/css" href="modify.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class = "login-box">
               <form method="post" action="#">

               <div class="form-group">
                
                <input type="text" value="<?php echo $product;?>" class="form-control" name="name" placeholder = "Product" required>
            </div>

            <div class="form-group">
                
                <input type="text" value="<?php echo $rate;?>" class="form-control" name="value" placeholder = "Amount" required>
                <!-- <input type="hidden"  name="id" /> -->
            </div>
            <br>

            <div class="form-button">
				
			<button id="add" style="width:150px;" class="btn btn-success" type="submit" name="submit">Update</button>
	       
			
			
            </div>
               </form>

           </div>
</body>
</html>

           


           <?php
           if(isset($_POST['submit']))
           {
           $input1 = $_POST['name'];
           $input2 = $_POST['value'];
        //    echo $input1;
        //    echo $input2;
$sql= "UPDATE `order` SET productname='$input1', price=$input2 WHERE id=$get_id";

$exe = mysqli_query($conn,$sql);
if($exe){
    echo "<script>alert('Successfully resolved')</script>";
    header("location:product1.php");
}
 else{
    echo "Not";
 }
  
           }
?>