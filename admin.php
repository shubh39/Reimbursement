<?php include 'header.php';?>

<?php include 'left_sidebar.php';?>

<?php include 'wrapper.php';?>
<?php
                    include 'db_connect.php';

                    // Check connection
                    if (mysqli_connect_errno())
                      {
                      #echo "Failed to connect to MySQL: " . mysqli_connect_error();
                      }
                      $theVariable = array();

                    $query="SELECT `status`, count(`status`) as total_number FROM `detailed_req` GROUP by `status`;"; 
                    
                   # echo "----------------------------------------------";
                    
                   $result = $con->query($query);
                    while ($row = $result->fetch_array()) {
                        #printf("'%s'='%s'\n", $row['status'], $row['total_number']);
                        #$numbers[]= array($row['status']=>$row['total_number']);
                        $theVariable[$row['status']] = $row['total_number'];
                        
                    }
                    #echo"-----------------------------------------";

                    $row[] = $result->fetch_array();
                    #print_r($theVariable);

                     #echo"-----------------------------------------";


                      #echo $theVariable[0];
                   


?>

            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row"><a href="claim_view.php?action=Approved">
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-check f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $theVariable[2];?></h2>
                                    <p class="m-b-0">Approved</p>
                                </div>
                            </div>
                        </div></a>
                    </div>
                    <div class="col-md-3"><a href="claim_view.php?action=Pending">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-file f-s-40 color-warning"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $theVariable[0];?></h2>
                                    <p class="m-b-0">Pending</p>
                                </div>
                            </div>
                        </div></a>
                    </div>
                    <div class="col-md-3"><a href="claim_view.php?action=Ongoing">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-hourglass f-s-40 color-success"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $theVariable[1];?></h2>
                                    <p class="m-b-0">Ongoing</p>
                                </div>
                            </div>
                        </div></a>
                    </div>
                    <div class="col-md-3"><a href="claim_view.php?action=NotApproved">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-times f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $theVariable[3];?></h2>
                                    <p class="m-b-0">Not Approved</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                
                    
                </div>


                

                


                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
           
           <?php include 'footer.php';?>