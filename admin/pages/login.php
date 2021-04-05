<?php
require_once "../application/lib/koneksi.php";
require_once "../application/lib/config.php";
require_once "../application/functions/app.php";
require_once "../application/functions/admin.php";
 
if(isset($_SESSION['user'])){
    header('Location: index.php');
} else {
 
    $error = '';
 
    if(isset($_POST['go'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];
 
        if(!empty(trim($user)) && !empty(trim($pass))){
            if(cek_data($user, $pass)){
                $_SESSION['user'] = $user;
                header('Location: index.php');
            }else{
                $error = 'ada masalah saat login';
            }
 
        }else{
            $error = 'user dan password wajib diisi';
        }
 
    }
}
 
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
    <title>Login to Administrator</title>
 
    <link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
 
    <section class="container">
        <section class="login-form">
            <form method="post" action="" role="login">
                <img src="assets/images/logo.png" class="img-responsive" alt="" />
                <input type="text" name="username" placeholder="Username" required class="form-control input-lg" />
                <input type="password" name="password" placeholder="Password" required class="form-control input-lg" />
                <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Sign in</button>
                <div>
                    <?=$error;?>
                </div>
            </form>
            <div class="form-links">
                <a href="<?=$baseurl?>">HMKI</a>
            </div>
        </section>
    </section>
   
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>