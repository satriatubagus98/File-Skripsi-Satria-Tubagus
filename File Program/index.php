<?php
session_start();
if($_SESSION){
	if($_SESSION['level']=="administrator")
	{
		header("Location: haladmin.php");
	}
	if($_SESSION['level']=="guru")
	{
		header("Location: hallecturer.php");
	}
	if($_SESSION['level']=="siswa")
	{
		header("Location: halstudent.php");
	}
}



include('login.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
 <meta charset="utf-8">
  <link rel="icon" href="files/logo.jpg" type="image/gif" sizes="25x25">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
 <!-- Top content -->
        <div class="top-content">
        	<div class="inner-bg">
                <div class="container">
                    <div class="row">
					</br></br></br>
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                               		<div class="form-top-right">
                        			<i class=""><center><img src="files/logo.jpg" class="rounded mx-auto d-block" style="width:30%" alt="logo"></center</i>
                        		</div></br>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
			                        </div>
									<div class="form-group">
										<select name="level" class="form-control" required>
											<option value="">Pilih Level User</option>
											<option value="1">administrator</option>
											<option value="2">guru</option>
											<option value="3">siswa</option>
										</select>
									</div>
			                        <button type="submit" name="submit" class="btn">Sign in!</button>
									<?php echo $error; ?>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<center><p>itikurih@2022</p></center>	
</body>
</html>