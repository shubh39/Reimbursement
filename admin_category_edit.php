
<?php include 'header.php';?>
<link href="css/lib/sweetalert/sweetalert.css" rel="stylesheet">
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
                        <li class="breadcrumb-item active">Edit</li>
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
<?php
$cat_id=$_REQUEST['category_id'];
 include 'db_connect.php';

                    $sql = "SELECT * FROM category where cat_id='$cat_id' ";
                   
                     $result = $con->query($sql);

                     if ($result->num_rows > 0)
                      {
                          // output data of each row
                        while($row = $result->fetch_assoc())
                        {

                       $cat_id=$row['cat_id'];
                       $name=$row['name'];
                       $basic_allotment=$row['basic_allotment'];
                       
                            
                        }

                        
                      }
                      // Free result set
                        mysqli_free_result($result);
?>

<div class="row justify-content-center">
                <!-- Start Page Content -->
                
                
                    <div class="col-lg-12">
                        <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-body">
                                <div class="form-validation">
                                
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Category Details</h3>
                                        <hr>
                                        <div class="row col-lg-12">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-lg- 6 col-form-label" for="val-cate_name">Category Name <span class="text-danger">*</span></label>
                                                    <div>
                                                    <input type="text" id="val-cate_name" name="val-cate_name" class="form-control" value="<?php echo $name; ?>" />
                                                </div>
                                                </div>
                                          
                                            <!--/span-->
                                           
                                      
                                        </div>
                                        <!--/row-->
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-lg-6 col-form-label" for="val-allotment">Allotment Limit<span class="text-danger">*</span></label>
                                                    <div>
                                                     <input type="text" id="val-allotment" name="val-allotment" class="form-control" value="<?php echo $basic_allotment; ?>"/>
                                                 </div>
                                                     </div>
                                            </div>
                                        </div>
                                            
                                            
                                        <!--/row-->
                                        
                                    </div>
                                    <div class="form-actions">
                                         <button id="<?php echo$cat_id; ?>" class="btn btn-success" name="save"  onclick="funEdit(this.id);" value="update" >Update</button> 
                                       
                                    </div>
                               
                            </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
                    </div>
                </div>



                

                


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
     <script src="js/lib/sweetalert/sweetalert.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/sweetalert/sweetalert.init.js"></script>


</body>

</html>
<script>
function funEdit(emp)
{
        //alert (emp);
        var name= document.getElementById("val-cate_name").value;
        var allot= document.getElementById("val-allotment").value;
       
        //alert (name+depa+email+role);
        var xhttp;
          
          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() 
          {
            if (this.readyState == 4 && this.status == 200) 
            {
              if(this.responseText==0)
              {
                swal("Great!", "Categoty details successfully updated!", "success");
                              } 
              else
              {
                
                swal("Sorry!", "Update Failed", "warning");
              }
               
               

            }
          };
          xhttp.open("GET", "change_employee.php?cat_id="+emp+"&name="+name+"&allot="+allot, true);
          xhttp.send();
} 
</script>
















<?php
/*
INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_department`, `email_id`, `userid`, `password`, `emp_role`, `status`) VALUES ('1010111', 'Dipak Patel', 'Marketing', 'dipakapatel777@gmail.com', 'dipakapatel', 'dap@777', 'employee', '0');

*/
?>