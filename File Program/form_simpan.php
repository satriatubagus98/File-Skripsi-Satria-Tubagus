<html>
<head>
	<title></title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- script -->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
</head>
<body>
	<div class="container">
    <div class="row">
            <h5 class="card-title text-center mb-5 fw-light fs-5">TAMBAH DATA USER</h5>
            <form method="post" action="proses_simpan.php" enctype="multipart/form-data">
              <div class="form-floating mb-3">
                <input type="text" name="username" class="form-control" id="floatingUsername" placeholder="Username">
                <label for="floatingUsername">Username</label>
			  </div>
              <div class="form-floating mb-3">
             	<input type="text" name="password" class="form-control" id="floatingPassword" placeholder="password">
                <label for="floatingPassword">password</label>
              </div>
			    <div class="form-group bm-3">
			  <select name="level" class="form-control" required>
			  <option value="">Pilih Level User</option>
			  <option value="1">administrator</option>
			  <option value="2">guru</option>
			  <option value="3">siswa</option>
			  </select>
			 </div>
			  <div class="mb-3">
			  <label for="formFile" class="form-label">Foto</label>
			  <input type="file" name="img" class="form-control"  id="formFile">
			  </div>				 
              <div class="d-grid gap-2  mx-auto">
              <button type="submit" value="Simpan"class="btn btn-success btn-login text-uppercase fw-bold">Simpan</button>			  
           	  <a href="haladmin.php" class="btn btn-primary btn-login text-uppercase fw-bold">Batal</a>
			  </div>
 
            </form>
    </div>
  </div>	
</body>
</html>
