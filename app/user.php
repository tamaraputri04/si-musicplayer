<?php
class user {
	private $db;

	public function __construct()
	{
		try {
				$this->db =
				new PDO("mysql:host=localhost;dbname=songdb", "root", "");
			} catch (PDOException $e) {
				die ("Error " . $e->getMessage());
			}
		}
		public function login(string $un,$pass)
		{
			$slog = "SELECT * FROM akun WHERE username = :uname AND password = :upass";
			$log = $this->db->prepare($slog);
			$log->bindParam(":uname", $un);
			$log->bindParam(":upass", $pass);
			$log->execute();
			$login = $log->fetch();
			if($log->rowCount() > 0){
					session_start();
					$_SESSION["nama"] = $login['name'];
					header("location:index.php");
					exit;
			}

		}
	}
