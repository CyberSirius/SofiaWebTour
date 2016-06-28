<?php 
include 'php/register.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sofia Web Tour</title>
    <link rel="stylesheet" href="css/material.css">
    <link rel="stylesheet" href="css/palette.css">
    <link rel="stylesheet" href="css/menu_icon.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/material.js"></script>
    <script src="js/menu_icon_animation.js" type="text/javascript"></script>

    <meta name="description" content="Card Expansion Effect with SVG clipPath"/>
    <meta name="keywords" content="clipPath, svg, effect, layout, expansion, images, grid, polygon"/>
    <meta name="author" content="Claudio Calautti for Codrops"/>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.3.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/demo.css"/>
    <link rel="stylesheet" type="text/css" href="css/card.css"/>
    <link rel="stylesheet" type="text/css" href="css/pattern.css"/>
    <link rel="stylesheet" type="text/css" href="css/dialog-polyfill.css"/>
    <script src="js/dialog-polyfill.js"></script>
    <script src="js/vendors/trianglify.min.js"></script>
    <script src="js/vendors/TweenMax.min.js"></script>
    <script src="js/vendors/ScrollToPlugin.min.js"></script>
    <script src="js/vendors/cash.min.js"></script>
    <script src="js/Card-circle.js"></script>
    <script src="js/demo.js"></script>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script>
        if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
            var root = document.getElementsByTagName('html')[0];
            root.setAttribute('class', 'ff');
        }
    </script>
    <script type="text/javascript">
        function clickFunction(element) {
            element.style.background = "none";
        }
        function clickToggle() {
            var isToggled = document.getElementById("switch-2").checked;

            if (isToggled) {
                $(".background").css("background", "rgb(0,22,43)");
                $(".style-day").each(function () {
                    $(this).removeClass("style-day");
                    $(this).addClass("style-night");
                });
                $("#nav-icon1 span").css("background", "yellow");
                changePicture(false);

            }
            else {
                $(".background").css("background", "teal");
                $(".style-night").each(function () {
                    $(this).removeClass("style-night");
                    $(this).addClass("style-day");
                });
                $("#nav-icon1 span").css("background", "darkorange");
                changePicture(true);
            }
        }
        function changePicture(isDay) {
            if (!isDay) {
                $(".landmark_image").each(function () {
                    var xlink = $(this).attr("xlink:href");
                    xlink = xlink.replace("day", "night");
                    $(this).attr("xlink:href", xlink);

                });
            }
            else {
                $(".landmark_image").each(function () {
                    var xlink = $(this).attr("xlink:href");
                    xlink = xlink.replace("night", "day");
                    $(this).attr("xlink:href", xlink);

                });
            }

        }
    </script>

</head>

<body class="style-day">

<div class="mdl-layout mdl-js-layout" id="layout">
<?php include 'header.php';?> 
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Menu</span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="index.php">Home</a>
            <a class="mdl-navigation__link" href="about.php">About</a>
            <a class="mdl-navigation__link" href="">Link</a>
            <a class="mdl-navigation__link" href="">Link</a>
        </nav>
    </div>
    <div class="container" id="main_container">
        <div class="content">
            <div class="card">
                <div class="card__container">
                    <div class="card__content style-day">
                        <div class="card__caption">
                            <h2 class="card__title">За нас</h2>
                        </div>
                        <div class="card__copy">
                            Имена
                            <ul class="mdl-list">
                                <li class="mdl-list__item style-day">Борислав Динчев</li>
                                <li class="mdl-list__item style-day">Силвена Митева</li>
                                <li class="mdl-list__item style-day">Теодора Василева</li>
                            </ul>
                            Разработка
                            <p>Този прототип е изработен главно със средствата на <b>HTML5</b>, <b>CSS3</b> и <b>JavaScript(jQuery)</b>.
                                За Material Design компонентите е използвана
                                библитеката <b>Material Design Lite (MDL)</b>, създадена и поддържана от Google. За
                                анимациите при отварянето на различни обекти са използвани <b>SVG</b> и
                                <b>Trianglify</b>. </p>
                            Източници
                            <p>Дневни снимки - various sources</p>
                            <p>Нощни снимки - Борислав Динчев</p>
                            <p>Material Design Lite - <a href="https://getmdl.io/">https://getmdl.io</a></p>
                            <p>jQuery - <a href="https://jquery.com/">https://jquery.com</a></p>
                            <p>Trianglify - <a href="http://qrohlf.com/trianglify/">http://qrohlf.com/trianglify</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /content -->

    </div>
</div>
<script src="js/login-dialog.js"></script>
</body>
</html>