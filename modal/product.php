<?php
function DocFile($file)
{
    $data = [];
    if (file_exists($file)) {
        $myfile = fopen($file, "r");
        while (!feof($myfile)) {
            $dong = fgets($myfile);
            if (strlen($dong) > 0) {
                $dong = substr($dong, 0, strlen($dong) - 2);
                // $data[$dong] = $dong;
                $data[] = explode(" ; ", $dong);
            }
        }
    }
    return $data;
}
function GhiFile($file, $sp, $mode)
{
    if (file_exists($file)) {
        $myfile = fopen($file, $mode);
        fwrite($myfile, $sp);
        fclose($myfile);
    }
}

function LuuFile($file, $data)
{
    $content = '';
    foreach ($data as $item) {
        $content .= implode(',', $item) . "\n";
    }
    file_put_contents($file, $content);
}
function Hienthisp($data)
{
    if (isset($data) && is_array($data)) {
        foreach ($data as $index => $sp) {
            $hinh = $sp[0];
            $ten = $sp[1];
            $gia = $sp[2];
            echo '
            <div class="col25">
                <form action="" method="post">
                    <input type="hidden" name="gia" value="' . $gia . '">
                    <input type="hidden" name="ten" value="' . $ten . '">
                    <input type="hidden" name="product_id" value="' . ($index + 1) . '">
                    <input type="hidden" name="hinh" value="' . $hinh . '">
                    <img src="view/layout/asset/img/' . $hinh . '" alt="">
                    <div class="ten">' . $ten . '</div>
                    <div class="gia">' . $gia . ' ₫</div>
                    <div class="row">
                        <input type="number" name="sl" value="1" class="ddinputso">
                        <button type="submit" name="add_to_cart" class="dathang">Add</button>
                    </div>
                </form>
            </div>
            ';
        }
    }
}
function HienthispList($data)
{
    if (isset($data) && is_array($data)) {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        foreach ($data as $sp) {
            $hinh = $sp[0];
            $ten = $sp[1];
            $gia = $sp[2];
            $sl = $sp[3];
            echo '
            <tr>
                <td><img src="view/layout/asset/img/' . $hinh . '" alt=""></td>
                <td>' . $ten . '</td>
                <td>2</td>
                <td>' . $gia . 'đ</td>
                <td>1.030.000 đ</td>
                <td><a href=""><button>x</button></a></td>
            </tr>
            ';
        }
    }
}
function sploai($data, $loai)
{
    $dataloai = [];
    if (isset($data) && is_array($data)) {
        foreach ($data as $sp) {
            if ($sp[3] == $loai) {
                $dataloai[] = $sp;
            }
        }
    }
    return $dataloai;
}
