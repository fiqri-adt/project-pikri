<?php

class Database {
 
	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "pegawai";

 
	function __construct(){
        $this->db = new mysqli($this->host, $this->username, $this->password,$this->database);
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
    }

    /* Query Login */
    public function queryLogin($query){
		$data = $this->query = $this->db->query($query);
        return $data;
	}
	
    public function query($query){
        $this->query = $this->db->query($query);
        return $this;
	}

	public function getEachTable($table,$mandatory,$key){
		$this->each = $this->db->query("SELECT * FROM $table WHERE $mandatory = $key");
		// $data->fetch_assoc();
		return $this;
	}

	public function getTable($table){
		$this->getTable = $this->db->query("SELECT * FROM $table");
		return $this;
	}

	public function getWhere($table,$condition,$order,$condition2){
		$this->where = $this->db->query("SELECT * FROM $table WHERE $condition ORDER BY $order $condition2");
		return $this;
	}

	public function rowObject(){

		while($data = $this->query->fetch_object()){
			$result[] = $data;
		}

		return $result;
	}

	public function rowArray(){

		while($data = $this->query->fetch_assoc()){
			$result[] = $data;
		}
		return $result;
	}
	public function orderBy($condition1,$condition2){
		

	}

	public function result(){
		return $this->query->fetch_assoc();
	}
} 

?>
