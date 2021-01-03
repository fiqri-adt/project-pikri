<?php 

include 'config.php';

class Lib 
{

	public function __construct()
	{
		$this->db = new Database;
	}

	public function post($value)
	{
		return $_POST[$value];
	}

	public function get($value)
	{
		return $_GET[$value];
	}


	/* Query Insert */
    public function insert($table,$data){
      $fields = "(";
      $values = "(";
      $index  = 0;
      
      foreach ($data as $key => $val) {
        $fieldname = ($index < count($data)-1) ? $key.", " : $key. ")";
        $valuedata = ($index < count($data)-1) ? "'".$val."', "  : "'".$val."')";

        $fields .= $fieldname;
        $values .= $valuedata;

        $index++;
      }

      $query = $this->db->query("INSERT INTO ".$table." ".$fields." VALUES ".$values." ");
      return $query;
  	}

  	/* Query Update */
    public function update($table_name, $fields, $where) {  
	    $query = '';  
	    $condition = '';  
	    foreach($fields as $key => $value){  
	        $query .= $key . "='".$value."', ";  
	    }  
	    $query = substr($query, 0, -2);  
	    foreach($where as $key => $value){  
	        $condition .= $key . "='".$value."' AND ";  
	    }  
	    $condition = substr($condition, 0, -5);  

	    $query = $this->db->query("UPDATE ".$table_name." SET ".$query." WHERE ".$condition."");  
	    return $query;
	}

	/* Query Delete */
	public function delete($table_name, $where)
	{
		$condition = ''; 
	    foreach($where as $key => $value){  
	        $condition .= $key . "='".$value."' AND ";  
	    }  
	    $condition = substr($condition, 0, -5);
	    
	    $query = $this->db->query("DELETE FROM ".$table_name."WHERE ".$condition."");  
	    return $query;  
	}
}

?>