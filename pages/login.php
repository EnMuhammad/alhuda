<?php
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <base href="http://localhost/Alhuda1/" />
    <title>Login</title>

    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Style -->
    <link rel="stylesheet" href="css/login.css" type="text/css" media="all" />
</head>

<body>
<!-- login form -->
<section class="w3l-login-form">
    <div id="form-section">
        <div class="wrapper">

            <!-- logo -->
            <div class="logo">
                <a class="brand-logo" href="index.html">Decent login form</a>
            </div>
            <!-- //logo -->

            <!-- form -->
            <div class="login-form">
                <form  name="login-form" method="POST">
                    <div class="form-fields d-grid">
                        <input type="text" name="username" placeholder="Username" required="required" />
                        <input type="password" name="pass" placeholder="Password" required="required" />
                    </div>
                    <button type="submit">Login</button>
                </form>
            </div>
            <div class="new-signup">
                <a href="#reload" class="signuplink">Forgot password?</a>
            </div>


        </div>
    </div>
</section>
<!-- /login form -->
</body>
<script src="js/jquery.min.js"></script>
<script>
    $(function () {
        $('form[name=login-form]').on('submit',function (e) {
            e.preventDefault();
           let form = $(this);
           $.post('index.php?action&loginCheck',form.serialize(),function (data) {
             if(data === '1'){
                window.location.href ='<?=HOME_URL ?>';
             }else{
                 alert('Error Username or password');
             }
           })
        })
    })
</script>
</html>