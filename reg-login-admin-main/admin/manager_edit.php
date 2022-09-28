<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">
<!-- DataTales Example -->
 <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Manager Page Edit </h6>
  </div>

  <div class="card-body">
<?php
  	$connection = mysqli_connect('localhost', 'root' , '' , 'mysite');
	 
	$id = $_POST['userID'];
	$query = "SELECT * FROM manager WHERE managerid = $id ";
	$query_run = mysqli_query($connection , $query) ;
	$row = mysqli_fetch_assoc($query_run)

	


	    ?>   

                 <form action="code.php" method="POST">

                <input type="hidden" name="edit_id" value="<?php echo $row ['managerid'] ?>">
			    <div class="form-group">
		            <label> USER NAME </label>
		            <input type="text" name="edit_username" value="<?php echo $row['username'] ?>"class="form-control" placeholder="Enter username">
		    </div>
		    <div class="form-group">
		            <label>EMAIL</label>
		            <input type="text" name="edit_email" value="<?php echo $row['email'] ?>"class="form-control" placeholder="Enter email">
		    </div>
		    <div class="form-group">
		            <label>PASSWORD</label>
		            <input type="text" name="edit_password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Enter password">
		    </div>

           

		   <a href="manager.php" class="btn btn-danger"> CANCEL </a>
		   <button type="submit" name="manager_edit" class="btn btn-primary ">  UPdate  </button>
		   </form>
    </div>


 
</div>

</div>


</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>


