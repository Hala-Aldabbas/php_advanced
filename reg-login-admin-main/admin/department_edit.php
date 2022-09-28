<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">
<!-- DataTales Example -->
 <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Department Page Edit </h6>
  </div>

  <div class="card-body">
<?php
  	$connection = mysqli_connect('localhost', 'root' , '' , 'mysite');
	 
	$id = $_POST['userID'];
	$query = "SELECT * FROM department WHERE dep_id = $id ";
	$query_run = mysqli_query($connection , $query) ;
	$row = mysqli_fetch_assoc($query_run)

	


	    ?>   

                 <form action="code.php" method="POST">

                <input type="hidden" name="edit_id" value="<?php echo $row ['dep_id'] ?>">
			    <div class="form-group">
		            <label> Department</label>
		            <input type="text" name="edit_dep" value="<?php echo $row['dep_name'] ?>"class="form-control" placeholder="Enter Department Name">
		    </div>


           

		   <a href="department.php" class="btn btn-danger"> CANCEL </a>
		   <button type="submit" name="department_edit" class="btn btn-primary ">  UPdate  </button>
		   </form>
    </div>


 
</div>

</div>


</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>


