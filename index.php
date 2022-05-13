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
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0e82dbf83d.js" crossorigin="anonymous"></script>
</head>

<body class="a-dk">
    <div class="disable info-div info-appear" id="info-div">
        <nav class="ov-au"><button class="x-button-1 f-right" id="info-button-2"><i class="fa-solid fa-x"></i></button></nav>
        <hr>
        <div class="info-div-container">
            <h1>Welcome Netizen!</h1>
            <p>This is my first project. It is an academic grade management application.</p>
            <p>Contains two roles: Student and teacher</p>
            <p>Teacher: The teacher can perform three actions:</p>
            <ol>
                <li>You can create, read, update and delete your students' grades</li>
                <li>He has an inbox where he can accept or reject students from his class</li>
            </ol>
        </div>
    </div>
    <header>
        <nav class="navbar a-dk">
            <div class="m-container">
                <h2 class="logo a-dk">Teacher<span>Students</span></h2>
                <div class="f-right">
                    <label for="switch-dark-mode-1" class="switch-dark-mode-label">
                        <span class="switch-dark-mode-text a-dk">Dark Mode</span>
                        <span id="switch-dark-mode-logo-1" class="switch-dark-mode-logo material-icons-outlined a-dk">
                            dark_mode
                        </span>
                        <input type="checkbox" class="disable" style="padding: none" id="switch-dark-mode-1" />
                    </label>
                    <button class="info-btn" id="info-button-1"><span class="info-nav switch-dark-mode-label switch-dark-mode-logo material-icons-outlined">info</span></button>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <form class="form-1 a-dk w-fit center-flex signin-div" method="post">
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
                <h1 class="a-dk form-title">Sign In</h1>
                <div class="form-element">
                    <h5 class="a-dk">Username</h5>
                    <input placeholder="Username" class="a-dk form-input-text" type="text" />
                </div>
                <div class="form-element">
                    <h5 class="a-dk">Password</h5>
                    <input placeholder="Password" class="a-dk form-input-text" type="password" />
                </div>
                <div class="form-element submit-login-container">
                    <input class="submit-login-item button button-main" type="submit" value="Sign In">
                    <a class="a-dk button-login-2 submit-login-item button button-a button-main-cty" href="signup.php">Sign Up</a>
                </div>
        </form>
        </div>
        <a href="./src/main-menu.php">Main MENU</a>
    </main>
    <script src="./js/index.js"></script>
</body>

</html>