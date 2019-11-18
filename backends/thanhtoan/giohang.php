
<?php
require_once __DIR__ . '/../../bootstrap.php';
include_once(__DIR__ . '/../../dbconnect.php');
// Kiểm tra dữ liệu trong session
$data = [];
if (isset($_SESSION['giohangdata'])) {
    $data = $_SESSION['giohangdata'];
} else { 
    $data = [];
}
echo $twig->render('frontend/thanhtoan/giohang.html.twig', ['giohangdata' => $data]);

