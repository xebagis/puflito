<?php

namespace App\Utiles;

class MySQLUtil {
    public function __construct() {
    }
    public function getConnection() {
        $sqlconn = new \MySQLi("localhost","root","","integrador");
        return $sqlconn;
    }
    public function execute($sqlTxt) {
        $conn = $this->getConnection();
        $resultset = $conn->query($sqlTxt);
        $conn->close();
    }
    public function query($sqlTxt) {
        $conn = $this->getConnection();
        $resultset = $conn->query($sqlTxt);
        $ret = [];
        for ($rec = $resultset->fetch_assoc(); $rec != null; $rec = $resultset->fetch_assoc()) {
            array_push($ret, $rec);
        }
        $conn->close();
        return $ret;
    }
}

?>