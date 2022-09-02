<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['username'])){
    die("Anda belum login silahkan back");//
}
//cek level user
if($_SESSION['level']!="administrator"){
    die("Anda bukan admin silahkan back");
}

