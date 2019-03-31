
<?php include 'header.php';?>
<link href="css/lib/sweetalert/sweetalert.css" rel="stylesheet">
<?php include 'left_sidebar.php';?>

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Employee</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                        <li class="breadcrumb-item active">View</li>
                        <li class="breadcrumb-item active">Employee</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
          
 <?php
            
                    include 'db_connect.php';

                    $sql = "SELECT emp_id, emp_name, emp_department, emp_role, status FROM employee";
                    $result = $con->query($sql);

                   
         

            ?>    


                <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Department</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Change Status</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Department</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Change Status</th>
                                                <th>Edit</th>
                                                
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                             if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    #echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
                                                 echo ' <tr id="'.$row["emp_id"].'">
                                                <td><div class="round-img">
                                                        <a href=""><img src="uploads/'.$row["emp_id"].'.jpg" width="38px" height="38x" alt=""></a>
                                                    </div></td>
                                                <td>'.$row["emp_name"].'</td>
                                                <td>'.$row["emp_department"].'</td>
                                                <td>'.$row["emp_role"].'</td>';
                                                if ($row["status"]==0)
                                                {
                                                   echo' <td><span class="badge badge-success">Active</span></td>';
                                                }
                                                else
                                                {
                                                    echo '<td><span class="badge badge-danger">Deactive</span></td>';
                                                }
                                                if ($row["status"]==0)
                                                {
                                                   echo' <td><button id="'.$row["emp_id"].'" class="badge badge-danger" onclick="funStatus(this.id,0);">Deactive </button></td>';
                                                }
                                                else
                                                {
                                                    echo' <td><button id="'.$row["emp_id"].'" class="badge badge-success" onclick="funStatus(this.id,1);">Active </button></td>';
                                                }
                                                echo '
                                                
                                                
                                                <td><button id="'.$row["emp_id"].'" class="badge badge-info" onclick="fun(this.id);">Edit</button></td>
                                               
                                            </tr>';


                                                }
                                            } else {
                                                echo "0 results";
                                            }

                                            $con->close();
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                <!-- End PAge Content -->
    
            </div>


        </div>


<?php include 'footer.php';?>
<script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
    <script src="js/lib/sweetalert/sweetalert.min.js"></script>
            <!-- scripit init-->
    <script src="js/lib/sweetalert/sweetalert.init.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script >

    function fun(id)
    {
       window.location.href = 'admin_profile_edit.php?employee_id='+id;
    }
        function funStatus(id,status)
        {
            if(status==0)
            {
                var text1="This will disable the employee account and will not be able to login the system.";
                var text2="Good! The employee has been disabled now!";
            }
            else
            {
                var text1="This will enable the Employee account.";
                var text2="Good! The employee has been Enbled now!";
            }

        
        swal({
              title: "Are you sure?",
              text: text1,
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                swal(text2, {
                icon: "success",
               });
                //Ajax code starting from here

                var xhttp;
          
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() 
                  {
                    if (this.readyState == 4 && this.status == 200) 
                    {
                       
                       setInterval('refreshPage()', 1200);
                     }              
                  };
                  xhttp.open("GET", "changestatus.php?emp_id="+id+"&status="+status, true);          xhttp.send(); 


                //Ajax Ends
                
              } else {
                swal("No Changes have made!");
              }
            });
    }
     function refreshPage() { location.reload(); }
    </script>