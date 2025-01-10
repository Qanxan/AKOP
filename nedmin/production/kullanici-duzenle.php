<?php global $kullanicicek;
include 'header.php'; ?>

$kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_id = :id");
$kullanicisor->execute(array(
'id' => $_GET['kullanici_id']
));
$kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <b class="x_title">
                        <h2>Kullanıcı Düzenleme <small>
                                <?php if (isset($_GET['durum'])): ?>
                                    <b style="color: <?= $_GET['durum'] == 'ok' ? 'green' : 'red'; ?>;">
                                        <?= $_GET['durum'] == 'ok' ? 'İşlem Başarılı...' : 'İşlem Başarısız...'; ?>
                                    </b>
                                <?php endif; ?>
                            </small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br/>
                    <form action="../netting/islem.php" method="post" id="demo-form2" data-parsley-validate
                          class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad Soyad <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="kullanici_adsoyad"
                                       value="<?php echo $kullanicicek['kullanici_adsoyad'] ?>" required="required"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ünvan
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="kullanici_unvan"
                                       value="<?php echo $kullanicicek['kullanici_unvan'] ?>" required="required"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Adı
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="kullanici_ad"
                                       value="<?php echo $kullanicicek['kullanici_ad'] ?>" required="required"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="kullanici_mail"
                                       value="<?php echo $kullanicicek['kullanici_mail'] ?>" required="required"
                                       disabled="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">GSM <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="kullanici_gsm"
                                       value="<?php echo $kullanicicek['kullanici_gsm'] ?>" required="required"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" name="kullaniciduzenle" class="btn btn-success">Güncelle</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <hr>
    <hr>
    <hr>


</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
