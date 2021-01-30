<?php

include_once('header_signup.php');

?>
<div class="col-7 col-s-12">
  <h1>Silahkan Daftar Terlebih Dahulu</h1>
  <form onsubmit="validasiemail();" name="cekemail">
  	<div class="form-group">
          NAMA SPONSOR <br/>
          <input type="text" class="form-control" name="nama_sponsor" placeholder="Masukkan nama SPONSOR anda"> <br/>
      </div>
      <div class="form-group">
          EMAIL <br/>
          <input type="text" class="form-control" name="email" placeholder="Masukkan email anda"> <br/>
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
          <input type="password" class="form-control" placeholder="Masukan Kembali password" id="repassword" /><br/>
      </div>
          <input type="submit"  class="btn btn-primary" value="DAFTAR" >
</form>
</div>

<?php

include_once('footer_signup.php');

?>
