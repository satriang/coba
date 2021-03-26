<?php
include_once('layout_atas.php');

?>
  <div class="col-2 col-s-3 menu " style="text-align:center; font-weight: bold;">
    <ul>
      <li><a href="form_profil_umum.php">Profil Umum</a></li>
      <li><a href="form_profil_login.php">Profil Login</a></li>
    </ul>
  </div>
 <div class="col-9 col-s-9">
  	     <h1> SELAMAT DATANG </h1>
            ID EVENT CREATOR : <?php echo $hasil['id_event_creator'] ?>  <br/>
            NAMA : <?php echo $hasil['nama_eo'] ?>
  </div>

<?php
 include_once('layout_bawah.php');
?>
