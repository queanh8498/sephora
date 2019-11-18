<?php
require_once __DIR__.'/../../bootstrap.php';

include_once(__DIR__.'/../../dbconnect.php');

echo $twig->render('frontend/pages/home_admin.html.twig', [
]);
?>