<?php include 'header.php'; ?>

<?php
  if(!isset($_GET['id']) || $_GET['id'] == NULL){
    header("Location:index.php");
  }else{
    $id = $_GET['id'];
    $query = "SELECT * FROM contacts WHERE id='$id'";
	$data  = mysqli_query($con, $query);

	if($data){
		$row = $data->fetch_assoc();
	}
}

?>
				
	<div class="insert-area">

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){

  if(isset($_POST['submit'])){

	    $name  = $_POST['name'];
	    $phone = $_POST['phone'];
	    $email = $_POST['email'];


	    $name = mysqli_real_escape_string($con, $name);
	    $phone = mysqli_real_escape_string($con, $phone);
	    $email = mysqli_real_escape_string($con, $email);


	    if(empty($name) || empty($phone) || empty($email)){
	    	echo "<span class='error'>Field must not be empty !</span>";
	    }else{
	    	$query = "UPDATE contacts 
		    			SET 
		    			name  = '$name',
		    			phone = '$phone', 
		    			email = '$email'
		    			 WHERE id='$id'";

	    	$data  = mysqli_query($con, $query);
	      
	    	if($data){
	    		echo "<span class='success'>Contact Updated Successfully !</span>";	    		
	    	}else{
	    		echo "<span class='error'>Contact Not Updated !</span>";
	    	}
	    }

	}
}
?>
	

      <form class="user" action="" method="POST">

		    <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0 col-sm-offset-3">
                <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" >
              </div>
        	</div>

		    <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0 col-sm-offset-3">
                <input type="text" class="form-control" name="phone"  value="<?php echo $row['phone']; ?>">
              </div>
        	</div>

        	<div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0 col-sm-offset-3">
                <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
              </div>
        	</div>
		
		    <div class="col-sm-6 mb-3 mb-sm-0 col-sm-offset-3">
            	<input type="submit" class="btn btn-primary" name="submit" value="Update">
            	<a href="index.php" class="btn btn-primary">Back To List</a>
        	</div>

      </form>
    </div>

<?php include 'footer.php'; ?>
