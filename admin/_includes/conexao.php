<?php
if (!isset($_SESSION)) {
session_start();
}class MySQL {	
	var $host 	= 'bdmysql.ferrobattuto.com.br'; 
	var $usr 	= 'battuto'; 
	var $pw  	= 'meikie9v';
	var $db  	= 'ferrobattuto'; 

	var $sql; // Query - instru��o SQL
	var $conn; // Conex�o ao banco
	var $resultado; // Resultado de uma consulta (query)

	 function MySQL() {
	}
	
	// Esta fun��o conecta-se ao banco de dados e o seleciona
	function connMySQL() {
		$this->conn = mysql_connect($this->host,$this->usr,$this->pw);
		if(!$this->conn) {
			echo "<p>N�o foi poss�vel conectar-se ao servidor MySQL.</p>\n" 
				 .
				 "<p><strong>Erro MySQL: " . mysql_error() . "</strong></p>\n";
				 exit();
		} elseif (!mysql_select_db($this->db,$this->conn)) {
			echo "<p>N�o foi poss�vel selecionar o Banco de Dados desejado.</p>\n"
				 .
				 "<p><strong>Erro MySQL: " . mysql_error() . "</strong></p>\n";
				 exit();
		}
	}
	
	//Contagem de dados 	
	 function countQuery($table,$criterio=true) {
		$this->connMySQL();
		$this->table = $table;
		$this->criterio = $criterio;
		if($this->resultado = mysql_query("SELECT COUNT(*) FROM ".$this->table)) {
			if($criterio) {
				$this->resultado = mysql_query("SELECT COUNT(*) FROM ".$this->table ." WHERE ".$this->criterio);
			}
			$this->countresult = mysql_fetch_row($this->resultado);
			$this->closeConnMySQL();
			return $this->countresult[0];
		} else {
			mysql_error();
			$this->closeConnMySQL();
		}
	}
		
	function runQuery($sql,$ultId=false) {
		$this->connMySQL();
		$this->sql = $sql;
		if($this->resultado = mysql_query($this->sql)) {
			 if ($ultId){
        $_SESSION["ultid"] = mysql_insert_id();
      }

			$this->closeConnMySQL();
			return $this->resultado;
		} else {
			mysql_error();
			$this->closeConnMySQL();
		}
	}
	
	
	function closeConnMySQL() {
		return mysql_close($this->conn);
	}
	
} // Finaliza a classe MySQL

$mySQL = new MySQL;

?>