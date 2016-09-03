<?php

/**
 * Description of app
 *
 * @author Lucaas
 */
class App extends Controller {

    public function index() {

        $func = new Funcionario();
        $func->getById(1);
        $func->recursiveGet();

        print_r($func);
    }
}
