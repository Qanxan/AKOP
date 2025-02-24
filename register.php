<?php include 'header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bigtitle">Kullanıcı Kaydı</div>
                            <p>Kullanıcı kayıt işlemlerini aşağıdaki form aracılığıyla gerçekleştirebilirsiniz.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
        <div class="row">
            <div class="col-md-6">
                <div class="title-bg">
                    <div class="title">Kayıt Bilgileri</div>
                </div>

                <!-- Durum Mesajları -->
                <?php if (isset($_GET['durum'])): ?>
                    <div class="alert alert-danger">
                        <strong>Hata!</strong>
                        <?php
                        switch ($_GET['durum']) {
                            case "farklisifre":
                                echo "Girdiğiniz şifreler eşleşmiyor.";
                                break;
                            case "eksiksifre":
                                echo "Şifreniz minimum 6 karakter uzunluğunda olmalıdır.";
                                break;
                            case "mukerrerkayit":
                                echo "Bu kullanıcı daha önce kayıt edilmiş.";
                                break;
                            case "basarisiz":
                                echo "Kayıt yapılamadı. Sistem yöneticisine danışınız.";
                                break;
                            default:
                                echo "Bilinmeyen bir hata oluştu.";
                                break;
                        }
                        ?>
                    </div>
                <?php endif; ?>

                <!-- Kullanıcı Ad ve Soyad -->
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" required name="kullanici_adsoyad"
                               placeholder="Ad ve Soyadınızı Giriniz...">
                    </div>
                </div>

                <!-- Kullanıcı Mail -->
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="email" class="form-control" required name="kullanici_mail"
                               placeholder="Dikkat! Mail adresiniz kullanıcı adınız olacaktır.">
                    </div>
                </div>

                <!-- Şifre Girişi -->
                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="password" class="form-control" required name="kullanici_passwordone"
                               placeholder="Şifrenizi Giriniz...">
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" required name="kullanici_passwordtwo"
                               placeholder="Şifrenizi Tekrar Giriniz...">
                    </div>
                </div>

                <!-- Kayıt Butonu -->
                <button type="submit" name="kullanicikaydet" class="btn btn-default btn-red">Kayıt İşlemini Yap</button>
            </div>

            <!-- Sağ Bölüm -->
            <div class="col-md-6">
                <div class="title-bg">
                    <div class="title">Şifrenizi mi Unuttunuz?</div>
                </div>
                <center>
                    <img width="400"
                         src="https://cdni.iconscout.com/illustration/premium/thumb/forgot-password-illustration-download-in-svg-png-gif-file-formats--lock-pin-security-crime-illustrations-2368063.png"
                         alt="Şifremi Unuttum">
                </center>
            </div>
        </div>
    </form>

    <div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>
