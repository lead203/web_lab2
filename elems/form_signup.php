<link rel="stylesheet" type="text/css" href="/css/style.css">
<div class="wrapper_start">
    <div class="btn_start">
        <a href="/login.php" class="disable_btn">Авторизация</a>
        <a href="/signup.php" class="active_btn">Регистрация</a>
    </div>

    <div class="form_start">
        <div class="info">
            <?php include 'elems/info.php'; ?>
        </div>

        <form action="/signup.php" method="POST">
            <table>
                <tr>
                    <td><input type="text" name="login" value="<?php echo @$login ?>" placeholder="Логин" /></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" placeholder="Пароль" /></td>
                </tr>
                <tr>
                    <td><input type="password" name="password_2" placeholder="Повторите пароль" /></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Зарегистрироваться" class="button"></td>
                </tr>
            </table>
        </form>
    </div>
</div>