<?php

class ArticleController Extends ControllerBase {
    public function index() {
        $model = new Article();
        $articles = $model->getArticles();
        $this->set('html_title', 'Didier Pérez - Articulos');
        $this->set('articles', $articles);
    }

}
