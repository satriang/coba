<?php

include_once('header_signup.php');
include_once('koneksi.php');

$query_user = mysqli_query($conn, "SELECT max(id_user) as kodeMaksimal FROM user");
$data_user = mysqli_fetch_array($query_user);
$id_user = $data_user['kodeMaksimal'];

$query_sponsorship = mysqli_query($conn, "SELECT max(id_sponsorship) as kodeMaksimal FROM sponsorship");
$data_sponsorship = mysqli_fetch_array($query_sponsorship);
$id_sponsorship = $data_sponsorship['kodeMaksimal'];

$urutan_user = (int) substr($id_user, 3, 3);
$urutan_sponsorship = (int) substr($id_sponsorship, 3, 3);

$urutan_user++;
$urutan_sponsorship++;

$huruf_user = "USR";
$id_user = $huruf_user . sprintf("%03s", $urutan_user);
$huruf_sponsorship = "SPR";
$id_sponsorship = $huruf_sponsorship . sprintf("%03s", $urutan_sponsorship);
?>
<div class="col-5 col-s-12">
  <h1>Silahkan Daftar Terlebih Dahulu</h1>
  <form onsubmit="validasiemail();" name="cekemail">
  <div class="form-group">
          ID USER <br/>
          <input type="text" class="form-control" name="id_user" value="<?php echo $id_user; ?>"> <br/>
      </div>
      <div class="form-group">
          ID SPONSORSHIP <br/>
          <input type="text" class="form-control" name="id_sponsor" value="<?php echo $id_sponsorship; ?>"> <br/>
      </div>
  	<div class="form-group">
          NAMA SPONSOR <br/>
          <input type="text" class="form-control" name="nama_sponsor" placeholder="Masukkan nama SPONSOR anda"> <br/>
      </div>
      <div class="form-group">
          EMAIL <br/>
          <input type="email" class="form-control" name="email" placeholder="Masukkan email anda"> <br/>
      </div>
      <div class="form-group">
          NO TELP <br/>
          <input type="text" class="form-control" name="no_telp" placeholder="Masukkan nomer telpon anda"> <br/>
      </div>
      <div class="form-group">
          ALAMAT <br/>
          <textarea name="alamat" class="form-control" placeholder="Masukkan alamat anda"></textarea> <br/>
      </div>
      <div class="form-group">
          DESKRIPSI SPONSOR <br/>
          <textarea name="deskripsi_sponsor" class="form-control" placeholder="Masukkan deskripsi sponsor anda"></textarea> <br/>
      </div>
      <div class="form-group">
          PASSWORD <br/>
          <input type="password" class="form-control" placeholder="Masukan password" id="password" /> <br/>
      </div>
      <div class="form-group">
          KETIK ULANG PASSWORD <br/>
          <input type="password" class="form-control" placeholder="Masukan Kembali password" id="repassword" />
          <label style="float: right;"><input type="checkbox" onclick="passwordFunction()"> Lihat Password</label><br/>
      </div>
        <input type="reset"  class="btn btn-danger"   value="Batal" >
        <input type="submit"  class="btn btn-success" name="submit" style="float: right;" value="Daftar" >
</form>
</div>

<?php

include_once('footer_signup.php');

?>
