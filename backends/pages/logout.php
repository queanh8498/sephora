<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/../../bootstrap.php';

include_once(__DIR__.'/../../dbconnect.php');

if (isset($_SESSION['username']) ){
    
    unset($_SESSION['username']);
    
    header('location:home.php');
}
    else {
        echo $twig->render('frontend/pages/home.html.twig');
    }
?>