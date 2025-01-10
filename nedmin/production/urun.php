<?php
global $db;
include 'header.php';

// Belirli veriyi seçme işlemi
$urunsor = $db->prepare("SELECT * FROM urun ORDER BY urun_id DESC");
$urunsor->execute();

?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Ürün Listeleme <small>,
                                <?php if (isset($_GET['durum'])): ?>
                                    <b style="color: <?= $_GET['durum'] == 'ok' ? 'green' : 'red'; ?>;">
                                        <?= $_GET['durum'] == 'ok' ? 'İşlem Başarılı...' : 'İşlem Başarısız...'; ?>
                                    </b>
                                <?php endif; ?>
                            </small></h2>

                        <div class="clearfix"></div>

                        <div align="right">
                            <a href="urun-ekle.php">
                                <button class="btn btn-success btn-xs">Yeni Ekle</button>
                            </a>
                        </div>
                    </div>
                    <div class="x_content">

                        <!-- Div İçerik Başlangıç -->
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Ürün Resmi</th>
                                <th>Ürün Ad</th>
                                <th>Ürün Stok</th>
                                <th>Ürün Fiyat</th>
                                <th>Ürün Durum</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $say = 1; ?>
                            <?php while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)): ?>
                                <tr>
                                    <td><?= $say++; ?></td>
                                    <td><img width="200" src="../../<?= htmlspecialchars($uruncek['urun_resimyol']); ?>"
                                             alt="slider"></td>
                                    <td><?= htmlspecialchars($uruncek['urun_ad']); ?></td>
                                    <td><?= htmlspecialchars($uruncek['urun_url']); ?></td>
                                    <td><?= htmlspecialchars($uruncek['urun_stok']); ?></td>
                                    <td><?= htmlspecialchars($uruncek['urun_fiyat']); ?></td>

                                    <td>
                                        <center>
                                            <?php if ($uruncek['urun_durum'] == 1): ?>
                                                <button class="btn btn-success btn-xs">Aktif</button>
                                            <?php else: ?>
                                                <button class="btn btn-danger btn-xs">Pasif</button>
                                            <?php endif; ?>
                                        </center>
                                    </td>

                                    <td>
                                        <center><a href="urun-duzenle.php?urun_id=<?= $uruncek['urun_id']; ?>">
                                                <button class="btn btn-primary btn-xs">Düzenle</button>
                                            </a></center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="../netting/islem.php?urun_id=<?= $uruncek['urun_id']; ?>&urunsil=ok">
                                                <button class="btn btn-danger btn-xs">Sil</button>
                                            </a></center>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                            </tbody>
                        </table>
                        <!-- Div İçerik Bitişi -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
