<?php include 'header.php';?>

<?php include 'left_sidebar.php';?>


<?php
    
    if(isset($_REQUEST['action']))
    {
                    include 'db_connect.php';
                    $action=$_REQUEST['action'];
                    if($action=='Pending')
                    {
                        $status=0;
                    } elseif ($action=='Ongoing') {

                        $status=1;
                    } elseif ($action=='Approved') {

                        $status=2;
                    } elseif ($action=='NotApproved') {

                        $status=3;
                    }

                    $sql = "SELECT a.emp_id,c.emp_name, b.name, a.amount,a.detail_id, a.date_of, a.status FROM detailed_req as a, category as b, employee as c WHERE a.status='$status' and a.cat_id=b.cat_id and a.emp_id=c.emp_id" ;
                    $result = $con->query($sql);

        }    


?>


<!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"><?php echo $action;  ?></h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">View</a></li>
                        <li class="breadcrumb-item active"><?php echo $action;  ?> Claims</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->


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
                                                <th>Employee Name</th>
                                                <th>Category</th>
                                                <th>Amount</th>
                                                <th>Date of Claim</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Employee Name</th>
                                                <th>Category</th>
                                                <th>Amount</th>
                                                <th>Date of Claim</th>
                                                <th>Status</th>
                                                
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                             if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    #echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
                                                 echo ' <tr>
                                                 <td><div class="round-img">
                                                        <img src="uploads/'.$row["emp_id"].'.jpg" width="38px" height="38x" alt="">
                                                    </div></td>
                                                <td>'.$row["emp_name"].'</td>
                                                <td>'.$row["name"].'</td>
                                                <td>'.$row["amount"].'</td>
                                                <td>'.$row["date_of"].'</td>';

                                                if($row['status']==0)
                                                {
                                                    echo '<td><a href="claim_action.php?action='.$row["detail_id"].' "><span class="badge badge-warning">Pending</span></td></a></a>
                                               
                                            </tr>';

                                                }if($row['status']==1)
                                                {
                                                    echo '<td><a href="claim_action.php?action='.$row["detail_id"].' "><span class="badge badge-primary">Ongoing</span></td></a>
                                               
                                            </tr>';
                                                }if($row['status']==2)
                                                {
                                                    echo '<td><a href="claim_action.php?action='.$row["detail_id"].' "><span class="badge badge-success">Approved</span></td></a>
                                               
                                            </tr>';
                                                }if($row['status']==3)
                                                {
                                                    echo '<td><a href="claim_action.php?action='.$row["detail_id"].' "><span class="badge badge-danger">Not Approved</span></td></a>
                                               
                                            </tr>';   
                                                }

                                               

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
            <!-- End Container fluid  -->
           
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