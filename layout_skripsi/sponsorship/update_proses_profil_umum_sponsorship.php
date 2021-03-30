<?php
	include_once('koneksi.php');

	$id_sponsorship = $_POST['id_sponsorship'] ;
	$nama_sponsorship = $_POST['nama_sponsorship'];
	$alamat = $_POST['alamat'] ;
	$no_telp = $_POST['no_telp'];
	$dana_maksimal = $_POST['dana_maksimal'] ;
	$deskripsi_sponsorship = $_POST['deskripsi_sponsorship'];
	
	$sql = "UPDATE sponsorship
			SET nama_sponsorship = '{$nama_sponsorship}',
				alamat = '{$alamat}',
				no_telp = '{$no_telp}',
				dana_maksimal = '{$dana_maksimal}',
				deskripsi_sponsorship = '{$deskripsi_sponsorship}' 
			WHERE `id_sponsorship`='{$id_sponsorship}'" ;
	
	$eksekusi = mysqli_query($conn,$sql) ;
	
	
	
	if($eksekusi){
			echo ' <script type="text/javascript">
				alert("Profil Umum Berhasil Diubah");
				window.location.replace("read_user_umum.php") </script>';
		//echo "Profil Umum Berhasil Diubah";
		//header("refresh:10; login_event_creator.php");
		
	}else{
		echo ' <script type="text/javascript">
				alert("Profil Umum Gagal Diubah");
				window.location.replace("read_user_umum.php") </script>'; 
		//echo "Profil Umum Gagal Diubah";
	}
	
?>