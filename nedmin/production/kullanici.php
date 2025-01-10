<?php
global $db;
include 'header.php';

$kullanicisor = $db->prepare("SELECT * FROM kullanici");
$kullanicisor->execute();
?>

<!-- Page Content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Kullanıcı Listeleme <small>

                                <?php if (isset($_GET['durum'])): ?>
                                    <?php if ($_GET['durum'] == "ok"): ?>
                                        <b style="color: green;">İşlem Başarılı...</b>
                                    <?php elseif ($_GET['durum'] == "no"): ?>
                                        <b style="color: red;">İşlem Başarısız...</b>
                                    <?php endif; ?>
                                <?php endif; ?>

                            </small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a></li>
                                    <li><a href="#">Settings 2</a></li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <!-- User Table -->
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Kayıt Tarih</th>
                                <th>Ad Soyad</th>
                                <th>Mail Adresi</th>
                                <th>Telefon</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php while ($kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC)): ?>
                                <tr>
                                    <td><?php echo $kullanicicek['kullanici_zaman']; ?></td>
                                    <td><?php echo $kullanicicek['kullanici_adsoyad']; ?></td>
                                    <td><?php echo $kullanicicek['kullanici_mail']; ?></td>
                                    <td><?php echo $kullanicicek['kullanici_gsm']; ?></td>
                                    <td style="text-align: center;">
                                        <a href="kullanici-duzenle.php?kullanici_id=
                                        <?php echo $kullanicicek['kullanici_id']; ?>">
                                            <button class="btn btn-primary btn-xs">Düzenle</button>
                                        </a>
                                    </td>
                                    <td style="text-align: center;">
                                        <a href="../netting/islem.php?kullanici_id=
                                        <?php echo $kullanicicek['kullanici_id']; ?>&kullanicisil=ok">
                                            <button class="btn btn-danger btn-xs">Sil</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                            </tbody>
                        </table>
                        <!-- End User Table -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->

<?php include 'footer.php'; ?>
