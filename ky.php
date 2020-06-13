<?php
  $lagu = $_GET['lagu'];
 ?>
<form  method="post">
 <table>
   <tr>
     <th>ID TRACK</th>
     <th>ID ARTIST</th>
     <th>ID ALBUM</th>
     <th>DURASI/PUTAR</th>
   </tr>



     <tr>
       <td>2</td>
       <td>1</td>
       <td>3</td>
       <td>
         <audio controls autoplay>
         <source src="lagu/<?php echo $lagu; ?>" type="audio/mp3">
         </audio>
       </td>
   </tr>

   <?php  ?>
 </table>
