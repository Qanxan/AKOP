<?php global $db, $ayarcek, $menucek;
include 'header.php';
include 'fonksiyon.php';

// Menu bilgisi veritabanından alınıyor
$menusor = $db->prepare("SELECT * FROM menu WHERE menu_id = :id");
$menusor->execute([
    'id' => $_GET['menu_id']
]);
$menucek = $menusor->fetch(PDO::FETCH_ASSOC);
?>

    <!-- Sayfa İçeriği -->
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Menü Düzenleme <small>
                                    <?php if (isset($_GET['durum'])): ?>
                                        <b style="color: <?= $_GET['durum'] == 'ok' ? 'green' : 'red'; ?>;">
                                            <?= $_GET['durum'] == 'ok' ? 'İşlem Başarılı...' : 'İşlem Başarısız...'; ?>
                                        </b>
                                    <?php endif; ?>
                                </small></h2>
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

                                <!-- Menü Adı -->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sayfa
                                        Linki <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="" id="first-name" name="kullanici_tc" disabled=""
                                               value="<?php echo $ayarcek['ayar_url'] ?>/sayfa-<?php echo seo($menucek['menu_ad']) ?>"
                                               required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="menu_ad">Menü Ad <span
                                                class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="menu_ad" name="menu_ad"
                                               value="<?php echo $menucek['menu_ad']; ?>" required class="form-control">
                                    </div>
                                </div>

                                <!-- Menü Detay CKEditor -->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="menu_detay">Menü Detay<span
                                                class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea class="ckeditor" id="editor1"
                                                  name="menu_detay"><?php echo $menucek['menu_detay']; ?></textarea>
                                    </div>
                                </div>

                                <script>
                                    CKEDITOR.replace('editor', {
                                        language: 'tr', // Türkçe dil desteği
                                        toolbar: [
                                            {name: 'clipboard', items: ['Undo', 'Redo']},
                                            {name: 'editing', items: ['Find', 'Replace', 'SelectAll']},
                                            {name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike']},
                                            {
                                                name: 'paragraph',
                                                items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
                                            },
                                            {
                                                name: 'insert',
                                                items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar']
                                            },
                                            {name: 'links', items: ['Link', 'Unlink', 'Anchor']},
                                            {name: 'tools', items: ['Maximize', 'ShowBlocks']},
                                            {name: 'document', items: ['Source']}
                                        ],
                                        filebrowserBrowseUrl: 'http://localhost/AKOP/images/',
                                        filebrowserImageBrowseUrl: 'http://localhost/AKOP/images/?type=Images',
                                        filebrowserFlashBrowseUrl: 'http://localhost/AKOP/images/?type=Flash',
                                        filebrowserUploadUrl: 'D:/xampp/htdocs/AKOP',
                                        filebrowserImageUploadUrl: 'D:/xampp/htdocs/AKOP',
                                        filebrowserFlashUploadUrl: 'D:/xampp/htdocs/AKOP',
                                        forcePasteAsPlainText: true
                                    });
                                </script>

                                <!-- Menü URL -->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="menu_url">Menü Url
                                        <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="menu_url" name="menu_url"
                                               value="<?php echo $menucek['menu_url']; ?>"
                                               class="form-control">
                                    </div>
                                </div>

                                <!-- Menü Sıra -->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="menu_sira">Menü Sıra
                                        <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="menu_sira" name="menu_sira"
                                               value="<?php echo $menucek['menu_sira']; ?>" disabled
                                               class="form-control">
                                    </div>
                                </div>

                                <!-- Menü Durum -->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="menu_durum">Menü Durum
                                        <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="menu_durum" class="form-control" name="menu_durum" required>
                                            <option value="1" <?php echo $menucek['menu_durum'] == '1' ? 'selected' : ''; ?>>
                                                Aktif
                                            </option>
                                            <option value="0" <?php echo $menucek['menu_durum'] == '0' ? 'selected' : ''; ?>>
                                                Pasif
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <input type="hidden" name="menu_id" value="<?php echo $menucek['menu_id']; ?>">

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="menuduzenle" class="btn btn-success">Güncelle
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