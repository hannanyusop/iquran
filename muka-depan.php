
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <?php include_once ('config/database.php'); ?>
    <?php $title = "SURAH:"; ?>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <meta name="description" content="MagicBook - 3D Responsive FlipBook Creative HTML Template" />
    <meta name="keywords" content="MagicBook, BookBlock, book preview, html5, css3, 3d, perspective, fullscreen" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="author" content="KevinStudio">

    <title><?php echo $title ?></title>

    <!-- FAV and TOUCH ICONS -->
    <link rel="shortcut icon" href="img/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/ico/logo-144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/logo-114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/ico/logo-72.png">
    <link rel="apple-touch-icon-precomposed" href="img/ico/logo-57.png">

    <script src="js/modernizr.custom.38010.js"></script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/html5shiv.js"></script>
    <script type="text/javascript" src="js/selectivizr-min.js"></script>
    <script type="text/javascript" src="js/respond.min.js"></script>
    <![endif]-->

    <!-- FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Alegreya+Sans:400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Marvel' rel='stylesheet' type='text/css'>

    <!-- FONT AWESOME ICONS -->
    <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">

    <!-- STYLES -->
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/bookblock.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.5" />
    <link rel="stylesheet" type="text/css" href="css/bjqs.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="css/perfect-scrollbar-0.4.8.min.css" />

    <link rel="stylesheet" type="text/css" href="css/skins/custom.css" />


</head>

<body>

<div id="main-loading"></div>

<div id="scroll-wrap" class="main">

    <div class="book" data-book="book-1"><!-- Small Book -->
        <a href="#" ><img src="img/necessity/page-corner.png" id="page-corner" alt="corner" /></a>
    </div>

    <div class="intro-wrapper">
        <div class="intro-content">
            <h1>Pendahuluan</h1>
            <div id="aline"></div>
            <p>You can't make an omelet without breaking a few eggs.Honesty is the best policy.</br>Photo Credit: <a target="_blank" href="http://www.flickr.com/photos/nitsckie/7215375068/" > Wesley Nitsckie</a> via <a target="_blank" href="http://www.flickr.com/">Flickr</a> <a href="https://creativecommons.org/licenses/by-sa/2.0/" target="_blank">cc</a></p>
            <button id="open-it" class="btn">Seterusnya</button>
            <button href="index.php" class="btn" onclick="window.location='index.php';">Kembali</button>
        </div>
    </div>

</div><!-- /scroll-wrap -->


<div id="top-perspective" class="effect-moveleft"><!-- Fullscreen BookBlock -->
    <div id="top-wrapper">
        <div class="bb-custom-wrapper" id="book-1">
            <div class="bb-bookblock">
<?php $pageA = 1; $pageB = 2; $limitPageA = 0; $limitPageB = 6; ?>
<?php while($limitPageB < 114 ): ?>
                <div class="bb-item"> <!--page 1~2:start-->

                    <div class="bb-custom-side"> <!--page 1:start-->
                        <div class="content-wrapper">
                            <div class="container">

                                <div class="content-title title-1"><h2>Senarai Surah (m/s: <?php echo $pageA; ?>)</h2></div>

                                <ul class="book-timeline">
                                    <?php

                                        $get_surah = mysqli_query($db,"SELECT * FROM surah LIMIT 6 OFFSET ".$limitPageA);


                                        while ($row = mysqli_fetch_assoc($get_surah))
                                        {
                                            ?>
                                            <li>
                                                <a  href="baca.php?surah=<?php echo $row['malay_title']; ?>" class="time-data"><i class="fa fa-play"></i></a>
                                                <div class="time-dot"></div>
                                                <div class="time-block">
                                                    <h4><?= $row['arabic_title'].'('.$row['malay_title'].')'; ?></h4>
                                                    <h5>Jumlah Ayat:<?= $row['total_text'] ?></h5>
                                                    <h5><?php echo $row['id']."-".$row['tempat_turun']; ?></h5>
                                                </div>
                                            </li>
                                    <?php
                                        }
                                    ?>
                                </ul>

                            </div><!--container 1-->
                        </div><!--content wrapper 1-->
                    </div><!--bb-custom-side page 1:end-->

                    <div class="bb-custom-side">  <!--page 2:start-->
                        <div class="content-wrapper">
                            <div class="container">

                                <div class="content-title title-1"><h2><h2>Senarai Surah (m/s: <?php echo $pageB; ?>)</h2></div>

                                <ul class="book-timeline">
                                    <?php

                                    $get_surah = mysqli_query($db,"SELECT * FROM surah LIMIT 6 OFFSET ".$limitPageB);


                                    while ($row = mysqli_fetch_assoc($get_surah))
                                    {
                                        ?>
                                        <li>
                                            <a  href="baca.php?surah=<?php echo $row['malay_title']; ?>" class="time-data"><i class="fa fa-play"></i></a>
                                            <div class="time-dot"></div>
                                            <div class="time-block">
                                                <h4><?php echo $row['arabic_title'].'('.$row['malay_title'].')'; ?></h4>
                                                <h5>Jumlah Ayat:<?= $row['jumlah_ayat'] ?></h5>
                                                <h5><?php echo $row['id']."-".$row['tempat_turun']; ?></h5>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>

                            </div><!--container 2-->
                        </div><!--content wrapper 2-->
                    </div><!--bb-custom side page 2:end-->

                </div><!--bb-item-page 1~2:end-->
<?php $pageA+=2; $pageB+=2; $limitPageA+=12; $limitPageB+=$limitPageB+6; ?>
<?php endwhile; ?>

            </div><!-- /bb-bookblock -->




        </div><!-- /bb-custom-wrapper -->
    </div><!-- /top-wrapper  -->

    <div id="phone-menu"> <!-- Menu for phone scroll  -->
        <a class="menu-button">"Show Menu"<div></div><div></div><div></div></a>
    </div>

    <div id="menu-wrapper"><!-- Main menu  -->
        <span id="close-tip">back to cover</span>
        <a href="#" id="close-button">×</a>
        <nav class="outer-nav">
            <div id="nav-scroll">
                <a href="#">Resume</a>
                <a href="#">Portfolio</a>
                <a href="#">Blog</a>
                <a href="#">Contact</a>
            </div>
        </nav>
        <span id="menu-copy">&copy; kevin-li.com</span>
    </div><!-- /menu-wrapper  -->

</div><!-- /top-perspective  -->

<!-- Say no to IE 8 ...  -->

<!--[if lt IE 9]>
<div id="say-no-to-ie8"><h3>Sorry, we no longer support your browser anymore :(</h3><h5>Please update it to later version, just like:</h5><span><a target="_blank" href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">Newer IE</a></span>|<span><a target="_blank" href="https://www.mozilla.org/en-US/firefox/new/#">Firefox</a></span>|<span><a target="_blank" href="http://www.opera.com/computer/windows">Opera</a></span>|<span><a target="_blank" href="https://www.google.com/intl/en/chrome/browser/">Chrome</a></span></div>
<![endif]-->

<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script src="js/jquery.bookblock.js"></script>
<script src="js/jquery.placeholder.js"></script>
<script src="js/retina-1.1.0.min.js"></script>
<script src="js/jquery.fancybox.pack.js?v=2.1.5"></script>
<script src="js/jquery.fancybox-media.js?v=1.0.6"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/bjqs-1.3.js"></script>
<script src="js/gmap3.min.js"></script>
<script src="js/jquerypp.custom.js"></script>
<script src="js/perfect-scrollbar-0.4.8.min.js"></script>
<script src="js/jquery.mousewheel.js"></script>
<script src="js/classie.js"></script>
<script src="js/send-mail.js"></script>
<script src="js/script.js"></script>
<script src="js/menu.js"></script>
</body>

</html>