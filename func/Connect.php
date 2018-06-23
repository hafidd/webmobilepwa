<?php
class Connect {
	private $conn;
	private $servername = "localhost";
	private $username = "root";
	private $passwordData = "";
	private $dbname = "twm_db";

    // Connecting to database
	public function connect() {
        // Connecting to mysql database
		$this->conn = new mysqli($this->servername, $this->username, $this->passwordData, $this->dbname);

        // return database handler
		return $this->conn;
	}
}
