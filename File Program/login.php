<?php

$error=''; 

include "connection.php";
if(isset($_POST['submit']))
{				
	$username	= $_POST['username'];
	$password	= $_POST['password'];
	$level		= $_POST['level'];
					
	$query = mysqli_query($connection, "SELECT * FROM user WHERE username='$username' AND password='$password'");
	if(mysqli_num_rows($query) == 0)
	{
		$error = "Username or Password is invalid";
	}
	else
	{
		$row = mysqli_fetch_assoc($query);
		$_SESSION['username']=$row['username'];
		$_SESSION['level'] = $row['level'];
		
		if($row['level'] == "administrator" && $level=="1")
		{
			
			header("haladmin.php");
		}
		else if($row['level'] =="guru" && $level=="2")
		{
			header("Location:hallecturer.php");
		}
		else if($row['level'] == "siswa" && $level=="3")
		{
			
			header("halstudent.php");
		}
		else
		{
			$error = "Failed Login";
		}
	}
}

			
?>