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

$id_sponsorship = $hasil['id_sponsorship'];

//sql read event
$sql = "SELECT pengajuan_event.id_pengajuan_event, pengajuan_event.id_event, event.nama_event, event.id_event_creator, event_creator.nama_eo, pengajuan_event.dana_event, pengajuan_event.status
 FROM `pengajuan_event`
JOIN event ON pengajuan_event.id_event = event.id_event
JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship
JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
WHERE sponsorship.id_sponsorship = '{$id_sponsorship}' AND pengajuan_event.status = 'Di AJUKAN'
LIMIT $posisi,$batas";

$eksekusi = mysqli_query($conn, $sql);
//var_dump(array_values($eksekusi));
// sql read pengajuan event
$sql_event_didanai = "SELECT pengajuan_event.id_pengajuan_event, pengajuan_event.id_event, event.nama_event, event.id_event_creator, event_creator.nama_eo, pengajuan_event.dana_event, pengajuan_event.status, event.dana_anggaran
 FROM `pengajuan_event`
JOIN event ON pengajuan_event.id_event = event.id_event
JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship
JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
WHERE sponsorship.id_sponsorship = '{$id_sponsorship}' AND pengajuan_event.status = 'DI TERIMA' LIMIT $posisi,$batas";
$eksekusi_event_didanai = mysqli_query($conn, $sql_event_didanai);

//sql event di tolak
$sql_event_ditolak = "SELECT pengajuan_event.id_pengajuan_event, pengajuan_event.id_event, event.nama_event, event.id_event_creator, event_creator.nama_eo, pengajuan_event.dana_event, pengajuan_event.status
 FROM `pengajuan_event`
JOIN event ON pengajuan_event.id_event = event.id_event
JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship
JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
WHERE sponsorship.id_sponsorship = '{$id_sponsorship}' AND pengajuan_event.status = 'DI TOLAK' LIMIT $posisi,$batas";
$eksekusi_event_ditolak = mysqli_query($conn, $sql_event_ditolak);
//sql event Terlaksana
$sql_event_terlaksana = "SELECT pengajuan_event.id_pengajuan_event, pengajuan_event.id_event, event.nama_event, event.id_event_creator, event_creator.nama_eo, pengajuan_event.dana_event, pengajuan_event.status, event.dana_anggaran
 FROM `pengajuan_event`
JOIN event ON pengajuan_event.id_event = event.id_event
JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship
JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
WHERE sponsorship.id_sponsorship = '{$id_sponsorship}' AND event.status_terlaksana = 'SUDAH TERLAKSANA' AND pengajuan_event.status = 'DI TERIMA'
LIMIT $posisi,$batas";
$eksekusi_event_terlaksana = mysqli_query($conn, $sql_event_terlaksana);
?>
  <div class="col-2 col-s-3 menu " style="text-align:center; font-weight: bold;">
    <ul>
    </ul>
  </div>
  <div class="col-10 col-s-9">
  	<div style="overflow-x:auto;">
        <div class="w3-row">
            <a href="javascript:void(0)" onclick="openCity(event, 'London');" id="defaultOpen" style="text-align:center;">
              <div class="w3-third tablink w3-bottombar w3-hover-light-blue w3-padding">Event Masuk </div>
            </a>
            <a href="javascript:void(0)" onclick="openCity(event, 'Paris');" style="text-align:center;">
              <div class="w3-third tablink w3-bottombar w3-hover-light-blue w3-padding">Event Diterima</div>
            </a>
            <a href="javascript:void(0)" onclick="openCity(event, 'Tokyo');" style="text-align:center;">
              <div class="w3-third tablink w3-bottombar w3-hover-light-blue w3-padding">Event Ditolak</div>
            </a>
						<a href="javascript:void(0)" onclick="openCity(event, 'Sidney');" style="text-align:center;">
              <div class="w3-third tablink w3-bottombar w3-hover-light-blue w3-padding">Event Terlaksana</div>
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
                  <th class="w3-center">ID PENGAJUAN EVENT</th>
                  <th class="w3-center">ID EVENT</th>
                  <th class="w3-center">NAMA EVENT</th>
                  <th class="w3-center">ID  EVENT CREATOR</th>
                  <th class="w3-center">NAMA EVENT CREATOR</th>
                  <th class="w3-center">STATUS</th>
                  <th colspan="2" class="w3-center">ACTION</th>
                </tr>

                    <?php
                      $no = $posisi+1;
                        while ($row=mysqli_fetch_array($eksekusi)) {
                    ?>

                <tr>
                  <td class="w3-center"><?php echo $no ?></td>
                  <td class="w3-center"><?php echo $row['id_pengajuan_event'] ?></td>
                  <td class="w3-center"><a href="detail_event1.php?id_event=<?php echo $row['id_event'] ?>">
                    <?php echo $row['id_event'] ?></a></td>
                  <td class="w3-center"><a href="detail_event1.php?id_event=<?php echo $row['id_event'] ?>"><?php echo $row['nama_event'] ?></a></td>
                  <td class="w3-center"><a href="detail_sponsorship.php?id_sponsorship=<?php echo $row['id_sponsorship'] ?>"><?php echo $row['id_event_creator'] ?></a></td>
                  <td class="w3-center"><a href="detail_sponsorship.php?id_sponsorship=<?php echo $row['id_sponsorship'] ?>"><?php echo $row['nama_eo'] ?></a></td>
                  <td class="w3-center"><?php echo $row['status'] ?></td>
                  <td class="w3-center">
                    <a href="form_danai_event.php?id_pengajuan_event=<?php echo $row['id_pengajuan_event'] ?>" class="w3-button w3-border w3-small w3-blue"> Danai </a>
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
              $sql2 = "SELECT pengajuan_event.id_pengajuan_event, pengajuan_event.id_event, event.nama_event, event.id_event_creator, event_creator.nama_eo, pengajuan_event.dana_event, pengajuan_event.status
              FROM `pengajuan_event`
             JOIN event ON pengajuan_event.id_event = event.id_event
             JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship
             JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
             WHERE sponsorship.id_sponsorship = '{$id_sponsorship}' AND pengajuan_event.status = 'Di Ajukan'
             LIMIT $posisi,$batas";
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
                  <th class="w3-center">NAMA EVENT</th>
                  <th class="w3-center">DANA</th>
                  <th class="w3-center">STATUS</th>
                  <th class="w3-center">PRESENTASE SUMBANGAN</th>
                </tr>

                    <?php
                      $no = $posisi+1;
                        while ($row2=mysqli_fetch_array($eksekusi_event_didanai)) {
                    ?>

                <tr>
                  <td class="w3-center"><?php echo $no ?></td>
                  <td class="w3-center"><a href="detail_event.php?id_event=<?php echo $row2['id_event'] ?>"><?php echo $row2['nama_event'] ?></a></td>
                    <td class="w3-center"><label><?php $hasil_rupiah = "Rp " . number_format($row2['dana_event'],2,',','.'); echo $hasil_rupiah;?></label></td>
                  <td class="w3-center"><?php echo $row2['status'] ?></td>
                  <td class="w3-center"><?php $dana_sumbangan = $row2['dana_event'] / $row2['dana_anggaran'] * 100;
                      echo $dana_sumbangan;?> %
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
              $sql2_event_diterima = "SELECT pengajuan_event.id_pengajuan_event, pengajuan_event.id_event,
                                              event.nama_event, event.id_event_creator, event_creator.nama_eo,
                                              pengajuan_event.dana_event, pengajuan_event.status
                                              FROM `pengajuan_event`
                                              JOIN event ON pengajuan_event.id_event = event.id_event
                                              JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship
                                              JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
                                              WHERE sponsorship.id_sponsorship = '{$id_sponsorship}' AND pengajuan_event.status = 'DI TERIMA' LIMIT $posisi,$batas";
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
                  <th class="w3-center">STATUS</th>
                </tr>

                    <?php
                      $no = $posisi+1;
                        while ($row3=mysqli_fetch_array($eksekusi_event_ditolak)) {
                    ?>

                <tr>
                  <td class="w3-center"><?php echo $no ?></td>
                  <td class="w3-center"><?php echo $row3['id_pengajuan_event'] ?></td>
                  <td class="w3-center"><a href="detail_event.php?id_event=<?php echo $row3['id_event'] ?>"><?php echo $row3['nama_event'] ?></a></td>
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
              $sql2_event_ditolak = "SELECT pengajuan_event.id_pengajuan_event, pengajuan_event.id_event,
                                              event.nama_event, event.id_event_creator, event_creator.nama_eo,
                                              pengajuan_event.dana_event, pengajuan_event.status
                                              FROM `pengajuan_event`
                                              JOIN event ON pengajuan_event.id_event = event.id_event
                                              JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship
                                              JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
                                              WHERE sponsorship.id_sponsorship = '{$id_sponsorship}' AND pengajuan_event.status = 'DI TOLAK' LIMIT $posisi,$batas";
              $eksekusi2_event_ditolak = mysqli_query($conn, $sql2_event_ditolak);
              $jmldata_event_ditolak   = mysqli_num_rows($eksekusi2_event_ditolak);
              $jmlhalaman_event_ditolak = ceil($jmldata_event_ditolak/$batas);
              ?>
                  <br/> Halaman :
                     <?php
                        for($i=1;$i<=$jmlhalaman_event_ditolak;$i++)
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
				<!--- tab 4 -->
				<div id="Sidney" class="w3-container city" style="display:none">
					<div style="overflow-x:auto;">
					<div class="table-responsive">
						<table class="w3-table-all w3-hoverable">
							<tbody>
								<tr>
									<th class="w3-center">NO</th>
									<th class="w3-center">NAMA EVENT</th>
									<th class="w3-center">DANA</th>
									<th class="w3-center">STATUS</th>
									<th class="w3-center">PRESENTASE SUMBANGAN</th>
								</tr>

										<?php
											$no = $posisi+1;
												while ($row4=mysqli_fetch_array($eksekusi_event_terlaksana)) {
										?>

								<tr>
									<td class="w3-center"><?php echo $no ?></td>
									<td class="w3-center"><a href="detail_event.php?id_event=<?php echo $row4['id_event'] ?>"><?php echo $row4['nama_event'] ?></a></td>
									<td class="w3-center"><label><?php $hasil_rupiah = "Rp " . number_format($row4['dana_event'],2,',','.'); echo $hasil_rupiah;?></label></td>
									<td class="w3-center"><?php echo $row4['status'] ?></td>
									<td class="w3-center"><?php $dana_sumbangan_terlaksana = $row4['dana_event'] / $row4['dana_anggaran'] * 100;
                      echo $dana_sumbangan_terlaksana;?> %
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
							$sql2_event_terlaksana = "SELECT pengajuan_event.id_pengajuan_event, pengajuan_event.id_event, event.nama_event, event.id_event_creator, event_creator.nama_eo, pengajuan_event.dana_event, pengajuan_event.status, event.dana_anggaran
							 													FROM `pengajuan_event`
																				JOIN event ON pengajuan_event.id_event = event.id_event
																				JOIN sponsorship ON pengajuan_event.id_sponsorship = sponsorship.id_sponsorship
																				JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
																				WHERE sponsorship.id_sponsorship = '{$id_sponsorship}' AND event.status_terlaksana = 'SUDAH TERLAKSANA' AND pengajuan_event.status = 'DI TERIMA'
																				LIMIT $posisi,$batas";
							$eksekusi2_event_terlaksana = mysqli_query($conn, $sql2_event_terlaksana);
							$jmldata_event_terlaksana   = mysqli_num_rows($eksekusi2_event_terlaksana);
							$jmlhalaman_event_terlaksana = ceil($jmldata_event_terlaksana/$batas);
							?>
									<br/> Halaman :
										 <?php
												for($i=1;$i<=$jmlhalaman_event_terlaksana;$i++)
													if ($i != $halaman){
														echo " <a href=\"read_event.php?halaman=$i\">$i</a> | ";
														}else{
														echo " <b>$i</b> | ";
													}
												echo "<p>Total event Terlaksana : <b>$jmldata_event_terlaksana</b> event</p>";
											?>
					</div>
					 </div>
				</div

    </div>
  </div>

<?php
 include_once('layout_bawah.php');
?>
