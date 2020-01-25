<?php
namespace Kernel;
class MySQL {
	private $host;
	private $user;
	private $pass;
	private $dbname;
	private $prefix;
	private $log;

	private $connection_id = null;

	public $q_log = array(); // query log
	public $q_log_n = 0; // query log counter

	public function __construct($conf) {
		$this->host = $conf['host'];
		$this->user = $conf['user'];
		$this->pass = $conf['pass'];
		$this->dbname = $conf['dbname'];
		$this->prefix = $conf['prefix'];
		$this->log = $conf['log'];

		$this->connect();
	}

	private function connect() {
		if ($this->connection_id) {
			print 'one more connection';
			die();
		}

		if ($this->pass == '') {
			$this -> BadConnect();
		}

		$this->connection_id = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname, "3306")
			or $this -> BadConnect();

		mysqli_query($this->connection_id, "set names utf8 collate utf8_general_ci");
	}

	public function disconnect() {
		mysqli_close($this->connection_id);
	}

	private function BadConnect() {
		print 'can not connect';
		die();
	}

	public function query($q) {
		$mtime = create_function("", 'list($usec, $sec) = explode(" ", microtime()); return ((float)$usec + (float)$sec);');

		$q = str_replace("prefix_", $this->prefix."_", $q);

		$m1 = $mtime();
		$result = mysqli_query($this->connection_id, $q);
		$m2 = $mtime();
		$ex_time = sprintf("%01.5f", ($m2 - $m1));

		$this->q_log[$this->q_log_n++] = $ex_time."s ".$q;

		if (!$result and $this->log) {
			$f = fopen(CORE.'/../log/mysql-'.date('Y-m').'.log', 'a');
			fputs($f, date("Y-m-d H:i:s")."    ".$q."\n\n");
			fclose($f);

			print $q."<br />".mysqli_error($this->connection_id);
			die();
		}

		return $result;
	}

	public function NumRows($MySQLResult) {
		if (!$MySQLResult) return false;
		$result = mysqli_num_rows($MySQLResult);
		return $result;
	}

	public function FetchArray($MySQLResult) {
		if (!$MySQLResult) return false;
		$result = mysqli_fetch_array($MySQLResult);
		return $result;
	}

	public function FetchAssoc($MySQLResult) {
		if (!$MySQLResult) return false;
		$result = mysqli_fetch_assoc($MySQLResult);
		return $result;
	}

	public function FreeResult($MySQLResult) {
		if ($MySQLResult) {
			$result = mysqli_free_result($MySQLResult);
		}
		return $result;
	}

	public function GetId() { return mysqli_insert_id($this->connection_id); }
	public function AffectedRows() { return mysqli_affected_rows($this->connection_id); }
	public function Error() { return mysqli_error($this->connection_id); }

	public function getRow($q) {
        $rows = array();
        $result = $this->query($q);
        return ($this->FetchAssoc($result));
	}

	public function getRows($query) {
		$rows = array();
		$result = $this->query($query);
		while ($row = $this->FetchAssoc($result)) $rows[] = $row;
		return $rows;
	}

	public function getVar($query) {
		$result = $this->query($query);

		if ($result) {
			$row = $this->FetchArray($result);
		} else {
			return false;
		}

		if ($row) {
			return $row[0]; 
		} else {
			return false;
		}
	}
	public function getVars($query) {
		$rows = array();
		$result = $this->query($query);
		while ($row = $this->FetchArray($result)) $rows[] = $row[0];
		return $rows;
	}

	public function combine($query) {
		$rows = array();
		$result = $this->query($query);
		while ($row = $this->FetchArray($result)) {
			$rows[$row[0]] = $row[1];
		}
		return $rows;
	}

}
