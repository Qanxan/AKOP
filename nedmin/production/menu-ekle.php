<?php include 'header.php'; ?>

    <!-- Sayfa içeriği başlangıcı -->
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Menü Ekleme</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form action="../netting/islem.php" method="post" id="demo-form2" data-parsley-validate
                                  class="form-horizontal form-label-left">

                                <!-- Menü Adı -->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="menu_ad">Menü Ad <span
                                                class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="menu_ad" name="menu_ad" required="required"
                                               placeholder="Menü adını giriniz" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <!-- Menü Detay (CKEditor) -->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Menü Detay<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea name="menu_detay" id="editor1" class="ckeditor" required></textarea>
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

                                <!-- Menü URL -->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="menu_url">Menü Url
                                        <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="menu_url" name="menu_url" placeholder="Menü url giriniz"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <!-- Menü Sırası -->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="menu_sira">Menü Sıra
                                        <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="menu_sira" name="menu_sira" required="required"
                                               placeholder="Menü sıra giriniz"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <!-- Menü Durumu -->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="menu_durum">Menü Durum
                                        <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="menu_durum" class="form-control" name="menu_durum" required>
                                            <option value="1">Aktif</option>
                                            <option value="0">Pasif</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Form Kaydet Butonu -->
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="menukaydet" class="btn btn-success">Kaydet</button>
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