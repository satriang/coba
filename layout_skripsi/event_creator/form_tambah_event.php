<?php

include_once('layout_atas_form.php');
include_once('koneksi.php');

//get data id event
$query_event = mysqli_query($conn, "SELECT max(id_event) as kodeMaksimal FROM event");
$data_event = mysqli_fetch_array($query_event);
$id_event = $data_event['kodeMaksimal'];

$urutan_event = (int) substr($id_event, 3, 3);

$urutan_event++;

$huruf_event = "EVT";
$id_event = $huruf_event . sprintf("%03s", $urutan_event);

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
<div class="col-12 col-s-9">
  	<div style="overflow-x:auto;">
		<h1 style="text-align: center;">Tambahkan Event</h1>
			<table border="0">
				<form action="input_proses_tambah_event.php" method="post">
					<tr>
						<td style="font-weight: bold;">ID EVENT</td>
						<td><input type="text" class="form-control" name="id_event" value="<?php echo $id_event; ?>" /> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">ID EVENT CREATOR</td>
						<td><input type="text" class="form-control" name="id_event_creator" value="<?php echo $hasil['id_event_creator'] ?>"/> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">NAMA EVENT</td>
						<td><input type="text" class="form-control" name="nama_event" /> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">TANGGAL</td>
						<td><input type="text" name="tanggal" id="tanggal"/> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Lokasi Event</td>
						<td><textarea class="form-control" name="lokasi_event"> </textarea> </td>
					</tr>
					<tr>
						<td style="font-weight: bold;">TANGGAL</td>
						<td><select name="status_terdanai" class="form-control">
								<option value="Terdanai">Terdanai</option>
								<option value="Belum Terdanai">Belum Terdanai</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Kategori Event</td>
						<td><select name="status_terdanai" class="form-control">
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
						<td><input type="file" name="proposal"/> </td>
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
