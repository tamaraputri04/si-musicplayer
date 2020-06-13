<?php
require_once "app/track.php";
require_once "app/played.php";

$kat = new App\track;
$add = new App\played;
$rows = $kat->tampil();

?>
<form  method="post">
 <table>
   <tr>
     <th>ID TRACK</th>
     <th>NAMA</th>
     <th>ID ARTIST</th>
     <th>ID ALBUM</th>
     <th>TIME</th>
     <th>UBAH</th>
   </tr>

   <?php foreach ($rows as $row) { $id = $row['track_id']; $id2 = $row['album_id']; $id3 = $row['artist_id'];  ?>

     <tr>
       <td><?php echo $row['track_id']; ?></td>
       <td><?php echo $row['track_name']; ?></td>
       <td><?php echo $row['artist_id']; ?></td>
       <td><?php echo $row['album_id']; ?></td>
       <td><?php echo $row['time']; ?></td>
       <td>
         <input type="submit" name="edit<?php echo $id ?>" value="EDIT">
       <?php
           if (isset($_POST['edit'.$id])) {
               header("Location: index.php?halaman=track_edit.php&id=$id");
             }

        ?>
       <input type="submit" value="HAPUS" name="thapus<?php echo $id ?>">
       <?php
       if (isset($_POST['thapus'.$id]))
       {
         $kat->hapus($id);
         header("Location: index.php?halaman=track.php");
       }
       ?>
       <input type="submit" value="PLAY" name="tplay<?php echo $id ?>">
       <?php
       if (isset($_POST['tplay'.$id]))
       {
         $add->tambah($row['artist_id'],$row['album_id'],$row['track_id']);
         header("Location: index.php?halaman=putar.php&artis=$id3&album=$id2&track=$id");
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
