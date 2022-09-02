<?php
include('ceklecturer.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Guru</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
      <!--Script CSS-->
  <link type="text/css" href='https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css' rel='stylesheet'>
  <link type="text/css" href='https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css' rel='stylesheet'>
  <link type="text/css" href='https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css' rel='stylesheet'>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">

                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>

            </button>
            <a class="navbar-brand" href="#">
				<?php
				$nama = $_SESSION['username'];
                echo "<img style='height: 30px; margin-top: -5px;'>";
				?> 
				<div class="pull-left">
				<p style="margin: -25px 40px 10px;">Welcome <i><?php echo $_SESSION['username']; ?></i></p>
				</div>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
				<li></i></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
		
<div class="container" style="margin-top:40px">
  <center><h3>DASHBOARD GURU</h3></center></br>
  <h4>INPUT FILE</h4>
</div>
<?php include('.../du/index.php');?>

<?php include("delete-code.php"); // Include delete code Script page.?>
<form class="form-inline" method="POST" action="upload.php" enctype="multipart/form-data">
 <input class="form-control" type="file" name="upload"/>
 <button type="submit" class="btn btn-success form-control" name="submit"><span class="glyphicon glyphicon-upload"></span> Upload</button>
</form>
<br /><br />
<div class="form-group">

  <table id="example" class="display responsive nowrap" style="width:100%">
    <thead>
      <tr>  
        <th>No</th>
        <th>File Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody class="alert-success">
      <?php
      require 'config.php';
      $row = $conn->query("SELECT * FROM `file`") or die(mysqli_error());
      while($fetch = $row->fetch_array()){
       ?>
        <tr>
        <?php 
        $name = explode('/', $fetch['file']);
        ?>
		<td><?php echo $fetch['file_id']?></td>
        <td><?php echo $fetch['name']?></td>
        <td><a href="download.php?file=<?php echo $name[1]?>" class="btn btn-primary"><span class="glyphicon glyphicon-download"></span> Download</a></td>
		<td><a href="delete.php?file_id=<?php echo $fetch['file_id']?>" class="btn btn-danger" title="click for delete" onclick="return confirm('Are You Sure Want Delete This File?')"><span class="glyphicon glyphicon-trash"></span>Delete</a></td>
      </tr>
      <?php
    }
    ?>
   
</tbody>
</table>
</div>
</div>			  
</div>
<center><p>BGS@2022</p></center>	
<!--Script Javascript-->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>

<script>
 $(document).ready(function() {
  $('#example').DataTable( {
    dom: 'Bfrtip',
    buttons: [
    ''
    ]
  } );
} );
</script>
</body>
</html>