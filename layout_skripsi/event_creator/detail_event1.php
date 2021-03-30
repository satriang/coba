<?php
include_once('layout_atas.php');
include_once('koneksi.php');

$batas   = 5;
$halaman = @$_GET['halaman'];
	if(empty($halaman)){
		$posisi  = 0;
		$halaman = 1;
	}
	else{ 
	  $posisi  = ($halaman-1) * $batas; 
	}

$id_event = $_GET['id_event'] ;

$sql = "SELECT event.id_event, event.nama_event, event_creator.id_event_creator, event_creator.no_telp,
user.email, event_creator.nama_eo, kategori_event.id_kategori_event, kategori_event.kategori_event, 
DATE_FORMAT(event.tanggal, '%d %M %Y') as tanggal_acara, event.proposal, event.lokasi_event, 
event.status_terdanai, DATE_FORMAT(event.tanggal_terlaksana, '%d %M %Y') as tanggal_berakhir, 
event.status_terlaksana
FROM event
JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
JOIN kategori_event ON event.id_kategori_event = kategori_event.id_kategori_event 
JOIN user ON event_creator.id_user = user.id_user WHERE `id_event`='{$id_event}'" ;

//sql event diterima
$sql_event_didanai = "SELECT pengajuan_event.id_pengajuan_event, pengajuan_event.id_event, event.nama_event, sponsorship.nama_sponsorship, pengajuan_event.id_sponsorship, event_creator.nama_eo, pengajuan_event.dana_event, pengajuan_event.status
 FROM `pengajuan_event` 
JOIN event ON pengajuan_event.id_event = event.id_event 
JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship
JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
WHERE event.id_event = '{$id_event}' AND pengajuan_event.status = 'DI TERIMA' LIMIT $posisi,$batas";
$eksekusi_event_didanai = mysqli_query($conn, $sql_event_didanai);

$eksekusi_id = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($eksekusi_id);
?>
<div class="col-1 col-s-3 menu " style="text-align:center; font-weight: bold;">

</div>
 <div class="col-9 col-s-9">
   <h3 style="text-align: center;"><?php echo $row['nama_event'] ?></h3><br>
   <div class="row">
     <div class="col-sm-8">
     <!--<div class="well">
       <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
       <p>Current Project</p>
     </div> -->
      <div class="well">
       <div style="overflow-x:auto;">
             <div class="table-responsive">
                     <table class="table">
                      <tbody>
                      <tr>
                            <th>Nama Event Creator</th>
                            <td><?php echo $row['nama_eo'] ?></td>

                        </tr>
                        <tr>
                            <th>Kategori Event</th>
                            <td><?php echo $row['kategori_event'] ?></td>

                        </tr>
                        <tr>
                            <th>Tanggal Event</th>
                            <td><?php echo $row['tanggal_acara'] ?></td>

                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><?php echo $row['lokasi_event'] ?></td>

                        </tr>
                        <tr>
                            <th>Status Dana Event </th>
                            <td><?php echo $row['status_terdanai'] ?></td>

                        </tr>
                        <tr>
                            <th>Status Acara Event </th>
                            <td><?php echo $row['status_terlaksana'] ?></td>

                        </tr>
                        <tr>
                            <th>Tanggal Event Terlaksana</th>
                            <td><?php echo $row['tanggal_berakhir'] ?></td>

                        </tr>
                          </tbody>



                      </table>
             </div>

      </div>
      </div>
      <div class="well">
       <h4 style="text-align: center;">Sponsor Yang Mendanai</h4><hr/>

        <div style="overflow-x:auto;">
          <div class="table-responsive">  
            <table class="w3-table-all w3-hoverable">
              <tbody>
                <tr>
                  <th class="w3-center">NO</th>
                  <th class="w3-center">NAMA EVENT</th>
                  <th class="w3-center">NAMA SPONSORSHIP</th> 
                  <th class="w3-center">STATUS</th>
                </tr>

                    <?php
                      $no = $posisi+1;
                        while ($row3=mysqli_fetch_array($eksekusi_event_didanai)) {
                    ?>

                <tr>
                  <td class="w3-center"><?php echo $no ?></td>         
                  <td class="w3-center"><a href="detail_event.php?id_event=<?php echo $row3['id_event'] ?>"><?php echo $row3['nama_event'] ?></a></td>
                  <td class="w3-center"><a href="detail_sponsorship.php?id_sponsorship=<?php echo $row3['id_sponsorship'] ?>"><?php echo $row3['nama_sponsorship'] ?></a></td>
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
                                              WHERE event.id_event = '{$id_event}' AND pengajuan_event.status = 'DI TERIMA' LIMIT $posisi,$batas";
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
                        echo "<p>Total event : <b>$jmldata_event_diterima</b> Sponsor</p>";
                      ?>
          </div>
           </div>
      </div>
     </div>

     <div class="col-sm-2">

     </div>
   </div>
  </div>

  <div class="col-2 col-s-3 menu " style="text-align:center; font-weight: bold;">
    <div class="well">
     <p>No Telpon</p><br/>
     <p><?php echo $row['no_telp'] ?></p>
    </div>
    <div class="well">
     <p>Email</p><br/>
     <p><?php echo $row['email'] ?></p>
    </div>
    <div class="well">
     <p>Proposal</p><br/>
     <p><a href="proposal/<?php echo $row['proposal'] ?>" class="btn btn-info"/>Baca Proposal</a></td></p>
    </div>
  </div>

<?php
 include_once('layout_bawah.php');
?>
