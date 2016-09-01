<?php

/**
 * Description of model
 *
 * @author Lucaas
 */
class Model {

    private $select = "*"; # valor padrão *
    private $where = "";
    private $order_by = "";
    private $limit = "";
    private $offset = "";
    private $db_host = "localhost";
    private $db_name = "framework";
    private $db_user = "root";
    private $db_pass = "root";

    /**
     * @var PDO 
     */
    private $conn;
    public $id; #id do objeto
    public $data; #dados do objeto
    protected $tabela; #tabela relacionada ao objeto

    public function __construct() {
        $dsn = "mysql:host=" . $this->db_host . ";dbname=" . $this->db_name;
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

        $this->conn = new PDO($dsn, $this->db_user, $this->db_pass, $options);

        $this->setAttributes();
    }

    private function setAttributes() {
        $sql = "DESCRIBE {$this->tabela}";
        $q = $this->conn->prepare($sql);
        $q->execute();

        $attributes = $q->fetchAll(PDO::FETCH_COLUMN);

        foreach ($attributes as $field) {
            if ($field == "id") {
                continue;
            }

            $this->data[$field] = NULL;
            $this->field = &$this->data[$field];
        }
    }

    /**
     * Leitura
     */
    public function get() {
        if ($this->select != '*' && !preg_match('/^id,/', $this->select)) {
            $this->select = 'id,' . $this->select;
        }

        echo "SELECT {$this->select} FROM {$this->tabela} {$this->where} {$this->order_by} {$this->limit} {$this->offset}";
    }

    /**
     * Salvar
     */
    public function save() {
        
    }

    /**
     * Atualizar
     */
    public function update() {
        
    }

    /**
     * Deletar
     */
    public function delete() {
        
    }

    public function select(Array $params) {
        $this->select = implode(',', $params);
    }

    public function where($column, $value) {
        
    }

    public function order_by(Array $params, $ordem = 'ASC') {
        
    }

    public function limit($value) {
        
    }

    public function offset($value) {
        
    }

}
