<?php
require_once "app/artis.php";
require_once "app/album.php";
$cmb = new App\artist;
$kat = new App\album;
$dat1 = $cmb->tampil();

if (isset($_POST['tsimpan'])) {
	$kat->tambah($_POST['idart'],$_POST['nama']);
  header("Location: index.php?halaman=album.php");
}

?>
<h2>INPUT DATA ALBUM</h2>
	<table>
<form action="" method="POST">
    <tr>
      <th>ARTIST</th>
      <td>
        <select name="idart">
          <?php foreach ($dat1 as $row ) { ?>
          <option value="<?php echo $row['artist_id']; ?>"><?php echo $row['artist_name']; ?></option>
          <?php } ?>
        </select>
      </td>
    </tr>
    <tr>
			<th>NAMA ALBUM</th>
			<td><input type="text" name="nama"></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" name="tsimpan" value="TAMBAH"></td>
		</tr>
	</table>
</form>
