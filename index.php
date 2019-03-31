<!DOCTYPE html>
<html lang="en">
<link href="css/lib/sweetalert/sweetalert.css" rel="stylesheet">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>ADTC Reimbursement System:Login Page</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <script src="js/lib/jquery/jquery.min.js"></script>
</head>
<script>
    $(document).ready(function(){
    
        $("#alerts").hide();
          
        
      
});
    
</script>
<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="login-content card">
                            <div class="login-form">
                            	<h3>ADTC Reimbursment System
                            	</h3></br>
                                
                                <form method="post" action="index.php">
                                    <div class="form-group">
                                        <label>Enter your Username</label>
                                        <input type="UserName" class="form-control" name="username" id="username">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" id="password" >
                                    </div>
                                    <div class="checkbox">
                                        <label>
        										<input type="checkbox"> Remember Me
        									</label>
                                        <label class="pull-right">
        										<a href="#">Forgotten Password?</a>
        									</label>

                                    </div>
                                    
                                    <button type="submit" name="save" id="save" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
                                    
                                </form>
              <div class="alert alert-warning  alert-dismissible fade show" role="alert" id="alerts">
              <strong>Ooops!</strong> Username or Password incorrect.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>  </button>
            </div>

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

    $userid=$_REQUEST['username'];
    $psws=$_REQUEST['password'];

                   include 'db_connect.php';
                    if ($con->connect_error) {
                        die("Connection failed: " . $con->connect_error);
                    }

                    $sql = "SELECT * FROM employee where userid='$userid' and password='$psws'";
                    $result = $con->query($sql); 

 


                    if ($result->num_rows > 0)
                     {
                       // output data of each row
                       while($row = $result->fetch_assoc()) 
                       {

                        if($row["status"]==1)
                        {
                            ?>
                            <script>
                                $(function(){
                                    
                                swal("Sorry!", "Your account has been disabled!", "error");
                                });

                            
                            </script>
                            
                            <?php
                            goto end;
                        }

                       echo "<br> id: ". $row["emp_id"]. " - Name: ". $row["emp_name"]. " " . $row["access_role"] . "<br>";

                        session_start();
                        

                        $_SESSION['emp_id']=$row['emp_id'];
                        $_SESSION['emp_role']=$row['access_role'];
                        if($row['access_role']=='1')
                        {
                            $host  = $_SERVER['HTTP_HOST'];
                            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                            $extra = 'admin.php';
                            header("Location: http://$host$uri/$extra");
                            exit;
                        }
                        else
                        {
                            $host  = $_SERVER['HTTP_HOST'];
                            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                            $extra = 'index_user.php';
                            header("Location: http://$host$uri/$extra");
                            exit;
                        }
                 
                      
                      }
                     } 
                    else
                     {
                       ?>
                            <script>
                                $(function(){
                                    
                                $("#alerts").show();  
                                $('.alert').alert();
      
                                });

                            
                            </script>
                        <?php

                     }

                    $con->close();
                                           
}

end:

?>



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
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/lib/sweetalert/sweetalert.min.js"></script>
            <!-- scripit init-->
            <script src="js/lib/sweetalert/sweetalert.init.js"></script>
</body>

</html>