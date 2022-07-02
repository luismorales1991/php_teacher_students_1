<?php
session_start();

if (isset($_SESSION["access-token"])) {
    header("Location: ./src/main-menu.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeacherStudents</title>
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/about.css">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0e82dbf83d.js" crossorigin="anonymous"></script>
</head>

<body class="a-dk">
    <?php include_once("./src/layout/info.php") ?>
    <header>
        <nav class="navbar a-dk">
            <div class="m-container">
                <a style="color: black" href="index.php">
                    <h2 class="logo a-dk">Teacher<span>Students</span></h2>
                </a>
                <div class="f-right">
                    <button id="switch-dark-mode-1" class="switch-dark-button switch-dark-mode-label">
                        <span class="switch-dark-mode-text a-dk">Dark Mode</span>
                        <span id="switch-dark-mode-logo-1" class="switch-dark-mode-logo material-icons-outlined a-dk">
                            dark_mode
                        </span>
                    </button>
                    <button class="info-btn" id="info-button-1"><span class="info-nav switch-dark-mode-label switch-dark-mode-logo material-icons-outlined">info</span></button>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <form class="form-1 a-dk w-fit center-flex signin-div" method="post" action="./controllers/signup.php">
            <div class="form-content">
                <div class="form-logo-div">
                    <h2 class="form-logo-container tx-center">
                        <div class="form-logo-grid-item">
                            <i class="a-dk form-logo fa-solid fa-calculator"></i>
                        </div>
                        <div class="form-logo-grid-item form-l-contra">
                            <i class="form-logo fa-solid fa-subscript"></i>
                        </div>
                        <div class="form-logo-grid-item form-l-contra">
                            <i class="form-logo fa-solid fa-square-root-variable"></i>
                        </div>
                        <div class="form-logo-grid-item">
                            <i class="a-dk form-logo fa-solid fa-ruler"></i>
                        </div>
                    </h2>
                </div>
                <h1 class="a-dk form-title">Sign Up</h1>
                <?php if (isset($_GET["error"])) { ?>
                    <div class="form-element">
                        <div style="font-size: 0.9rem" class="a-dk panel-error"><?= $_GET["error"] ?></div>
                    </div>
                <?php  } ?>
                <div class="form-element">
                    <h5 class="a-dk">Username</h5>
                    <input required placeholder="4-16 characters" class="a-dk form-input-text" name="username" type="text" />
                </div>
                <div class="form-element">
                    <h5 class="a-dk">Password</h5>
                    <div style="position: relative">
                        <input required placeholder="4-30 characters" class="a-dk form-input-text" id="show-password-0" name="pwd" type="password" />
                        <span class="show-password" id="show-password-span-0"><i class="fa-solid fa-eye" id="show-password-icon-0"></i></span>

                    </div>
                </div>
                <div class="form-element">
                    <h5 class="a-dk">Confirm Password</h5>
                    <div style="position: relative">
                        <input required placeholder="Confirm Password" class="a-dk form-input-text" id="show-password-1" name="c-pwd" type="password" />
                        <span class="show-password" id="show-password-span-1"><i class="fa-solid fa-eye" id="show-password-icon-1"></i>

                    </div>
                </div>
                <div class="form-element">
                    <h5 class="a-dk">I am a: </h5>
                    <select required class="a-dk form-input-text" name="role">
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                    </select>
                </div>
                <div class="form-element">
                    <hr>
                </div>
                <div class="form-element">
                    <h5 class="a-dk">Gender</h5>
                    <select required class="a-dk form-input-text" name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-element">
                    <h5 class="a-dk">Email</h5>
                    <input required placeholder="example@domain.com" class="a-dk form-input-text" name="email" type="email" />
                </div>
                <div class="form-element">
                    <h5 class="a-dk">Phone</h5><button id="generate-phone-btn" class="generate-random-data-button a-dk button-main-cty" type="button"># Generate Random</button>
                    <input required placeholder="+1 (xxx) xxx-xxxx" id="input-phone" name="phone" class="a-dk form-input-text" type="text" />
                </div>

                <hr id="dividor-login">
                <div class="form-element submit-login-container">
                    <button class="submit-login-item button button-main" name="submit" type="submit">Sign Up</button>
                    <a class="a-dk button-login-2 submit-login-item button button-a button-main-cty" href="index.php">I already have an account</a>
                </div>
        </form>
        </div>
    </main>
    <span style="opacity: 0" class="material-icons">
        dark_mode
    </span>

    <script src="./node_modules/cleave.js/dist/cleave.min.js"></script>
    <script src="./node_modules/cleave.js/dist/addons/cleave-phone.us.js"></script>
    <script src="./js/about.js"></script>
    <script src="./js/index.js"></script>
    <script src="./js/signup.js"></script>
</body>

</html>