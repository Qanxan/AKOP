<?php global $db;
include 'header.php';

$say = 0; // $say değişkenini burada tanımlıyoruz

if (isset($_GET['sef'])) {

    $kategorisor = $db->prepare("SELECT * FROM kategori where kategori_seourl=:seourl");
    $kategorisor->execute(array(
        'seourl' => $_GET['sef']
    ));

    if ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) {
        $kategori_id = $kategoricek['kategori_id'];

        $urunsor = $db->prepare("SELECT * FROM urun where kategori_id=:kategori_id order by urun_id DESC");
        $urunsor->execute(array(
            'kategori_id' => $kategori_id
        ));

        $say = $urunsor->rowCount(); // Ürün sayısını buradan alıyoruz
    }

} else {
    $urunsor = $db->prepare("SELECT * FROM urun order by urun_id DESC");
    $urunsor->execute();
    $say = $urunsor->rowCount(); // Genel ürün sayısı
}

?>

<div class="container">
    <div class="clearfix"></div>
    <div class="lines"></div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-9"><!--Main content-->
            <div class="title-bg">
                <div class="title">Ürünler</div>
                <div class="title-nav">
                    <a href="javascripti:void(0);"><i class="fa fa-th-large"></i>grid</a>
                    <a href="javascripti:void(0);"><i class="fa fa-bars"></i>List</a>
                </div>
            </div>
            <div class="row prdct"><!--Products-->

                <?php
                if ($say == 0) {
                    echo "Bu kategoride ürün bulunamadı";
                }

                while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <div class="col-md-4">
                        <div class="productwrap">
                            <div class="pr-img">
                                <div class="hot"></div>
                                <a href="urun-<?= seo($uruncek["urun_ad"]).'-'.$uruncek["urun_id"] ?>"><img
                                            src="<?php echo $uruncek['urun_resimyol'] ?>" alt="" class="img-responsive"></a>
                                <div class="pricetag on-sale">
                                    <div class="inner on-sale"><span class="onsale"><span
                                                    class="oldprice"><?php echo $uruncek['urun_fiyat'] * 1.5 ?> TL</span><?php echo $uruncek['urun_fiyat'] ?> TL</span>
                                    </div>
                                </div>
                            </div>
                            <span class="smalltitle"><a
                                        href="<?php echo $uruncek['urun_url'] ?>"><?php echo $uruncek['urun_ad'] ?></a></span>
                            <span class="smalldesc">Ürün Kodu.: <?php echo $uruncek['urun_id'] ?></span>
                        </div>
                    </div>
                <?php } ?>

            </div><!--Products-->

        </div>
        <?php include 'sidebar.php'; ?>
    </div>
    <div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>
