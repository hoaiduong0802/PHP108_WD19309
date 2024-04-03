<?php
if (isset($_POST["dangky"]) && $_POST["dangky"]) {
    $ten = $_POST['name'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $passnl = $_POST['passnl'];
    $kt = true;
    if (empty($ten)) {
        echo 'Nhập lại tên';
        $kt = false;
    }
    if (empty($sdt)) {
        echo 'Nhập lại sdt';
        $kt = false;
    }
    if (empty($_POST['email'])) {
        echo 'Nhập lại email';
        $kt = false;
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Nhập chưa đúng định dạng!";
        } else {
            $file = "view/layout/data/user.txt";
            $user = DocFile($file);
            if (isset($user) && is_array($user)) {
                for ($i = 0; $i < count($user); $i++) {
                    if ($user[$i][2] == $email) {
                        echo "Email đã tồn tại, nhập email khác.";
                        $kt = false;
                    }
                }
            }
        }

    }

    //KT Password
    if ($pass != $passnl) {
        echo "Pass không trùng nhau.";
        $kt = false;
    }
    if ($kt == true) {
        $ch = $ten . ' ; ' . $sdt . ' ; ' . $email . ' ; ' . $pass . ' ; ' . "0\n";
        GhiFile($file, $ch, 'a');
    }
}

?>
<section>
    <div class="container">
        <form action="index.php?page=dangky" method="post" style="width:50%; margin: 0 auto;">
            <label for="">User Name</label>
            <input type="text" name="name" id="" value="<?php if(isset($ten)) echo $ten ?>"><br><br>
            <label for="">Số điện thoại</label>
            <input type="text" name="sdt" id="" value="<?php if(isset($sdt)) echo $sdt ?>"><br><br>
            <label for="">Email</label>
            <input type="email" name="email" id="" value="<?php if(isset($email)) echo $email ?>"> <br><br>
            <label for="">Password</label>
            <input type="text" name="pass" id=""><br><br>
            <label for="">Nhập lại Password</label>
            <input type="text" name="passnl" id=""><br><br>

            <input type="submit" value="Đăng ký" name="dangky">
        </form>
    </div>
    </div>
</section>