<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <!-- scripts de style -->
    {!! Html::style('css/template.css') !!}
    {!! Html::style('css/bootstrap.min.css') !!}
    <title> @yield('title')</title>
    <link rel="icon" href="/../img/favicon.ico" />
</head>

<body>
<div id="page-container">
    <div id="content-wrap">


<!-- le header -->
    <div class="topHeader">
        <a href="{{ url('/wimw') }}">
            <img class="logo" src="/../img/wimw.png">
        </a>
        <div class="w-100 p-3">
            <h1 class="pageTitle"> Commencez à gérer vos dépenses !</h1>
            <p class="prov">" @yield('proverbe') "</p>
            <i class="sourceProverbe"> @yield('source') @yield('dateProverbe') </i>
        </div>
    </div>

</header>

<br />
<br />
<div style="float:right; margin-right:5%;">
    @if (Route::has('login'))
        @auth
            <a href="{{ url('/wimw/overview') }}">Mon compte</a>
            <br />
                <a href="{{ url('/logout') }}"> Se déconnecter </a>
        @else
            <i>
                <a href="{{url('/login')}}">
                    Se connecter
                </a>
            </i>

            @if (Route::has('register'))
            <br />
                    <a href="{{url('/register')}}">
                        Créer un compte
                    </a>
            @endif		
        @endauth
    @endif
</div>

<br />
<!-- le contenu de la page -->

    @yield('content')
    </div>
<footer id="footer">
    <div id="container">
        <div id="left">
            <p class="footerLink">
                <a  href="{{ url('/wimw/about') }}">
                    À propos
                </a>
            </p>
            <p class="footerLink">
                <a href="{{ url('/wimw/help') }}">
                    Aides & FAQ
                </a>
            </p>
            <p class="footerLink">
                <a href="{{ url('/wimw/legal-terms') }}">
                    Mentions légales
                </a>
            </p>
            <p class="footerLink">
                <a href="{{ url('/wimw/privacy') }}">
                    Confidentialité
                </a>
            </p>
        </div>
        <div id="right">
            <br />
            <a href="https://github.com/ThitiBobo/Application-de-comptes">
                <img class="gitText" src="/../img/github-text.png">
                <img class="gitLogo" src="/../img/github-logo.png">
            </a>

        </div>
        <div id="center">
            <br />
            <p class="copyrightText">
                What's in my wallet © 2019
                <br/>
                Tous droits réservés
            </p>
            <p class="copyrightText">
                Dorian Naaji et Thibaut Delplanque - <a href="{{ url('/wimw/contact') }}"> Contact </a>
            </p>
        </div>
    </div>
    </footer>
</div>
<!-- scripts de js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>