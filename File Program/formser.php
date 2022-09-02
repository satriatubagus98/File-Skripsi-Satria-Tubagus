<html>
<head>
	<title></title>
<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">



<!-- script -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

	
</head>
<body>
	<center><h4>INPUT DATA USER</h4>
	<a href="form_simpan.php" class="btn btn-primary btn-login text-uppercase fw-bold">Tambah User</a>
	</center><br><br>
	<table border="1" width="100%">
	<tr>
		<th>Picture</th>
		<th>Username</th>
		<th>Password</th>
		<th>Level</th>
		<th colspan="2">Action</th>
	</tr>
	<?php
	// Load file koneksi.php
	include "koneksi.php";

	// Buat query untuk menampilkan semua data user
	$sql = $pdo->prepare("SELECT * FROM user");
	$sql->execute(); // Eksekusi querynya

	while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
		echo "<tr>";
		echo "<td><img src='images/".$data['img']."' width='50' height='50'></td>";
		echo "<td>".$data['username']."</td>";
		echo "<td>".$data['password']."</td>";
		echo "<td>".$data['level']."</td>";
		echo "<td><a href='form_ubah.php?id=".$data['id']."'>Ubah</a></td>";
		echo "<td><a href='proses_hapus.php?id=".$data['id']."'>Hapus</a></td>";
		echo "</tr>";
	}
	?>
</table>	
</body>
</html>
