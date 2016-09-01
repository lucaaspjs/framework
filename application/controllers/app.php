<?php

/**
 * Description of app
 *
 * @author Lucaas
 */
class App extends Controller {

    public function index() {
        $obj = new Produto();

        print_r($obj->data);

        $obj->data['nome'] = "Samsung Galaxy A5";
        echo "<br />";
        echo $obj->data['nome'];

        echo "<br />";
        $obj->data['quantidade'] = 25;
        echo $obj->data['quantidade'];

        #$this->view("index");
    }

}
