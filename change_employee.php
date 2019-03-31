<?php

if(isset($_REQUEST['emp_id']))
{
	$emp_id=$_REQUEST['emp_id'];
	$emp_name=$_REQUEST['emp_name'];
	$emp_department=$_REQUEST['emp_dep'];
	$email=$_REQUEST['email'];
	$role=$_REQUEST['role'];

	include 'db_connect.php';
$sql="UPDATE employee SET emp_name='$emp_name',emp_department='$emp_department',email_id='$email', emp_role='$role' where emp_id='$emp_id'";
     
     if ($con->query($sql) === TRUE) 
    {
    	echo "0";
	} 
	else
	{
    	echo "1";
	}
	
}
if(isset($_REQUEST['cat_id']))
{
	$cat_id=$_REQUEST['cat_id'];
	$name=$_REQUEST['name'];
	$allot=$_REQUEST['allot'];
	

	include 'db_connect.php';
$sql="UPDATE category SET name='$name',basic_allotment='$allot' where cat_id='$cat_id'";
     
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