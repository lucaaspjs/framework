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
    private $query;
    private $result;
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

        $sql = "SELECT {$this->select} FROM {$this->tabela} {$this->where} {$this->order_by} {$this->limit} {$this->offset}";
        $this->query = $this->conn->query($sql);
        $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);

        $temp = $this->result[0];

        if (!is_null($temp)) {
            $this->id = $temp['id'];
            unset($temp['id']);
            foreach ($temp as $k => $v) {
                $this->data[$k] = $v;
            }
        }
    }

    /**
     * Salvar
     */
    public function save() {
        $keys = "";
        $values = "";
        foreach ($this->data as $k => $v) {
            if (empty($v)) {
                continue;
            }
            $keys .= "," . $k;
            $values .= ",'{$v}'";
        }

        $keys = substr($keys, 1);
        $values = substr($values, 1);

        $sql = "INSERT INTO {$this->tabela}({$keys}) VALUES({$values})";
        $this->conn->query($sql);
    }

    /**
     * Atualizar
     */
    public function update() {
        if (empty($this->where)) {
            $this->where('id', $this->id);
        }
        $set = '';
        foreach ($this->data as $k => $v) {
            $set .=", {$k}='{$v}'";
        }
        $set = substr($set, 1);

        $sql = "UPDATE {$this->tabela} SET {$set} {$this->where}";
        $this->conn->query($sql);
    }

    /**
     * Deletar
     */
    public function delete() {
        $sql = "DELETE FROM {$this->tabela} WHERE id='{$this->id}'";
        $this->conn->query($sql);
    }

    public function deleteById($id) {
        $sql = "DELETE FROM {$this->tabela} WHERE id='{$id}'";
        $this->conn->query($sql);
    }

    public function getById($id) {
        $this->where('id', $id);
        $this->get();
    }

    public function select(Array $params) {
        $this->select = implode(',', $params);
    }

    public function where($column, $value) {
        $this->where .= empty($this->where) ? "where {$column}='{$value}'" : " and {$column}='{$value}' ";
    }

    public function order_by(Array $params, $ordem = 'ASC') {
        $this->order_by = 'order by ';
        foreach ($params as $param) {
            $this->order_by .= "{$param} {$ordem},";
        }
        $this->order_by = substr($this->order_by, 0, -1);
    }

    public function limit($value) {
        $this->limit = "limit " . $value;
    }

    public function offset($value) {
        $this->offset = "offset " . $value;
    }

    public function to_array() {
        return $this->result[0];
    }

    public function all_to_array() {
        return $this->result;
    }

}
