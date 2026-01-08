<x-app-layout>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        nav,
        nav.bg-white,
        nav .bg-white,
        nav .dark\:bg-gray-800 {
            background-color: #f0f0f0 !important;
        }

        nav.border-b,
        nav .border-gray-100,
        nav .dark\:border-gray-700 {
            border-color: #f0f0f0 !important;
        }
    </style>

    <div class="page-wrap">
        <header class="header">
            <div class="header-content">
               
                <button class="menu-toggle" aria-label="Menu megnyitasa">&#9776;</button>
            </div>

            <!-- Menu -->
            <nav class="menu">
                <ul>
                    <li class="sor">
                        <form action="admin.php" method="post">
                            <input type="submit" value="Adminisztracio">
                        </form>
                    </li>
                    <li class="sor">
                        <form action="fooldal.php" method="post">
                            <input type="submit" value="Lekerdezes/Beiras">
                        </form>
                    </li>
                    <li class="sor">
                        <form action="beirasLeker.php" method="post">
                            <input type="submit" value="Beirasok visszakeresese">
                        </form>
                    </li>
                    <li class="sor">
                        <form action="tabla.php" method="post">
                            <input type="submit" value="Kijott buntetesek">
                        </form>
                    </li>
                    <li class="sor">
                        <form action="nyomtatas.php" method="post">
                            <input type="submit" value="Adatok nyomtatasa">
                        </form>
                    </li>
                    <li class="sor">
                        <form action="fptorolnevelo.php" method="post">
                            <input type="submit" value="Feketepontok nullazasa">
                        </form>
                    </li>
                </ul>
            </nav>
        </header>

        <div class="main-content">
            <p class="felhasznalo">Diakok Lekerdezese</p>
            <form method="POST" action="">
                <input style="border: black 1px solid;" type="text" name="nev" id="nev" placeholder="Diak neve">
                <br>
                <button type="submit">Lekerdezes</button>
            </form>
        </div>
    </div>

    <script>

        const toggleButton = document.querySelector('.menu-toggle');
        const menu = document.querySelector('.menu');
        const mainContent = document.querySelector('.main-content'); 

        toggleButton.addEventListener('click', () => {
        if (!menu.classList.contains('show')) {
            menu.style.transition = 'transform 0.5s ease-in-out';
            menu.style.transform = 'translateY(0)';
            menu.classList.add('show');

            mainContent.style.transition = 'transform 0.5s ease-in-out';
            mainContent.style.transform = 'translateY(380px)'; 
        }
        else
        {
            menu.style.transition = 'transform 0.5s ease-in-out';
            menu.style.transform = 'translateY(-100%)';
            menu.classList.remove('show');

            mainContent.style.transition = 'transform 0.5s ease-in-out';
            mainContent.style.transform = 'translateY(0)';
        }
});

</script>
</x-app-layout>
