<?php
function renderCartItems()
{
    $thanhTien = 0;
    $shipping = 0;
    $tong = 0;
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $product_id => $item) {
            echo '<tr>';
            if (isset($item['ten'])) {
                echo '<td>' . $item['ten'] . '</td>';
            } else {
                echo '<td>Không có tên</td>';
            }
            if (isset($item['hinh'])) {
                echo '<td><img src="view/layout/asset/img/' . $item['hinh'] . '" alt=""></td>';
            } else {
                echo '<td><img src="placeholder.jpg" alt=""></td>';
            }
            if (isset($item['soluong'])) {
                echo '<td>' . $item['soluong'] . '</td>';
            } else {
                echo '<td>0</td>';
            }
            if (isset($item['gia'])) {
                echo '<td>' . $item['gia'] . 'đ</td>';
            } else {
                echo '<td>0đ</td>';
            }
            $thanhTienItem = isset($item['soluong']) && isset($item['gia']) ? ($item['soluong'] * $item['gia']) : 0;
            echo '<td>' . $thanhTienItem . 'đ</td>';
            echo '<td><a class="btn btn-danger" href="index.php?page=giohang&action=remove&product_id=' . $product_id . '">Xóa</a></td>';
            echo '</tr>';
            $thanhTien += $thanhTienItem;
        }
        echo '<tr>';
        echo "<td>Tạm tính: </td> ";
        echo '<td colspan="3"></td>';
        echo '<td colspan="2">' . $thanhTien . ' vnđ </td> ';
        echo '</tr>';
        echo '<tr>';
        echo '<td>Giao hàng:  </td>';
        echo '<td colspan="3"></td>';
        echo '<td colspan="2"> ' . ($thanhTien * 0.005) . ' vnđ </td>';
        echo '</tr>';
        $tong = $thanhTien + ($thanhTien * 0.005);
        echo '<tr>';
        echo '<td>Tổng:  </td>';
        echo '<td colspan="3"></td>';
        echo '<td colspan="2"> ' . $tong . ' vnđ </td>';
        echo '</tr>';
    } else {
        echo '<tr><td colspan="6">Giỏ hàng trống</td></tr>';
    }

    return $thanhTien;
}

if (isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
        header('Location: index.php?page=giohang');
        exit;
    }
}
?>


<div class="container">
    <p style="background-color: burlywood; color: white; line-height: 40px; padding-left: 10px;">THÔNG TIN THANH TOÁN
    </p>
    <form action="">
        <label for="">Họ và tên<span style="color: red;">*</span></label><br>
        <input type="text" name="hoten" id="" value="" placeholder="Nhập họ và tên"><br>
        <label for="">Số điện thoại<span style="color: red;">*</span></label><br>
        <input type="text" name="sodt" id="" value="" placeholder="Nhập số điện thoại"><br>
        <label for="">Địa chỉ email<span style="color: red;">*</span></label><br>
        <input type="email" name="email" id="" value="" placeholder="Nhập Email"><br>
        <label for="">Địa chỉ<span style="color: red;">*</span></label><br>
        <input type="text" name="diachi" id="" value="" placeholder="Nhập địa chỉ"><br>
    </form>
    <p style="background-color: burlywood; color: white; line-height: 40px; padding-left: 10px;">THÔNG TIN ĐƠN HÀNG</p>
    <div class="btnCTA">
        <a href="index.php?page=sanpham">Thêm sản phẩm</a>
        <a href="">Xóa toàn bộ giỏ hàng</a>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
            <th>Xóa</th>
        </tr>
        <?php renderCartItems(); ?>
    </table>

</div>