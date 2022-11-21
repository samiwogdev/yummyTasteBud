<?php

/**
 * Description of Connection
 *
 * @author samiwog
 */
class Connection {

    public $conn;

  // get the database connection
    public function getConnection() {
        global $CONNECTION_STRING, $USERNAME, $PASSWORD;
        if (!isset($this->conn) || is_null($this->conn)) {
            try {
                $this->conn = new PDO($CONNECTION_STRING, $USERNAME, $PASSWORD);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $exception) {
                echo "Connection error: " . $exception->getMessage();
            }
        }
        return $this->conn;
    }

    public function getSqlError($sqlQuery, $getErrorMsg, $getStackTrace) {
        global $sqlErrorFile;
        $error = sprintf("[%s]: Could not execute query: $sqlQuery\nError Message: %s\n%s\n", date("Y-m-d"), $getErrorMsg, $getStackTrace);
        $errorSizeLimit = 512 * 5;
        if (file_exists($sqlErrorFile) && filesize($sqlErrorFile) >= $errorSizeLimit) {
            $number = 0;
            while (($newFilename = substr($sqlErrorFile, 0, strrpos($sqlErrorFile, ".")) . "-{$number}.log") && file_exists($newFilename)) {
                $number++;
            }
            rename($sqlErrorFile, $newFilename);
        }
        file_put_contents($sqlErrorFile, $error, FILE_APPEND);
        return true;
    }
}
