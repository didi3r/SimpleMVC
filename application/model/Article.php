<?php
class Article extends ModelBase {

   public function  __construct() {

   }

   public function getArticles() {
       $articles[] = array ("Articulo 1", "Juan");
       $articles[] = array ("Articulo 2", "Pedro");
       $articles[] = array ("Articulo 2", "Maria");
       return $articles;
   }

}
