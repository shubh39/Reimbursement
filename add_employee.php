<?php include 'header.php';?>
<style>   
    .dap {
      margin: 2em 0 0.5em 0;
    }
    form {
      margin-bottom: 2em;
    }
    a {
      color: #59d;
      text-decoration: none;
    }
    a:hover {
      color: #555;
    }
  </style>
<?php include 'left_sidebar.php';?>
<script>
    $(document).ready(function(){
    
        $("#alerts").hide();
      
});
</script>
      
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Employee</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                        <li class="breadcrumb-item active">Add</li>
                        <li class="breadcrumb-item active">Employee</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="alert alert-primary  alert-dismissible fade show" role="alert" id="alerts">
              <strong>Done!</strong> Employee details successfully stored.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>



                <div class="row justify-content-center card">
                    <div class="col-lg-12">
                        <div class="card" >
                            <div class="card-body">
                                <div class="form-body">
                                        <h3 class="card-title m-t-15">Add employee Details</h3>
                                        <hr>
                                 </div>  

                                <div class="form-validation">
                                    <form class="form-valide" action="add_employee.php" method="post" enctype="multipart/form-data">

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-fullname">Full Name 
                                                <span class="text-danger">*</span></label>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control" id="val-fullname" name="val-fullname" placeholder="Enter a Full Name..">
                                                    </div>
                                        
                                        
                                                        <label class="col-lg-2 col-form-label" for="val-email">Department <span class="text-danger">*</span></label>
                                                        <div class="col-lg-4">
                                                            <select class="form-control" id="val-department" name="val-department">
                                                                <option value="Development">Development</option>
                                                                <option value="Marketing">Marketing</option>
                                                                <option value="HRM">Human Resource Managment</option>
                                                                <option value="Accounting and Finance">Accounting and Finance</option>
                                                            </select>
                                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-email">Email &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span class="text-danger">*</span></label>
                                                <div class="col-lg-4">
                                                    <input type="text" class="form-control" id="val-email" name="val-email" placeholder="Enter a email id..">
                                                 </div>
                                        
                                        
                                                 <label class="col-lg-2 col-form-label" for="val-username">Username <span class="text-danger">*</span></label>
                                                 <div class="col-lg-4">
                                                    <input type="text" class="form-control" id="val-username" name="val-username" placeholder="Your valid username..">
                                                 </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-password">Password <span class="text-danger">*</span></label>
                                            <div class="col-lg-4">
                                                <input type="password" class="form-control" id="val-password" name="val-password" placeholder="Choose a safe one..">
                                            </div>
                                      
                                            <label class="col-lg-2 col-form-label" for="val-confirm-password">Retype Password <span class="text-danger">*</span></label>
                                            <div class="col-lg-4">
                                                <input type="password" class="form-control" id="val-confirm-password" name="val-confirm-password" placeholder="..and confirm it!">
                                            </div>
                                        </div>
                                        
                                                                                
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-role">Designation <span class="text-danger">*</span></label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" id="val-role" name="val-role" placeholder="Enter Role">
                                            </div>
                                            <label class="col-lg-2 col-form-label" for="val-confirm-password">Access Level: <span class="text-danger">*</span></label>
                                            <div class="col-lg-4 btn-group btn-group-toggle" data-toggle="buttons">

                                                <label class="btn btn-secondary active">
  <input type="radio" name="options" id="option1" autocomplete="off" value="0" checked> Staff
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="options" id="option2" value="1" autocomplete="off"> Admin
  </label>
 

                                             </div>   
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-file">Upload Image<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="file"  id="file" name="file" class="form-control"/>
                                                <strong class="file-message"></strong> 
                                </div>    
                                    <span class="text-danger"></span>
                                            </div>
                                        
                                        
                                        <div class="form-group row">
                                            <div class="col-lg-1">
                                                <button type="submit" class="btn btn-success" name="save" id="save"> <i class="fa fa-check"></i> Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>




 <?php
                      
        if(isset($_REQUEST['save']))
            {
                     $name=$_REQUEST['val-fullname'];
                     $department=$_REQUEST['val-department'];
                     $email=$_REQUEST['val-email'];
                     $uid=$_REQUEST['val-username'];
                     $psws=$_REQUEST['val-password'];
                     $role=$_REQUEST['val-role'];
                     $access_role=$_REQUEST['options'];
                     

                     include 'db_connect.php';

                    
                    // Check connection
                    if (mysqli_connect_errno())
                      {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                      }
                    

                    // Perform querie to retrive last employee id from Employee table
                    //mysqli_query($con,"SELECT max(`emp_id`) FROM `employee`");
                    $sql="SELECT max(`emp_id`) FROM `employee`";
                    if ($result=mysqli_query($con,$sql) )
                      {
                      // Fetch one and one row
                          while ($row=mysqli_fetch_row($result))
                            {
                            $new_value=$row[0]+1;

                            }

                          // Free result set
                          mysqli_free_result($result);
                      } 

                   /* if (!mysqli_query($con,"INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_department`, `email_id`, `userid`, `password`, `emp_role`, `status`) VALUES ('$new_value', '$name', '$department', '$email', '$uid', '$psw', '$role', '0')"))
                      {
                      echo("Error description: " . mysqli_error($con));
                      }
                    */


                    


                    $sql_1="INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_department`, `email_id`, `userid`, `password`, `emp_role`, `status`,`access_role`) VALUES ('$new_value', '$name', '$department', '$email', '$uid', '$psws', '$role', '0','$access_role')";
                    $result=mysqli_query($con,$sql_1)  or  mysqli_error($con);
                    
                    $rec_msg='recode inserted'.$new_value.' result'.$result;
                    //echo $sql_1;
                    //echo '<br />'.$result;
                    mysqli_close($con); 
                     
               

                    $name = ''; $type = ''; $size = ''; $error = '';
                    function compress_image($source_url, $destination_url, $quality)
                     {

                        $info = getimagesize($source_url);

                         if ($info['mime'] == 'image/jpeg')
                            $image = imagecreatefromjpeg($source_url);

                        elseif ($info['mime'] == 'image/gif')
                            $image = imagecreatefromgif($source_url);

                        elseif ($info['mime'] == 'image/png')
                            $image = imagecreatefrompng($source_url);

                        imagejpeg($image, $destination_url, $quality);
                        return $destination_url;
                    }

                    if ($_POST)
                     {

                            if ($_FILES["file"]["error"] > 0) {
                                    $error = $_FILES["file"]["error"];
                            } 
                            else if (($_FILES["file"]["type"] == "image/gif") || 
                            ($_FILES["file"]["type"] == "image/jpeg") || 
                            ($_FILES["file"]["type"] == "image/png") || 
                            ($_FILES["file"]["type"] == "image/pjpeg")) {

                                    $url = 'uploads/'.$new_value.'.jpg';

                                    $filename = compress_image($_FILES["file"]["tmp_name"], $url,50);
                                    $buffer = file_get_contents($url);  
                        ?>
                            <script>
                                $(function(){
                                    
                                $("#alerts").show();  
                                $('.alert').alert();
      
                                });

                            
                            </script>
                        <?php


                           
                            }
                            else
                             {
                                    $error = "Uploaded image should be jpg or gif or png";
                             }
                        }



                  }

                    ?>

















            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> Designed and Developed by <a href="innovation_geeks.php"> Innovation Geeks 2018 </a></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->

</body>

</html>
  
    <!-- All Jquery -->
    
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>


    <!-- Form validation -->
    <script src="js/lib/form-validation/jquery.validate.min.js"></script>
    <script src="js/lib/form-validation/jquery.validate-init.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="test/jqExtension.js"></script>
    <script>
        (function ($) {
        $('#file').jqExtension();
 
        })(jQuery);
    </script>
