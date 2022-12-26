<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Sign In/Up Form</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
<?php
if($_COOKIE['user'] == ''): // Если в ассоциативном массиве переданном через HTTP Cookie нету куки с именем user то выводится 2 формы

?>

    <div id="login">
        <form action="validation-form/check.php" method="post">
            <fieldset class="clearfix">
                <p><span class="fontawesome-user"></span><input name="login" type="text" value="Логин" onBlur="if(this.value == '') this.value = 'Логин'" onFocus="if(this.value == 'Логин') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
                <p><span class="fontawesome-lock"></span><input name="pass" type="password"  value="Пароль" onBlur="if(this.value == '') this.value = 'Пароль'" onFocus="if(this.value == 'Пароль') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
                <p><input type="submit" value="Зарегистрироваться"></p>
            </fieldset>
        </form>
        <p>уже зарегистрированы? &nbsp;&nbsp;<a href="login.php">Вход</a><span class="fontawesome-arrow-right"></span></p>
    </div>

<?php
else: // если была найдена такая кука то выводится следущее
    header('Location: /lab_2_oleg/user.php');
    ?>

<?php
endif;
?>

</body>
