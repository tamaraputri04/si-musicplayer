<?php
require_once "app/track.php";
require_once "app/artis.php";
require_once "app/album.php";
require_once "app/played.php";

$cm1 = new App\artist;
$cm2 = new App\album;
$cm3 = new App\track;
$cm4 = new App\played;
$id1 = $_GET['artis'];
$id2 = $_GET['album'];
$id3 = $_GET['track'];
$dat1 = $cm1->pilihdata($_GET['artis']);
$dat2 = $cm2->pilihdata($_GET['album']);
$dat3 = $cm3->pilihdata($_GET['track']);
$lagu = $cm4->play($_GET['track']);

if (isset($_POST['up'])) {
  $nama = $_FILES['gambar']['name'];
	$tmp = $_FILES['gambar']['tmp_name'];
	$path = "lagu/".$nama;
	move_uploaded_file($tmp, $path);
	$cm4->tambahlagu($_GET['track'],$nama);
  header("Location: index.php?halaman=putar.php&artis=$id1&album=$id2&track=$id3");
}

?>
<h2>DATA TRACK</h2>
	<table>
<form action="" method="POST">
  <tr>
    <th>NAMA TRACK</th>
    <td><input readonly type="text" name="nama" value="<?php echo $dat3['track_name']; ?>"></td>
  </tr>
  <tr>
    <th>NAMA ALBUM</th>
    <td><input readonly type="text" name="nama" value="<?php echo $dat2['album_name']; ?>"></td>
  </tr>
  <tr>
    <th>NAMA ARTIST</th>
    <td><input readonly type="text" name="nama" value="<?php echo $dat1['artist_name']; ?>"></td>
  </tr>
			<th>TRACK</th>
      <td>
        <audio controls autoplay>
        <source src="lagu/<?php echo $lagu['lagu']; ?>" type="audio/mp3">
        </audio>
      </td>
		</tr>
		<tr>
      <th>UPLOAD TRACK</th>
      <td>
    </form>
      <form method="POST" enctype="multipart/form-data" action="">
					<input type="file" name="gambar">
					<input type="submit" value="Upload" name="up">
			</form>
      </td>
		</tr>
	</table>
