<?php include 'header_user.php';?>
 <link href="css/lib/sweetalert/sweetalert.css" rel="stylesheet">
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
                        <li class="breadcrumb-item active">Change Password</li>
                    </ol>
                </div>
            </div>

            <!-- End Bread crumb -->
  <div class="container-fluid">
      <div class="card">
        <div class="form-body">
            <h3 class="card-title m-t-15">Change Password</h3>
            <hr/>
        
            <div class="form-validation">
                  <form class="form-valide" action="change_password.php" method="post" enctype="multipart/form-data">
                    <div class="form-group row col-lg-12">
                        <label class="col-lg-3 col-form-label" for="val-oldpassword">Old Password 
                            <span class="text-danger">*
                            </span>
                        </label>
                        <div class="col-lg-6">
                            <input type="password" class="form-control" id="val-oldpassword" name="val-oldpassword" placeholder="Enter a your old Password.."/>
                        </div>
                    </div>
                    <div class="form-group row col-lg-12">
                        <label class="col-lg-3 col-form-label" for="val-password">New Password
                            <span class="text-danger">*
                            </span>
                        </label>
                        <div class="col-lg-6">
                            <input type="password" class="form-control" id="val-password" name="val-password" placeholder="Enter a new Password.."/>
                        </div>
                    </div>
                    <div class="form-group row col-lg-12">
                        <label class="col-lg-3 col-form-label" for="val-confirm-password">Re-type Password 
                            <span class="text-danger">*
                            </span>
                        </label>
                        <div class="col-lg-6">
                            <input type="password" class="form-control" id="val-confirm-password" name="val-confirm-password" placeholder="Re-type your new Password.."/>
                        </div>
                    </div>
                    <div class="form-group row col-lg-12">
                        
                        <div class="col-lg-4 ">
                            <button type="submit" name="save" id="save" class="btn btn-primary">Change Password</button>
                        </div>
                    </div>
                  </form>
            </div>    
        </div>    

      </div>
  </div>
<?php

if(isset($_POST['save']))
{
$old_password=$_POST['val-oldpassword'];
$new_password=$_POST['val-password'];
include 'db_connect.php';

                    $employee_id=$_SESSION['emp_id'];
                    // Check connection
                    if (mysqli_connect_errno())
                      {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                      }
                    
                    $sql="SELECT `password` FROM `employee` WHERE  `emp_id`= '$employee_id'  and `password`='$old_password' ";
                    $result = $con->query($sql) or die(mysqli_error($con));


                     if ($result->num_rows > 0)
                      {
                          
                        $sql1="UPDATE `employee` SET `password`='$new_password' WHERE `password`='$old_password'";
                        $result1 = $con->query($sql1) or die(mysqli_error($con));
                        
                        mysqli_free_result($result);
                               ?>
                             <script>
                                  $(function(){
                                      swal("Great!", "your password has changed!", "success");
                                  });
                             </script>
                              <?php
                           
                        
                      }
                      else
                      {
                        ?>
                        <script>
                              $(function(){
                                  swal("Oops!", "your old password did not match", "warning");
                              });
                        </script>

                        <?php
                      }
                      // Free result set
                        
                        

 
}



?>
<?php include 'footer.php' ; ?>  
 <script src="js/lib/sweetalert/sweetalert.min.js"></script>
    <!-- scripit init-->
<script src="js/lib/sweetalert/sweetalert.init.js"></script>
