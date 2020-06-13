<?php
namespace App;
use PDO;
abstract class Datap {
	abstract protected function tampil();
	abstract protected function tambah(String $a1,$a2,$a3);
	abstract protected function play(String $a1);
  abstract protected function tambahlagu(String $a1,$a2);
}
class played extends Datap {
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
			$sql = "SELECT * FROM played";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$data = [];
			while ($rows = $stmt->fetch()) {
				$data[] = $rows;
			}
			return $data;
		}

		public function tambah(String $d1,$d2,$d3){
			$sql = "INSERT INTO played VALUES (:nama, :idart, :idalb, Current_timestamp)";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":nama", $d1);
			$stmt -> bindParam(":idart", $d2);
			$stmt -> bindParam(":idalb", $d3);
			$stmt->execute();
		}

		public function play(String $d1)
		{
			$sql = "SELECT * FROM lagu WHERE idt = :id";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":id", $d1);
			$stmt->execute();
			$data = $stmt->fetch();
			return $data;
		}
    public function tambahlagu(string $a1,$a2){
      $sql = "INSERT INTO lagu VALUES (:idt, :lagu)";
			$stmt = $this->db->prepare($sql);
			$stmt -> bindParam(":idt", $a1);
			$stmt -> bindParam(":lagu", $a2);
			$stmt->execute();
    }
  }

?>
