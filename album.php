<?php
require_once "app/album.php";

$kat = new App\album;
$rows = $kat->tampil();

?>
<form  method="post">
 <table>
   <tr>
     <th>ID ARTIST</th>
     <th>ID ALBUM</th>
     <th>NAMA</th>
     <th>UBAH</th>
   </tr>

   <?php foreach ($rows as $row) { $id = $row['album_id']; ?>

     <tr>
       <td><?php echo $row['artist_id']; ?></td>
       <td><?php echo $row['album_id']; ?></td>
       <td><?php echo $row['album_name']; ?></td>
       <td>
         <input type="submit" name="edit<?php echo $id ?>" value="EDIT">
       <?php
           if (isset($_POST['edit'.$id])) {
               header("Location: index.php?halaman=album_edit.php&id=$id");
             }

        ?>
       <input type="submit" value="HAPUS" name="thapus<?php echo $id ?>">
       <?php
       if (isset($_POST['thapus'.$id]))
       {
         $kat->hapus($id);
         header("Location: index.php?halaman=album.php&id=$d1");
       }
       ?>
     </td>
   </tr>

   <?php } ?>
 </table>
 <input type="submit" name="tam" value="TAMBAH">
 <?php
   if (isset($_POST['tam'])) {
       header("Location: index.php?halaman=album_tambah.php");
     }
 ?>
</form>
