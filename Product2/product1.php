<?php
session_start();
$conn = mysqli_connect("localhost","root","","application");

  // if($conn){
  //     echo"connected";
  // }
  // else{
  //     echo"not connected";
  //     }
     
      $sql_fetch_todos = "SELECT * FROM `order` ";
      $query = mysqli_query($conn, $sql_fetch_todos);
           
     ?>
     









<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Inventory Management System</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	<script type="text/javascript" src="./js/order.js"></script>
   <link rel = "stylesheet" href = "product.css">
   <style>
  
</style>
 </head>
<body  style = " background: rgb(187,187,245)">
<div class="overlay"><div class="loader"></div></div>
	<!-- Navbar -->
	<?php include_once("./header.php"); ?>
	<br/><br/>

	

    

    
    <div class="table-product">
        <table border = "1">
            <tr>
                <th scope="col">Order</th>
                <th scope="col">Image</th>
                <th scope="col">ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Rate</th>
                <th scope="col">Quantity </th>
                <th scope="col">Brand</th>
                <th scope="col">Category </th>
                <th scope="col">Date</th>
                <th scope="col" colspan = "2">Options</th>
                
                 <!-- <th scope="col">Modify</th>
                <th scope="col">Delete</th> 
               -->
               
            </tr>



            

            <tbody>
            <?php
                $idpro = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
                    <tr>
                       <td scope="row"><?php echo $idpro ?></td>
                        <td><?php echo '<img src="'. $row['image'].'" widh="50" height="50">'?></td>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['productname'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><?php echo $row['quantity'] ?></td>
                        <td><?php echo $row['brand'] ?></td>
                        <td><?php echo $row['category'] ?></td>
                        <td><?php echo $row['dt'] ?></td> 
                        <td class="modify"><a name="edit" id="" class="bfix" href="modify.php?id=<?php echo $row['id'];?>">Edit</a> </td>
                        <td class="delete"><a  href="delete.php?id=<?php echo $row['id'];?>" name="id"  class="bdelete" >Delete</a></td> 
                       
                        
                        
                    </tr>
                <?php
                    $idpro++;
                 } 
                ?>
                    
                 
            </tbody>
        </table>
         <br>
        <div>
            <!-- <form action = "addlist.php" method = "post">
                 <input type = "file" name="image"/>
                <input type ="text" name="proname"/>
                <input type="number" name="amount"/>
                <input type="submit"/> 
            </form> -->
        </div> 
       
      

        <div class="row">
	<div class="col-md-12">

		

		
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addProductModalBtn" data-target="#addProductModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Product </button>
				</div> <!-- /div-action -->				
				
				

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add product -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitProductForm" action="product.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Product</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-product-messages"></div>

	      	<div class="form-group">
	        	<label for="productImage" class="col-sm-3 control-label">Product Image: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
					    <!-- the avatar markup -->
							<div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
					    <div class="kv-avatar center-block">					        
					        <input type="file" class="form-control" id="productImage" placeholder="Product Name" name="image" class="file-loading" style="width:auto;"/>
					    </div>
				      
				    </div>
	        </div> <!-- /form-group-->	     	           	       

	        <div class="form-group">
	        	<label for="productName" class="col-sm-3 control-label">Product Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="productName" placeholder="Product Name" name="productname" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	    

	             	 

	        <div class="form-group">
	        	<label for="rate" class="col-sm-3 control-label">Category </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="rate" placeholder="Rate" name="category" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	   
          
          
          <div class="form-group">
	        	<label for="rate" class="col-sm-3 control-label">Brand </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="rate" placeholder="Rate" name="brand" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

          <div class="form-group">
	        	<label for="rate" class="col-sm-3 control-label">Quantity </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="rate" placeholder="Rate" name="quantity" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

	        
	        <div class="form-group">
	        	<label for="rate" class="col-sm-3 control-label">Rate</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="rate" placeholder="Rate" name="price" autocomplete="off">
				    </div>
	        </div>

	       
	             	        
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="createProductBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->



	


</body>
</html>