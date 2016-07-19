<?php
ob_start();
include 'php/register.php';
if(isset($_COOKIE['username'])) {
	$user->userData['username'] = $_COOKIE['username'];
	$user->isLogged = true; 
}
if(isset($_POST['logout'])) {
	$user->logout();
	echo '<script>window.location="index.php"</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
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
    <header class="mdl-layout--fixed-header background">
        <div class="mdl-layout__header-row background">
            <div role="button" id="nav-icon1" class="mdl-layout__drawer-button secondary-text-color"
                 onclick="changeClass();addMethodToObf()">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <span class="mdl-layout-title text-primary-color">Sofia Web Tour</span>
            <div class="mdl-layout-spacer">
                <form action="#">
                    <div class="search-pos mdl-textfield mdl-js-textfield mdl-textfield--expandable text-primary-color mdl-textfield--align-left">
                        <div class="mdl-textfield__expandable-holder">
                            <input class="mdl-textfield__input" type="text" name="sample"
                                   id="search-button" placeholder="Search...">
                            <label class="mdl-textfield__label"
                                   for="search-button"></label>
                        </div>
                        <label class="mdl-button mdl-js-button mdl-button--icon" id="search-label"
                               for="search-button">
                            <i class="material-icons">search</i>
                        </label>
                        <div class="mdl-tooltip" for="search-label">
                            Търсене
                        </div>

                    </div>
                </form>
            </div>
            <nav class="mdl-navigation">
             <?php if($user->isLogged()) { ?>
				<span class="mdl-layout__tab text-primary-color">Добре дошли, <?php echo $user->getUserName();?></span>
              <?php    }?>
                <img src="images/icons/day.png" alt="" class="mode_icon" onclick="$('#switch-2').prop('checked',true)">
                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect switch" for="switch-2">
                    <input type="checkbox" id="switch-2" class="mdl-switch__input" onclick="clickToggle()">
                    <span class="mdl-switch__label"></span>
                </label>
                <div class="mdl-tooltip" for="switch-2">Смени език</div>
                <img src="images/icons/night.png" alt="" class="mode_icon"
                     onclick="$('#switch-2').prop('checked',false)">
                <button id="button_language"
                        class="mdl-navigation__link mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                    <i class="material-icons">language</i>
                </button>
                <div class="mdl-tooltip" for="button_language">Смени език</div>
                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-jd-ripple-effect" for="button_language">
                    <li class="mdl-menu__item">BG</li>
                    <li class="mdl-menu__item">EN</li>
                </ul>
                <?php if($user->isLogged()) { ?>
                <form action="<?php $_SERVER["PHP_SELF"];?>" method="post">
					<button type="submit" id="button_exit" name="logout"
	                       value="Click to release" class="mdl-button exit mdl-navigation__link mdl-button mdl-js-button mdl-js-ripple-effect text-primary-color mdl-button--icon">
	                    <i class="material-icons">exit_to_app</i>
	                </button>
                </form>
              <?php    }?>
                <button type="button" id="button_account"
                        class="mdl-button show-login-modal mdl-navigation__link mdl-button mdl-js-button mdl-js-ripple-effect text-primary-color mdl-button--icon">
                    <i class="material-icons">person</i>
                </button>
                <div class="mdl-tooltip" for="button_account">Вход</div>
                <dialog class="mdl-dialog login-form">
                    <main class="mdl-layout__content">
                        <div class="mdl-dialog__content mdl-card mdl-shadow--6dp">
                            <div class="mdl-card__title background mdl-color-text--white">
                                <h2 class="mdl-card__title-text">Sofia Web Tour</h2>
                            </div>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" name="username"/>
                                    <label class="mdl-textfield__label" for="username">Потребителско име</label>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="password" name="userpass"/>
                                    <label class="mdl-textfield__label" for="userpass">Парола</label>
                                </div>
	                            <div class="mdl-dialog__actions mdl-card__actions">
	                                <button type="button" class="mdl-button close mdl-js-button mdl-js-ripple-effect">Затвори</button>
	                              
	                                <input type="submit" name="login" class="show-login-fields mdl-button mdl-js-button mdl-js-ripple-effect"
	                                value="Вход" />
	                            </div>
                            </form>
                        </div>
                    </main>
                </dialog>
                <button type="button" id="button_reg"
                        class="mdl-button show-register-modal mdl-navigation__link mdl-button mdl-js-button mdl-js-ripple-effect text-primary-color mdl-button--icon">
                    <i class="material-icons">person_add</i>
                </button>
                <div class="mdl-tooltip" for="button_reg">Регистрация</div>
                <dialog class="mdl-dialog register-form">
                    <main class="mdl-layout__content">
                        <div class="mdl-dialog__content mdl-card mdl-shadow--6dp">
                            <div class="mdl-card__title background mdl-color-text--white">
                                <h2 class="mdl-card__title-text">Sofia Web Tour</h2>
                            </div>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" name="username" pattern="[A-Z,a-z,0-9,-,_,.]*" />
                                    <label class="mdl-textfield__label" for="username">Потребителско име</label>
                                    <span class="mdl-textfield__error">Само букви, цифри и символите . _ - </span>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="password" name="userpass" id="pass"/>
                                    <label class="mdl-textfield__label" for="userpass">Парола</label>
                                </div>
                                <div id="divconfirm" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input onkeyup="checkPasswordMatch(); return false;" class="mdl-textfield__input" type="password" name="confirmpass" id="confirm"/>
                                    <label class="mdl-textfield__label" for="userpass">Парола повторно</label>
<!--                                     <span class="mdl-textfield__error">Passwords do not match!</span> -->
                                </div>
	                            <div class="mdl-dialog__actions mdl-card__actions">
	                                <input type="button" onclick="return false;" class="mdl-button close mdl-js-button mdl-js-ripple-effect" value="Затвори" />
	                                <input type="submit" name="register" class="show-register-fields mdl-button mdl-js-button mdl-js-ripple-effect"
	                                    value="Регистрация" />
	                            </div>
                            </form>
                        </div>
                    </main>
                </dialog>
                <div class="mdl-tooltip" for="upload_img">Качи снимка</div>
                <dialog class="mdl-dialog upload-form">
                    <main class="mdl-layout__content">
                        <div class="mdl-dialog__content mdl-card mdl-shadow--6dp">
                            <div class="mdl-card__title background mdl-color-text--white">
                                <h2 class="mdl-card__title-text">Sofia Web Tour</h2>
                            </div>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input input-file" type="file" name="image" id="img"/>
                                </div>
                                <div>
                                	<select name="category">
                                		<option selected disabled>Моля изберете обект ... </option>
                                		<?php foreach ($categories as $k=>$category) {
                                			echo '<option value="'.$k.'">'.$category.'</option>';
                                		}?>
                                		
                                	</select>
                                </div>
	                            <div class="mdl-dialog__actions mdl-card__actions">
	                                <button type="button" class="mdl-button close mdl-js-button mdl-js-ripple-effect">Затворете</button>
	                                <input type="submit" name="upload" class="show-register-fields mdl-button mdl-js-button mdl-js-ripple-effect"
	                                    value="Upload" />
	                            </div>
                            </form>
                        </div>
                    </main>
                </dialog>
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Меню</span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="index.php">Начало</a>
            <a class="mdl-navigation__link" href="about.php">За нас</a>
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
<script>
<?php if($user->isLogged()) {?>
document.querySelector("#button_account").style.display = 'none';
document.querySelector("#button_reg").style.display = 'none';

<?php } else {?>
document.querySelector("#button_account").style.display = 'block';
document.querySelector("#button_reg").style.display = 'block';
document.querySelector(".upload-img").style.display = 'none';
<?php }?>
</script>
</body>
</html>
