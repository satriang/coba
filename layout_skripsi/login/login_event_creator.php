<?php

include_once('header_login.php');
//include_once('koneksi.php');

?>

<div class="col-5 col-s-12">
  <h1>LOGIN EVENT CREATOR</h1>
    <form onsubmit="validasiemail();" name="cekemail">
        <div class="form-group">
            EMAIL <br/>
            <input type="text" class="form-control" name="email" placeholder="Masukkan email anda"> <br/>
        </div>
        <div class="form-group">
            PASSWORD <br/>
            <input type="password" class="form-control" placeholder="Masukan password" id="password" /> <br/>
        </div>
        <div class="form-group">
            KETIK ULANG PASSWORD <br/>
            <input type="password" class="form-control" placeholder="Masukan Kembali password" id="repassword" /><br/>
        </div>
            <input type="submit"  class="btn btn-primary" value="Masuk" >
     </form>
</div>

<?php

include_once('footer_login.php');

?>
