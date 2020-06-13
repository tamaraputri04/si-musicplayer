<?php
require_once "app/artis.php";
$kat = new App\artist;

if (isset($_POST['tsimpan'])) {
	$kat->tambah($_POST['nama']);
  header("Location: index.php?halaman=artis.php");
}

?>
<h2>INPUT DATA ARTIST</h2>
	<table>
<form action="" method="POST">
		<tr>
			<th>NAMA ARTIST</th>
			<td><input type="text" name="nama"></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" name="tsimpan" value="TAMBAH"></td>
		</tr>
	</table>
</form>
