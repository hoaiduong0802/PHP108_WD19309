<?php
$file = 'view/layout/data/data.txt';
$data = DocFile($file);

// Kiểm tra nếu nút "Add" được nhấn và có dữ liệu trong $_POST
if (isset($_POST['add_to_cart']) && !empty($_POST['ten']) && !empty($_POST['gia']) && !empty($_POST['hinh']) && isset($_POST['sl'])) {
    // Lấy thông tin sản phẩm từ $_POST
    $ten = $_POST['ten'];
    $gia = $_POST['gia'];
    $hinh = $_POST['hinh'];
    $soluong = $_POST['sl'];

    // Thêm thông tin sản phẩm vào giỏ hàng (biến phiên $_SESSION['cart'])
    if (isset($_SESSION['cart'])) {
        // Nếu giỏ hàng đã tồn tại, kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        $product_exists = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['ten'] == $ten) { // Kiểm tra tên sản phẩm
                // Nếu sản phẩm đã tồn tại trong giỏ hàng, cộng dồn số lượng
                $item['soluong'] += $soluong;
                $product_exists = true;
                break; // Thoát khỏi vòng lặp
            }
        }
        // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm sản phẩm mới vào giỏ hàng
        if (!$product_exists) {
            $_SESSION['cart'][] = array(
                'ten' => $ten,
                'gia' => $gia,
                'hinh' => $hinh,
                'soluong' => $soluong
            );
        }
    } else {
        // Nếu giỏ hàng chưa tồn tại, thêm sản phẩm vào giỏ hàng
        $_SESSION['cart'][] = array(
            'ten' => $ten,
            'gia' => $gia,
            'hinh' => $hinh,
            'soluong' => $soluong
        );
    }

    // Chuyển hướng người dùng đến trang giohang.php
    header('Location: index.php?page=giohang');
    exit();
}

// Hàm hiển thị sản phẩm

?>

<section>
    <div class="container">
        <div class="row">
            <?php Hienthisp($data); ?>
        </div>
    </div>
</section>