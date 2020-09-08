<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'ContentCrossLinker.php';

    $termins = $_POST['termins'];
    $text = $_POST['text'];

    $ccl = new ContentCrossLinker($text, $termins);
    $ccl->replace();

}



