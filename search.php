<?php include 'header.php'; ?>
				
	<div class="insert-area">

<?php
  if(!isset($_ET['searchContent']) && $_GET['searchContent'] == NULL){

      header("Location:index.php");
    }else{

      $searchContent = $_GET['searchContent'];

    	$query = "SELECT * FROM contacts WHERE name LIKE '%$searchContent%'";

    	$data  = mysqli_query($con, $query);
      
      
    	if($data->num_rows > 0){
        $result = $data->fetch_assoc();
       ?>
          
          <h2 class='success'>Search Result</h2>

          <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0 col-sm-offset-3">
                <h3>Name : <?php echo $result['name']; ?></h3>
              </div>
          </div>

          <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0 col-sm-offset-3">
                <h3>Phone : <?php echo $result['phone']; ?></h3>
              </div>
          </div>

          <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0 col-sm-offset-3">
                <h3>Email : <?php echo $result['email']; ?></h3>
              </div>
          </div>


          <div class="form-group row">
            <div class="col-sm-6 mt-3 mb-sm-0 col-sm-offset-3">
                <a href="index.php" class="btn btn-primary">Back To List</a>
            </div>
          </div>
    		
    	<?php } else{ ?>

      <h2 class='error'>Contact Not Found !</h2>
      <a href="index.php" class="btn btn-primary">Back To List</a>

    <?php }  } ?>
    </div>

<?php include 'footer.php'; ?>
