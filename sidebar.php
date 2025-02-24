<?php global $db; ?>
<div class="col-md-3"><!--sidebar-->
    <div class="title-bg">
        <div class="title">Kategoriler</div>
    </div>

    <div class="categorybox">
        <ul>
            <?php
            $kategorisor = $db->prepare("SELECT * FROM kategori ORDER BY kategori_sira ASC");
            $kategorisor->execute();
            while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
                <li><a href="kategori-<?= seo($kategoricek["kategori_ad"]) ?>"><?php echo $kategoricek['kategori_ad'] ?></a></li>
            <?php } ?>
        </ul>
    </div>

</div><!--sidebar-->
