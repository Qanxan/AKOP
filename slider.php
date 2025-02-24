<?php global $db; ?>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<div class="main-slide">
    <div id="sync1" class="owl-carousel">

        <?php

        $slidersor = $db->prepare("SELECT * FROM slider");
        $slidersor->execute();

        while ($slidercek = $slidersor->fetch(PDO::FETCH_ASSOC)) {

            ?>

            <div class="item">
                <div class="slide-type-1">
                    <a href="<?php echo $slidercek['slider_url'] ?>"><img style="width:1000px; height:500px;"
                                                                          src="<?php echo $slidercek['slider_resimyol'] ?>"
                                                                          alt="" class="img-responsive"></a>
                </div>
            </div>

        <?php } ?>

    </div>
</div>

<!-- Alt Bar (Gizli) -->
<!--
<div class="bar"></div>
<div id="sync2" class="owl-carousel">
    <div class="item">
        <div class="slide-type-1-sync">
            <h3>Stylish Jacket</h3>
            <p>Description here here here</p>
        </div>
    </div>
    <div class="item">
        <div class="slide-type-1-sync">
            <h3>Stylish Jacket</h3>
            <p>Description here here here</p>
        </div>
    </div>
    <div class="item">
        <div class="slide-type-1-sync">
            <h3>Nike Airmax</h3>
            <p>Description here here here</p>
        </div>
    </div>
    <div class="item">
        <div class="slide-type-1-sync">
            <h3>Unique smaragd ring</h3>
            <p>Description here here here</p>
        </div>
    </div>
    <div class="item">
        <div class="slide-type-1-sync">
            <h3>Stylish Jacket</h3>
            <p>Description here here here</p>
        </div>
    </div>
    <div class="item">
        <div class="slide-type-1-sync">
            <h3>Nike Airmax</h3>
            <p>Description here here here</p>
        </div>
    </div>
</div>
-->
