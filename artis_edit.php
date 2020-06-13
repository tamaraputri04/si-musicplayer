<?php
 require_once "app/artis.php";
 $id = $_GET['id'];
 $kat = new App\artist;
 $row = $kat->pilihdata($id);
 if (isset($_POST['tsimpan'])){
   $kat->edit($id,$_POST['nama']);
   header("Location: index.php?halaman=artis.php");

 }
 if (isset($_POST['thapus']))
 {
   $kat->hapus($id);
   header("Location: index.php?halaman=artis.php");
 }

 ?>
<h2>EDIT DATA ARTIST</h2>
<form action="" method ="POST">
	<table>
    <tr>
			<th>ID ARTIST</th>
			<td><input readonly type="text" name="" value="<?php echo $row['artist_id']; ?>"></td>
		</tr>
		<tr>
			<th>NAMA ARTIST</th>
			<td><input type="text" name="nama" value="<?php echo $row['artist_name']; ?>"></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" name="tsimpan" value="UBAH"><input type="submit" name="thapus" value="HAPUS"></td>

		</tr>
	</table>
