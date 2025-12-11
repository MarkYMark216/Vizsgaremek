<link rel="stylesheet" href="{{ asset('css/register.css') }}">

<div class="bg-img"></div>

<div class="content">
    <header class="regist">Regisztráció</header>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Név -->
        <div class="field space">
            <span class="fa fa-user"></span>
            <input type="text" name="name" placeholder="Név" required>
        </div>

        <!-- Email -->
        <div class="field space">
            <span class="fa fa-envelope"></span>
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <!-- Jelszó -->
        <div class="field space">
            <span class="fa fa-lock"></span>
            <input type="password" class="pass-key" name="password" placeholder="Jelszó" required>
        </div>

        <!-- Jelszó megerősítés -->
        <div class="field space">
            <span class="fa fa-lock"></span>
            <input type="password" class="pass-key" name="password_confirmation" placeholder="Jelszó megerősítés" required>
        </div>

        <!-- Szobaszám -->
        <div class="field space">
            <span class="fa fa-home"></span>
            <input type="text" name="szobaszam" placeholder="Szobaszám" value="{{ old('szobaszam') }}" required>
        </div>

        <!-- Felhasználó neme -->
        <div class="field space">
            <span class="fa fa-user"></span>
            <select name="nem" id="nem" required>
                <option value="férfi" {{ old('nem') == 'férfi' ? 'selected' : '' }}>Férfi</option>
                <option value="nő" {{ old('nem') == 'nő' ? 'selected' : '' }}>Nő</option>
            </select>
        </div>

        <!-- Csoportvezető -->
        <div class="field space">
            <span class="fa fa-user"></span>
            <input type="text" name="csoportvezeto" placeholder="Csoportvezető" value="{{ old('csoportvezeto') }}" required>
        </div>

        <!-- Submit -->
        <div>
            <input type="submit" value="Regisztráció" class="gomb">
        </div>

        <div class="login">
            Már regisztráltál?
            <a href="{{ route('login') }}">Jelentkezz be</a>
        </div>
    </form>
</div>


<script>

const selectElem = document.getElementById('nem');

// Csak a lenyíló lista nyitásakor (mousedown), a select maga marad átlátszó
selectElem.addEventListener('mousedown', function(e) {
    // Safari/Chrome fix: a lenyíló opciók fekete háttérét a CSS kezeli
});


</script>

