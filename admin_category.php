
<?php include 'header.php';?>

<?php include 'left_sidebar.php';?>

<!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Category</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                         <li class="breadcrumb-item active">View</li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->

 <?php
            
                    include 'db_connect.php';


                    
                    $sql = "SELECT * FROM category";
                    $result = $con->query($sql);

                   
         

            ?>    

<div class="container-fluid">
                <!-- Start Page Content -->
                
                
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Recent Orders </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example777" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Category Name</th>
                                                <th>Allotment</th>
                                                <th>Edit</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Category Name</th>
                                                <th>Allotment</th>
                                                <th>Edit</th>
                                                
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                             if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    #echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
                                                 echo ' <tr>
                                                
                                                <td>'.$row["name"].'</td>
                                                <td>'.$row["basic_allotment"].'</td>
                                                <td><button id="'.$row["cat_id"].'" class="badge badge-info" onclick="fun(this.id);">Edit</button></td>
                                                
                                               
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
                    </div>
                </div>


                

                


                <!-- End PAge Content -->
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
    <script >

    function fun(id)
    {
       window.location.href = 'admin_category_edit.php?category_id='+id;
    }
</script>