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
                        <h2>Sosyal Ayarları <small>

                                <?php if (isset($_GET['durum'])): ?>
                                    <b style="color: <?php echo $_GET['durum'] == 'ok' ? 'green' : 'red'; ?>;">
                                        <?php echo $_GET['durum'] == 'ok' ? 'İşlem Başarılı...' : 'İşlem Başarısız...'; ?>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Facebook <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="tel" id="first-name" name="ayar_facebook"
                                       value="<?php echo $ayarcek['ayar_facebook'] ?>" required="required"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">X (Twitter) <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="tel" id="first-name" name="ayar_x" value="<?php echo $ayarcek['ayar_x'] ?>"
                                       required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Instagram <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="ayar_instagram"
                                       value="<?php echo $ayarcek['ayar_instagram'] ?>" required="required"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">LinkedIn <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="ayar_linkedin"
                                       value="<?php echo $ayarcek['ayar_linkedin'] ?>" required="required"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">TikTok <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="ayar_tiktok"
                                       value="<?php echo $ayarcek['ayar_tiktok'] ?>" required="required"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">YouTube <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="ayar_youtube"
                                       value="<?php echo $ayarcek['ayar_youtube'] ?>" required="required"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" name="sosyalayarkaydet" class="btn btn-success">Güncelle</button>
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
