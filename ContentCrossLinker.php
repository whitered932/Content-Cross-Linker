<?php
require_once 'vendor/phpQuery/phpQuery/phpQuery.php';

class ContentCrossLinker
{
    private $terms = [];
    public $text;

    public function __construct($text, $terms)
    {
        $this->text = $text;
        $this->explodeTerms($terms);
    }

    public function replace()
    {
        $this->replaceTerms();
        echo $this->text;
    }

    private function explodeTerms($terms)
    {
        $this->terms = explode(',', $terms);
    }

    private function replaceTerms()
    {
        foreach ($this->terms as $term) {
            $term = explode('|', $term);
            $term[0] = trim($term[0]);
            $re = "/$term[0]\b/mu";
            $this->text = preg_replace($re, "<a href='$term[1]' target='_blank' '>$term[0]</a>", $this->text);
        }
    }

}