
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <?php include_once ('config/database.php'); ?>
    <?php $title = "SURAH:".$_GET['surah']; ?>

    <?php
    //check if surah exist
    if(isset($_GET['surah'])){


        $surah_name = "TIADA";
        $check_surah = "SELECT * FROM DaftarSurat WHERE surat_malaysia='$_GET[surah]'";
        $fetch_surah = mysqli_query($db,$check_surah);

        if ($fetch_surah) {

            $data = mysqli_fetch_assoc($fetch_surah);

            //get total page
            $page =mysqli_num_rows(mysqli_query($db,"SELECT * FROM ArabicQuran WHERE surat='$data[index]'"));
            //divide by 12 because 2 pages contain 12 ayat

            $ttl_page = $page/12;

            //if float, we need add one additional page for surah.
            if(is_float ( $ttl_page)){
                $ttl_page+=1;
            }

            $last_page = (int)$ttl_page;
//            print_r($last_page);
//            die();
            $surah_name = $data['surat_arab'].'('.$data['surat_malaysia'].')';
        }else{

            echo '<script>alert("Surah tidak wujud!");window.location="muka-depan.php"</script>';
        }

    }else{
        echo '<script>alert("Sila Pilih Surah!");window.location="muka-depan.php"</script>';
    }

    ?>

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
<?php while($limitPageB < $last_page ): ?>
                <div class="bb-item"> <!--page 1~2:start-->

                    <div class="bb-custom-side"> <!--page 1:start-->
                        <div class="content-wrapper ps-container">
                            <div class="container">

                                <div class="content-title title-1"><h2><?php echo $title."(".$pageA.")"; ?></h2></div>


                                <?php
                                $get_ayat = mysqli_query($db,"SELECT a.text as ayatArab,b.text as ayatMalay FROM ArabicQuran as a LEFT JOIN MalaysianQuran as b on a.surat = b.surat WHERE a.surat='$data[index]' LIMIT 6 OFFSET ".$limitPageA);


                                while ($row = mysqli_fetch_assoc($get_ayat))
                                {
                                    ?>
                                    <p class="some-intro">
                                    <h4 style="color: black;font-size: 20px"><?php echo $row['ayatArab']; ?></h4>
                                    <small><?php echo $row['ayatMalay']; ?></small>
                                    </p>
                                    <audio controls>
                                        <source src='track/1/surah_al_fatihah.mp3' type='audio/mp3'>
                                        Your browser does not support the audio tag.
                                    </audio>

                                    <div class="content-title title-3"></div>
                                    <?php
                                }
                                ?>

                            </div>
                            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 560px; display: none;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 717px; display: inherit;"><div class="ps-scrollbar-y" style="top: 0px; height: 517px;"></div></div></div>
                    </div><!--bb-custom-side page 1:end-->

                    <div class="bb-custom-side">  <!--page 2:start-->
                        <div class="content-wrapper ps-container">
                            <div class="container">

                                <?php
                                $get_ayat = mysqli_query($db,"SELECT a.text as ayatArab,b.text as ayatMalay FROM ArabicQuran as a LEFT JOIN MalaysianQuran as b on a.surat = b.surat WHERE a.surat='$data[index]' LIMIT 6 OFFSET ".$limitPageB);


                                while ($row = mysqli_fetch_assoc($get_ayat))
                                {
                                    ?>
                                    <p class="some-intro">
                                    <h4 style="color: black;font-size: 20px"><?php echo $row['ayatArab']; ?></h4>
                                    <small><?php echo $row['ayatMalay']; ?></small>
                                    </p>
                                    <button><i class="fa fa-play">Play</i> </button>
                                    <div class="content-title title-3"></div>
                                    <?php
                                }
                                ?>

                            </div><!--container 2-->
                            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 560px; display: none;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 717px; display: inherit;"><div class="ps-scrollbar-y" style="top: 0px; height: 517px;"></div></div></div>
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