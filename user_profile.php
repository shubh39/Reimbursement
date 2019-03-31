<?php include 'header_user.php';?>
 
<?php include 'left_sidebar_user.php';?>

 <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">User </h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
<?php
include 'db_connect.php';

                    $employee_id=$_SESSION['emp_id'];
                    // Check connection
                    if (mysqli_connect_errno())
                      {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                      }
                    

                    // Perform querie to retrive last employee id from Employee table
                    //mysqli_query($con,"SELECT max(`emp_id`) FROM `employee`");
                    $sql="SELECT `emp_id`,`emp_name`,`emp_department`,`email_id`,`emp_role` FROM `employee` WHERE `emp_id`='$employee_id'";
                    $result = $con->query($sql);

                     if ($result->num_rows > 0)
                      {
                          // output data of each row
                        while($row = $result->fetch_assoc())
                        {

                       $emp_ids=$row['emp_id'];
                       $emp_name=$row['emp_name'];
                       $emp_department=$row['emp_department'];
                       $email_id=$row['email_id'];
                       $emp_role=$row['emp_role'];
                            
                        }

                        
                      }
                      // Free result set
                        mysqli_free_result($result);
?>
            <!-- End Bread crumb -->
  <div class="container-fluid">
      <div class="card">
        <div class="col-md-12 row">
            <div class="col-md-8 form-group">
                <label for="email">Name:</label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                <?php echo $emp_name;  ?> 
                <br/>
                <br/><hr/>
                <label for="email">Department:</label>  &nbsp 
                <?php echo $emp_department;  ?>
                <br/>
                <br/><hr/>
                <label for="email">Email-id:</label>  &nbsp &nbsp  &nbsp &nbsp
                <?php echo $email_id;  ?>
                <br/>
                <br/><hr/>
                <label for="email">Role</label>  &nbsp &nbsp  &nbsp &nbsp
                <?php echo $emp_role;  ?>
            
            </div>
            <div class="col-md-4 form-group">
                <div class="round-img">
                    <a href=""><img src="uploads/<?php echo $emp_ids.'.jpg';  ?>" width="200px" height="200px" alt=""></a>
                </div>
            </div>

        </div>
        


      </div>
  </div>

<?php include 'footer.php' ; ?>  

