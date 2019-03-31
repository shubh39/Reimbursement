<?php include 'header_user.php';?>
 <link href="css/lib/sweetalert/sweetalert.css" rel="stylesheet">
<?php include 'left_sidebar_user.php';?>

 <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Admin </h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></li>
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
                <label  class="col-md-4" for="email">Name:</label> 
                
                <input type="text"  class="form-control" name="emp_name" id="emp_name" value="<?php echo $emp_name;  ?> " />
                
                
                <hr/>
                <label class="col-md-4" for="email">Department:</label>  
                
                <select  id="val-department" class="form-control" name="val-department" >
                        <option value="Development">Development</option>
                        <option value="Marketing">Marketing</option>
                        <option value="HRM">Human Resource Managment</option>
                        <option value="Accounting and Finance">Accounting and Finance</option>
                </select>
                <hr/>
                <label class="col-md-4" for="email">Email-id:</label>  &nbsp &nbsp  &nbsp &nbsp
                <input type="email"  class="form-control" name="email" id="email" value="<?php echo $email_id;  ?>" />
                <hr/>
                <label class="col-md-4" for="email">Role</label>  &nbsp &nbsp  &nbsp &nbsp
                <input type="text" class="form-control" name="role" id="role" value="<?php echo $emp_role;  ?>"  />
                <hr/>
                <button  class="btn btn-success" name="save"  onclick="funEdit(this.id);" value="update" >Update</button>  
            
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
<script src="pdfobject/pdfobject.js"></script>
            <script src="js/lib/sweetalert/sweetalert.min.js"></script>
            <!-- scripit init-->
            <script src="js/lib/sweetalert/sweetalert.init.js"></script>
<script>
  
  function SelectElement(id, valueToSelect)
{    
    var element = document.getElementById(id);
    element.value = valueToSelect;
}
SelectElement("val-department", "<?php echo$emp_department;?>")
function funEdit(emp)
{
        //alert (emp);
        var name= document.getElementById("emp_name").value;
        var depa= document.getElementById("val-department").value;
        var email= document.getElementById("email").value;
        var role= document.getElementById("role").value;
        //alert (name+depa+email+role);
        var xhttp;
          
          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() 
          {
            if (this.readyState == 4 && this.status == 200) 
            {
              if(this.responseText==0)
              {
                swal("Great!", "Employee details successfully updated!", "success");
                              } 
              else
              {
                
                swal("Sorry!", "Update Failed", "warning");
              }
               
               

            }
          };
          xhttp.open("GET", "change_employee.php?emp_id="+emp+"&emp_name="+name+"&emp_dep="+depa+"&email="+email+"&role="+role, true);
          xhttp.send();
} 
</script>

