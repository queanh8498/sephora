<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/../../bootstrap.php';
// Yêu cầu `Twig` vẽ giao diện được viết trong file `intro.html.twig`
echo $twig->render('frontend/pages/intro.html.twig');