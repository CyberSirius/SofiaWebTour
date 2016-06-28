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
                            Search
                        </div>

                    </div>
                </form>
            </div>
            <nav class="mdl-navigation">
             <?php if($users->isLogged()) { ?>
				<span class="mdl-layout__tab text-primary-color">Welcome, <?php echo $users->getUserData()[0]['username'];?></span>
              <?php    }?>
                <img src="images/icons/day.png" alt="" class="mode_icon" onclick="$('#switch-2').prop('checked',true)">
                <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect switch" for="switch-2">
                    <input type="checkbox" id="switch-2" class="mdl-switch__input" onclick="clickToggle()">
                    <span class="mdl-switch__label"></span>
                </label>
                <div class="mdl-tooltip" for="switch-2">Change language</div>
                <img src="images/icons/night.png" alt="" class="mode_icon"
                     onclick="$('#switch-2').prop('checked',false)">
                <button id="button_language"
                        class="mdl-navigation__link mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                    <i class="material-icons">language</i>
                </button>
                <div class="mdl-tooltip" for="button_language">Change language</div>
                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-jd-ripple-effect" for="button_language">
                    <li class="mdl-menu__item">BG</li>
                    <li class="mdl-menu__item">EN</li>
                </ul>
                <?php if($users->isLogged()) { ?>
				<button type="submit" id="button_exit" name="logout"
                        class="mdl-button exit mdl-navigation__link mdl-button mdl-js-button mdl-js-ripple-effect text-primary-color mdl-button--icon">
                    <i class="material-icons">exit_to_app</i>
                </button>
              <?php    }?>
                <button type="button" id="button_account"
                        class="mdl-button show-login-modal mdl-navigation__link mdl-button mdl-js-button mdl-js-ripple-effect text-primary-color mdl-button--icon">
                    <i class="material-icons">person</i>
                </button>
                <div class="mdl-tooltip" for="button_account">Log in</div>
                <dialog class="mdl-dialog login-form">
                    <main class="mdl-layout__content">
                        <div class="mdl-dialog__content mdl-card mdl-shadow--6dp">
                            <div class="mdl-card__title background mdl-color-text--white">
                                <h2 class="mdl-card__title-text">Sofia Web Tour</h2>
                            </div>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" name="username"/>
                                    <label class="mdl-textfield__label" for="username">Username</label>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="password" name="userpass"/>
                                    <label class="mdl-textfield__label" for="userpass">Password</label>
                                </div>
	                            <div class="mdl-dialog__actions mdl-card__actions">
	                                <button type="button" class="mdl-button close mdl-js-button mdl-js-ripple-effect">Close</button>
	                              
	                                <input type="submit" name="login" class="show-login-fields mdl-button mdl-js-button mdl-js-ripple-effect"
	                                value="Log in" />
	                            </div>
                            </form>
                        </div>
                    </main>
                </dialog>
                <button type="button" id="button_reg"
                        class="mdl-button show-register-modal mdl-navigation__link mdl-button mdl-js-button mdl-js-ripple-effect text-primary-color mdl-button--icon">
                    <i class="material-icons">person_add</i>
                </button>
                <div class="mdl-tooltip" for="button_reg">Register</div>
                <dialog class="mdl-dialog register-form">
                    <main class="mdl-layout__content">
                        <div class="mdl-dialog__content mdl-card mdl-shadow--6dp">
                            <div class="mdl-card__title background mdl-color-text--white">
                                <h2 class="mdl-card__title-text">Sofia Web Tour</h2>
                            </div>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" name="username" pattern="[A-Z,a-z]*" />
                                    <label class="mdl-textfield__label" for="username">Username</label>
                                    <span class="mdl-textfield__error">Only alphabet and no spaces, please!</span>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="password" name="userpass" id="pass"/>
                                    <label class="mdl-textfield__label" for="userpass">Password</label>
                                </div>
                                <div id="divconfirm" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input onkeyup="checkPasswordMatch(); return false;" class="mdl-textfield__input" type="password" name="confirmpass" id="confirm"/>
                                    <label class="mdl-textfield__label" for="userpass">Re-enter Password</label>
<!--                                     <span class="mdl-textfield__error">Passwords do not match!</span> -->
                                </div>
	                            <div class="mdl-dialog__actions mdl-card__actions">
	                                <input type="button" onclick="return false;" class="mdl-button close mdl-js-button mdl-js-ripple-effect" value="Close" />
	                                <input type="submit" name="register" class="show-register-fields mdl-button mdl-js-button mdl-js-ripple-effect"
	                                    value="Register" />
	                            </div>
                            </form>
                        </div>
                    </main>
                </dialog>
                
                <div class="mdl-tooltip" for="upload_img">Upload Image</div>
                <dialog class="mdl-dialog upload-form">
                    <main class="mdl-layout__content">
                        <div class="mdl-dialog__content mdl-card mdl-shadow--6dp">
                            <div class="mdl-card__title background mdl-color-text--white">
                                <h2 class="mdl-card__title-text">Sofia Web Tour</h2>
                            </div>
                            <form name="upld" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data" id="upld">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input input-file" type="file" name="image" id="img" />
<!--                                     <label class="mdl-textfield__label" for="username">IMG</label> -->
                                </div>
<!--                                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label"> -->
<!--                                     <input class="mdl-textfield__input" type="password" name="userpass" id="pass"/> -->
<!--                                     <label class="mdl-textfield__label" for="userpass">Password</label> -->
<!--                                 </div> -->
	                            <div class="mdl-dialog__actions mdl-card__actions">
	                                <button type="button" class="mdl-button close mdl-js-button mdl-js-ripple-effect">Close</button>
	                                <input type="submit" name="upload" class="show-register-fields mdl-button mdl-js-button mdl-js-ripple-effect"
	                                    value="Upload" />
	                            </div>
                            </form>
                        </div>
                    </main>
                </dialog>
                
                <script>
                //console.log(document.upld.imageInput.value);
                var fileInput = document.querySelector('.input-file');
                fileInput.addEventListener("click", function(){
					console.log(fileInput.value);
					var file = fileInput.value;
					});
                </script>
                <!--
                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-jd-ripple-effect" for="button_account">
                        <li class="mdl-menu__item">Log in</li>
                        <li class="mdl-menu__item">Register</li>
                </ul>
                -->
            </nav>
        </div>
    </header>