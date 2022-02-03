
<?php
session_start();
$conn = mysqli_connect("localhost","root","","application");

  // if($conn){
  //     echo"connected";
  // }
  // else{
  //     echo"not connected";
  //     }
      if($_SERVER["REQUEST_METHOD"]=="POST"){
        // $id = $_POST['id'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
       $productname = $_POST['productname'];
        
        // $method = $_POST['method'];
        $category = $_POST['category'];
        $brand = $_POST['brand'];
        // $username = $_POST['username'];
        $image = $_FILES['image'];
        $images=addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $imagename=addslashes($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'],"photos/".$_FILES['image']['name']);
        $location="photos/".$_FILES['image']['name'];
        
     
        $sql = "INSERT INTO `order` ( `quantity`, `price`, `category`, `brand`,  `productname`, `dt`, `image`) VALUES ( '$quantity', '$price', '$productname ', '$brand',  '$category', current_timestamp(),'$location');";
        $exe = mysqli_query($conn,$sql);
        if($exe){
         echo "<script>alert('Success added')</script>";
         header("location:product1.php");
        exit();
        }
        else{
          echo"not";
        }
       
           }
           mysqli_close($conn);
     ?>
     