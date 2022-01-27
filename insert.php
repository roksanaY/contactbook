<?php include 'header.php'; ?>
				
	<div class="insert-area">

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){

  if(isset($_POST['submit'])){

    $name  = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];


    $name  = mysqli_real_escape_string($con, $name);
    $phone = mysqli_real_escape_string($con, $phone);
    $email = mysqli_real_escape_string($con, $email);


    if(empty($name) || empty($phone) || empty($email)){

    	echo "<span class='error'>Contact Not Added ! Field must not be empty !</span>";

    }elseif(! filter_var($email, FILTER_VALIDATE_EMAIL)){

    	echo "<span class='error'>Contact Not Added ! Invalid Email !</span>";
	}
    else{
    	$query = "INSERT INTO contacts(name,phone,email) VALUES('$name', '$phone', '$email')";

    	$data  = mysqli_query($con, $query);
      
    	if($data){
    		echo "<span class='success'>Contact Added Successfully !</span>";
    		$name  = "";
		    $phone = "";
		    $email = "";
    	}else{
    		echo "<span class='error'>Contact Not Added !</span>";
    	}
    }



	}
}
?>

		
      <form class="user" action="" method="POST">

		    <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0 col-sm-offset-3">
                <input type="text" class="form-control" name="name" placeholder="Insert Name" value="<?php if(isset($name)){ echo $name; } ?>">
              </div>
        	</div>

		    <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0 col-sm-offset-3">
                <input type="text" class="form-control" name="phone" placeholder="Insert Phone" value="<?php if(isset($phone)){ echo $phone; } ?>">
              </div>
        	</div>

        	<div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0 col-sm-offset-3">
                <input type="text" class="form-control" name="email" placeholder="Insert Email" value="<?php if(isset($email)){ echo $email; } ?>">
              </div>
        	</div>
		
		    <div class="col-sm-6 mb-3 mb-sm-0 col-sm-offset-3">
            	<input type="submit" class="btn btn-primary" name="submit" value="Add Contact">
            	<a href="index.php" class="btn btn-primary">Back To List</a>
        	</div>

      </form>
    </div>

<?php include 'footer.php'; ?>
