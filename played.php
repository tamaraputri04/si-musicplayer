<?php
require_once "app/played.php";

$kat = new App\played;
$rows = $kat->tampil();
$id = 0;
?>
<form  method="post">
 <table>
   <tr>
     <th>NO</th>
     <th>ID TRACK</th>
     <th>ID ARTIST</th>
     <th>ID ALBUM</th>
     <th>PLAYED</th>
     <th>UBAH</th>
   </tr>

   <?php foreach ($rows as $row) { $id = $id + 1;  ?>

     <tr>
       <td><?php echo $id ?></td>
       <td><?php echo $row['track_id']; ?></td>
       <td><?php echo $row['artist_id']; ?></td>
       <td><?php echo $row['album_id']; ?></td>
       <td><?php echo $row['played']; ?></td>
       <td>
       <input type="submit" value="REPLAY" name="thapus<?php echo $id ?>">
       <?php
       if (isset($_POST['thapus'.$id]))
       {
         $kat->tambah($row['artist_id'],$row['album_id'],$row['track_id']);
         header("Location: index.php?halaman=played.php");
       }
       ?>
     </td>
   </tr>

   <?php } ?>
 </table>
 <input type="submit" name="tam" value="TAMBAH">
 <?php
   if (isset($_POST['tam'])) {
       header("Location: index.php?halaman=track_tambah.php");
     }
 ?>
</form>
