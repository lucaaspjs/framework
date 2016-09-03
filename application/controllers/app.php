<?php

/**
 * Description of app
 *
 * @author Lucaas
 */
class App extends Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index() {

        $this->load->native_helper('URLHelper');

        $this->render("index");
    }

}
