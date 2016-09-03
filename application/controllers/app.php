<?php

/**
 * Description of app
 *
 * @author Lucaas
 */
class App extends Controller {

    public function index() {
        $dados['nome'] = "Lucas";
        $dados['sobrenome'] = "Pereira";
        $this->view("index", $dados);
    }

}
