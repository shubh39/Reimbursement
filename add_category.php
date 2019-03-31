
<?php include 'header.php';?>

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
                    <h3 class="text-primary">Category</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                        <li class="breadcrumb-item active">Add</li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->

            <div class="alert alert-primary  alert-dismissible fade show" role="alert" id="alerts">
              <strong>Done!</strong> Category details successfully stored.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>


<div class="row justify-content-center">
                <!-- Start Page Content -->
                
                
                    <div class="col-lg-12">
                        <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-body">
                                <div class="form-validation">
                                <form class="form-valide" action="add_category.php" method="post" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Category Details</h3>
                                        <hr>
                                        <div class="row col-lg-12">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-lg- 6 col-form-label" for="val-cate_name">Category Name <span class="text-danger">*</span></label>
                                                    <div>
                                                    <input type="text" id="val-cate_name" name="val-cate_name" class="form-control" />
                                                </div>
                                                </div>
                                          
                                            <!--/span-->
                                           
                                      
                                        </div>
                                        <!--/row-->
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-lg-6 col-form-label" for="val-allotment">Allotment Limit<span class="text-danger">*</span></label>
                                                    <div>
                                                     <input type="text" id="val-allotment" name="val-allotment" class="form-control" />
                                                 </div>
                                                     </div>
                                            </div>
                                        </div>
                                            
                                            
                                        <!--/row-->
                                        
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success" name="save" id="save"> <i class="fa fa-check"></i> Save</button>
                                       
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
                    </div>
                </div>

<?php

if(isset($_REQUEST['save']))
                  {
                     $cate_name=$_REQUEST['val-cate_name'];
                     $allotment=$_REQUEST['val-allotment'];
                    
                    include 'db_connect.php';

                    // Perform querie to retrive last employee id from Employee table
                    //mysqli_query($con,"SELECT max(`emp_id`) FROM `employee`");
                    $sql="SELECT max(`cat_id`) FROM `Category`";
                    if ($result=mysqli_query($con,$sql))
                      {
                      // Fetch one and one row
                      while ($row=mysqli_fetch_row($result))
                        {
                        $new_value=$row[0]+1;

                        }

                      // Free result set
                      mysqli_free_result($result);
                      }

                    $sql_1="INSERT INTO `category` (`cat_id`, `name`, `basic_allotment`) VALUES ('$new_value', '$cate_name', '$allotment')";
                    $result1=mysqli_query($con,$sql_1) ;
                    #print('recode inserted'.$new_value.' result'.$result1);
                    mysqli_close($con); 


                    ?>
                            <script>
                                $(function(){
                                    
                                $("#alerts").show();  
                                $('.alert').alert();
      
                                });

                            
                            </script>
                        <?php


                           
                            }
                            
                     
?>

                

                


                <!-- End PAge Content -->
            </div>



  <!-- footer -->
            <footer class="footer"> Developed by <a href="team_info.php"> Innovation Geeks 2018 </a></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->

  
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


</body>

</html>
















<?php
/*
INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_department`, `email_id`, `userid`, `password`, `emp_role`, `status`) VALUES ('1010111', 'Dipak Patel', 'Marketing', 'dipakapatel777@gmail.com', 'dipakapatel', 'dap@777', 'employee', '0');

*/
?>