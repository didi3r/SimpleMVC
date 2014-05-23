<?php

class HomeController Extends ControllerBase {
    public function index() {
        $this->set('html_title', 'Didier Pérez - Inicio');
    }

    public function test() {
        $this->set('html_title', 'Didier Pérez - Test');
        $this->set('myText', 'Hola Mundo!');
    }
}
