<?php
session_start();
if (isset($_SESSION['name'])) {
    header('Location: secret.php');
} ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test task</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="main">

        <form id="login-form" class="form form-login">
            <h2>Login</h2>

            <div class="field" id="log_login">
                <input type="text" required placeholder="login" name="login">
                <div class="error">Валидация : 6 символа , только буквы и цифры</div>
            </div>


            <div class="field" id="log_pass">
                <input type="password" required placeholder="password" name="password">
                <div class="error">валидация : минимум 6 символов , обязательно должны содержать цифру, буквы в разных регистрах и спец символ (знаки)</div>
            </div>
            <div class="error-message"></div>
            <p><button type="submit">Login</button></p>
        </form>

        <form id="reg-form" class="form form-reg">
            <h2>Registration</h2>
            <div class="field" id="reg_name">
                <input type="text" required placeholder="Name" name="name" >
                <div class="error">Валидация : 2 символа , только буквы и цифры</div>
            </div>
            <div class="field" id="reg_email">
                <input type="email" required placeholder="Email" name="email">
            </div>
            <div class="field" id="reg_login">
                <input type="text" required placeholder="login" name="login">
                <div class="error">Валидация : 6 символа , только буквы и цифры</div>
            </div>
            <div class="field" id="reg_pass">
                <input type="password" required placeholder="password" name="password">
                <div class="error">валидация : минимум 6 символов , обязательно должны содержать цифру, буквы в разных регистрах и спец символ (знаки)</div>
            </div>
            <div class="field" id="reg_conf_pass">
                <input type="password" required placeholder="confirm password" name="confirm_password">
                <div class="error">Пароли не совпадают</div>
            </div>
            <div class="error-message"></div>
            <p><button type="submit">Registration</button></p>
        </form>
    </div>

    <script src="main.js"></script>
</body>
</html>