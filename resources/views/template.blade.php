<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <!-- scripts de style -->
    {!! Html::style('css/template.css') !!}
    {!! Html::style('css/bootstrap.min.css') !!}
    <title> @yield('title')</title>
</head>
<body>

<div class="topHeader">
    <h1 class="pageTitle"> Commencez à gérer vos dépenses !</h1>
    <p class="blockquote">" ($monProverbeEconomie) "</p>
    <i class="sourceProverbe"> ($source) ($dateProv)</i>


    <h2 class="blockTitle">
        Pourquoi utiliser What's in my Wallet ?
    </h2>

    <h2 class="blockTitle">
        Qu'est-ce que ça m'apportera ?
    </h2>

    <h2 class="blockTitle">
        Et mes données dans tout ça ?
    </h2>
    <p>
        Nous traitons vos donénes avec soin.
        Vous disposez, comme la loi le stipule,
        d'un droit de rétractation sur l'ensemble
        de vos données ; elles vous appartiennent
        avant tout.
    </p>
    <p>
        N'hésitez pas à utiliser le
        <a href="{{url('/wimw/contact')}}">
            formulaire de contact
        </a>
        pour faire exercer vos droits ou pour toute
        question relative à ce sujet.
    </p>

    <p> Consultez la rubrique "
    <a class="link" href="{{url('/wimw/privacy')}}">
        Confidentialité
    </a>
        " pour plus d'informations à ce sujet !
    </p>


    <h2 class="link">
        <a href="{{url('/register')}}">
            N'attendez plus ! Pour créer un compte, c'est ici
        </a>
    </h2>

    <i>
        <a href="{{url('/login')}}">
            Déjà inscrit ? Identifiez-vous
        </a>
    </i>


</div>

    <!-- gestion login (à encapsuler dans une div) -->
    @if (Route::has('login'))
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
    @endif

    <!-- le contenu de la page -->
    @yield('content')

    <footer class="footer">

    </footer>
<!-- scripts de js ICI -->
</body>
</html>
