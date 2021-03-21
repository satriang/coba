<?php

include_once('layout_atas_form.php');
include_once('koneksi.php');

$query_event = mysqli_query($conn, "SELECT max(id_event) as kodeMaksimal FROM event");
$data_event = mysqli_fetch_array($query_event);
$id_event = $data_event['kodeMaksimal'];

$urutan_event = (int) substr($id_event, 3, 3);

$urutan_event++;

$huruf_event = "EVT";
$id_event = $huruf_event . sprintf("%03s", $urutan_event);
?>
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
						<td><input type="text" name="tanggal" id="date"/> </td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: right; position: right;"><input type="reset" class="w3-button w3-border w3-medium w3-red" value="Batal"/><input type="submit" class="w3-button w3-border w3-medium w3-teal" value="Tambah" /></td>
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
