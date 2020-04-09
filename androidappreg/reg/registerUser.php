<?php

require_once '../includes/DbOperations.php';

$response = array();


if($_SERVER['REQUEST_METHOD'] =='POST')
{
	if(isset($_POST['username']) and isset($_POST['email']) and isset($_POST['password']))
	{
 
 $db= new DbOperations();

$result =$db->createUser($_POST['username'],
                           $_POST['email'],
                          $_POST['password']);
                       



 if($result==1)

 {
 	$response['error']=false;
 	$response['message']="User Register Successfully";
 }

 else if($result==2)
 {

 $response['error'] =true;
       $response['message']="Some error occurred please try again";

 }
    else if($result==0)
    {
     
     $response['error'] =true;
       $response['message']="Already Registered";
        
    }
    
    
    
    
	}
	else
	{
       $response['error'] =true;
       $response['message']="Required fields are missing";
	}

}
else
{

	$response['error']=true;
	$response['message']="Invalid Request";

}

echo json_encode($response);


