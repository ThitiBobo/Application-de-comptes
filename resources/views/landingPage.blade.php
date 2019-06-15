@extends('template')

@section('title')
    Aide et FAQ
@endsection

@section('proverbe')

    <?php /** @var \App\Models\Proverb $prov */ ?>
    {{ $prov->getProverbe() }}
@endsection

@section('source')
    {{ $prov->getSource() }}
@endsection

@section('dateProverbe')
    ({{ $prov->getAnneeProverbe() }})
@endsection

@section('content')

    <h2 class="blockTitle">
        <img class="blockImg" src="img/help.svg">
        Pourquoi utiliser What's in my Wallet ?
    </h2>
    <div class="text-center blockText">
        <p>
            Pour traiter vos dépenses gratuitement
            et <span class="bold">comme un pro !</span>
            <br/>
            L'application est <span class="bold">
                facile à appréhender.
            </span>
            <br/>
            Voir quelles sont vos <span class="bold">
                sources de dépenses n'aura jamais été
                aussi facile !
            </span>
            <br />
            L'application est en constance évolution !
            <br />
            Sont prévus entre autres :
            <br />
            - Le scan de factures/tickets
            <br />
            -  La synchronisation avec
            votre relevé de compte bancaire
        </p>
    </div>
    <h2 class="blockTitle">
        <img class="blockImg" src="img/euro.svg">
        Qu'est-ce que ça m'apportera ?
    </h2>
    <div class="text-center blockText">
        <p>
                - Une <span class="bold"> vue
                d'ensemble</span> sur vos dépenses
            <br/>
                - La <span class="bold"> gestion
                simple d'un budget</span>
            <br />
                - Savoir quelles sont vos trop grandes
                sources de dépenses et éventuellement
                les modérer pour <span class="bold">
                    économiser de l'argent !
                </span>
        </p>
    </div>
    <h2 class="blockTitle">
        <img class="blockImg" src="img/fingerprint.svg">
        Et mes données dans tout ça ?
    </h2>
    <div class="text-center blockText">
        <p>
            Nous traitons vos données avec soin.
            Vous disposez, comme la loi le stipule,
            d'un droit de rétractation sur l'ensemble
            de vos données ; elles
            <span class="bold">vous appartiennent
                avant tout.</span>
            <br />
            N'hésitez pas à utiliser le
            <a href="{{url('/wimw/contact')}}">
                formulaire de contact
            </a>
            pour faire exercer vos droits ou pour toute
            question relative à ce sujet.
            <br />
            Consultez la rubrique "
            <a class="link" href="{{url('/wimw/privacy')}}">
                Confidentialité
            </a>
            " pour plus d'informations à ce sujet !
        </p>

    </div>
    <br />
    <br />


    <!-- gestion login (à encapsuler dans une div) -->
    @if (Route::has('login'))
        @auth
            <p class="text-center">
                <a href="{{ url('/wimw/overview') }}">Vue d'ensemble</a>
            </p>
        @else
            <p class="text-center">
                <i>
                    <a href="{{url('/login')}}">
                        Déjà inscrit ? Identifiez-vous
                    </a>
                </i>
            </p>

            @if (Route::has('register'))
                <h2 class="text-center">
                    <a href="{{url('/register')}}">
                        N'attendez plus ! Pour créer un compte, c'est ici
                    </a>
                </h2>
            @endif
        @endauth
    @endif





    <br />
    <br />
    <br />
    <br />
@endsection