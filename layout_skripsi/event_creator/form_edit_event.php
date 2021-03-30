<?php

include_once('layout_atas_form.php');
include_once('koneksi.php');

$id_event = $_GET['id_event'];
//get data id event
$sql = "SELECT event.id_event, event.nama_event, event_creator.id_event_creator, event_creator.nama_eo, kategori_event.id_kategori_event, kategori_event.kategori_event, DATE_FORMAT(event.tanggal, '%d %M %Y') as tanggal_acara, event.proposal, event.lokasi_event, event.status_terdanai, DATE_FORMAT(event.tanggal_terlaksana, '%d %M %Y') as tanggal_berakhir, event.status_terlaksana
FROM event
JOIN event_creator ON event.id_event_creator = event_creator.id_event_creator
JOIN kategori_event ON event.id_kategori_event = kategori_event.id_kategori_event WHERE `id_event`='{$id_event}'" ;

$eksekusi_id = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($eksekusi_id);

//get data kategori event
$query_kategori_event = mysqli_query($conn, "SELECT * FROM `kategori_event`");
?>
<script type="text/javascript">
   $(document).ready(function(){
    $("#tanggal").datepicker({
        dateFormat: "yy-mm-dd"
    });
   });
  </script>
  <div class="col-1 col-s-3 menu " style="text-align:center; font-weight: bold;">
    <ul>
    </ul>
  </div>
<div class="col-10 col-s-9">
  	<div style="overflow-x:auto;">
		<h1 style="text-align: center;">Ubah Event</h1>
			<table border="0">
				<form action="input_proses_tambah_event.php" method="post"  enctype="multipart/form-data">
					<tr>
						<td style="font-weight: bold;">ID EVENT</td>
						<td><input type="text" class="form-control" name="id_event" value="<?php echo $row['id_event'] ?>" /> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">ID EVENT CREATOR</td>
						<td><input type="text" class="form-control" name="id_event_creator" value="<?php echo $row['id_event_creator'] ?>"/> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">NAMA EVENT</td>
						<td><input type="text" class="form-control" name="nama_event" value="<?php echo $row['nama_event'] ?>"/> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">TANGGAL</td>
						<td><input type="text" class="form-control" name="tanggal" id="tanggal" value="<?php echo $row['tanggal_acara'] ?>"/> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Lokasi Event</td>
						<td><textarea class="form-control" name="lokasi_event" ><?php echo $row['lokasi_event'] ?></textarea> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Status dana Event</td>
						<td><select name="status_terdanai" class="form-control">
                                <?php
                                    if($row['status_terdanai'] == 'terdanai'){
                                        echo "<option value='terdanai' selected>Terdanai</option>
                                        <option value='belum terdanai'>Belum Terdanai</option>";
                                    }else{
                                        echo "<option value='terdanai' >Terdanai</option>
                                        <option value='belum terdanai' selected>Belum Terdanai</option>";
                                    }  
                                ?>
							</select>
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Kategori Event</td>
						<td><select name="id_kategori_event" class="form-control">
   							<?php
							   while ($data_kategori_event = mysqli_fetch_array($query_kategori_event)){
							?>
								<option value="<?php echo $data_kategori_event['id_kategori_event'];?>"><?php echo $data_kategori_event['kategori_event'];?></option>
							   <?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Proposal</td>
						<td><input type="file" name="proposal" accept="application/pdf" /> </td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: right; position: right;"><input type="reset" class="w3-button w3-border w3-medium w3-red" value="Batal"/>
						<input type="submit" class="w3-button w3-border w3-medium w3-teal" value="Tambah" /></td>
					</tr>
				 </form>
				 <iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
					</iframe>
			</table>
    </div>
</div>

<?php
 include_once('layout_bawah.php');
?>
