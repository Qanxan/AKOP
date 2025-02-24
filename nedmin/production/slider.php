<?php include 'header.php';
global $db;

// Veritabanından menü bilgilerini çekiyoruz
$slidersor = $db->prepare("SELECT * FROM slider");
$slidersor->execute();
?>

    <!-- Sayfa İçeriği -->
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Slider Listeleme <small>
                                    <?php if (isset($_GET['durum'])): ?>
                                        <b style="color: <?= $_GET['durum'] == 'ok' ? 'green' : 'red'; ?>;">
                                            <?= $_GET['durum'] == 'ok' ? 'İşlem Başarılı...' : 'İşlem Başarısız...'; ?>
                                        </b>
                                    <?php endif; ?>
                                </small></h2>
                            <div class="clearfix"></div>
                            <div align="right">
                                <a href="slider-ekle.php">
                                    <button class="btn btn-success btn-xs">Yeni Ekle</button>
                                </a>
                            </div>
                        </div>
                        <div class="x_content">
                            <!-- Slider Tablosu -->
                            <table id="datatable-responsive"
                                   class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>S. No</th>
                                    <th>Resim</th>
                                    <th>Slider Ad</th>
                                    <th>Slider Url</th>
                                    <th>Slider Sıra</th>
                                    <th>Slider Durum</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $say = 1; ?>
                                <?php while ($slidercek = $slidersor->fetch(PDO::FETCH_ASSOC)): ?>
                                    <tr>
                                        <td><?= $say++; ?></td>
                                        <td><img width="200"
                                                 src="../../<?= htmlspecialchars($slidercek['slider_resimyol']); ?>"
                                                 alt="slider"></td>
                                        <td><?= htmlspecialchars($slidercek['slider_ad']); ?></td>
                                        <td><?= htmlspecialchars($slidercek['slider_url']); ?></td>
                                        <td><?= htmlspecialchars($slidercek['slider_sira']); ?></td>
                                        <td style="text-align: center;">
                                            <button class="btn btn-<?= $slidercek['slider_durum'] == 1 ? 'success' : 'danger'; ?> btn-xs">
                                                <?= $slidercek['slider_durum'] == 1 ? 'Aktif' : 'Pasif'; ?>
                                            </button>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="slider-duzenle.php?slider_id=<?= $slidercek['slider_id']; ?>">
                                                <button class="btn btn-primary btn-xs">Düzenle</button>
                                            </a>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="../netting/islem.php?slider_id=<?= $slidercek['slider_id']; ?>&slidersil=ok"
                                               onclick="return confirm('Bu menüyü silmek istediğinize emin misiniz?');">
                                                <button class="btn btn-danger btn-xs">Sil</button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                                </tbody>
                            </table>
                            <!-- Slider Tablosu Sonu -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Sayfa İçeriği -->

<?php include 'footer.php'; ?>