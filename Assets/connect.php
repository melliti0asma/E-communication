<?php
	
	class database {

		public function connect($dbName) {

			$this->dbServername = "localhost";
			$this->dbUsername = "root";
			$this->dbPassword = "";
			$this->dbName = $dbName;

			$connt = new mysqli($this->dbServername, $this->dbUsername, $this->dbPassword, $this->dbName);

			return $connt;
		 }

		public function Slecet($conn,$table,$Fild,$Cond) {

			$this->conn = $conn;
			$this->Table = $table;
			$this->Fild = $Fild;
			$this->Cond = $Cond;

			$dd = mysqli_query($this->conn,'SET NAMES utf8');

			$sql="SELECT $this->Fild FROM $this->Table where $this->Cond;";
			$query=mysqli_query($this->conn,$sql);    

			return $query;
		 }

		public function SlecetCount($conn,$table,$Fild,$Cond) {

			$this->conn = $conn;
			$this->Table = $table;
			$this->Fild = $Fild;
			$this->Cond = $Cond;

			$dd = mysqli_query($this->conn,'SET NAMES utf8');

			$sql="SELECT COUNT($this->Fild) FROM $this->Table WHERE $this->Cond;";
			$query=mysqli_query($this->conn,$sql);    

			return $query;
		 }
		 
		public function SlecetSUM($conn,$table,$Fild,$Cond) {

			$this->conn = $conn;
			$this->Table = $table;
			$this->Fild = $Fild;
			$this->Cond = $Cond;

			$dd = mysqli_query($this->conn,'SET NAMES utf8');

			$sql="SELECT SUM($this->Fild) FROM $this->Table WHERE $this->Cond;";
			$query=mysqli_query($this->conn,$sql);    

			return $query;
		 }

		public function Insert($conn,$table,$Value) {

			$this->conn = $conn;
			$this->Table = $table;
			$this->Value = $Value;

			$dd = mysqli_query($this->conn,'SET NAMES utf8');

			$sql="INSERT INTO $this->Table VALUES $this->Value;";
			$query=mysqli_query($this->conn,$sql);    

			return $query;
		 }

		public function Update($conn,$table,$Value,$Cond) {

			$this->conn = $conn;
			$this->Table = $table;
			$this->Value = $Value;
			$this->Cond = $Cond;

			$dd = mysqli_query($this->conn,'SET NAMES utf8');

			$sql="UPDATE $this->Table SET $this->Value WHERE $this->Cond;";
			$query=mysqli_query($this->conn,$sql);    

			return $query;
		 }
	}	
?>