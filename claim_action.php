<?php include 'header.php';?>
<link href="css/lib/sweetalert/sweetalert.css" rel="stylesheet">
<?php include 'left_sidebar.php';?>
<style>
.pdfobject-container { height: 500px;}
.pdfobject { border: 1px solid #666; }
.img-thumbnail{
    
}
.image_class {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
    width: 80px;
    height: 80px;
    border-color: black;
}
.image_class1 {
   
    border-radius: 4px;
    padding: 5px;
    
    
}
</style>

<!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Claim Action</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Claim</a></li>
                        <li class="breadcrumb-item active">Action</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->

<?php 
include 'db_connect.php';
$action=$_REQUEST['action'];
$sql1 = "SELECT a.date_of, b.emp_name, a.cat_id,c.name, a.amount,a.status FROM `detailed_req` as a, employee as b, category as c WHERE a.emp_id=b.emp_id and a.cat_id=c.cat_id and a.detail_id=$action" ;
$result1 = $con->query($sql1) or die(mysqli_error($con));
 if ($result1->num_rows > 0) 
  {
while ($rows = $result1->fetch_row()) {
        
        $print_emp_name=$rows[1];
        $print_date_of=$rows[0];
        $print_category=$rows[3];
        $print_amount=$rows[4];
        $print_status=$rows[5];
    }
}
else
{
    echo "no rows selected";
}

?>

            
            <div class="container">
                <div class="row ">
                    <div class="card"
                    <div class="col-md-4">
                        Employee Name: <br/>
                        <?php echo $print_emp_name; ?> <br/>
                        <hr/>
                        Category: <br/>
                                    <?php echo $print_category; ?> <br/>
                                    <hr/>
                                    Amount: <br/>
                                    <?php echo $print_amount; ?> <br/>
                                    <hr/>
                                    Date: <br/>
                                    <?php echo $print_date_of; ?> <br/>
                                    <hr/>
                                    Current Status: <br/>
                                    <div id="msg">
                                    <?php
                                            if($print_status==0)
                                                {
                                                    echo '<span class="badge badge-warning" >Pending</span>';

                                                }if($print_status==1)
                                                {
                                                    echo '<span class="badge badge-primary" >Ongoing</span>' ;
                                                }if($print_status==2)
                                                {
                                                    echo '<span class="badge badge-success" >Approved</span>';
                                                }if($print_status==3)
                                                {
                                                    echo '<span class="badge badge-danger" >Not Approved</span>';   
                                                }
                                    ?>
                                    </div>
                                     <br/><input type="hidden" name="hidden_id" id="hidden_id" value="<?php
                                     echo $action;?>" />
                                    <hr/><form action="claim_action.php" method="post" >
                                    <select id="status">
                                        <option value="2">Approved</option>
                                        <option value="0">Pending</option>
                                        <option value="1">Ongoing</option>
                                        <option value="3">Not Approved</option>
                                    </select> &nbsp&nbsp&nbsp&nbsp
                                    <input type="button" name="save" value="Change Status" class="btn btn-primary" id="save" 
                                    onclick="dipak()" /> </form>
                                    <br/>
                                    <div class="img-thumbnail ">
                                    <?php
                                    
                                    $action=$_REQUEST['action'];
                                    $sql = "SELECT * FROM attachment WHERE detail_id='$action'" ;
                                    $result = $con->query($sql) or die(mysqli_error($con));

                                    if ($result->num_rows > 0) 
                                    {
                                                // output data of each row
                                        while($row = $result->fetch_assoc())
                                        {

                                            if($row['file_type']=='image/jpeg' || $row['file_type']=='image/png' )
                                            {        
                                            echo '
                                                        <img id="'.$row["url"].'" class="image_class" src="'.$row["url"].'" width="38px" height="38x"  onclick="myfunction(this.id)">
                                                    ';
                                            }
                                            if($row['file_type']=='application/pdf')
                                            {
                                               echo '
                                                        <img id="'.$row["url"].'" class="image_class" src="uploads/reimburse/pdf_logo.jpg" width="38px" height="38x" onclick="myfunction(this.id)" >
                                                   '; 
                                            }

                                            #echo $row['url'];


                                        }
                                    } 
                                    else
                                    {
                                        echo "0 results";
                                    }

                                            $con->close();
                                            


                                    ?>
                                     </div>
    </div>
    <div class="card col-md-7">
    <div  id="example1">
      
    </div>
    </div>
  </div>
 </div> 
</div>
            <!-- End Container fluid  -->
           
           <?php include 'footer.php';?>
            <script src="pdfobject/pdfobject.js"></script>
            <script src="js/lib/sweetalert/sweetalert.min.js"></script>
            <!-- scripit init-->
            <script src="js/lib/sweetalert/sweetalert.init.js"></script>



            <script type="text/javascript">
function SelectElement(id, valueToSelect)
{    
    var element = document.getElementById(id);
    element.value = valueToSelect;
}
SelectElement("status", "<?php echo$print_status;?>")


             function myfunction(name)
                {
                    
                    var name=name;
                    var arr = name.split(".");
                    var exte = arr[1];
                    
                    if (exte=='jpg' || exte=='JPG' || exte=='jpeg' || exte=='JPEG' ) 
                    {
                        document.getElementById('example1').innerHTML = '<img src="'+name+'" class="image_class1" height="100%" width="100%" />';

                    }
                    if (exte=='PNG' || exte=='png' ) 
                    {
                        document.getElementById('example1').innerHTML = '<img src="'+name+'" class="image_class1" height="100%" width="100%" />';

                    }
                    if (exte=='pdf' || exte=='PDF' ) 
                    {
                       PDFObject.embed(name, "#example1");

                    }


                   
                }  
            </script>
  <script>
      function dipak()
      {
        
        var str= document.getElementById("hidden_id").value;
        var sts= document.getElementById("status").value;
        var xhttp;
          if (str.length == 0) 
          { 
            document.getElementById("txtHint").innerHTML = "";
            return;
          }
          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() 
          {
            if (this.readyState == 4 && this.status == 200) 
            {
              if(this.responseText==0)
              {
                swal("Great!", "Claim request successfully updated!", "success");
              } 
              else
              {
                swal("Sorry!", "Update Failed", "warning");
              }
               
                if(sts==0)
                    {
                       document.getElementById("msg").innerHTML = '<span class="badge badge-warning" >Pending</span>';

                    }if(sts==1)
                    {
                       document.getElementById("msg").innerHTML = '<span class="badge badge-primary" >Ongoing</span>' ;
                    }if(sts==2)
                    {
                        document.getElementById("msg").innerHTML = '<span class="badge badge-success" >Approved</span>';
                    }if(sts==3)
                    {
                    document.getElementById("msg").innerHTML ='<span class="badge badge-danger" >Not Approved</span>';   
                    }





            }
          };
          xhttp.open("GET", "changestatus.php?detail_id="+str+"&status="+sts, true);
          xhttp.send();  
   
     }
  </script>    
            
            