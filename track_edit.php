<?php
 require_once "app/track.php";
 require_once "app/artis.php";
 require_once "app/album.php";
 $id = $_GET['id'];
 $kat = new App\track;
 $cm1 = new App\artist;
 $cm2 = new App\album;
 $row1 = $kat->pilihdata($id);
 $dat1 = $cm1->tampil();
 $head1 = $cm1->pilihdata($row1['artist_id']);
 $dat2 = $cm2->tampil();
 $head2 = $cm2->pilihdata($row1['album_id']);

 if (isset($_POST['tsimpan'])){
   $kat->edit($id,$_POST['nama'],$_POST['idart'],$_POST['idalb'],$_POST['time']);
   header("Location: index.php?halaman=track.php");

 }
 if (isset($_POST['thapus']))
 {
   $kat->hapus($id);
   header("Location: index.php?halaman=track.php");
 }

 ?>
<h2>EDIT DATA TRACK</h2>
<form action="" method ="POST">
	<table>
    <tr>
      <th>ID TRACK</th>
      <td><input type="text" name="" value="<?php echo $row1['track_id']; ?>"></td>
    </tr>
    <tr>
      <th>NAMA TRACK</th>
      <td><input type="text" name="nama" value="<?php echo $row1['track_name']; ?>"></td>
    </tr>
      <tr>
        <th>ID ARTIST</th>
        <td>
          <select name="idart">
            <option value="<?php echo $row1['artist_id']; ?>"><?php echo $head1['artist_name']; ?></option>
            <?php foreach ($dat1 as $row ) { ?>
            <option value="<?php echo $row['artist_id']; ?>"><?php echo $row['artist_name']; ?></option>
            <?php } ?>
          </select>
        </td>
      <tr>
			<th>ID ALBUM</th>
      <td>
        <select name="idalb">
          <option value="<?php echo $row1['album_id']; ?>"><?php echo $head2['album_name']; ?></option>
          <?php foreach ($dat2 as $row ) { ?>
          <option value="<?php echo $row['album_id']; ?>"><?php echo $row['album_name']; ?></option>
          <?php } ?>
        </select>
      </td>
		</tr>
		<tr>
			<th>DURASI</th>
			<td><input type="decimal" name="time" value="<?php echo $row1['time']; ?>"></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" name="tsimpan" value="UBAH"><input type="submit" name="thapus" value="HAPUS"></td>

		</tr>
	</table>
