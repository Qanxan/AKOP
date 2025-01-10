<?php global $db;
ob_start();
session_start();
include 'baglan.php';
include '../production/fonksiyon.php';

if (isset($_POST['kullanicikaydet'])) {


    echo $kullanici_adsoyad = htmlspecialchars($_POST['kullanici_adsoyad']);
    echo "<br>";
    echo $kullanici_mail = htmlspecialchars($_POST['kullanici_mail']);
    echo "<br>";

    echo $kullanici_passwordone = $_POST['kullanici_passwordone'];
    echo "<br>";
    echo $kullanici_passwordtwo = $_POST['kullanici_passwordtwo'];
    echo "<br>";


    if ($kullanici_passwordone == $kullanici_passwordtwo) {


        if ($kullanici_passwordone >= 6) {


// Başlangıç

            $kullanicisor = $db->prepare("select * from kullanici where kullanici_mail=:mail");
            $kullanicisor->execute(array(
                'mail' => $kullanici_mail
            ));

            //dönen satır sayısını belirtir
            $say = $kullanicisor->rowCount();


            if ($say == 0) {

                //md5 fonksiyonu şifreyi md5 şifreli hale getirir.
                $password = md5($kullanici_passwordone);

                $kullanici_yetki = 1;

                //Kullanıcı kayıt işlemi yapılıyor...
                $kullanicikaydet = $db->prepare("INSERT INTO kullanici SET
					kullanici_adsoyad=:kullanici_adsoyad,
					kullanici_mail=:kullanici_mail,
					kullanici_password=:kullanici_password,
					kullanici_yetki=:kullanici_yetki
					");
                $insert = $kullanicikaydet->execute(array(
                    'kullanici_adsoyad' => $kullanici_adsoyad,
                    'kullanici_mail' => $kullanici_mail,
                    'kullanici_password' => $password,
                    'kullanici_yetki' => $kullanici_yetki
                ));

                if ($insert) {


                    header("Location:../../index.php?durum=loginbasarili");


                    //Header("Location:../production/genel-ayarlar.php?durum=ok");

                } else {


                    header("Location:../../register.php?durum=basarisiz");
                }

            } else {

                header("Location:../../register.php?durum=mukerrerkayit");


            }


            // Bitiş


        } else {


            header("Location:../../register.php?durum=eksiksifre");


        }


    } else {


        header("Location:../../register.php?durum=farklisifre");
    }


}

if (isset($_POST['sliderduzenle'])) {
    $slider_id = $_POST['slider_id'];
    $slider_ad = $_POST['slider_ad'];
    $slider_sira = $_POST['slider_sira'];
    $slider_url = $_POST['slider_url'];

    // Eğer yeni resim yüklenmişse, dosyayı işle
    if ($_FILES['slider_resimyol']["size"] > 0) {
        $uploads_dir = '../../dimg/slider';
        $tmp_name = $_FILES['slider_resimyol']["tmp_name"];
        $name = $_FILES['slider_resimyol']["name"];

        // Benzersiz isim oluştur
        $benzersizad = rand(20000, 32000) . rand(20000, 32000) . rand(20000, 32000);
        $refimgyol = substr($uploads_dir, 6) . "/" . $benzersizad . $name;

        move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

        // Eski resmi kaldır
        // Burada eski resmin yolunu almak için veritabanından kontrol edebilirsiniz.
        // örneğin, eski resmin yolunu $eski_resim_yolu'nda tutarak unlink($eski_resim_yolu) ile silebilirsiniz.
    } else {
        // Yeni resim yüklenmemişse mevcut resim yolunu kullan
        $refimgyol = $_POST['eski_resimyol'];
    }

    // Veritabanı güncellemesi
    $ayarkaydet = $db->prepare("UPDATE slider SET
        slider_ad = :slider_ad,
        slider_sira = :slider_sira,
        slider_url = :slider_url,
        slider_resimyol = :slider_resimyol
        WHERE slider_id = :slider_id");

    $update = $ayarkaydet->execute(array(
        'slider_ad' => $slider_ad,
        'slider_sira' => $slider_sira,
        'slider_url' => $slider_url,
        'slider_resimyol' => $refimgyol,
        'slider_id' => $slider_id
    ));

    if ($update) {
        header("Location: ../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");
        exit;
    } else {
        header("Location: ../production/slider-duzenle.php?slider_id=$slider_id&durum=no");
        exit;
    }
}

if ($_GET['slidersil'] == "ok" && isset($_GET['slider_id'])) {
    // Slider id'yi al
    $slider_id = $_GET['slider_id'];

    // İlk önce, silmek için veritabanından slider'ın resim yolunu al
    $kullanicisor = $db->prepare("SELECT slider_resimyol FROM slider WHERE slider_id = :id");
    $kullanicisor->execute(array('id' => $slider_id));
    $slider = $kullanicisor->fetch(PDO::FETCH_ASSOC);

    // Dosya yolu varsa, dosyayı sil
    if ($slider && file_exists("../../dimg/slider/" . $slider['slider_resimyol'])) {
        unlink("../../dimg/slider/" . $slider['slider_resimyol']);
    }

    // Slider'ı veritabanından sil
    $sil = $db->prepare("DELETE FROM slider WHERE slider_id = :id");
    $kontrol = $sil->execute(array('id' => $slider_id));

    if ($kontrol) {
        header("Location: ../production/slider.php?sil=ok");
        exit;
    } else {
        header("Location: ../production/slider.php?sil=no");
        exit;
    }
}

if (isset($_POST['sliderkaydet'])) {


    $uploads_dir = '../../dimg/slider';
    @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
    @$name = $_FILES['slider_resimyol']["name"];
    //resmin isminin benzersiz olması
    $benzersizsayi1 = rand(20000, 32000);
    $benzersizsayi2 = rand(20000, 32000);
    $benzersizsayi3 = rand(20000, 32000);
    $benzersizsayi4 = rand(20000, 32000);
    $benzersizurun = $benzersizsayi1 . $benzersizsayi2 . $benzersizsayi3 . $benzersizsayi4;
    $refimgyol = substr($uploads_dir, 6) . "/" . $benzersizurun . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizurun$name");


    $kaydet = $db->prepare("INSERT INTO slider SET
		slider_ad=:slider_ad,
		slider_sira=:slider_sira,
		slider_url=:slider_url,
		slider_resimyol=:slider_resimyol
		");
    $insert = $kaydet->execute(array(
        'slider_ad' => $_POST['slider_ad'],
        'slider_sira' => $_POST['slider_sira'],
        'slider_url' => $_POST['slider_url'],
        'slider_resimyol' => $refimgyol
    ));

    if ($insert) {

        Header("Location:../production/slider.php?durum=ok");

    } else {

        Header("Location:../production/slider.php?durum=no");
    }

}


if (isset($_POST['logoduzenle'])) {


    $uploads_dir = '../../dimg';

    @$tmp_name = $_FILES['ayar_logo']["tmp_name"];
    @$name = $_FILES['ayar_logo']["name"];

    $benzersizsayi4 = rand(20000, 32000);
    $refimgyol = substr($uploads_dir, 6) . "/" . $benzersizsayi4 . $name;

    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");


    $duzenle = $db->prepare("UPDATE ayar SET
		ayar_logo=:logo
		WHERE ayar_id=0");
    $update = $duzenle->execute(array(
        'logo' => $refimgyol
    ));


    if ($update) {

        $resimsilunlink = $_POST['eski_yol'];
        unlink("../../$resimsilunlink");

        Header("Location:../production/genel-ayar.php?durum=ok");

    } else {

        Header("Location:../production/genel-ayar.php?durum=no");
    }

}


// Örnek Kullanıcı Kaydı
$kullanici_mail = "atakanbiyikoglu@outlook.com";

// Önce aynı mailde kullanıcı var mı kontrol edelim
$kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_mail = :mail");
$kullanicisor->execute(array('mail' => $kullanici_mail));

if ($kullanicisor->rowCount() == 0) {
    $kullanici_password = password_hash("12345678", PASSWORD_DEFAULT);
    $kullanici_yetki = 5; // Admin yetki

    $kaydet = $db->prepare("INSERT INTO kullanici SET
        kullanici_mail = :mail,
        kullanici_password = :password,
        kullanici_yetki = :yetki
    ");

    $insert = $kaydet->execute(array(
        'mail' => $kullanici_mail,
        'password' => $kullanici_password,
        'yetki' => $kullanici_yetki
    ));

    if ($insert) {
        echo "Kullanıcı başarıyla kaydedildi.";
    } else {
        echo "Kayıt sırasında hata oluştu.";
    }
} else {
    echo "Bu e-posta adresi zaten kayıtlı.";
}

if (isset($_POST['admingiris'])) {
    $kullanici_mail = trim($_POST['kullanici_mail']);
    $kullanici_password = trim($_POST['kullanici_password']);

    // Kullanıcı Sorgulama
    $kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_mail = :mail AND kullanici_yetki = :yetki");
    $kullanicisor->execute(array(
        'mail' => $kullanici_mail,
        'yetki' => 5 // Yalnızca admin kullanıcıları için
    ));

    $kullanici = $kullanicisor->fetch(PDO::FETCH_ASSOC);

    if ($kullanici) {
        // Şifre Doğrulama
        if (password_verify($kullanici_password, $kullanici['kullanici_password'])) {
            // Giriş Başarılı
            $_SESSION['kullanici_mail'] = $kullanici_mail;
            header("Location:../production/index.php");
            exit;
        } else {
            // Şifre Hatalı
            header("Location:../production/login.php?durum=sifre_hata");
            exit;
        }
    } else {
        // Kullanıcı Bulunamadı
        header("Location:../production/login.php?durum=kullanici_bulunamadi");
        exit;
    }
}

if (isset($_GET['durum'])) {
    if ($_GET['durum'] == "sifre_hata") {
        echo "<p style='color:red;'>Şifre hatalı!</p>";
    } elseif ($_GET['durum'] == "kullanici_bulunamadi") {
        echo "<p style='color:red;'>Kullanıcı bulunamadı!</p>";
    }
}

if (isset($_POST['kullanicigiris'])) {


    echo $kullanici_mail = htmlspecialchars($_POST['kullanici_mail']);
    echo $kullanici_password = md5($_POST['kullanici_password']);


    $kullanicisor = $db->prepare("select * from kullanici where kullanici_mail=:mail and kullanici_yetki=:yetki and kullanici_password=:password and kullanici_durum=:durum");
    $kullanicisor->execute(array(
        'mail' => $kullanici_mail,
        'yetki' => 1,
        'password' => $kullanici_password,
        'durum' => 1
    ));


    $say = $kullanicisor->rowCount();


    if ($say == 1) {

        echo $_SESSION['userkullanici_mail'] = $kullanici_mail;

        header("Location:../../");
        exit;


    } else {


        header("Location:../../?durum=basarisizgiris");

    }


}

if (isset($_POST['genelayarkaydet'])) {

    //tablo güncelleme işlemi kodları...
    $ayarkaydet = $db->prepare("UPDATE ayar SET
    
        ayar_title=:ayar_title,
        ayar_description=:ayar_description,
        ayar_keywords=:ayar_keywords,
        ayar_author=:ayar_author
        WHERE ayar_id=0");

    $update = $ayarkaydet->execute(array(
        'ayar_title' => $_POST['ayar_title'],
        'ayar_description' => $_POST['ayar_description'],
        'ayar_keywords' => $_POST['ayar_keywords'],
        'ayar_author' => $_POST['ayar_author']
    ));

    if ($update) {
        header("Location:../production/genel-ayar.php?durum=ok");
    } else {
        header("Location:../production/genel-ayar.php?durum=no");
    }

}


if (isset($_POST['iletisimayarkaydet'])) {

    //tablo güncelleme işlemi kodları...
    $ayarkaydet = $db->prepare("UPDATE ayar SET
    
        ayar_tel=:ayar_tel,
        ayar_gsm=:ayar_gsm,
        ayar_faks=:ayar_faks,
        ayar_mail=:ayar_mail,
        ayar_ilce=:ayar_ilce,
        ayar_il=:ayar_il,
        ayar_adres=:ayar_adres,
        ayar_mesai=:ayar_mesai
        WHERE ayar_id=0");

    $update = $ayarkaydet->execute(array(
        'ayar_tel' => $_POST['ayar_tel'],
        'ayar_gsm' => $_POST['ayar_gsm'],
        'ayar_faks' => $_POST['ayar_faks'],
        'ayar_mail' => $_POST['ayar_mail'],
        'ayar_ilce' => $_POST['ayar_ilce'],
        'ayar_il' => $_POST['ayar_il'],
        'ayar_adres' => $_POST['ayar_adres'],
        'ayar_mesai' => $_POST['ayar_mesai']
    ));

    if ($update) {
        header("Location:../production/iletisim-ayarlar.php?durum=ok");
    } else {
        header("Location:../production/iletisim-ayarlar.php?durum=no");
    }

}


if (isset($_POST['apiayarkaydet'])) {

    //tablo güncelleme işlemi kodları...
    $ayarkaydet = $db->prepare("UPDATE ayar SET
    
        ayar_maps=:ayar_maps,
        ayar_analytics=:ayar_analytics,
        ayar_zopim=:ayar_zopim
        WHERE ayar_id=0");

    $update = $ayarkaydet->execute(array(
        'ayar_maps' => $_POST['ayar_maps'],
        'ayar_analytics' => $_POST['ayar_analytics'],
        'ayar_zopim' => $_POST['ayar_zopim']
    ));

    if ($update) {
        header("Location:../production/api-ayarlar.php?durum=ok");
    } else {
        header("Location:../production/api-ayarlar.php?durum=no");
    }

}


if (isset($_POST['sosyalayarkaydet'])) {

    //tablo güncelleme işlemi kodları...
    $ayarkaydet = $db->prepare("UPDATE ayar SET
    
        ayar_facebook=:ayar_facebook,
        ayar_x=:ayar_x,
        ayar_instagram=:ayar_instagram,
        ayar_linkedin=:ayar_linkedin,
        ayar_tiktok=:ayar_tiktok,
        ayar_youtube=:ayar_youtube
        WHERE ayar_id=0");

    $update = $ayarkaydet->execute(array(
        'ayar_facebook' => $_POST['ayar_facebook'],
        'ayar_x' => $_POST['ayar_x'],
        'ayar_instagram' => $_POST['ayar_instagram'],
        'ayar_linkedin' => $_POST['ayar_linkedin'],
        'ayar_tiktok' => $_POST['ayar_tiktok'],
        'ayar_youtube' => $_POST['ayar_youtube']
    ));

    if ($update) {
        header("Location:../production/sosyal-ayarlar.php?durum=ok");
    } else {
        header("Location:../production/sosyal-ayarlar.php?durum=no");
    }

}


if (isset($_POST['mailayarkaydet'])) {

    //tablo güncelleme işlemi kodları...
    $ayarkaydet = $db->prepare("UPDATE ayar SET
    
        ayar_smtphost=:ayar_smtphost,
        ayar_smtpuser=:ayar_smtpuser,
        ayar_smtppassword=:ayar_smtppassword,
        ayar_smtpport=:ayar_smtpport
        WHERE ayar_id=0");

    $update = $ayarkaydet->execute(array(
        'ayar_smtphost' => $_POST['ayar_smtphost'],
        'ayar_smtpuser' => $_POST['ayar_smtpuser'],
        'ayar_smtppassword' => $_POST['ayar_smtppassword'],
        'ayar_smtpport' => $_POST['ayar_smtpport']
    ));

    if ($update) {
        header("Location:../production/mail-ayarlar.php?durum=ok");
    } else {
        header("Location:../production/mail-ayarlar.php?durum=no");
    }

}


if (isset($_POST['hakkimizdakaydet'])) {

    //tablo güncelleme işlemi kodları...
    $hakkimizdakaydet = $db->prepare("UPDATE hakkimizda SET
    
        hakkimizda_baslik=:hakkimizda_baslik,
        hakkimizda_icerik=:hakkimizda_icerik,
        hakkimizda_video=:hakkimizda_video,
        hakkimizda_vizyon=:hakkimizda_vizyon,
        hakkimizda_misyon=:hakkimizda_misyon
        WHERE hakkimizda_id=0");

    $update = $hakkimizdakaydet->execute(array(
        'hakkimizda_baslik' => $_POST['hakkimizda_baslik'],
        'hakkimizda_icerik' => $_POST['hakkimizda_icerik'],
        'hakkimizda_video' => $_POST['hakkimizda_video'],
        'hakkimizda_vizyon' => $_POST['hakkimizda_vizyon'],
        'hakkimizda_misyon' => $_POST['hakkimizda_misyon']
    ));

    if ($update) {
        header("Location:../production/hakkimizda.php?durum=ok");
    } else {
        header("Location:../production/hakkimizda.php?durum=no");
    }

}


if (isset($_POST['kullaniciduzenle'])) {
    $kullanici_id = $_POST['kullanici_id'];

    $ayarkaydet = $db->prepare("UPDATE kullanici SET
        kullanici_adsoyad = :kullanici_adsoyad,
        kullanici_unvan = :kullanici_unvan,
        kullanici_ad = :kullanici_ad,
        kullanici_mail = :kullanici_mail,
        kullanici_gsm = :kullanici_gsm
        WHERE kullanici_id= {$_POST['kullanici_id']}");

    $update = $ayarkaydet->execute(array(
        'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
        'kullanici_unvan' => $_POST['kullanici_unvan'],
        'kullanici_ad' => $_POST['kullanici_ad'],
        'kullanici_mail' => $_POST['kullanici_mail'],
        'kullanici_gsm' => $_POST['kullanici_gsm']
    ));

    if ($update) {
        Header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");
    } else {
        Header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
    }

}


if ($_GET['kullanicisil'] == "ok") {
    $sil = $db->prepare("DELETE FROM kullanici WHERE kullanici_id=:id");
    $kontrol = $sil->execute(array(
        'id' => $_GET['kullanici_id']
    ));

    if ($kontrol) {
        header("Location:../production/kullanici.php?sil=ok");
    } else {
        header("Location:../production/kullanici.php?sil=no");
    }

}


if (isset($_POST['menuduzenle'])) {

    $menu_id = $_POST['menu_id'];

    $menu_seourl = seo($_POST['menu_ad']);


    $ayarkaydet = $db->prepare("UPDATE menu SET
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum
		WHERE menu_id={$_POST['menu_id']}");

    $update = $ayarkaydet->execute(array(
        'menu_ad' => $_POST['menu_ad'],
        'menu_detay' => $_POST['menu_detay'],
        'menu_url' => $_POST['menu_url'],
        'menu_sira' => $_POST['menu_sira'],
        'menu_seourl' => $menu_seourl,
        'menu_durum' => $_POST['menu_durum']
    ));


    if ($update) {

        Header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=ok");

    } else {

        Header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=no");
    }

}


if ($_GET['menusil'] == "ok") {

    $sil = $db->prepare("DELETE from menu where menu_id=:id");
    $kontrol = $sil->execute(array(
        'id' => $_GET['menu_id']
    ));


    if ($kontrol) {


        header("location:../production/menu.php?sil=ok");


    } else {

        header("location:../production/menu.php?sil=no");

    }


}


if (isset($_POST['menukaydet'])) {


    $menu_seourl = seo($_POST['menu_ad']);


    $ayarekle = $db->prepare("INSERT INTO menu SET
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum
		");

    $insert = $ayarekle->execute(array(
        'menu_ad' => $_POST['menu_ad'],
        'menu_detay' => $_POST['menu_detay'],
        'menu_url' => $_POST['menu_url'],
        'menu_sira' => $_POST['menu_sira'],
        'menu_seourl' => $menu_seourl,
        'menu_durum' => $_POST['menu_durum']
    ));


    if ($insert) {

        Header("Location:../production/menu.php?durum=ok");

    } else {

        Header("Location:../production/menu.php?durum=no");
    }

}

if (isset($_POST['kategoriduzenle'])) {

    $kategori_id=$_POST['kategori_id'];
    $kategori_seourl=seo($_POST['kategori_ad']);


    $kaydet=$db->prepare("UPDATE kategori SET
		kategori_ad=:ad,
		kategori_durum=:kategori_durum,	
		kategori_seourl=:seourl,
		kategori_sira=:sira
		WHERE kategori_id={$_POST['kategori_id']}");
    $update=$kaydet->execute(array(
        'ad' => $_POST['kategori_ad'],
        'kategori_durum' => $_POST['kategori_durum'],
        'seourl' => $kategori_seourl,
        'sira' => $_POST['kategori_sira']
    ));

    if ($update) {

        Header("Location:../production/kategori-duzenle.php?durum=ok&kategori_id=$kategori_id");

    } else {

        Header("Location:../production/kategori-duzenle.php?durum=no&kategori_id=$kategori_id");
    }

}


if (isset($_POST['kategoriekle'])) {

    $kategori_seourl=seo($_POST['kategori_ad']);

    $kaydet=$db->prepare("INSERT INTO kategori SET
		kategori_ad=:ad,
		kategori_durum=:kategori_durum,	
		kategori_seourl=:seourl,
		kategori_sira=:sira
		");
    $insert=$kaydet->execute(array(
        'ad' => $_POST['kategori_ad'],
        'kategori_durum' => $_POST['kategori_durum'],
        'seourl' => $kategori_seourl,
        'sira' => $_POST['kategori_sira']
    ));

    if ($insert) {

        Header("Location:../production/kategori.php?durum=ok");

    } else {

        Header("Location:../production/kategori.php?durum=no");
    }

}



if ($_GET['kategorisil']=="ok") {

    $sil=$db->prepare("DELETE from kategori where kategori_id=:kategori_id");
    $kontrol=$sil->execute(array(
        'kategori_id' => $_GET['kategori_id']
    ));

    if ($kontrol) {

        Header("Location:../production/kategori.php?durum=ok");

    } else {

        Header("Location:../production/kategori.php?durum=no");
    }

}

if (isset($_POST['urunekle'])) {
    // SEO uyumlu URL oluşturulması
    $urun_seourl = seo($_POST['urun_ad']);
    $uploads_dir = '../../dimg/urun';  // Fotoğrafların kaydedileceği klasör
    $tmp_name = $_FILES['urun_resimyol']["tmp_name"];
    $name = $_FILES['urun_resimyol']["name"];

    // Benzersiz bir isim oluşturulacak (resmin ismi çakışmasın)
    $benzersizurun = rand(20000, 32000) . rand(20000, 32000);
    $refimgyol = substr($uploads_dir, 6) . "/" . $benzersizurun . $name;

    // Fotoğraf yüklendiğinde dosya move işlemi
    if ($_FILES['urun_resimyol']["size"] > 0) {
        // Dosya taşınacak ve kaydedilecek
        move_uploaded_file($tmp_name, "$uploads_dir/$benzersizurun$name");
    }

    // Veritabanına yeni ürünü ekleme
    $kaydet = $db->prepare("INSERT INTO urun SET
        kategori_id = :kategori_id,
        urun_ad = :urun_ad,
        urun_detay = :urun_detay,
        urun_fiyat = :urun_fiyat,
        urun_video = :urun_video,
        urun_onecikar = :urun_onecikar,
        urun_keyword = :urun_keyword,
        urun_durum = :urun_durum,
        urun_stok = :urun_stok,
        urun_url = :urun_url,
        urun_seourl = :seourl,
        urun_resimyol = :urun_resimyol");

    $insert = $kaydet->execute(array(
        'kategori_id' => $_POST['kategori_id'],
        'urun_ad' => $_POST['urun_ad'],
        'urun_detay' => $_POST['urun_detay'],
        'urun_fiyat' => $_POST['urun_fiyat'],
        'urun_video' => isset($_POST['urun_video']) ? $_POST['urun_video'] : '',
        'urun_onecikar' => isset($_POST['urun_onecikar']) ? $_POST['urun_onecikar'] : '',
        'urun_keyword' => isset($_POST['urun_keyword']) ? $_POST['urun_keyword'] : '',
        'urun_durum' => $_POST['urun_durum'],
        'urun_stok' => $_POST['urun_stok'],
        'urun_url' => $_POST['urun_url'],
        'seourl' => $urun_seourl,
        'urun_resimyol' => $refimgyol  // Fotoğraf yolu burada kaydediliyor
    ));

    if ($insert) {
        // Başarılı işlem sonrası yönlendirme
        header("Location: ../production/urun.php?durum=ok");
        exit;
    } else {
        // Hata durumu
        header("Location: ../production/urun.php?durum=no");
        exit;
    }
}


// Ürün Güncelleme
if (isset($_POST['urunduzenle'])) {
    $urun_id = $_POST['urun_id'];
    $urun_ad = $_POST['urun_ad'];
    $urun_seourl = seo($_POST['urun_ad']);
    $urun_url = $_POST['urun_url'];

    // Yeni resim yüklenmişse, dosyayı işle
    if ($_FILES['urun_resimyol']["size"] > 0) {
        $uploads_dir = '../../dimg/urun';
        $tmp_name = $_FILES['urun_resimyol']["tmp_name"];
        $name = $_FILES['urun_resimyol']["name"];

        // Benzersiz isim oluştur
        $benzersizurun = rand(20000, 32000) . rand(20000, 32000) . rand(20000, 32000);
        $refimgyol = substr($uploads_dir, 6) . "/" . $benzersizurun . $name;

        move_uploaded_file($tmp_name, "$uploads_dir/$benzersizurun$name");

        // Eski resmi kaldır
        if (isset($_POST['eski_resimyol']) && file_exists("../../" . $_POST['eski_resimyol'])) {
            unlink("../../" . $_POST['eski_resimyol']);
        }
    } else {
        // Yeni resim yüklenmemişse mevcut resim yolunu kullan
        $refimgyol = $_POST['eski_resimyol'];
    }

    // Veritabanı güncellemesi
    $kaydet = $db->prepare("UPDATE urun SET
        kategori_id = :kategori_id,
        urun_ad = :urun_ad,
        urun_detay = :urun_detay,
        urun_fiyat = :urun_fiyat,
        urun_video = :urun_video,
        urun_onecikar = :urun_onecikar,
        urun_keyword = :urun_keyword,
        urun_durum = :urun_durum,
        urun_stok = :urun_stok,
        urun_url = :urun_url,
        urun_seourl = :seourl,
        urun_resimyol = :urun_resimyol
        WHERE urun_id = :urun_id");

    $update = $kaydet->execute(array(
        'kategori_id' => $_POST['kategori_id'],
        'urun_ad' => $urun_ad,
        'urun_detay' => $_POST['urun_detay'],
        'urun_fiyat' => $_POST['urun_fiyat'],
        'urun_video' => $_POST['urun_video'],
        'urun_onecikar' => $_POST['urun_onecikar'],
        'urun_keyword' => $_POST['urun_keyword'],
        'urun_durum' => $_POST['urun_durum'],
        'urun_stok' => $_POST['urun_stok'],
        'urun_url' => $urun_url,
        'seourl' => $urun_seourl,
        'urun_resimyol' => $refimgyol,
        'urun_id' => $urun_id
    ));

    if ($update) {
        header("Location: ../production/urun-duzenle.php?durum=ok&urun_id=$urun_id");
        exit;
    } else {
        header("Location: ../production/urun-duzenle.php?durum=no&urun_id=$urun_id");
        exit;
    }
}


// Ürün Silme
if (isset($_GET['urunsil']) && $_GET['urunsil'] == "ok" && isset($_GET['urun_id'])) {
    $urun_id = $_GET['urun_id'];

    // Resim yolunu bul ve dosyayı sil
    $resimsor = $db->prepare("SELECT urun_resimyol FROM urun WHERE urun_id = :id");
    $resimsor->execute(array('id' => $urun_id));
    $urun = $resimsor->fetch(PDO::FETCH_ASSOC);

    if ($urun && file_exists("../../" . $urun['urun_resimyol'])) {
        unlink("../../" . $urun['urun_resimyol']);
    }

    // Ürünü sil
    $sil = $db->prepare("DELETE FROM urun WHERE urun_id = :id");
    $sil->execute(array('id' => $urun_id));

    if ($sil) {
        header("Location: ../production/urun.php?durum=ok");
        exit;
    } else {
        header("Location: ../production/urun.php?durum=no");
        exit;
    }
}



?>