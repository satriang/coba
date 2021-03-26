<?php

include("koneksi.php");

$id_event = $_POST["id_event"];
$id_event_creator = $_POST["id_event_creator"];
$nama_event = $_POST["nama_event"];
$tanggal = $_POST["tanggal"];
$lokasi_event = $_POST["lokasi_event"];
$status_terdanai = $_POST["status_terdanai"];
$id_kategori_event = $_POST["id_kategori_event"];
$proposal_nama = $_FILES['proposal']['name'];
$proposal_sementara = $_FILES['proposal']['tmp_name'];
$tipe_file = pathinfo($proposal_nama, PATHINFO_EXTENSION); 
$tanggal_sekarang = date("Y-m-d_h:i:s");
$nama_proposal_baru = $id_event ."_$tanggal_sekarang". "_".$proposal_nama;
$file_tujuan = "proposal/".$nama_proposal_baru;

//echo "$id_event $id_event_creator $nama_event $tanggal $lokasi_event $status_terdanai $id_kategori_event
 //       $proposal_sementara $nama_proposal_baru $tipe_file";

    if ($tipe_file == "pdf"){
        $upload = move_uploaded_file($proposal_sementara, $file_tujuan);
        if ($upload){

            $sql = "INSERT INTO `event`(`id_event`, `id_event_creator`, `id_kategori_event`, `nama_event`, `tanggal`
                , `proposal`, `lokasi_event`, `status_terdanai`, `tanggal_terlaksana`, `status_terlaksana`) 
                VALUES ('{$id_event}','{$id_event_creator}','{$id_kategori_event}','{$nama_event}'
                ,'{$tanggal}','{$nama_proposal_baru}','{$lokasi_event}','{$status_terdanai}','','belum terlaksana')" ;

            $eksekusi = mysqli_query($conn,$sql);

            if($eksekusi){
               // echo "Data berhasil disimpan <br/>";
               // echo "Upload berhasil";
                echo ' <script type="text/javascript">
            	alert("Tambah Event Baru Berhasil");
                window.location.replace("read_event.php") </script>';
            }else{
               // echo "Data Gagal Disimpan : ". $sql . "<br>" . mysqli_error($koneksi);
               // echo "Upload Gagal";
                echo ' <script type="text/javascript">
            	alert("Gagal Menambahkan Event Baru");
                window.location.replace("read_event.php") </script>';
            }

        }else{ // else upload gagal
            //echo "Gagal mengupload data";
            echo ' <script type="text/javascript">
            	alert("Gagal Menambahkan Event Baru");
                window.location.replace("read_event.php") </script>';
        }
    }else{
        // echo "format file harus PDF";
        echo ' <script type="text/javascript">
            	alert("Format File Proposal Harus PDF");
                window.location.replace("read_event.php") </script>';
    }



?>