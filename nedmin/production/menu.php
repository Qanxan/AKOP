<?php include 'header.php';
global $db;

// Veritabanından menü bilgilerini çekiyoruz
$menusor = $db->prepare("SELECT * FROM menu");
$menusor->execute();
?>

    <!-- Sayfa İçeriği -->
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Menü Listeleme <small>
                                    <?php if (isset($_GET['durum'])): ?>
                                        <b style="color: <?= $_GET['durum'] == 'ok' ? 'green' : 'red'; ?>;">
                                            <?= $_GET['durum'] == 'ok' ? 'İşlem Başarılı...' : 'İşlem Başarısız...'; ?>
                                        </b>
                                    <?php endif; ?>
                                </small></h2>
                            <div class="clearfix"></div>
                            <div align="right">
                                <a href="menu-ekle.php">
                                    <button class="btn btn-success btn-xs">Yeni Ekle</button>
                                </a>
                            </div>
                        </div>
                        <div class="x_content">
                            <!-- Menü Tablosu -->
                            <table id="datatable-responsive"
                                   class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>S. No</th>
                                    <th>Menü Ad</th>
                                    <th>Menü Url</th>
                                    <th>Menü Sıra</th>
                                    <th>Menü Durum</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $say = 1; ?>
                                <?php while ($menucek = $menusor->fetch(PDO::FETCH_ASSOC)): ?>
                                    <tr>
                                        <td><?= $say++; ?></td>
                                        <td><?= htmlspecialchars($menucek['menu_ad']); ?></td>
                                        <td><?= htmlspecialchars($menucek['menu_url']); ?></td>
                                        <td><?= htmlspecialchars($menucek['menu_sira']); ?></td>
                                        <td style="text-align: center;">
                                            <button class="btn btn-<?= $menucek['menu_durum'] == 1 ? 'success' : 'danger'; ?> btn-xs">
                                                <?= $menucek['menu_durum'] == 1 ? 'Aktif' : 'Pasif'; ?>
                                            </button>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="menu-duzenle.php?menu_id=<?= $menucek['menu_id']; ?>">
                                                <button class="btn btn-primary btn-xs">Düzenle</button>
                                            </a>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="../netting/islem.php?menu_id=<?= $menucek['menu_id']; ?>&menusil=ok"
                                               onclick="return confirm('Bu menüyü silmek istediğinize emin misiniz?');">
                                                <button class="btn btn-danger btn-xs">Sil</button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                                </tbody>
                            </table>
                            <!-- Menü Tablosu Sonu -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Sayfa İçeriği -->

<?php include 'footer.php'; ?>