<?php
class DbFunctions {

	private $conn;

    // constructor
	function __construct() {
		require_once 'Connect.php';
        // connecting to database
		$db = new Connect();
		$this->conn = $db->connect();
	}

	// get produk
	public function getProduk($start = 0, $limit = 9) {
		$sql = "SELECT a.*, b.kat_nama 
		FROM produk a 
		JOIN kategori b ON a.kategori_id = b.id
		LIMIT ?, ?";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("ss", $start, $limit);
		if ($stmt->execute()) {
			$ds = array();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc()) {
				$ds[] = $row;
			}
			return $ds;
			$stmt->close();
		} else {
			return FALSE;
		}
	}

	// get produk
	public function getProdukByKategori($start = 'x', $limit = 9, $kategori = "") {
		$sql = "SELECT a.*, b.kat_nama 
		FROM produk a 
		JOIN kategori b ON a.kategori_id = b.id
		WHERE a.kategori_id = ?
		LIMIT ?, ?";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("sss", $kategori, $start, $limit);
		if ($stmt->execute()) {
			$ds = array();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc()) {
				$ds[] = $row;
			}
			return $ds;
			$stmt->close();
		} else {
			return FALSE;
		}
	}

	// get produk detail
	public function getProdukById($id) {
		$sql = "SELECT a.*, b.kat_nama 
		FROM produk a 
		JOIN kategori b ON a.kategori_id = b.id
		WHERE a.id = ?";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("s", $id);
		if ($stmt->execute()) {
			$result = $stmt->get_result()->fetch_assoc();
			return $result;
			$stmt->close();
		} else {
			return FALSE;
		}
	}

	// kat2
	public function getKategori($k_id = 1) {
		$sql = "SELECT * FROM kategori
		WHERE kat_parent = ? AND kat_show = 1
		ORDER BY kat_urutan";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("s", $k_id);
		if ($stmt->execute()) {
			$ds = array();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc()) {
				$ds[] = $row;
			}
			return $ds;
			$stmt->close();
		} else {
			return FALSE;
		}
	}

	// kat2
	public function getKategoriById($k_id = 1) {
		$sql = "SELECT CONCAT(b.kat_nama, ' > ', a.kat_nama)'kategori'
		FROM kategori a
		JOIN kategori b ON a.kat_parent = b.id
		WHERE a.id = ? LIMIT 1";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("s", $k_id);
		if ($stmt->execute()) {
			$result = $stmt->get_result()->fetch_assoc();
			return $result;
			$stmt->close();
		} else {
			return FALSE;
		}
	}

	// menu
	public function getMenu($k_id = 1) {
		$sql = "SELECT a.*, COUNT(b.id)'hc' FROM twm_menu a
		LEFT JOIN twm_menu b ON a.id = b.menu_parent
		WHERE a.menu_status = 1 AND a.menu_parent = ?
		GROUP BY a.id ORDER BY menu_urutan";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("s", $k_id);
		if ($stmt->execute()) {
			$ds = array();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc()) {
				$ds[] = $row;
			}
			return $ds;
			$stmt->close();
		} else {
			return FALSE;
		}
	}

	// kat2
	public function getPref($pn) {
		$sql = "SELECT pref_value FROM twm_pref
		WHERE pref_name = ? LIMIT 1";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param("s", $pn);
		if ($stmt->execute()) {
			$result = $stmt->get_result()->fetch_assoc();			
			return $result['pref_value'];
			$stmt->close();
		} else {
			return FALSE;
		}
	}

}