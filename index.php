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
	                                    value="Качи" />
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
            <div class="pattern pattern--hidden"></div>
            <div class="wrapper">
                <div class="card">
                    <div class="card__container card__container--closed" onclick="clickFunction(this)">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" class="card__image"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 500"
                             preserveAspectRatio="xMidYMid slice">
                            <defs>
                                <clipPath id="clipPath1">
                                    <circle class="clip" cx="960" cy="250" r="992"></circle>
                                </clipPath>
                            </defs>
                            <image clip-path="url(#clipPath1)" width="1920" height="500"
                                   xlink:href="images/day/ndk.jpg" class="landmark_image"></image>
                        </svg>
                        <div class="card__content style-day">
                            <i class="card__btn-close fa fa-times"></i>
                            <div class="card__caption">
                                <button class="upload-img show-upload-modal mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-js-ripple-effect add-fab">
                                    <i class="material-icons">add</i>
                                </button>
                                <h2 class="card__title">Национален дворец на културата</h2>
                                <p class="card__subtitle">Сърцето на София</p>

                            </div>
                            <div class="card__copy">
                                <div class="meta">
                                    <iframe width="500" height="350" frameborder="0" scrolling="no" marginheight="0"
                                            marginwidth="0"
                                            src="http://maps.google.ca/maps?f=q&amp;q=НДК&amp;output=embed"></iframe>
                                    <br/>
                                </div>
                                <p>Националният дворец на културата, известен и с краткото НДК (наименование до 1990 г.
                                    – Народен дворец на културата „Людмила Живкова“, на името на Людмила Живкова, която
                                    дава идеята за създаването му), е национален културен център за конференции,
                                    изложби и специални събития, най-големият конгресен център в Югоизточна Европа.
                                    Предназначението на сградата, която разполага с 13 зали и се намира в центъра на
                                    София, е да се използва за културни прояви.
                                </p>
                                <p> Строежът на НДК е част от инициативите през 1981 г. за отбелязването на 1300 години
                                    от
                                    създаването на българската държава.</p>
                                <p>
                                    Архитектурният проект на основната сграда е дело на колектив с ръководител арх.
                                    Александър Баров, а оформлението на околното пространство е по идея на колектив
                                    начело с арх. Атанас Агура. Главен проектант на парка към НДК е инж. (ландшафтен
                                    архитект) Валентина Атанасова.
                                </p>
                                <p>Най-голямата зала („Зала 1“) разполага с 3380 места. Сградата е разположена на 123
                                    000 m² площ, разгърната на 8 етажа и 3 подземни нива. НДК е построен върху площ от
                                    18 300 m² и има обем 576 800 m³.</p>
                                История
                                <p>Инициативата за създаване на голям културен център в София е на столичното
                                    ръководство на БКП и датира от средата на 70-те години на миналия век. Първите
                                    стъпки, свързани с намерението, проучването и проектирането, са направени през 1975
                                    г. Тогава в тази централна градска част е имало десетина набързо струпани след
                                    бомбардировките през Втората световна война неугледни постройки, товарна жп гара за
                                    въглища, стари казарми и стотици декари пустеещи площи. В Софийския градски комитет
                                    на БКП и Столичния народен съвет решават на това място да се оформи модерна
                                    градоустройствена среда, като част от главния градски център, ориентирана към
                                    Витоша.</p>
                                <p>Първоначално теренът е определен за оперен театър. Обявен бил международен
                                    конкурс, в който участват архитекти от страната и чужбина. Журито се оглавява от
                                    тогавашния председател на Комитета за култура Павел Матев, но не излъчва победител и
                                    конкурсът пропада. След оживени дискусии се стига до единодушно мнение – мястото е
                                    най-удобно за бъдещ център с многофункционално културно предназначение. Такава
                                    функция дотогава изпълнявала спортната зала „Универсиада“. Проектирането е поверено
                                    на ателието на арх. Александър Баров и конструктора инж. Богдан Атанасов. Те са
                                    подпомогнати от главния архитект на София Владимир Роменски, арх. Стефан Стайнов –
                                    министър на архитектурата, проф. инж. Милчо Брайнов, основен консултант по
                                    конструкцията на сградата. На арх. Атанас Агура и инж. (ландш. арх.) Валентина
                                    Атанасова е възложено да проектират изграждането на околното пространство и парка.
                                    „Софпроект“ с ръководител Чедомир Павлов прави подземните обекти и метролинията,
                                    комуникациите и бъдещия бул. „България“.
                                </p>
                                <p>„Още тогава имахме генерална схема за бъдещото метро, която включваше линии под това
                                    място. Ето защо единодушно решихме, въпреки съпротивата на влиятелни хора, да
                                    изградим цялото подземно пространство на голяма дълбочина и освен подземен булевард
                                    с трамвайна линия, гараж с повече от хиляда места, магазини и други площи, да се
                                    оформят в груб строеж две станции и трасе за бъдещото метро от бул. „Патриарх
                                    Евтимий“ до подножието на „Лозенец“. Това си спомня пред БТА Георги Йорданов,
                                    първият ръководител на щаба за координация на изпълнението на проектирането и
                                    строителството – от началото на 1978 г. до есента на 1979 г.</p>
                                <div>
                                	<?php
									$images = $user->displayImagesByCategory(0);
									if($user->isLogged()) {
										if(!empty($images)) {
											foreach ($images as $img) {
												echo '<img class="uploaded-images" src="data:image;base64,'.$img['image'].'">';
											}
										}
									}
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card__container card__container--closed" onclick="clickFunction(this)">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" class="card__image"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 500"
                             preserveAspectRatio="xMidYMid slice">
                            <defs>
                                <clipPath id="clipPath2">
                                    <circle class="clip" cx="960" cy="250" r="992"></circle>
                                </clipPath>
                            </defs>
                            <image clip-path="url(#clipPath2)" width="1920" height="500"
                                   xlink:href="images/day/bib.jpg" class="landmark_image"></image>
                        </svg>
                        <div class="card__content style-day">
                            <i class="card__btn-close fa fa-times"></i>
                            <div class="card__caption">
                                <button class="upload-img show-upload-modal mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-js-ripple-effect add-fab">
                                    <i class="material-icons">add</i>
                                </button>
                                <h2 class="card__title">Национална библиотека "Св. Св. Кирил и Методий"</h2>
                                <p class="card__subtitle">Най-голямата публична библиотека в страната</p>
                            </div>
                            <div class="card__copy">
                                <div class="meta">
                                    <iframe width="500" height="350" frameborder="0" scrolling="no" marginheight="0"
                                            marginwidth="0"
                                            src="http://maps.google.ca/maps?f=q&amp;q=Народна библиотека&amp;output=embed"></iframe>
                                    <br/>
                                </div>
                                <p>Националната библиотека „Св. св. Кирил и Методий“ (преди Народна библиотека „Св. св.
                                    Кирил и Методий“), която се намира в град София, е най-старият културен институт на
                                    следосвобожденска България и най-голямата публична библиотека в страната.
                                    Библиотеката е разположена до Софийския университет „Свети Климент Охридски“.
                                    Депозитна е за всички документи, публикувани в България. Притежава и монографии,
                                    периодични издания и други документи на различни езици, публикувани в страни от цял
                                    свят. Библиотечният фонд наброява 7 808 928 библиотечни единици. Библиотеката издава
                                    специализирано списание за библиотечна теория и практика – списание
                                    „Библиотека“.</p>
                                История
                                <p>По идея на софийския учител Михаил К. Буботинов на 10 декември (28 ноември стар стил)
                                    1878 г. е създадена комисия с председател Марин Дринов, която да създаде българска
                                    национална библиотека. Тя е основана на 17 юни 1879 г. като държавно учреждение с
                                    името Българска народна библиотека. През 1900 г. за библиотеката е закупена сграда
                                    на улица „Георги Раковски“ 131. През 1924 г. към нея е добавен създаденият през
                                    1904. </p>
                                <p>През 1939 г. започва строителството на нова сграда за Народната библиотека на мястото
                                    на Царския манеж. По време на бомбардировките на София през 1944 г. и двете сгради
                                    са разрушени. Новата сграда е проектирана от архитектите Иван Васильов и Димитър
                                    Цолов. Фасадата е дело на скулптора Михайло Парашчук. Построена е със сключен през
                                    1946 г. целеви държавен заем и е открита на 16 декември 1953 г.</p>
								<div>
                                	<?php
									$images = $user->displayImagesByCategory(1);
									if($user->isLogged()) {
										if(!empty($images)) {
											foreach ($images as $img) {
												echo '<img class="uploaded-images" src="data:image;base64,'.$img['image'].'">';
											}
										}
									}
									?>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card__container card__container--closed" onclick="clickFunction(this)">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" class="card__image"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 500"
                             preserveAspectRatio="xMidYMid slice">
                            <defs>
                                <clipPath id="clipPath3">
                                    <circle class="clip" cx="960" cy="250" r="992"></circle>
                                </clipPath>
                            </defs>
                            <image clip-path="url(#clipPath3)" width="1920" height="500"
                                   xlink:href="images/day/naroden.jpg" class="landmark_image"></image>
                        </svg>
                        <div class="card__content style-day">
                            <i class="card__btn-close fa fa-times"></i>
                            <div class="card__caption">
                                <button class="upload-img show-upload-modal mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-js-ripple-effect add-fab">
                                    <i class="material-icons">add</i>
                                </button>
                                <h2 class="card__title">Народен театър "Иван Вазов"</h2>
                                <p class="card__subtitle">Сцената на София</p>
                            </div>
                            <div class="card__copy">
                                <div class="meta">
                                    <iframe width="500" height="350" frameborder="0" scrolling="no" marginheight="0"
                                            marginwidth="0"
                                            src="http://maps.google.ca/maps?f=q&amp;q=Народен театър&amp;output=embed"></iframe>
                                    <br/>
                                </div>
                                <p>Народен театър „Иван Вазов“ е Национален културен институт в областта на театралното
                                    изкуство. След Освобождението на България от османско иго град София е определен за
                                    столица. Постепенно тук се създават нови учебни и културни институции. За начало на
                                    летоброенето на Народния театър се счита заповед на министъра на Народното
                                    просвещение д-р Иван Д. Шишманов, с която от 1 януари 1904 г. управителят на
                                    подкрепяната от държавата Народна драматическа трупа „Сълза и смях“ г-н Илия Миларов
                                    е назначен за „Интендант“. От пролетта на същата година названието на трупата вече е
                                    Български народен театър.</p>
                                <p>От 1906 г. до 1952 г. трупата носи името Народен театър, а от 1952 г. до 1962 г. –
                                    Народен театър „Кръстьо Сарафов“. От 1962 г. и до днес официалното название е
                                    Народен театър „Иван Вазов“. </p>
                                <p>Със заповед от 14 юли 1903 г. министър д-р Ив. Д. Шишманов назначава комисия начело с
                                    г-н Илия Миларов, която да подготви предложение за постройка на сграда за Народния
                                    театър в София. Народното събрание взима решение и с Указ на княз Фердинанд I се
                                    отчуждава терен на мястото на бившия дъсчен театър „Основа“, където през юни 1904 г.
                                    започва строежът на сградата по проект на виенските архитекти Фердинанд Фелнер и
                                    Херман Хелмер. Живописното оформление на тавана и стените в зрителната зала, която
                                    разполага с 848 места, е възложено на известния виенски художник Рудолф Фукс.
                                    Народният театър отваря врати на 3 януари 1907 г. със специално представление. Преди
                                    тържественото откриване множество студенти освирква княз Фердинанд I и той с указ
                                    решава да затвори Софийския университет за шест месеца.</p>
                                <p>На 10 февруари 1923 г. по време на юбилейния спектакъл „Апотеоз на родното драматично
                                    изкуство“ избухва пожар, който унищожава театъра. От началото на новия сезон трупата
                                    играе разделена на две части в различни градове на България, а след това шест години
                                    – на сцената на специално ремонтирания „Свободен театър” в София.</p>
								<div>
                                	<?php
									$images = $user->displayImagesByCategory(2);
									if($user->isLogged()) {
										if(!empty($images)) {
											foreach ($images as $img) {
												echo '<img class="uploaded-images" src="data:image;base64,'.$img['image'].'">';
											}
										}
									}
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card__container card__container--closed" onclick="clickFunction(this)">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" class="card__image"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 500"
                             preserveAspectRatio="xMidYMid slice">
                            <defs>
                                <clipPath id="clipPath4">
                                    <circle class="clip" cx="960" cy="250" r="992"></circle>
                                </clipPath>
                            </defs>
                            <image clip-path="url(#clipPath4)" width="1920" height="500"
                                   xlink:href="images/day/narodno.jpg" class="landmark_image"></image>
                        </svg>
                        <div class="card__content style-day">
                            <i class="card__btn-close fa fa-times"></i>
                            <div class="card__caption">
                                <button class="upload-img show-upload-modal mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-js-ripple-effect add-fab">
                                    <i class="material-icons">add</i>
                                </button>
                                <h2 class="card__title">Народно събрание на Република България</h2>
                                <p class="card__subtitle">Седянката на политиците</p>
                            </div>
                            <div class="card__copy">
                                <div class="meta">
                                    <iframe width="500" height="350" frameborder="0" scrolling="no" marginheight="0"
                                            marginwidth="0"
                                            src="http://maps.google.ca/maps?f=q&amp;q=Народно събрание&amp;output=embed"></iframe>
                                    <br/>
                                </div>
                                <p>Сградата на Народното събрание е сред първите обществени сгради, построени след
                                    Освобождението. Намира се на площад „Народно събрание“ 2 в София.</p>
                                <p>Правителственото решение за построяване на сегашната сграда на Народното събрание е
                                    взето на 4 февруари 1884, като по това време министър-председател е Петко
                                    Каравелов. Предвиденото място за новата сграда се намира в покрайнините на
                                    столицата. Преди Освобождението тук са се намирали т.нар. позорни гробища, където
                                    турците погребвали екзекутираните престъпници.</p>
                                <p>Проектът е изработен от сръбския архитект от български произход Константин Йованович.
                                    Той е учил в Австрия и Швейцария и по-късно проектира и сградата на Сръбската
                                    национална банка в Белград (1891-1892). Йованович предлага проекта си на 7 май 1884
                                    г., а на 22 май с.г. Народно събрание гласува 220 хил. франка за строеж на сградата.
                                    На 25 ноември с.г. княз Александър І, Стефан Стамболов и търновския митрополит
                                    Климент полагат основния камък . Строителството и обзавеждането продължават до 1886
                                    г. под надзора на главния архитект към Дирекцията за обществено строителство арх.
                                    Фридрих Грюнангер (1856-1929) и неговия асистент Йозеф Прошек (1861-1928). Въпреки
                                    това депутатите започват да заседават в нея от 28 май 1885 г. През 1896-1899 година
                                    е построено двуетажно разширение от северната страна за канцеларии и архив по проект
                                    на архитект Йордан Миланов-тогава зам. началник на Архитектурното отделение в
                                    Министерство на обществените сгради, пътищата и благоустройството. През 1925 година
                                    започва изграждането на триетажно северно крило с чакалня, кулоари и архив, което
                                    оформя фронта към пл. „Св. Александър Невски” по проект на архитект Пенчо Койчев.
                                    Строителствот завършва в 1928 г.</p>
                                <p>По време на бомбардировките над София на 10.01.1944 г. сградата на парламента е
                                    засегната леко. Частични преустройства са правени през 1962 г., когато е инсталирана
                                    дървена ламперия от славонски дъб, през 1977 г. и 1985 г., когато е реновирано
                                    обзавеждането от колектив от КИПП „Главпроект” с ръководител арх. Павел Николов
                                    (1922-2009 г.). Въпреки поредицата намеси, постройката е със запазен първоначален
                                    образ и характер на интериорните пространства</p>
                                <p>Сградата на парламента заема централно положение в композицията на площад „Народно
                                    събрание“. Стилът ѝ е неоренесанс, като на фронтона е изписан девизът „Съединението
                                    прави силата“, част и от националния герб на България. Сградата е исторически,
                                    архитектурен и художествен паметник на културата от национално значение. Тя е
                                    кандидат за символ на София.</p>
								<div>
                                	<?php
									$images = $user->displayImagesByCategory(3);
									if($user->isLogged()) {
										if(!empty($images)) {
											foreach ($images as $img) {
												echo '<img class="uploaded-images" src="data:image;base64,'.$img['image'].'">';
											}
										}
									}
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card__container card__container--closed" onclick="clickFunction(this)">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" class="card__image"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 500"
                             preserveAspectRatio="xMidYMid slice">
                            <defs>
                                <clipPath id="clipPath5">
                                    <circle class="clip" cx="960" cy="250" r="992"></circle>
                                </clipPath>
                            </defs>
                            <image clip-path="url(#clipPath5)" width="1920" height="500"
                                   xlink:href="images/day/nevski.jpg" class="landmark_image"></image>
                        </svg>
                        <div class="card__content style-day">
                            <i class="card__btn-close fa fa-times"></i>
                            <div class="card__caption">
                                <button class="upload-img show-upload-modal mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-js-ripple-effect add-fab">
                                    <i class="material-icons">add</i>
                                </button>
                                <h2 class="card__title">Храм-паметник "Св. Александър Невски"</h2>
                                <p class="card__subtitle">Катедралата</p>
                            </div>
                            <div class="card__copy">
                                <div class="meta">
                                    <iframe width="500" height="350" frameborder="0" scrolling="no" marginheight="0"
                                            marginwidth="0"
                                            src="http://maps.google.ca/maps?f=q&amp;q=храм Александър Невски&amp;output=embed"></iframe>
                                    <br/>
                                </div>
                                <p>„Свети Александър Невски“ е православен храм-паметник в София, който e катедрален
                                    храм на българския патриарх. Около катедралата се намира площад със същото име. През
                                    1955 г. е обявен за паметник на културата с национално значение.</p>
                                История

                                <p>Решението за „изграждане паметник за светлия подвиг на Освобождението, в който се сля
                                    кръвта на освободителите с кръвта на освободените“ е взето още през 1879 г. от
                                    Учредителното събрание в Търново (предложението прави Петко Каравелов). Дадени са
                                    няколко предложения за място на паметника и първоначално е избрано Велико Търново,
                                    но след като за столица е избрана София, Първо обикновено народно събрание решава
                                    храмът да се построи в столицата. Княз Александър се обръща с възвание към българите
                                    и храмът е вдигнат с народни дарения. Събрани са доброволни вноски на обща сума 1
                                    900 000 лв. Основният камък е положен с изключителна тържественост на 3 март (19
                                    февруари стар стил) 1882 г., четвъртата годишнина от подписването на Санстефанския
                                    договор. В основите на храма е вградена метална кутия, в която са записани имената
                                    на членовете на правителството.</p>
                                <p>Храмът е по проект на руския архитект проф. Александър Померанцев (1848-1918),
                                    италиански възпитаник, с помощници руските архитекти Александър Смирнов (1861 – ?) и
                                    Александър Яковлев (1879-1951) и е издигнат на най-високото място по онова време в
                                    София – 552 m н.в. Първият проект (1884-1885 г.) е изработен от акад. арх. Иван
                                    Богомолов, след чиято смърт проф. арх. Померанцев изцяло променя проекта.
                                    Окончателният проект е готов през 1898 г. Строежът на храма започва през 1904 г. и е
                                    завършен през 1912 г., като цялостното изпълнение възлиза на обща стойност 5,5
                                    милиона лева. Храмът е осветен на 24 август 1924 г.</p>
                                <p>Шрапнелите и ударните вълни от англо-американските бомбардировки на София през
                                    Втората световна война повреждат сериозно катедралата. Засегната е най-много
                                    северозападната част. Медната обшивка е пробита на много места, разрушени са всички
                                    мозаични икони от подвратните тимпани, а стъклата на иконостасните икони са счупени.
                                    Повредена е живописта в северозападната галерия, както и някои картини от сводовите
                                    проходи.</p>
                                <p>С решение от 1 октомври 2014 г. на служебния кабинет на проф. Георги Близнашки
                                    собствеността на храма се предоставя на Светия синод на Българската православна
                                    църква.</p>
								<div>
                                	<?php
									$images = $user->displayImagesByCategory(4);
									if($user->isLogged()) {
										if(!empty($images)) {
											foreach ($images as $img) {
												echo '<img class="uploaded-images" src="data:image;base64,'.$img['image'].'">';
											}
										}
									}
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card__container card__container--closed" onclick="clickFunction(this)">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" class="card__image"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 500"
                             preserveAspectRatio="xMidYMid slice">
                            <defs>
                                <clipPath id="clipPath6">
                                    <circle class="clip" cx="960" cy="250" r="992"></circle>
                                </clipPath>
                            </defs>
                            <image clip-path="url(#clipPath6)" width="1920" height="500"
                                   xlink:href="images/day/osvoboditel.jpg" class="landmark_image"></image>
                        </svg>
                        <div class="card__content style-day">
                            <i class="card__btn-close fa fa-times"></i>
                            <div class="card__caption">
                                <button class="upload-img show-upload-modal mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-js-ripple-effect add-fab">
                                    <i class="material-icons">add</i>
                                </button>
                                <h2 class="card__title">Паметник на Цар Освободител</h2>
                                <p class="card__subtitle">Паметникът на Освободителите</p>
                            </div>
                            <div class="card__copy">
                                <div class="meta">
                                    <iframe width="500" height="350" frameborder="0" scrolling="no" marginheight="0"
                                            marginwidth="0"
                                            src="http://maps.google.ca/maps?f=q&amp;q=паметник Цар Освободител&amp;output=embed"></iframe>
                                    <br/>
                                </div>
                                <p>Паметникът на Царя Освободител, наричан още Паметник на Освободителите, е един от
                                    най-внушителните паметници в София, дело на италианския скулптор Арналдо Дзоки.
                                    Издигнат е в чест на Освобождението на България (1878 г.), в израз на
                                    признателността на българския народ към руския народ в лицето на руския император
                                    Александър II и като символ на българската свобода. Намира се на столичния булевард
                                    „Цар Освободител“ на площад „Народно събрание“ с лице към сградата на българския
                                    парламент. Официалното му откриване е през 1907 г.</p>
                                <p>Паметникът е едно от големите постижения на прочутия флорентински скулптор Арналдо
                                    Дзоки. Италианецът печели конкурса за проект, обявен в края на 19 век по инициатива
                                    на Върховния поборническо-опълченски комитет, в конкуренция с близо 90 скулптори от
                                    15 страни. Инженерно-техническото изпълнение на паметника е поверено на инж. Христо
                                    Станишев.</p>
                                <p>Монументът представлява 4,5-метрова конна фигура на Александър II, изработена от
                                    бронз, положена върху постамент от черен полиран гранит. Общата височина е 12 метра.
                                    Средната част е с фигури и масивен ренесансов корниз, завършен със скулптурата на
                                    руския цар, възседнал кон. Околовръстен висок релеф от бронз, опасващ средната част
                                    на постамента, изобразява народа поведен в битка от богинята на победата Нике. В
                                    релефа са портретувани лицата на над 30 военачалници, държавници и общественици,
                                    между които генерал Михаил Скобелев, генерал Йосиф Гурко, граф Николай Игнатиев,
                                    княз Николай Николаевич старши. Други три по-малки бронзови релефа изобразяват
                                    ключови събития като битката при Стара Загора, подписването на Санстефанския мирен
                                    договор и свикването на Учредителното събрание. Фронталната част на паметника е
                                    увенчана с бронзов лавров венец, дар от румънския крал Карол I в памет на загиналите
                                    румънски воини и с надписа „Царю Освободителю // Признателна България“.</p>
								<div>
                                	<?php
									$images = $user->displayImagesByCategory(5);
									if($user->isLogged()) {
										if(!empty($images)) {
											foreach ($images as $img) {
												echo '<img class="uploaded-images" src="data:image;base64,'.$img['image'].'">';
											}
										}
									}
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card__container card__container--closed" onclick="clickFunction(this)">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" class="card__image"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 500"
                             preserveAspectRatio="xMidYMid slice">
                            <defs>
                                <clipPath id="clipPath7">
                                    <circle class="clip" cx="960" cy="250" r="992"></circle>
                                </clipPath>
                            </defs>
                            <image clip-path="url(#clipPath7)" width="1920" height="500"
                                   xlink:href="images/day/rektorat.jpg" class="landmark_image"></image>
                        </svg>
                        <div class="card__content style-day">
                            <i class="card__btn-close fa fa-times"></i>
                            <div class="card__caption">
                                <button class="upload-img show-upload-modal mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-js-ripple-effect add-fab">
                                    <i class="material-icons">add</i>
                                </button>
                                <h2 class="card__title">Софийски университет „Св. Климент Охридски“</h2>
                                <p class="card__subtitle">Alma Mater</p>
                            </div>
                            <div class="card__copy">
                                <div class="meta">
                                    <iframe width="500" height="350" frameborder="0" scrolling="no" marginheight="0"
                                            marginwidth="0"
                                            src="http://maps.google.ca/maps?f=q&amp;q=Софийски Университет&amp;output=embed"></iframe>
                                    <br/>
                                </div>
                                <p>Софийският университет „Св. Климент Охридски“ (от 1944 до 1989 г. се нарича Софийски
                                    държавен университет) е най-старото и най-голямото висше училище в България.</p>
                                <p>Според световната класация на университетите към 2014 година заема 826-то място в
                                    света и 341-то в цяла Европа[1].</p>
                                <p>Университетът е създаден на 1 октомври 1888 г. като Висш педагогически курс
                                    . Централната част на сградата на СУ на стойност 6 милиона златни лева е
                                    построено с дарение на братята Евлоги и Христо Георгиеви, чиито скулптури красят
                                    нейната фасада[5] Пъвият ректор на Софийския университет е акад. Александър
                                    Теодоров-Балан.</p>

                                История
                                <p>През 1880 г. Министерството на просвещението на току-що възстановената българска
                                    държава внася в Народното събрание проект за Основен закон за училищата, чиято идея
                                    е да се създаде българско висше училище, което да приема завършилите обучението си в
                                    реалните и класическите гимназии. Едва през 1887 г. е издадена наредба от министъра
                                    на просвещението Тодор Иванчов за откриване на педагогически клас към Първа мъжка
                                    гимназия в София. Във временния правилник е предвидено функционирането само на
                                    историко-филологическо отделение.</p>
                                <p>На заседанието си от 8 декември 1888 г., отчитайки доброто начало на Висшия
                                    педагогически курс, Народното събрание взема решение и приема закон за
                                    преобразуването му във Висше училище. На 29 януари 1889 г. в присъствието на
                                    Иван Шишманов, представител на Министерство на просвещението, е избран първият
                                    ректор на висшето училище – Александър Теодоров-Балан измежду първите му седем
                                    преподаватели – т. нар. „нови седмочисленици“, сред които Любомир Милетич, Иван
                                    Георгов и Никола Михайловски. През 1904 г. е преименуван на университет.</p>
								<div>
                                	<?php
									$images = $user->displayImagesByCategory(6);
									if($user->isLogged()) {
										if(!empty($images)) {
											foreach ($images as $img) {
												echo '<img class="uploaded-images" src="data:image;base64,'.$img['image'].'">';
											}
										}
									}
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card__container card__container--closed" onclick="clickFunction(this)">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" class="card__image"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 500"
                             preserveAspectRatio="xMidYMid slice">
                            <defs>
                                <clipPath id="clipPath8">
                                    <!-- r = 992 = hyp = Math.sqrt(960*960+250*250) -->
                                    <circle class="clip" cx="960" cy="250" r="992"></circle>
                                </clipPath>
                            </defs>
                            <image clip-path="url(#clipPath8)" width="1920" height="500"
                                   xlink:href="images/day/samuil.jpg" class="landmark_image"></image>
                        </svg>
                        <div class="card__content style-day">
                            <i class="card__btn-close fa fa-times"></i>
                            <div class="card__caption">
                                <button class="upload-img show-upload-modal mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect add-fab">
                                    <i class="material-icons">add</i>
                                </button>
                                <h2 class="card__title">Паметник на Цар Самуил</h2>
                                <p class="card__subtitle">Горящият взор</p>
                            </div>
                            <div class="card__copy">
                                <div class="meta">
                                    <iframe width="500" height="350" frameborder="0" scrolling="no" marginheight="0"
                                            marginwidth="0"
                                            src="http://maps.google.ca/maps?f=q&amp;q=Незнайния войн&amp;output=embed"></iframe>
                                    <br/>

                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aspernatur doloremque
                                    dolores fugiat, harum iste laboriosam laudantium modi placeat quam rem repellat
                                    tempora voluptatibus. Eos laborum repudiandae sit veniam voluptates.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquam cupiditate
                                    dolorem eius in ipsa magnam, molestias officia, perspiciatis quidem quo reiciendis
                                    sint temporibus tenetur voluptas. Aperiam itaque omnis sed!</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A atque consectetur
                                    exercitationem fuga illum impedit ipsa iste itaque laudantium magni, maiores modi,
                                    natus neque odit quas saepe similique? Ipsum, repellendus.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa distinctio dolorem
                                    facere id, itaque libero minima modi, nihil nobis non odio, officia reprehenderit
                                    sit totam vitae. Nemo similique tempora totam.</p>
								<div>
                                	<?php
									$images = $user->displayImagesByCategory(7);
									if($user->isLogged()) {
										if(!empty($images)) {
											foreach ($images as $img) {
												echo '<img class="uploaded-images" src="data:image;base64,'.$img['image'].'">';
											}
										}
									}
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
