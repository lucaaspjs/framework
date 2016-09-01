<?php

/**
 * Description of app
 *
 * @author Lucaas
 */
class App extends Controller {

    public function index() {
        $obj = new Produto();

        var_dump($obj);

        print_r($obj->data);

        $obj->data['nome'] = "Samsung Galaxy A5";
        echo "<br />";
        echo $obj->nome;


        $obj->quantidade = 25;
        echo $obj->data['quantidade'];

        #$this->view("index");
    }

}
