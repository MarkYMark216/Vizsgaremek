<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&display=swap" rel="stylesheet">


        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])     
        @endif

        <style>

            .container {
                position: relative;
                width: 100%;
                height: 100%;           
                display: flex;
                flex-direction: column;
                justify-content: center;  
                align-items: flex-start; 
                margin-top: 0.5%;    
                text-align: left; 
                padding-left: 5%;
            }

            .title {
                font-family: 'Cinzel', serif;
                font-size: 82px;
                letter-spacing: 0.14em;

                background: linear-gradient(
                    to bottom,
                    #fff8d6,
                    #f3d889,
                    #e2b112ff,
                    #fbcd60ff
                );
                background-clip: text;
                -webkit-background-clip: text;
                color: transparent;
                -webkit-text-fill-color: transparent;
                text-shadow:
                    0 2px 2px rgba(0,0,0,0.45),
                    0 0 6px rgba(233, 168, 37, 0.1);

                margin-bottom: 16px;   
            }

            .text {
                font-family: 'Cinzel', serif;
                font-size: 22px;
                color: #dea92cff;
                 text-shadow:
                    0 4px 4px rgba(0,0,0,0.45),
                    0 0 6px rgba(0, 0, 0, 3);
                max-width: 700px;
                line-height: 1.6;
            }


        .login, .register {
            font-family: "Inter", "Helvetica Neue", Arial, sans-serif;
            font-size: 14px;
            font-weight: 400;
            letter-spacing: 0.08em;
            color: #eaeaea;
            text-decoration: none;
            padding: 8px 16px;
            border: 1px solid rgba(255, 255, 255, 0.35);
            border-radius: 2px; background: transparent;
            transition: color 0.25s ease, border-color 0.25s ease;
         } 

         .login, .register:hover
          {
            color: #ffffff;
             border-color: #ffffff;
        }


        </style>

    </head>
   <body
    style="min-height: 100vh;
    background: 
        linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.3)),
        url('/images/DSC_1750.jpg') center / cover no-repeat;">     
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="login">
                            Bejelentkezés
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="register">
                                Regisztráció
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
        <div class="container">
            <div class="title">DORM LOG</div>
            <p class="text">
                Üdvözöljük a Dorm Log weboldalán!<br>
                Kérjük, regisztráljon vagy jelentkezzen be.
            </p>
        </div>
        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
