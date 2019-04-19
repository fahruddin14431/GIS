<?php 

/**
* Connection Class
*/
class Koneksi {

	private $koneksi;
	
	function __construct(){
		$this->koneksi = new mysqli("localhost","root","","db_gis");

		if ($this->koneksi->error) {
			die($this->koneksi->error);
		}
	}

	public function setQuery($sql){
		return $this->koneksi->query($sql);
	}

	public function getKoneksi(){
		return $this->koneksi;
	}
	
}

 ?>
