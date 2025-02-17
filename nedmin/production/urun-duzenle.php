<?php
global $db, $ayarcek, $uruncek;
include 'header.php';
include 'fonksiyon.php';

$urunsor = $db->prepare("SELECT * FROM urun where urun_id=:id");
$urunsor->execute(array(
    'id' => $_GET['urun_id']
));

$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
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
                    <br/>
                    <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate
                          class="form-horizontal form-label-left">

                        <!-- Kategori Seçme -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Seç<span
                                        class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <?php
                                $urun_id = $uruncek['kategori_id'];
                                $kategorisor = $db->prepare("select * from kategori where kategori_ust=:kategori_ust order by kategori_sira");
                                $kategorisor->execute(array('kategori_ust' => 0));
                                ?>
                                <select class="select2_multiple form-control" required="" name="kategori_id">
                                    <?php
                                    while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) {
                                        $kategori_id = $kategoricek['kategori_id'];
                                        ?>
                                        <option <?php if ($kategori_id == $urun_id) {
                                            echo "selected='select'";
                                        } ?> value="<?php echo $kategoricek['kategori_id']; ?>"><?php echo $kategoricek['kategori_ad']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <!-- Slider Adı -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sayfa Linki <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="" id="first-name" name="kullanici_tc" disabled=""
                                       value="<?php echo $ayarcek['ayar_url'] ?>/sayfa-<?php echo seo($uruncek['urun_ad']) ?>"
                                       required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <!-- Ürün Adı -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Ad <span
                                        class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="urun_ad"
                                       value="<?php echo $uruncek['urun_ad'] ?>" required="required"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <!-- Slider URL -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="urun_url">Ürün Link
                                <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="urun_url" name="urun_url"
                                       value="<?php echo $uruncek['urun_url']; ?>"
                                       class="form-control">
                            </div>
                        </div>

                        <!-- Ürün Detay (CKEditor) -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Detay <span
                                        class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="ckeditor" id="editor1"
                                          name="urun_detay"><?php echo $uruncek['urun_detay']; ?></textarea>
                            </div>
                        </div>
                        <script type="text/javascript">
                            CKEDITOR.replace('editor1', {
                                filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
                                filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?type=Images',
                                filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?type=Flash',
                                filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                forcePasteAsPlainText: true
                            });
                        </script>

                        <!-- Ürün Fiyat -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Fiyat <span
                                        class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="urun_fiyat"
                                       value="<?php echo $uruncek['urun_fiyat'] ?>"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <!-- Ürün Video -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Video <span
                                        class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="urun_video"
                                       value="<?php echo $uruncek['urun_video'] ?>"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <!-- Ürün Keyword -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Keyword <span
                                        class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="urun_keyword"
                                       value="<?php echo $uruncek['urun_keyword'] ?>" required="required"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <!-- Ürün Stok -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Stok <span
                                        class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="urun_stok"
                                       value="<?php echo $uruncek['urun_stok'] ?>" required="required"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <!-- Ürün Öne Çıkar -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Öne
                                Çıkar<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="heard" class="form-control" name="urun_onecikar" required>
                                    <option value="1" <?php echo $uruncek['urun_onecikar'] == '1' ? 'selected=""' : ''; ?>>
                                        Evet
                                    </option>
                                    <option value="0" <?php echo $uruncek['urun_onecikar'] == '0' ? 'selected=""' : ''; ?>>
                                        Hayır
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!-- Ürün Durum -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Durum<span
                                        class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="heard" class="form-control" name="urun_durum" required>
                                    <option value="1" <?php echo $uruncek['urun_durum'] == '1' ? 'selected=""' : ''; ?>>
                                        Aktif
                                    </option>
                                    <option value="0" <?php echo $uruncek['urun_durum'] == '0' ? 'selected=""' : ''; ?>>
                                        Pasif
                                    </option>
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id'] ?>">

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" name="urunduzenle" class="btn btn-success">Güncelle</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
