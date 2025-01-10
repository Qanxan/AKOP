<?php global $db, $uruncek;
include 'header.php'; ?>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<div class="container">
    <div class="clearfix"></div>
    <div class="lines"></div>

    <!-- Slider Gelecek -->
    <?php include 'slider.php'; ?>
</div>

<div class="f-widget featpro">
    <div class="container">
        <div class="title-widget-bg">
            <div class="title-widget">Öne Çıkan Ürünler</div>
            <div class="carousel-nav">
                <a class="prev"></a>
                <a class="next"></a>
            </div>
        </div>
        <div id="product-carousel" class="owl-carousel owl-theme">
            <?php
            // Öne çıkan ürünler sorgusu
            $urunsor = $db->prepare("SELECT * FROM urun WHERE urun_durum = :urun_durum AND urun_onecikar = :urun_onecikar");
            $urunsor->execute(array(
                'urun_durum' => 1,
                'urun_onecikar' => 1
            ));

            if ($urunsor->rowCount() > 0) {
                while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <div class="item">
                        <div class="productwrap">
                            <div class="pr-img">
                                <div class="hot"></div>
                                <a href="<?php echo $uruncek['urun_url'] ?>"><img
                                            src="<?php echo $uruncek['urun_resimyol'] ?>" alt="" class="img-responsive"></a>
                                <div class="pricetag blue">
                                    <div class="inner"><span><?php echo $uruncek['urun_fiyat'] ?> TL</span></div>
                                </div>
                            </div>
                            <span class="smalltitle"><a
                                        href="<?php echo $uruncek['urun_url'] ?>"><?php echo $uruncek['urun_ad'] ?></a></span>
                            <span class="smalldesc">Ürün Kodu: <?php echo $uruncek['urun_id'] ?></span>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<p>Öne çıkan ürün bulunmamaktadır.</p>';
            }
            ?>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="title-bg">
                <div class="title">Ürünler</div>
            </div>
            <div class="row prdct">
                <?php
                // Ürünler sorgusu
                $urunsor = $db->prepare("SELECT * FROM urun WHERE urun_durum = :urun_durum");
                $urunsor->execute(array('urun_durum' => 1));

                if ($urunsor->rowCount() > 0) {
                    while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) {
                        // Fiyat hesaplama
                        $original_price = $uruncek['urun_fiyat'] * 1.5; // Örneğin %50 daha pahalı olan orijinal fiyat
                        ?>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="productwrap">
                                <div class="pr-img">
                                    <a href="urun-<?= seo($uruncek["urun_ad"]) . '-' . $uruncek["urun_id"] ?>"><img
                                                src="<?php echo $uruncek['urun_resimyol'] ?>" alt=""
                                                class="img-responsive"></a>
                                    <div class="pricetag on-sale">
                                        <div class="inner on-sale"><span class="onsale"><span
                                                        class="oldprice"><?php echo $original_price ?> TL</span><?php echo $uruncek['urun_fiyat'] ?> TL</span>
                                        </div>
                                    </div>
                                </div>
                                <span class="smalltitle"><a
                                            href="<?php echo $uruncek['urun_url'] ?>"><?php echo $uruncek['urun_ad'] ?></a></span>
                                <span class="smalldesc">Ürün Kodu: <?php echo $uruncek['urun_id'] ?></span>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<p>Ürün bulunmamaktadır.</p>';
                }
                ?>
            </div>
            <div class="spacer"></div>
        </div>

        <!--Sidebar-->
        <?php include 'sidebar.php'; ?>

    </div>
</div>

<?php include 'footer.php'; ?>
