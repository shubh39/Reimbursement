 <?php
include 'db_connect.php';

 $sql = 'SELECT COUNT(flag) as dipak  FROM detailed_req where flag=0';
 if ($result=mysqli_query($con,$sql))
  {
  while ($obj=mysqli_fetch_object($result))
    {
    echo $obj->dipak; 
    $aaa= $obj->dipak;   
    }
  // Free result set
  mysqli_free_result($result);
}
?>
<style type="text/css">
    .ribbon{
        text-align: right;
        padding-left: 20px;
        background-color: #4680ff;
        font-weight: 300;
        padding: 3px 10px;
        line-height: 13px;
        color: #ffffff;
        font-weight: 400;
        border-radius: 4px;
        font-size: 75%;
            }
</style>
 <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a class=" " href="admin.php" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span></a>
                           
                        </li>
                        <li class="nav-label">View</li>
                        <li> <a class="   " href="admin_request.php" aria-expanded="false"><i class="fa fa-envelope"></i><span class="hide-menu">Request &nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <span class="ribbon"><?php echo  $aaa; ?> </span></span></a>                            
                        </li>
                        <li> <a class="  " href="admin_employee.php" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Employee</span></a>                            
                        </li>
                        <li> <a class="  " href="admin_category.php" aria-expanded="false"><i class="fa fa-briefcase"></i><span class="hide-menu">Category</span></a>                            
                        </li>

                        <li class="nav-label">Add</li>
                       
                        <li> <a class="  " href="add_employee.php" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Employee</span></a>                            
                        </li>
                        <li> <a class="  " href="add_category.php" aria-expanded="false"><i class="fa fa-briefcase"></i><span class="hide-menu">Category</span></a>                            
                        </li>
                       
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->