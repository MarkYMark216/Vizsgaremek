<link rel="stylesheet" href="{{ asset('css/register.css') }}">

<div class="bg-img"></div>

<div class="content">
    <header class="regist">Regisztráció</header>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Név -->
        <div class="field space">
            <span class="fa fa-user"></span>
            <input type="text" name="name" placeholder="Név" value="{{ old('name') }}" required>
        </div>

        <!-- Email -->
        <div class="field space">
            <span class="fa fa-envelope"></span>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
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
            @error('password_confirmation')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <!-- Szobaszám -->
        <div class="field space">
            <span class="fa fa-home"></span>
            <input type="text" name="room_number" placeholder="Szobaszám" value="{{ old('room_number') }}">
            @error('room_number')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <!-- Felhasználó neme -->
        <div class="field space">
            <span class="fa fa-user"></span>
            <select name="gender" id="nem" required>
                <option value="Férfi" {{ old('gender') == 'Férfi' ? 'selected' : '' }}>Férfi</option>
                <option value="Nő" {{ old('gender') == 'Nő' ? 'selected' : '' }}>Nő</option>
            </select>
        </div>

        <!-- Csoportvezető -->
        <div class="field space">
            <span class="fa fa-user"></span>
            <input type="text" name="group_leaderid" placeholder="Csoportvezető" value="{{ old('group_leaderid') }}">
            @error('group_leaderid')
                <div class="error-text">{{ $message }}</div>
            @enderror
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
selectElem.addEventListener('mousedown', function(e) {
});


</script>

