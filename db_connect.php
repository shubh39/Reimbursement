 <?php
$host='localhost';
$user='sanatanv_dap';
$psw='Dapatel@777';
$db_name='sanatanv_reimbursement';

$con=mysqli_connect($host,$user,$psw,$db_name);
                    // Check connection
                    if (mysqli_connect_errno())
                      {
                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                      }
                      


?>