<?php include 'header_user.php';?>
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


<?php include 'left_sidebar_user.php';?>
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
                    <h3 class="text-primary">Make a new reimburse claim </h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Employee</a></li>
                        <li class="breadcrumb-item active">New Claim</li>
                    </ol>
                </div>
            </div>

            <div class="alert alert-primary  alert-dismissible fade show" role="alert" id="alerts">
              <strong>Done!</strong> Your reimburse cliam submited succesfully.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>



            <!-- End Bread crumb -->
<div class="container-fluid">
    <div class="card">
        
        <div class="form-body">
            <h3 class="card-title m-t-15">Claim for reimburse your expanses</h3>
            <hr>
        </div> 
        <div class="form-validation">
                <form class="form-valide" id="form" action="claim_request.php" method="post" enctype="multipart/form-data">
                    <div class="form-group row" id="new_cate">
                        
                        <label class="col-lg-2 col-form-label" for="val-category">Category 
                            <span class="text-danger">*</span></label>
                                <div class="col-lg-4">
                                    <select class="form-control" id="val-category" name="val-category">

                                    <?php
                                    include 'db_connect.php';
                                        if ($con->connect_error) 
                                        {
                                            die("Connection failed: " . $con->connect_error);
                                        }

                                        $sql = "SELECT * FROM category ";
                                        $result = $con->query($sql); 

                                        if ($result->num_rows > 0)
                                         {
                                           // output data of each row
                                           while($row = $result->fetch_assoc()) 
                                           {        

                                        echo "<option value=".$row['cat_id'].">".$row['name']."</option>";
                                            }
                                        }
                                        else
                                         {
                                        echo "<option value=0>No Row Selected</option>";
                                         }
                                        ?>
                                        
                                    </select>
                                </div>
                                	<div class="col-lg-2">
                                    <label class="col-form-label" for="val-amount">Amount 
                                        <span class="text-danger">* &nbsp&nbsp</span></label>
                                    </div>    
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" id="val-amount" name="val-amount" placeholder="Enter an amount.."/>
                                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label" for="val-category">Date of expense 
                            <span class="text-danger">*</span></label>
                                <div class="col-lg-4">
                                    <input type="Date" name="val-date" id="val-date" class="form-control" required />
                                </div>
                                <div class="col-lg-2">
                                    <label class="col-form-label" >Description 
                                        <span class="text-danger"></span></label>
                                </div>        
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" id="val-description" name="val-description" placeholder="Enter Description..">
                                            </div>
                    </div>
                    <div class="form-group row" id="new_div">                        
                        <label class="col-lg-2 col-form-label" for="val-file">Upload File:  
                            <span class="text-danger">*</span></label>
                                <div class="col-lg-5" >
                                    <input type="file" name="file[]" id="file_1"  required />
                                    <strong class="file-message"></strong> 
                                </div>   
                                <div class="col-lg-2">
                                    <span class="text-danger"></span><input type="button"  class="btn-copy" value="Add multiple files" ></input>
                                </div>         
                    </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <input type="button"  name="new_req" id="new_req" class="btn btn-primary" value="Add new Claim" hidden="hidden" />
                                                <button type="submit" name="save" id="save" class="btn btn-primary">Submit Claim</button>
                                            </div>
                                        </div>
                                    </form> 
                                                                       
                                </div>
    </div>  


<?php


#database connection and queryies

include 'db_connect.php';

                 
    if(isset($_POST['save']))  
        { 
            // Check connection
            if (mysqli_connect_errno())
                {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                    

            // Perform querie to retrive last employee id from Employee table
            //mysqli_query($con,"SELECT max(`emp_id`) FROM `employee`");
            $sql="SELECT max(`detail_id`) FROM `detailed_req`";
            if ($result=mysqli_query($con,$sql))
                {
                    // Fetch one and one row
                    while ($row=mysqli_fetch_row($result))
                        {
                            if($row[0]=='')
                                {
                                    $new_detail_id=1;
                                }
                            else
                                {
                                 $new_detail_id=$row[0]+1;
                                }
                        }

                      // Free result set
                    
                }
             mysqli_free_result($result);         

           #code for insert record in detailed_req table
                     
           $employee_id=$_SESSION['emp_id'];
           $cate = $_POST['val-category'];
           $amount= $_POST['val-amount'];
           $date_req = $_POST['val-date'];
            $date_req = str_replace('/', '/', $date_req);
            $date_req = date('d-m-Y', strtotime($date_req));
           $desc = $_POST['val-description'];

           $sql_1="INSERT INTO `detailed_req` (`detail_id`, `emp_id`, `cat_id`, `amount`, `date_of`, `description`,  `status`,`flag`) VALUES ('$new_detail_id', '$employee_id', '$cate', '$amount', '$date_req', '$desc',  '0','0')";
           $result1=mysqli_query($con,$sql_1) or die(mysqli_error($con));
         
  

            #echo $sql_1."</br>";

            function reArrayFiles($file_post) 
            {

                $file_ary = array();
                $file_count = count($file_post['name']);
                $file_keys = array_keys($file_post);

                for ($i=0; $i<$file_count; $i++)
                {
                    foreach ($file_keys as $key)
                    {
                        $file_ary[$i][$key] = $file_post[$key][$i];
                    }
                }

                return $file_ary;
            }


            $file_ary = reArrayFiles($_FILES['file']);

            foreach ($file_ary as $file)
            {
                
                $file_name=$file['name'];
                $file_type=$file['type'];

                $temp = explode(".", $file['name']);
                $newfilename = rand(1, 100000000) . '.' . end($temp);
                move_uploaded_file($file["tmp_name"], "uploads/reimburse/" . $newfilename);
                $url="uploads/reimburse/".$newfilename;
                $sql_2="INSERT INTO `attachment` (`filename`, `file_type`,`url`, `detail_id`) VALUES ('$file_name', '$file_type', '$url','$new_detail_id')";
                $result2=mysqli_query($con,$sql_2) or die(mysqli_error($con));
                #echo $sql_2."</br>";
               
            }
     ?>
                <script>
                    $(function(){
                                    
                                $("#alerts").show();  
                                $('.alert').alert();
      
                                });

                            
                            </script>
                        <?php

}
            /* echo 'File Size: ' . $_POST['val-category']."</br>";
                    echo 'File Size: ' . $_POST['val-amount']."</br>";
                    echo 'File Size: ' . $_POST['val-date']."</br>";
                    echo 'File Size: ' . $_POST['val-description']."</br>";
                }
            */       
?>





<?php include 'footer.php' ; ?>  


<script>
$(function(){
    var i=1;
  $(".btn-copy").on('click', function(){
    i=i+1;
    var div ='<div class="form-group row" id="new_div"> <label class="col-lg-2 col-form-label" for="val-file">Upload File:  <span class="text-danger">*</span></label> <div class="col-lg-5" > <input type="file" name="file[]" id="file_'+i+'" onClick="val_fun(this.id)" /> <strong class="file-message"></strong> </div> <span class="text-danger"></span></div>';

    var ele = $('#new_div').clone(true);
    $('#new_div').after(div);
  })
})
</script>
<script src="test/jqExtension.js"></script>
<script>
(function ($) {
  $('#file_1').jqExtension();
 
})(jQuery);
</script>
<script type="text/javascript">
function val_fun(id)
{
    $('#'+id).jqExtension();
    
}
</script>





