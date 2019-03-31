<?php


#database connection and queryies

include 'db_connect.php';
session_start();
                 
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
                      mysqli_free_result($result);
                      }
                      

#code for insert record in detailed_req table
                 
       $employee_id=$_SESSION['emp_id'];
       $cate = $_POST['val-category'];
       $amount= $_POST['val-amount'];
       $date_req = $_POST['val-date'];
       $desc = $_POST['val-description'];

 $sql_1="INSERT INTO `detailed_req` (`detail_id`, `emp_id`, `cat_id`, `amount`, `date_of`, `description`,  `status`,`flag`) VALUES ('$new_detail_id', '$employee_id', '$cate', '$amount', '$date_req', '$desc',  '0','0')";
 $result1=mysqli_query($con,$sql_1) or die(mysqli_error($con));
 
  

echo $sql_1."</br>";

function reArrayFiles($file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
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
            /* echo 'File Size: ' . $_POST['val-category']."</br>";
                    echo 'File Size: ' . $_POST['val-amount']."</br>";
                    echo 'File Size: ' . $_POST['val-date']."</br>";
                    echo 'File Size: ' . $_POST['val-description']."</br>";
                }
            */       
?>