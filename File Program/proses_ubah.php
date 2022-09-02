<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data ID yang dikirim oleh form_ubah.php melalui URL
$id = $_GET['id'];

// Ambil Data yang Dikirim dari Form
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

// Ambil data img yang dipilih dari form
$img = $_FILES['img']['name'];
$tmp = $_FILES['img']['tmp_name'];

// Cek apakah user ingin mengubah imgnya atau tidak
if(empty($img)){ // Jika user tidak memilih file img pada form
	// Lakukan proses update tanpa mengubah imgnya
	// Proses ubah data ke Database
	$sql = $pdo->prepare("UPDATE user SET username=:username, password=:password, level=:level WHERE id=:id");
	$sql->bindParam(':username', $username);
	$sql->bindParam(':password', $password);
	$sql->bindParam(':level', $level);
	$sql->bindParam(':id', $id);
	$execute = $sql->execute(); // Eksekusi / Jalankan query

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		header("location: haladmin.php"); // Redirect ke halaman index.php
	}else{
		// Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
	}
}else{ // Jika user memilih img / mengisi input file img pada form
	// Lakukan proses update termasuk mengganti img sebelumnya
	// Rename password imgnya dengan menambahkan tanggal dan jam upload
	$imgbaru = date('dmYHis').$img;

	// Set path folder tempat menyimpan imgnya
	$path = "images/".$imgbaru;

	// Proses upload
	if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
		// Query untuk menampilkan data user berdasarkan ID yang dikirim
		$sql = $pdo->prepare("SELECT img FROM user WHERE id=:id");
		$sql->bindParam(':id', $id);
		$sql->execute(); // Eksekusi query insert
		$data = $sql->fetch(); // Ambil semua data dari hasil eksekusi $sql

		// Cek apakah file img sebelumnya ada di folder images
		if(is_file("images/".$data['img'])) // Jika img ada
			unlink("images/".$data['img']); // Hapus file img sebelumnya yang ada di folder images

		// Proses ubah data ke Database
		$sql = $pdo->prepare("UPDATE user SET username=:username, password=:password, level=:level, img=:img WHERE id=:id");
		$sql->bindParam(':username', $username);
		$sql->bindParam(':password', $password);
		$sql->bindParam(':level', $level);
		$sql->bindParam(':img', $imgbaru);
		$sql->bindParam(':id', $id);
		$execute = $sql->execute(); // Eksekusi / Jalankan query

		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
			// Jika Sukses, Lakukan :
			header("location: haladmin.php"); // Redirect ke halaman index.php
		}else{
			// Jika Gagal, Lakukan :
			echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
			echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
		}
	}else{
		// Jika gambar gagal diupload, Lakukan :
		echo "Maaf, Gambar gagal untuk diupload.";
		echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
	}
}
?>
