<?php
namespace App;
use PDO;
abstract class Data1 {
	abstract protected function tampil();
	abstract protected function tambah(String $a1,$a2);
	abstract protected function edit(String $a1,$a2,$a3);
	abstract protected function pilihdata(String $a1);
	abstract protected function hapus(String $a1);
}
class album extends Data1 {
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
			$sql = "SELECT * FROM album";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data = [];
			while ($rows = $stmt->fetch()) {
				$data[] = $rows;
			}
			return $data;
		}

		public function tambah(String $d1,$d2){
			$sql = "INSERT INTO album VALUES (:idart, NULL, :nama)";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":idart", $d1);
			$stmt -> bindParam(":nama", $d2);
			$stmt->execute();
		}

		public function pilihdata(String $d1)
		{
			$sql = "SELECT * FROM album WHERE album_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt->execute();
			$data = $stmt->fetch();
			return $data;
		}

		public function edit(String $d1, $d2, $d3)
		{
			$sql = "UPDATE album SET artist_id = :aid,album_name = :name WHERE album_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt -> bindParam(":aid", $d2);
			$stmt -> bindParam(":name", $d3);
			$stmt->execute();
		}

		public function hapus(string $d1)
		{
			$sql = "DELETE FROM album WHERE album_id = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt->execute();
		}
}
?>
