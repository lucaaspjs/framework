<?php

/**
 * Description of app
 *
 * @author Lucaas
 */
class App extends Controller {

    public function index() {

        $obj = new Produto();
        $obj->get();
        print_r($obj->all_to_array());

        #$this->view("index");
    }

}
