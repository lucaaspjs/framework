<?php

/**
 * Description of app
 *
 * @author Lucaas
 */
class App extends Controller {

    public function index() {
        $obj = new Produto();


        $obj->where('id', 7);
        $obj->get();

        $obj->descricao = 'UMA DESCRICAO AQUI';
        $obj->quantidade = 25;

        $obj->update();

        #$this->view("index");
    }

}
