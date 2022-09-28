<?php
session_start();

include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD DEPARTMENT </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> DEPARTMENT NAME </label>
                <input type="text" name="department_name" class="form-control" placeholder="Enter department name">
            </div>

        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="dep_save" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DEPARTMENT  
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              ADD 
            </button>
    </h6>
  </div>

  <div class="card-body">
    <?php
    if(isset($_SESSION['success']) && $_SESSION['success'] !='') 
    {
      echo '<h2 class="bg-primary text-white"> '.$_SESSION['success'].'</h2>';
      unset($_SESSION['success']);
    }
    if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
    { 

      echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'] . '</h2>';
      unset($_SESSION['status']);
    }
    ?>

    <div class="table-responsive">
       <?php
       $connection = mysqli_connect('localhost', 'root', '', 'mysite');

       $query = "SELECT * FROM department";
       $query_run = mysqli_query($connection, $query);
       ?>
      

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> DEPARTMENT NAME  </th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
         <?php
         if (mysqli_num_rows($query_run) > 0)
          {
            while ($row = mysqli_fetch_assoc($query_run))
             {
              ?>
          <tr>
            <td> <?php echo $row ['dep_id'];?></td>
            <td> <?php echo $row ['dep_name'];?></td>


              <td>
                <form action="department_edit.php" method="post">
                  <input type="hidden" name = "userID" value=" <?php echo $row['dep_id']?>" >
                    <button  type="submit" name="edit_dep" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['dep_id']?>">
                  <button type="submit" name="delete_dep" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
          <?php
           }
          ?>
       
        </tbody>
      </table>
       <?php
            
           }
            else  {
            echo "NO Record Found";
          }
         ?>

    </div>
  </div>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>