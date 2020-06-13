<?php
 require_once "app/artis.php";
 require_once "app/album.php";
 $id = $_GET['id'];
 $cmb = new App\artist;
 $kat = new App\album;
 $row1 = $kat->pilihdata($id);
 $dat1 = $cmb->tampil();
 $dat2 = $cmb->pilihdata($row1['artist_id']);

 if (isset($_POST['tsimpan'])){
   $kat->edit($id,$_POST['idart'],$_POST['nama']);
   header("Location: index.php?halaman=track.php");

 }
 if (isset($_POST['thapus']))
 {
   $kat->hapus($id);
   header("Location: index.php?halaman=album.php");
 }

 ?>
<h2>EDIT DATA ALBUM</h2>
<form action="" method ="POST">
	<table>
      <tr>
        <th>ID ARTIST</th>
        <td>
          <select name="idart">
            <option value="<?php echo $row1['artist_id']; ?>"><?php echo $dat2['artist_name']; ?></option>
            <?php foreach ($dat1 as $row ) { ?>
            <option value="<?php echo $row['artist_id']; ?>"><?php echo $row['artist_name']; ?></option>
            <?php } ?>
          </select>
        </td>
      <tr>
			<th>ID ALBUM</th>
			<td><input readonly type="text" name="" value="<?php echo $row1['album_id']; ?>"></td>
		</tr>
		<tr>
			<th>NAMA ALBUM</th>
			<td><input type="text" name="nama" value="<?php echo $row1['album_name']; ?>"></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" name="tsimpan" value="UBAH"><input type="submit" name="thapus" value="HAPUS"></td>

		</tr>
	</table>
