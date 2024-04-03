<?php
// Kiểm tra xem người dùng đã nhấn nút "Upload" chưa
if (isset($_POST["submit"]) && $_POST["submit"]) {
    $targetDir = "view/layout/asset/img/"; // Thư mục lưu trữ file đã tải lên
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]); // Đường dẫn đầy đủ đến file đã tải lên
    $link_sp = (basename($_FILES["fileToUpload"]["name"]));
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION)); // Loại file
    $ten = $_POST['name'];
    $gia = $_POST['gia'];
    $loai = $_POST['loai'];
    $kt = true;
    // Kiểm tra xem file đã tồn tại chưa
    if (file_exists($targetFile)) {
        echo "Xin lỗi, file đã tồn tại.";
        $uploadOk = 0;
    }

    // Kiểm tra kích thước file, giới hạn 1MB
    if ($_FILES["fileToUpload"]["size"] > 1000000) {
        echo "Xin lỗi, file quá lớn.";
        $uploadOk = 0;
    }

    // Chỉ cho phép tải lên các loại file cụ thể, ở đây là chỉ cho phép tải lên file ảnh
    if (
        $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
        && $fileType != "gif"
    ) {
        echo "Xin lỗi, chỉ cho phép tải lên các file ảnh.";
        $uploadOk = 0;
    }

    // Kiểm tra nếu $uploadOk = 0 có nghĩa là có lỗi xảy ra, không cho phép tải lên
    if ($uploadOk == 0) {
        echo "Xin lỗi, file của bạn không được tải lên.";
        // Nếu mọi thứ đều ổn, thử tải lên file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "File " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " đã được tải lên thành công.";
        } else {
            echo "Xin lỗi, có lỗi xảy ra khi tải lên file.";
        }
    }
    //Kiểm tra file Input sản phẩm
    if (empty($loai)) {
        echo 'Nhập loại';
        $kt = false;
    }

    if (empty($gia)) {
        echo 'Nhập giá';
        $kt = false;
    }

    if (empty($ten)) {
        echo 'Nhập tên';
        $kt = false;
    } else {
        $file = "view/layout/data/data.txt";
        $user = DocFile($file);
        if (isset($user) && is_array($user)) {
            for ($i = 0; $i < count($user); $i++) {
                if ($user[$i][1] == $ten) {
                    echo "Sản phẩm đã tồn tại.";
                    $kt = false;
                }
            }
        }
    }

    if ($kt == true) {
        $ch = $link_sp . ' ; ' . $ten . ' ; ' . $gia . ' ; ' . $loai . ' ; ' . "0\n";
        GhiFile($file, $ch, 'a');
    }
}
?>

<div class="container">
    <h2>Upload File</h2>
<form action="index.php?page=upload" method="post" enctype="multipart/form-data">
        <label for="">Tên sản phẩm</label>
        <input type="text" name="name" id=""><br><br>
        <label for="">Đơn giá</label>
        <input type="text" name="gia" id=""><br><br>
        <label for="">Loại</label>
        <input type="text" name="loai" id=""> <br><br>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload" name="submit">
    </form>
</div>