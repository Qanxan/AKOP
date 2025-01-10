<?php

global $uruncek, $db;
include 'header.php';

// Verinin varlığını kontrol et
if (isset($uruncek) && is_array($uruncek)) {
    $urun_id = $uruncek['kategori_id'];
} else {
    $urun_id = null; // Eğer $uruncek null veya array değilse, varsayılan bir değer
}

// Kategori seçme işlemi
$kategorisor = $db->prepare("SELECT * FROM kategori WHERE kategori_ust=:kategori_ust ORDER BY kategori_sira");
$kategorisor->execute(array(
    'kategori_ust' => 0
));

?>

<!-- Page Content -->
<div class="right_col" role="main">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Ürün Düzenleme <small>,
                            <?php if (isset($_GET['durum'])): ?>
                                <b style="color: <?php echo $_GET['durum'] == 'ok' ? 'green' : 'red'; ?>;">
                                    <?php echo $_GET['durum'] == 'ok' ? 'İşlem Başarılı...' : 'İşlem Başarısız...'; ?>
                                </b>
                            <?php endif; ?>
                        </small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />

                    <!-- Form Başlangıç -->
                    <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                        <!-- Kategori seçme -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Seç<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <select class="select2_multiple form-control" required="" name="kategori_id">
                                    <?php
                                    while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {
                                        $kategori_id = $kategoricek['kategori_id'];
                                        ?>
                                        <option value="<?php echo $kategori_id; ?>" <?php if ($kategori_id == $urun_id) echo 'selected'; ?>>
                                            <?php echo $kategoricek['kategori_ad']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <!-- Resim Seç -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" id="first-name" name="urun_resimyol" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <!-- Ürün Ad -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Ad <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="urun_ad" placeholder="Ürün adını giriniz" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <!-- Ürün Link -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="urun_url">Ürün Link <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="urun_url" name="urun_url" placeholder="Ürün link giriniz" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <!-- Ürün Detay -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Detay <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="ckeditor" id="editor1" name="urun_detay"></textarea>
                            </div>
                        </div>

                        <!-- Ürün Fiyat -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Fiyat <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="urun_fiyat" placeholder="Ürün fiyat giriniz" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <!-- Ürün Video -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Video <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="urun_video" placeholder="Ürün video giriniz" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <!-- Ürün Keyword -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Keyword <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="urun_keyword" placeholder="Ürün keyword giriniz" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <!-- Ürün Stok -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Stok <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="urun_stok" placeholder="Ürün stok giriniz" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <!-- Ürün Durum -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Durum<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="heard" class="form-control" name="urun_durum" required>
                                    <option value="1">Aktif</option>
                                    <option value="0">Pasif</option>
                                </select>
                            </div>
                        </div>

                        <!-- Ürün Öne Çıkar -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Öne Çıkar<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="checkbox" name="urun_onecikar" value="1" /> Evet
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" name="urunekle" class="btn btn-success">Kaydet</button>
                            </div>
                        </div>

                    </form>
                    <!-- Form Bitiş -->

                </div>
            </div>
        </div>
    </div>
    <hr>
    <hr>
    <hr>
</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
