<?php

/**
 * Description of funcionario
 *
 * @author Lucaas
 */
class Funcionario extends Model {

    protected $tabela = "funcionarios";
    protected $one_to_one = array ("cargo", "endereco");


    public function __construct() {
        parent::__construct();
    }

}
