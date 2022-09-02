<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data user yang dikirim oleh index.php melalui URL
$id = $_GET['id'];

// Query untuk menampilkan data user berdasarkan ID yang dikirim
$sql = $pdo->prepare("SELECT img FROM user WHERE id=:id");
$sql->bindParam(':id', $id);
$sql->execute(); // Eksekusi query insert
$data = $sql->fetch(); // Ambil semua data dari hasil eksekusi $sql

// Cek apakah file imgnya ada di folder images
if(is_file("images/".$data['img'])) // Jika img ada
	unlink("images/".$data['img']); // Hapus img yang telah diupload dari folder images

// Query untuk menghapus data user berdasarkan ID yang dikirim
$sql = $pdo->prepare("DELETE FROM user WHERE id=:id");
$sql->bindParam(':id', $id);
$execute = $sql->execute(); // Eksekusi / Jalankan query

if($execute){ // Cek jika proses simpan ke database sukses atau tidak
	// Jika Sukses, Lakukan :
	header("location: haladmin.php"); // Redirect ke halaman haladmin.php
}else{
	// Jika Gagal, Lakukan :
	echo "Data gagal dihapus. <a href='haladmin.php'>Kembali</a>";
    header("location: haladmin.php"); // Redirect ke halaman haladmin.php
}
?>
