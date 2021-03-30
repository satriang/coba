<?php

include_once('layout_atas.php');

$batas   = 5;
$halaman = @$_GET['halaman'];
	if(empty($halaman)){
		$posisi  = 0;
		$halaman = 1;
	}
	else{ 
	  $posisi  = ($halaman-1) * $batas; 
	}

//sql read event
$sql = "SELECT event.id_event, event.nama_event, event_creator.id_event_creator, event_creator.nama_eo, kategori_event.id_kategori_event, kategori_event.kategori_event, DATE_FORMAT(event.tanggal, '%d %M %Y') as tanggal_acara, event.proposal, event.lokasi_event, event.status_terdanai, DATE_FORMAT(event.tanggal_terlaksana, '%d %M %Y') as tanggal_berakhir, event.status_terlaksana
FROM event
JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
JOIN kategori_event ON event.id_kategori_event = kategori_event.id_kategori_event 
WHERE event_creator.id_event_creator = '{$id_event_creator}' LIMIT $posisi,$batas";

$eksekusi = mysqli_query($conn, $sql);
//var_dump(array_values($eksekusi));
// sql read pengajuan event
$sql_pengajuan_event = "SELECT pengajuan_event.id_pengajuan_event, pengajuan_event.id_event, event.nama_event, event.id_event_creator, pengajuan_event.id_sponsorship, sponsorship.nama_sponsorship, pengajuan_event.status
FROM `pengajuan_event` 
JOIN event ON pengajuan_event.id_event = event.id_event 
JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship 
WHERE event.id_event_creator = '{$id_event_creator}' LIMIT $posisi,$batas";
$eksekusi_pengajuan_event = mysqli_query($conn, $sql_pengajuan_event);

//sql event diterima
$sql_event_didanai = "SELECT pengajuan_event.id_pengajuan_event, pengajuan_event.id_event, event.nama_event, sponsorship.nama_sponsorship, pengajuan_event.id_sponsorship, event_creator.nama_eo, pengajuan_event.dana_event, pengajuan_event.status
 FROM `pengajuan_event` 
JOIN event ON pengajuan_event.id_event = event.id_event 
JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship
JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
WHERE event.id_event_creator = '{$id_event_creator}' AND pengajuan_event.status = 'DI TERIMA' LIMIT $posisi,$batas";
$eksekusi_event_didanai = mysqli_query($conn, $sql_event_didanai);
?>
  <div class="col-2 col-s-3 menu " style="text-align:center; font-weight: bold;">
    <ul>
      <li><a href="form_tambah_event.php">Tambah Event</a></li>
    </ul>
  </div>
  <div class="col-10 col-s-9">
  	<div style="overflow-x:auto;">
        <div class="w3-row">
            <a href="javascript:void(0)" onclick="openCity(event, 'London');" id="defaultOpen" style="text-align:center;">
              <div class="w3-third tablink w3-bottombar w3-hover-light-blue w3-padding">Event <?php echo $hasil['nama_eo'] ?> </div>
            </a>
            <a href="javascript:void(0)" onclick="openCity(event, 'Paris');" style="text-align:center;">
              <div class="w3-third tablink w3-bottombar w3-hover-light-blue w3-padding">Event Diajukan</div>
            </a>
            <a href="javascript:void(0)" onclick="openCity(event, 'Tokyo');" style="text-align:center;">
              <div class="w3-third tablink w3-bottombar w3-hover-light-blue w3-padding">Event Diterima</div>
            </a>
        </div>

<!-- TAB 1 -->
        <div id="London" class="w3-container city" style="display:none">
        <div style="overflow-x:auto;">
          <div class="table-responsive">  
            <table class="w3-table-all w3-hoverable">
              <tbody>
                <tr>
                  <th class="w3-center">NO</th>
                  <th class="w3-center">NAMA EVENT</th>
                  <th class="w3-center">NAMA EVENT CREATOR</th>
                  <th class="w3-center">KATEGORI EVENT </th>
                  <th class="w3-center">TANGGAL EVENT</th>
                  <th class="w3-center">PROPOSAL</th>
                  <th class="w3-center">LOKASI EVENT </th>
                  <th class="w3-center">STATUS TERDANAI EVENT</th>
                  <th class="w3-center">TANGGAL TEREALISASI EVENT</th>
                  <th class="w3-center">STATUS TERLAKSANA EVENT</th>
                  <th colspan="3" class="w3-center">ACTION</th>
                </tr>

                    <?php
                      $no = $posisi+1;
                        while ($row=mysqli_fetch_array($eksekusi)) {
                    ?>

                <tr>
                  <td class="w3-center"><?php echo $no ?></td>         
                  <td class="w3-center"><?php echo $row['nama_event'] ?></td>
                  <td class="w3-center"><?php echo $row['nama_eo'] ?></td>
                  <td class="w3-center"><?php echo $row['kategori_event'] ?></td>
                  <td class="w3-center"><?php echo $row['tanggal_acara'] ?></td>
                  <td class="w3-center"><a href="proposal/<?php echo $row['proposal'] ?>"/>Baca Proposal</a></td>
                  <td class="w3-center"><?php echo $row['lokasi_event'] ?></td>
                  <td class="w3-center"><?php echo $row['status_terdanai'] ?></td>
                  <td class="w3-center"><?php echo $row['tanggal_berakhir'] ?></td>
                  <td class="w3-center"><?php echo $row['status_terlaksana'] ?></td>
                  <td class="w3-center">
                    <a href="form_edit_event.php?id_event=<?php echo $row['id_event'] ?>" class="w3-button w3-border w3-small w3-blue"> Edit </a> 
                    </td>
                  <td class="w3-center">
                    <a href="hapus_event.php?id_event=<?php echo $row['id_event'] ?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="w3-button w3-border w3-small w3-red"> Hapus </a>
                  </td>  
                  <td class="w3-center">
                    <a href="detail_event1.php?id_event=<?php echo $row['id_event'] ?>"  class="w3-button w3-border w3-small w3-deep-purple"> Lihat Detail </a>
                  </td>      
                </tr>

                  <?php
                     $no++;
                    }
                  ?>
              </tbody>
            </table>
          
              <?php
              // Langkah 3: Hitung total data dan halaman serta link 1,2,3 
              $sql2 = "SELECT event.id_event, event.nama_event, event_creator.id_event_creator, event_creator.nama_eo, kategori_event.id_kategori_event, kategori_event.kategori_event, DATE_FORMAT(event.tanggal, '%d %M %Y') as tanggal_acara, event.proposal, event.lokasi_event, event.status_terdanai, DATE_FORMAT(event.tanggal_terlaksana, '%d %M %Y') as tanggal_berakhir, event.status_terlaksana
                       FROM event
                       JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
                       JOIN kategori_event ON event.id_kategori_event = kategori_event.id_kategori_event 
                       WHERE event_creator.id_event_creator = '{$id_event_creator}' LIMIT $posisi,$batas";
              $eksekusi2 = mysqli_query($conn, $sql2);
              $jmldata    = mysqli_num_rows($eksekusi2);
              $jmlhalaman = ceil($jmldata/$batas);
              ?>
                  <br/> Halaman :
                     <?php
                        for($i=1;$i<=$jmlhalaman;$i++)
                          if ($i != $halaman){
                            echo " <a href=\"read_event.php?halaman=$i\">$i</a> | ";
                            }else{
                            echo " <b>$i</b> | ";
                          }
                        echo "<p>Total event creator : <b>$jmldata</b> event creator</p>";
                      ?>
          </div>
           </div>
        </div>

<!-- Tab 2 -->
        <div id="Paris" class="w3-container city" style="display:none">
        <div style="overflow-x:auto;">
          <div class="table-responsive">  
            <table class="w3-table-all w3-hoverable">
              <tbody>
                <tr>
                  <th class="w3-center">NO</th>
                  <th class="w3-center">ID PENGAJUAN EVENT</th>
                  <th class="w3-center">NAMA EVENT</th>
                  <th class="w3-center">NAMA SPONSORSHIP</th>
                  <th class="w3-center">STATUS</th>
                </tr>

                    <?php
                      $no = $posisi+1;
                        while ($row2=mysqli_fetch_array($eksekusi_pengajuan_event)) {
                    ?>

                <tr>
                  <td class="w3-center"><?php echo $no ?></td>         
                  <td class="w3-center"><?php echo $row2['id_pengajuan_event'] ?></td>
                  <td class="w3-center"><a href="detail_event.php?id_event=<?php echo $row2['id_event'] ?>"><?php echo $row2['id_event'] ?></a></td>
                  <td class="w3-center"><a href="detail_event.php?id_event=<?php echo $row2['id_event'] ?>"><?php echo $row2['nama_event'] ?></a></td>
                  <td class="w3-center"><a href="detail_sponsorship.php?id_sponsorship=<?php echo $row2['id_sponsorship'] ?>"><?php echo $row2['nama_sponsorship'] ?></a></td>
                  <td class="w3-center"><?php echo $row2['status'] ?></td>
                </tr>

                  <?php
                     $no++;
                    }
                  ?>
              </tbody>
            </table>
          
              <?php
              // Langkah 3: Hitung total data dan halaman serta link 1,2,3 
              $sql2_pengajuan_event = "SELECT pengajuan_event.id_pengajuan_event, pengajuan_event.id_event, event.nama_event, event.id_event_creator, pengajuan_event.id_sponsorship, sponsorship.nama_sponsorship, pengajuan_event.status
                                       FROM `pengajuan_event` 
                                       JOIN event ON pengajuan_event.id_event = event.id_event 
                                       JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship 
                                       WHERE event.id_event_creator = '{$id_event_creator}' LIMIT $posisi,$batas";
              $eksekusi2_pengajuan_event = mysqli_query($conn, $sql2_pengajuan_event);
              $jmldata_pengajuan_event    = mysqli_num_rows($eksekusi2_pengajuan_event);
              $jmlhalaman_pengajuan_event = ceil($jmldata_pengajuan_event/$batas);
              ?>
                  <br/> Halaman :
                     <?php
                        for($i=1;$i<=$jmlhalaman_pengajuan_event;$i++)
                          if ($i != $halaman){
                            echo " <a href=\"read_event.php?halaman=$i\">$i</a> | ";
                            }else{
                            echo " <b>$i</b> | ";
                          }
                        echo "<p>Total event : <b>$jmldata_pengajuan_event</b> event</p>";
                      ?>
          </div>
           </div>
        </div>

<!-- TAB 3 -->
        <div id="Tokyo" class="w3-container city" style="display:none">
        <div style="overflow-x:auto;">
          <div class="table-responsive">  
            <table class="w3-table-all w3-hoverable">
              <tbody>
                <tr>
                  <th class="w3-center">NO</th>
                  <th class="w3-center">ID PENGAJUAN EVENT</th>
                  <th class="w3-center">NAMA EVENT</th>
                  <th class="w3-center">NAMA SPONSORSHIP</th>
                  <th class="w3-center">DANA</th> 
                  <th class="w3-center">STATUS</th>
                </tr>

                    <?php
                      $no = $posisi+1;
                        while ($row3=mysqli_fetch_array($eksekusi_event_didanai)) {
                    ?>

                <tr>
                  <td class="w3-center"><?php echo $no ?></td>         
                  <td class="w3-center"><?php echo $row3['id_pengajuan_event'] ?></td>
                  <td class="w3-center"><a href="detail_event.php?id_event=<?php echo $row3['id_event'] ?>"><?php echo $row3['nama_event'] ?></a></td>
                  <td class="w3-center"><a href="detail_sponsorship.php?id_sponsorship=<?php echo $row3['id_sponsorship'] ?>"><?php echo $row3['nama_sponsorship'] ?></a></td>
                    <td class="w3-center"><label><?php $hasil_rupiah = "Rp " . number_format($row3['dana_event'],2,',','.'); echo $hasil_rupiah;?></label></td>
                  <td class="w3-center"><?php echo $row3['status'] ?></td>
                </tr>

                  <?php
                     $no++;
                    }
                  ?>
              </tbody>
            </table>
          
              <?php
              // Langkah 3: Hitung total data dan halaman serta link 1,2,3 
              $sql2_event_diterima = "SELECT pengajuan_event.id_pengajuan_event, pengajuan_event.id_event, 
                                              event.nama_event, event.id_event_creator, event_creator.nama_eo, 
                                              pengajuan_event.dana_event, pengajuan_event.status
                                              FROM `pengajuan_event`
                                              JOIN event ON pengajuan_event.id_event = event.id_event
                                              JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship
                                              JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
                                              WHERE event.id_event_creator = '{$id_event_creator}' AND pengajuan_event.status = 'DI TERIMA' LIMIT $posisi,$batas";
              $eksekusi2_event_diterima = mysqli_query($conn, $sql2_event_diterima);
              $jmldata_event_diterima   = mysqli_num_rows($eksekusi2_event_diterima);
              $jmlhalaman_event_diterima = ceil($jmldata_event_diterima/$batas);
              ?>
                  <br/> Halaman :
                     <?php
                        for($i=1;$i<=$jmlhalaman_event_diterima;$i++)
                          if ($i != $halaman){
                            echo " <a href=\"read_event.php?halaman=$i\">$i</a> | ";
                            }else{
                            echo " <b>$i</b> | ";
                          }
                        echo "<p>Total event : <b>$jmldata_event_diterima</b> event</p>";
                      ?>
          </div>
           </div>
        </div>
        
    </div>
  </div>

<?php
 include_once('layout_bawah.php');
?>
