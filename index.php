<?php include 'header.php'; ?>

	          <div class="table-responsive">

				<div class="insert pull-left">
					<a class="btn btn-primary" href="insert.php">Insert New Contact</a>
				</div>
				

<?php
if(isset($_GET['delid'])){

	  $delid = $_GET['delid'];

	  $query = "DELETE FROM contacts WHERE id='$delid'";
	  $data  = mysqli_query($con, $query);

	  if($data){
	    echo"<span class='success'>Contact Deleted Successfully !</span>";
	    header("Location:index.php");
	  }else{
	     echo"<span class='error'>Contact Not Deleted !</span>";
	  }
}
?>

				<div class="search pull-right">
					<form action="search.php" method="GET">
		          		<input class="search" type="text" name="searchContent" placeholder="Enter Name.....">
		          		<input type="submit" class="btn btn-primary" name="searchSubmit" value="Search">
	          		</form>
	          	</div>

	            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	              <thead>
	                <tr>
	                  <th>Sl.</th>
	                  <th>Name</th>
	                  <th>Contact Number</th>
	                  <th>Email</th>
	                  <th>Action</th>
	                </tr>
	              </thead>
	              <tbody>
					

				<?php
				$query = "SELECT * FROM contacts ORDER BY id DESC";

				$data     = mysqli_query($con, $query);

				if($data){
					$i = 0;
					while($row = $data->fetch_assoc()){
					$i++;
				?>

	                <tr>
	                  <td><?php echo $i; ?></td>
	                  <td><?php echo $row['name']; ?></td>
	                  <td><?php echo $row['phone']; ?></td>
	                  <td><?php echo $row['email']; ?></td>
	                  <td><a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>    <a onclick="return confirm('Are you sure to delete!');" href="?delid=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
	                </tr>


                <?php } }else{
                		echo "No Contact Found";
                } ?>                

	              </tbody>
	            </table>
	          </div>

<?php include 'footer.php'; ?>
