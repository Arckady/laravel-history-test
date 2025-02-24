<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/main.css', 'resources/css/login-page.css'])
</head>
<body>
    <div class="container login-page">
        <h1 class="font_monomakh">Регистрация</h1>
        <form method="post" action="/" class="login-page__form">
            @csrf
            <input class="login-page__form__input" type="text" id="loginFormEmail" placeholder="Email">
            <input class="login-page__form__input" type="text" id="loginFormName" placeholder="Имя">
            <input class="login-page__form__input" type="text" id="loginFormPromo" placeholder="Промокод">
            <button class="login-page__form__button" type="button">Продолжить</button>
        </form>
    </div>
</body>
</html>
