<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Student Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/css/bg.css">
</head>

<body class="bg-gradient-primary" style="background: url(&quot;assets/img/IMG_3504-scaled.jpg&quot;) center / cover no-repeat, var(--bs-border-color-translucent);color: var(--bs-border-color-translucent);border-color: transparent;">
    <div class="bg" style="background: var(--bs-border-color-translucent);"></div>
    <div class="bg bg3"></div>
    <div class="bg bg2"></div>
    <div class="container">
        <div class="row" style="padding-top: 0px;margin-top: 66px;">
            <div class="col-lg-6 d-none d-lg-flex justify-content-center" style="background: var(--bs-blue);border-style: none;opacity: 1;color: var(--bs-border-color-translucent);"><img src="assets/img/isatlogo.png" width="406" height="438" style="width: 440px;height: 440px;"></div>
            <div class="col-lg-6" style="background: var(--bs-white);">
                <div class="p-5">
                    <div class="text-center">
                        <h4 class="text-dark mb-4">Student's Login</h4>
                    </div>
                    <form class="user" id="form-login" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="mb-3"><input class="form-control form-control-user" type="text" id="txt-username"  aria-describedby="emailHelp" placeholder="Username" name="studuser"></div>
                        <div class="mb-3"><input class="form-control form-control-user" type="password" id="txt-password" placeholder="Password" name="studpass"></div>
                        <div class="mb-3">
                            <div class="custom-control custom-checkbox small">
                                
                            </div>
                        </div><button class="btn btn-primary d-block btn-user w-100" id="btn-sesion" type="submit" style="background: var(--bs-yellow);border-color: var(--bs-yellow);">Login</button>
                        <hr>
                        <hr>
                    </form>
                    <div class="text-start" style="width: 529px;"><a class="small" href="index.php">Back To Home</a></div>
                    <div class="text-start"><a class="small" href="teachers_login.php">Login as Teacher</a></div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cpwebassets.codepen.io/assets/embed/ei.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>


<?php
    require_once ("connection/connect.php");
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['studuser'];
        $password = $_POST['studpass'];

        $stmt = $conn->prepare("SELECT username, password FROM intern_students WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $stmt->bind_result($db_username, $db_password);
        $stmt->fetch();

        if ($db_username == $username && $password == $db_password){
            session_start();
            $_SESSION["studuser"] = $db_username;

            header ("Location: php_source/views/studentDashboard/stud_main.php");
        } else {
            echo "Incorrect username or password";

        }

        $stmt->close();

    }
?>  