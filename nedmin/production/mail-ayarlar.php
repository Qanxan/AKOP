<?php global $ayarcek;
include 'header.php'; ?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <b class="x_title">
                        <h2>Mail Ayarlarıı <small>

                                <?php if (isset($_GET['durum'])): ?>

                                    <?php if ($_GET['durum'] == "ok"): ?>

                                        <b style="color: green;">İşlem Başarılı...</b>

                                    <?php elseif ($_GET['durum'] == "no"): ?>

                                        <b style="color: red;">İşlem Başarısız...</b>

                                    <?php endif; ?>

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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Host <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="tel" id="first-name" name="ayar_smtphost"
                                       value="<?php echo $ayarcek['ayar_smtphost'] ?>" required="required"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="tel" id="first-name" name="ayar_smtpuser"
                                       value="<?php echo $ayarcek['ayar_smtpuser'] ?>" required="required"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Şifre <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="ayar_smtppassword"
                                       value="<?php echo $ayarcek['ayar_smtppassword'] ?>" required="required"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Port <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="ayar_smtpport"
                                       value="<?php echo $ayarcek['ayar_smtpport'] ?>" required="required"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" name="mailayarkaydet" class="btn btn-success">Güncelle</button>
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
