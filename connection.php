<?php

defined('MySQL') OR exit(header('Direct Access Forbidden', true, 403));

require_once('config.php');

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT | MYSQLI_REPORT_INDEX);

class DBConnect {
	private $dbcon;
	private $paramquery;
	private $result;

	public function __construct() {
		try {
			$this->dbcon = mysqli_init();
			mysqli_real_connect($this->dbcon, DBHOST, DBUSER, DBPASS, DBNAME, 3306, '', MYSQLI_CLIENT_COMPRESS);
			$this->paramquery = $this->dbcon->stmt_init();
		} catch (mysqli_sql_exception $e) {
			exit('Database Connection Failed');
		}
	}
	public function dbquery($querysql, $querydata) {
		try {
			mysqli_ping($this->dbcon);
			$this->paramquery->prepare($querysql);
			array_walk($querydata, function(&$escval){$escval = mysqli_real_escape_string($this->dbcon, $escval);});
			call_user_func_array(array($this->paramquery, 'bind_param'), $querydata);
			$this->paramquery->execute();
		} catch (mysqli_sql_exception $e) {
			exit('Database Query Failed');
		}
		$this->result = $this->paramquery->get_result();
		if ($this->result) {
			$drs = $this->result->fetch_array();
			$this->result->free_result();
			return $drs;
		}
	}
	public function __destruct() {
		if ((null !== $this->dbcon) && (null !== $this->paramquery) && (null !== $this->result)) {
			$this->paramquery->close();
			$this->dbcon->close();
		}
		unset($this->result);
		unset($this->paramquery);
		unset($this->dbcon);
	}
}
?>
