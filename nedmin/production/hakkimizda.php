<?php global $db;
include 'header.php';

//Belirli veriyi seçme işlemi
$hakkimizdasor = $db->prepare("SELECT * FROM hakkimizda where hakkimizda_id=:id");
$hakkimizdasor->execute(array(
    'id' => 0
));
$hakkimizdacek = $hakkimizdasor->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Hakkımızda Ayarları <small>
                                <?php if (isset($_GET['durum'])): ?>

                                    <?php if ($_GET['durum'] == "ok"): ?>

                                        <b style="color: green;">İşlem Başarılı...</b>

                                    <?php elseif ($_GET['durum'] == "no"): ?>

                                        <b style="color: red;">İşlem Başarısız...</b>

                                    <?php endif; ?>

                                <?php endif; ?>
                            </small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>

                        <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
                        <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate
                              class="form-horizontal form-label-left">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Başlık <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="hakkimizda_baslik"
                                           value="<?php echo $hakkimizdacek['hakkimizda_baslik']; ?>"
                                           required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <!-- CKEditor Başlangıç -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="hakkimizda_icerik">İçerik<span
                                            class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea class="ckeditor" id="editor1"
                                              name="hakkimizda_icerik"><?php echo $hakkimizdacek['hakkimizda_icerik']; ?></textarea>
                                </div>
                            </div>

                            <!-- CKEditor 5 Script -->
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
                                        {name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar']},
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
                            <!-- CKEditor Bitiş -->

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Video <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="hakkimizda_video"
                                           value="<?php echo $hakkimizdacek['hakkimizda_video']; ?>" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vizyon <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="hakkimizda_vizyon"
                                           value="<?php echo $hakkimizdacek['hakkimizda_vizyon']; ?>"
                                           required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Misyon <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="hakkimizda_misyon"
                                           value="<?php echo $hakkimizdacek['hakkimizda_misyon']; ?>"
                                           required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="hakkimizdakaydet" class="btn btn-success">Güncelle
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
<!-- /page content -->

<?php include 'footer.php'; ?>
