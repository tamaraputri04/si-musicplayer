<?php
namespace App;
use PDO;
abstract class Data2 {
	abstract protected function tampil();
	abstract protected function tambah(String $a1,$a2,$a3,$a4);
	abstract protected function edit(String $a1,$a2,$a3,$a4,$a5);
	abstract protected function pilihdata(String $a1);
	abstract protected function hapus(String $a1);
}
class track extends Data2 {
	private $db;

	public function __construct()
	{
		try {
				$this->db = new PDO("mysql:host=localhost;dbname=songdb", "root", "");
			} catch (PDOException $e) {
				die ("Error " . $e->getMessage());
			}
		}

		public function tampil()
		{
			$sql = "SELECT * FROM track";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data = [];
			while ($rows = $stmt->fetch()) {
				$data[] = $rows;
			}
			return $data;
		}

		public function tambah(String $d1,$d2,$d3,$d4){
			$sql = "INSERT INTO track VALUES (NULL, :nama, :idart, :idalb, :times)";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":nama", $d1);
			$stmt -> bindParam(":idart", $d2);
			$stmt -> bindParam(":idalb", $d3);
			$stmt -> bindParam(":times", $d4);
			$stmt->execute();
		}

		public function pilihdata(String $d1)
		{
			$sql = "SELECT * FROM track WHERE track_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt->execute();
			$data = $stmt->fetch();
			return $data;
		}

		public function edit(String $d1, $d2, $d3, $d4, $d5)
		{
			$sql = "UPDATE track SET artist_id = :aid, album_id = :alid, track_name = :name, time = :time WHERE track_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt -> bindParam(":name", $d2);
			$stmt -> bindParam(":aid", $d3);
			$stmt -> bindParam(":alid", $d4);
			$stmt -> bindParam(":time", $d5);
			$stmt->execute();
		}

		public function hapus(string $d1)
		{
			$sql = "DELETE FROM track WHERE track_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt->execute();
		}
}
?>
