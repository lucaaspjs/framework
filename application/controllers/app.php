<?php

/**
 * Description of app
 *
 * @author Lucaas
 */
class App extends Controller {

    public function index() {
        $obj = new Produto();

        $param = array('nome,quantidade');
        $obj->select($param);
        $obj->get();
        #$this->view("index");
    }

}
