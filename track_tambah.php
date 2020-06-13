<?php
require_once "app/track.php";
require_once "app/artis.php";
require_once "app/album.php";
$kat = new App\track;
$cm1 = new App\artist;
$cm2 = new App\album;
$dat1 = $cm1->tampil();
$dat2 = $cm2->tampil();

if (isset($_POST['tsimpan'])) {
	$kat->tambah($_POST['nama'],$_POST['idart'],$_POST['idal'],$_POST['time']);
  header("Location: index.php?halaman=track.php");
}

?>
<h2>INPUT DATA TRACK</h2>
	<table>
<form action="" method="POST">
  <tr>
    <th>NAMA TRACK</th>
    <td><input type="text" name="nama"></td>
  </tr>
  <tr>
    <tr>
      <th>ID ARTIST</th>
      <td>
        <select name="idart">
          <?php foreach ($dat1 as $row ) { ?>
          <option value="<?php echo $row['artist_id']; ?>"><?php echo $row['artist_name']; ?></option>
          <?php } ?>
        </select>
      </td>
    </tr>
    <tr>
      <th>ID ALBUM</th>
      <td>
        <select name="idal">
          <?php foreach ($dat2 as $row ) { ?>
          <option value="<?php echo $row['album_id']; ?>"><?php echo $row['album_name']; ?></option>
          <?php } ?>
        </select>
      </td>
    </tr>
    <tr>
			<th>DURASI</th>
			<td><input type="decimal" name="time"></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" name="tsimpan" value="TAMBAH"></td>
		</tr>
	</table>
</form>
