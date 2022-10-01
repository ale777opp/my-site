<?php
class Controller
{
public function __construct() {
    $this->model = new Model();
    $this->view = new View();
}
public function index(array $param) {
    $chapter = $param[0];
    $page = isset($param[1])?$param[1]:1;
    $this->view->set(['chapter' => $chapter]);
    $this->view->render($chapter);
    }	
}
?>