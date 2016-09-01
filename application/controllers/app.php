<?php

/**
 * Description of app
 *
 * @author Lucaas
 */
class App extends Controller {

    public function index() {
        $obj = new Produto();
        $arr = array('nome', 'quantidade');
        #Definir colunas
        $obj->select($arr);
        #filtrar resultados
        #$obj->where('id',7);
        $obj->where('categoria', 'smartphone');
        #ordenar
        $obj->order_by(array('quantidade'), 'DESC');
        #impor limit
        $obj->limit(2);

        $obj->get();

        print_r($obj->to_array()) . '<br><br>';
        print_r($obj->all_to_array());

        #$this->view("index");
    }

}
