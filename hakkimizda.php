<?php
global $db;
include 'header.php';

// Belirli veriyi seçme işlemi
$hakkimizdasor = $db->prepare("SELECT * FROM hakkimizda where hakkimizda_id=:id");
$hakkimizdasor->execute(array(
    'id' => 0
));
$hakkimizdacek = $hakkimizdasor->fetch(PDO::FETCH_ASSOC);
?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-wrap">
                    <div class="page-title-inner">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="bigtitle">Hakkımızda Sayfası</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <!-- Main content -->
                <div class="title-bg">
                    <div class="title">Misyonumuz</div>
                </div>
                <blockquote><?php echo $hakkimizdacek['hakkimizda_misyon']; ?></blockquote>
                <div class="title-bg">
                    <div class="title">Vizyonumuz</div>
                </div>
                <blockquote><?php echo $hakkimizdacek['hakkimizda_vizyon']; ?></blockquote>
                <div class="title-bg">
                    <div class="title"><?php echo $hakkimizdacek['hakkimizda_baslik']; ?></div>
                </div>
                <div class="page-content">
                    <p><?php echo $hakkimizdacek['hakkimizda_icerik']; ?></p>
                </div>
            </div>
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="title-bg">
                    <div class="title">Kategoriler</div>
                </div>
                <div class="categorybox">
                    <ul>
                        <?php
                        $kategorisor = $db->prepare("SELECT * FROM kategori ORDER BY kategori_sira ASC");
                        $kategorisor->execute();
                        while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
                            <li><a href="kategori-<?= seo($kategoricek["kategori_ad"]) ?>"><?php echo $kategoricek['kategori_ad'] ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="spacer"></div>
    </div>

<?php include 'footer.php'; ?>