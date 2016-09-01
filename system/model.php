<?php

/**
 * Description of model
 *
 * @author Lucaas
 */
class Model {

    private $db_host = "localhost";
    private $db_name = "framework";
    private $db_user = "root";
    private $db_pass = "root";
    private $conn;

    public function __construct() {
        $dns = "mysql:host" . $this->db_host . ";dbname=" . $this->db_name;
        $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

        $this->conn = new PDO($dsn, $this->db_user, $this->db_pass, $options);
    }

}
