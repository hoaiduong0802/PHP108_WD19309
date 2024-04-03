<?php
$file = 'view/layout/data/data.txt';
$data = DocFile($file);
$datamoi = sploai($data, 'moi');
$datayeu = sploai($data, 'yeu');
?>
<nav>
    <img src="view/layout/asset/img/banner.png" alt="">
</nav>
<section>
    <div class="container">
        <div class="row">
            <h1>Sản Phẩm Mới</h1>
        </div>
        <div class="row">
            <?php Hienthisp($datamoi); ?>
            <!-- <div class="col25">
                <img src="asset/img/moi1.png" alt="">
                <div class="ten">Beloved Summer - Bánh cuộn Trái Cây Nhiệt Đới</div>
                <div class="gia">415.000 đ</div>
            </div>
            <div class="col25"><img src="asset/img/moi2.png" alt="">
                <div class="ten">My Muse - Entremet Ô long Vải Hoa Hồng</div>
                <div class="gia">650.000 đ</div>
            </div>
            <div class="col25"><img src="asset/img/moi3.png" alt="">
                <div class="ten">Sweet Box Tinh Hoa Hội Tụ - Phiên Bản Hồng Đặc Biệt</div>
                <div class="gia">275.000 đ</div>
            </div>
            <div class="col25"><img src="asset/img/moi4.jpg" alt="">
                <div class="ten">Sweet Box Tinh Hoa Hội Tụ - Phiên Bản Đặc Biệt</div>
                <div class="gia">475.000 đ</div>
            </div> -->
        </div>
        <div class="row">
            <h1>Được nhiều khách hàng ưa thích</h1>
        </div>
        <div class="row">
        <?php Hienthisp($datayeu); ?>
            <!-- <div class="col25">
                <img src="asset/img/yeu1.jpeg" alt="">
                <div class="ten">Beloved Summer - Bánh cuộn Trái Cây Nhiệt Đới</div>
                <div class="gia">415.000 đ</div>
            </div>
            <div class="col25"><img src="asset/img/yeu2.jpeg" alt="">
                <div class="ten">My Muse - Entremet Ô long Vải Hoa Hồng</div>
                <div class="gia">650.000 đ</div>
            </div>
            <div class="col25"><img src="asset/img/yeu3.jpeg" alt="">
                <div class="ten">Sweet Box Tinh Hoa Hội Tụ - Phiên Bản Hồng Đặc Biệt</div>
                <div class="gia">275.000 đ</div>
            </div>
            <div class="col25"><img src="asset/img/yeu4.jpg" alt="">
                <div class="ten">Sweet Box Tinh Hoa Hội Tụ - Phiên Bản Đặc Biệt</div>
                <div class="gia">475.000 đ</div>
            </div> -->
        </div>
    </div>

    </div>
</section>