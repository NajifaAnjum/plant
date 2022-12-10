<?php

require_once("connect.php");

if(isset($_REQUEST["Firstname"]) && isset($_REQUEST["lastname"]) && isset($_REQUEST["email_addr"]) 
&& isset($_REQUEST["user_pswd"]) && isset($_REQUEST["mobile"])){
		
$fname=$_REQUEST["Firstname"];		
$lname=$_REQUEST["lastname"];		
$email_addr=$_REQUEST["email_addr"];		
$user_pswd=$_REQUEST["user_pswd"];		
$mobile=$_REQUEST["mobile"];		
}

$insertQuery="INSERT INTO signup(Firstname,lastname,email_addr,user_pswd,mobile)
VALUES('$fname','$lname','$email_addr','$user_pswd','$mobile')";

$runQuery=mysqli_query($connect,$insertQuery);
if($runQuery==true)
{
	header("location:3-login.php");
}

?>