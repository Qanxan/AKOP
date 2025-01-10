<?php include 'header.php'; ?>

    <!-- Sayfa içeriği başlangıcı -->
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Slider Ekleme</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form action="../netting/islem.php" method="post" enctype="multipart/form-data"
                                  id="demo-form2" data-parsley-validate
                                  class="form-horizontal form-label-left">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim
                                        Seç<span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="file" id="first-name" name="slider_resimyol"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <!-- Slider Adı -->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_ad">Slider Ad
                                        <span
                                                class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="slider_ad" name="slider_ad" required="required"
                                               placeholder="Slider adını giriniz"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <!-- Slider URL -->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_url">Slider
                                        Link
                                        <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="slider_url" name="slider_url"
                                               placeholder="Slider link giriniz"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <!-- Slider Sırası -->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_sira">Slider
                                        Sıra
                                        <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="slider_sira" name="slider_sira" required="required"
                                               placeholder="Slider sıra giriniz"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <!-- Slider Durumu -->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_durum">Slider
                                        Durum
                                        <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="slider_durum" class="form-control" name="slider_durum" required>
                                            <option value="1">Aktif</option>
                                            <option value="0">Pasif</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Form Kaydet Butonu -->
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" name="sliderkaydet" class="btn btn-success">Kaydet
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