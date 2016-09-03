<?php

/**
 * Description of controller
 *
 * @author Lucaas
 */
class Controller {

    protected $load;
    public $data = array();

    function __construct() {
        $this->load = new Loader();
    }

    protected function view($file, Array $vars = NULL) {
        if (count($vars) > 0) {
            extract($vars);
        }
        require_once "application/views/" . $file . ".php";
    }

    protected function render($file) {
        $this->view('base/head', $this->data);
        $this->view($file);
        $this->view('base/foot');
    }

}
