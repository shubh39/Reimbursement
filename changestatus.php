<?php

if(isset($_REQUEST['detail_id']))
{
	$detail_id=$_REQUEST['detail_id'];
	$status=$_REQUEST['status'];

	include 'db_connect.php';
	 $sql="UPDATE detailed_req SET status='$status', flag=1 where detail_id='$detail_id'";
     
     if ($con->query($sql) === TRUE) 
    {
        if($status=='2')
        {
          $sql2="SELECT * FROM `detailed_req` as a, `employee` as e, `category` as c WHERE a.emp_id =e.emp_id and a.detail_id='$detail_id' and a.cat_id=c.cat_id ";  
          $result1 = $con->query($sql2) or die(mysqli_error($con));
            if ($result1->num_rows > 0) 
                {
                    while ($rows = $result1->fetch_row()) 
                    {
        
                        $amount=$rows[3];
                        $date_of=$rows[4];
                        $description=$rows[5];
                        $emp_name=$rows[10];
                        $emp_department=$rows[11];
                        $email_id=$rows[12];
                        $name=$rows[19];
                    }
                    //Email content
                    $to = $email_id;
                     $subject = 'Notication for your Reimburse Claim';
                    $from = 'ADTC@reimburse.com';
                    // To send HTML mail, the Content-type header must be set
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    // Create email headers
                    $headers .= 'From: '.$from."\r\n".
                        'Reply-To: '.$from."\r\n" .
                        'X-Mailer: PHP/' . phpversion();
                 
                    $message = '<html><body><h2>Hello '.$emp_name.'!</h2><br /> Your Applcation for reimbursement has been approved. Your application details are as below. <br />
                    Category: '.$name.'<br/> Amount: '.$amount.' <br/> Description: '.$description.' <br /> Date: '.$date_of.' <br/><br/><br/><br/> Thanks</body></html>';
                    
                  mail($to, $subject, $message, $headers);
                       
                    
                    
                }
                    
        }
          
          
        
    	
    	echo "0";
	} 
	else
	{
    	echo "1";
	}
}

if(isset($_REQUEST['emp_id']))
{
	$emp_id=$_REQUEST['emp_id'];
	$status=$_REQUEST['status'];
	if($status==0)
	{
		$status=1;
	}
	else{
		$status=0;
	}
	include 'db_connect.php';
	 $sql="UPDATE employee SET status='$status' where emp_id='$emp_id'";
     
     if ($con->query($sql) === TRUE) 
    {
    	echo "0";
	} 
	else
	{
    	echo "1";
	}
}
?>