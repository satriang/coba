<?php

include("koneksi.php");

$id_user = $_POST['id_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];


$sql = "INSERT INTO `user`(`id_user`, `username`, `password`, `level`) VALUES ('{$id_user}','{$username}','{$password}','{$level}')" ;
//echo "$sql";

$eksekusi = mysqli_query($conn,$sql);

if($eksekusi){
	echo "Data berhasil disimpan";
}else{
	echo "Data Gagal Disimpan : ". $sql . "<br>" . mysqli_error($koneksi);
}
header("Location: read_user.php") ;
?>

?>