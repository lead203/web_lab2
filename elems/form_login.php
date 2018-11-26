<link rel="stylesheet" type="text/css" href="/css/style.css">
<div class="wrapper_start">
     <div class="btn_start">
        <a href="/login.php" class="active_btn">Авторизация</a>
        <a href="/signup.php" class="disable_btn">Регистрация</a>
    </div>

    <div class="form_start">
        <div class="info">
            <?php include 'elems/info.php'; ?>
        </div>

        <form action="/login.php" method="POST">
            <table>
                <tr>
                    <td><input type="text" name="login" placeholder="Логин"></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" placeholder="Пароль"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Войти" class="button"></td>
                </tr>
            </table>
        </form>
    </div>
</div>