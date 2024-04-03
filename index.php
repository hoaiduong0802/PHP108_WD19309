<?php
session_start();
include_once 'modal/product.php';

include_once 'view/header.php';
if (isset($_GET['page']) && $_GET['page']) {
    switch ($_GET['page']) {
        case 'sanpham':
            include_once 'view/sanpham.php';
            break;
        case 'giaohang':
            include_once 'sanpham.php';
            break;
        case 'dangky':
            include_once 'view/dangky.php';
            break;
        case 'upload':
            include_once 'view/upload.php';
            break;
        case 'giohang':
            include_once 'view/giohang.php';
            break;
        default:
            include_once 'view/home.php';
            break;
    }
} else {
    include_once 'view/home.php';
}

include_once 'view/footer.php';
?>