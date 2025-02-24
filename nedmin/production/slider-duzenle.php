<?php global $db, $ayarcek, $slidercek;
include 'header.php';
include 'fonksiyon.php';

// Menu bilgisi veritabanından alınıyor
$slidersor = $db->prepare("SELECT * FROM slider WHERE slider_id = :id");
$slidersor->execute([
    'id' => $_GET['slider_id']
]);
$slidercek = $slidersor->fetch(PDO::FETCH_ASSOC);
?>

    <!-- Sayfa İçeriği -->
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Slider Düzenleme</h2>
                            <small>
                                <?php if (isset($_GET['durum'])): ?>
                                    <b style="color: <?php echo $_GET['durum'] == 'ok' ? 'green' : 'red'; ?>;">
                                        <?php echo $_GET['durum'] == 'ok' ? 'İşlem Başarılı...' : 'İşlem Başarısız...'; ?>
                                    </b>
                                <?php endif; ?>
                            </small>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false">
                                        <i class="fa fa-wrench"></i>
                                    </a>
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
                            <form action="../netting/islem.php" method="post" id="demo-form2" data-parsley-validate
                                  class="form-horizontal form-label-left">

                                <!-- Slider Adı -->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sayfa Linki <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="" id="first-name" name="kullanici_tc" disabled="" value="<?php echo $ayarcek['ayar_url'] ?>/sayfa-<?php echo seo($slidercek['slider_ad']) ?>" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_ad">Slider Ad <span
                                                class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="slider_ad" name="slider_ad"
                                               value="<?php echo $slidercek['slider_ad']; ?>" required class="form-control">
                                    </div>
                                </div>

                                <!-- Slider URL -->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_url">Slider Link
                                        <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="slider_url" name="slider_url"
                                               value="<?php echo $slidercek['slider_url']; ?>"
                                               class="form-control">
                                    </div>
                                </div>

                                <!-- Slider Sıra -->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_sira">Slider Sıra
                                        <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="slider_sira" name="slider_sira"
                                               value="<?php echo $slidercek['slider_sira']; ?>"
                                               class="form-control">
                                    </div>
                                </div>

                                <!-- Slider Durum -->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_durum">Slider Durum
                                        <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="slider_durum" class="form-control" name="slider_durum" required>
                                            <option value="1" <?php echo $slidercek['slider_durum'] == '1' ? 'selected' : ''; ?>>
                                                Aktif
                                            </option>
                                            <option value="0" <?php echo $slidercek['slider_durum'] == '0' ? 'selected' : ''; ?>>
                                                Pasif
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <input type="hidden" name="slider_id" value="<?php echo $slidercek['slider_id']; ?>">

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="sliderduzenle" class="btn btn-success">Güncelle
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>