<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bejelentkezés</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <p class="dok">DÖK</p>
    <form class="bejelentkezes" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mező">
            <input type="text" class="input" name="email" placeholder="Email" autocomplete="username" required autofocus>
        </div>
        <div class="mező">
            <input type="password" class="input" name="password" placeholder="Jelszó" autocomplete="current-password" required>
        </div>
        <button class="gomb" type="submit">Bejelentkezés</button>
    </form>
</body>
</html>
