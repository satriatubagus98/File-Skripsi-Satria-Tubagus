<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil Data yang Dikirim dari Form
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];
$img = $_FILES['img']['name'];
$tmp = $_FILES['img']['tmp_name'];

// Rename password imgnya dengan menambahkan tanggal dan jam upload
$imgbaru = date('dmYHis').$img;

// Set path folder tempat menyimpan imgnya
$path = "images/".$imgbaru;

// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
	// Proses simpan ke Database
	$sql = $pdo->prepare("INSERT INTO user(username, password,level,img) VALUES(:username,:password,:level,:img)");
	$sql->bindParam(':username', $username);
	$sql->bindParam(':password', $password);
	$sql->bindParam(':level', $level);
	$sql->bindParam(':img', $imgbaru);
	$sql->execute(); // Eksekusi query insert

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		header("location: haladmin.php"); // Redirect ke halaman index.php
	}else{
		// Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
	}
}else{
	// Jika gambar gagal diupload, Lakukan :
	echo "Maaf, Gambar gagal untuk diupload.";
	echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
}
?>
