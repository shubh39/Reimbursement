
<?php include 'header_user.php';?>
 <style>
   
    h4 {
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
    .main_div{
        height: 100%;
    }
  </style>
<?php include 'left_sidebar_user.php';?>

<?php
                    include 'db_connect.php';
                    $emp_id=$_SESSION['emp_id'];
                    // Check connection
                    if (mysqli_connect_errno())
                      {
                      #echo "Failed to connect to MySQL: " . mysqli_connect_error();
                      }
                      $theVariable = array();

                    $query="SELECT `status`, count(`status`) as total_number FROM `detailed_req` WHERE `emp_id`='$emp_id' GROUP by `status`;"; 
                    
                   # echo "----------------------------------------------";
                    
                   $result = $con->query($query);
                    while ($row = $result->fetch_array()) {
                        #printf("'%s'='%s'\n", $row['status'], $row['total_number']);
                        #$numbers[]= array($row['status']=>$row['total_number']);
                        $theVariable[$row['status']] = $row['total_number'];
                        
                    }
                  

                    $row[] = $result->fetch_array();
                   


?>

 <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Welcome </h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                        <li class="breadcrumb-item active">Homepage</li>
                    </ol>
                </div>
            </div>


            <!-- End Bread crumb -->
    <div class="container-fluid main_div">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-check f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php if (isset($theVariable[2]))
                                                {           
                                                echo $theVariable[2];
                                                }
                                                else
                                                {
                                                    echo '0';
                                                }
                                                ?></h2>
                                    <p class="m-b-0">Approved</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-file f-s-40 color-warning"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php if (isset($theVariable[0]))
                                                {           
                                                echo $theVariable[0];
                                                }
                                                else
                                                {
                                                    echo '0';
                                                }
                                                ?></h2>
                                    <p class="m-b-0">Pending</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-hourglass f-s-40 color-success"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php if (isset($theVariable[1]))
                                                {           
                                                echo $theVariable[1];
                                                }
                                                else
                                                {
                                                    echo '0';
                                                }
                                                ?></h2>
                                    <p class="m-b-0">Ongoing</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-times f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php if (isset($theVariable[3]))
                                                {           
                                                echo $theVariable[3];
                                                }
                                                else
                                                {
                                                    echo '0';
                                                }
                                                ?></h2>
                                    <p class="m-b-0">Not Approved</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                
    </div>

<?php include 'footer.php' ; ?>  

