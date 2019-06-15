@extends('template')

@section('title')
    Vie privée & confidentialité
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

    <br/>

    <h2> Wimw et vos données</h2>
    <p>
        What's in my Wallet traite vos données avec soin.
    </p>
    <p>
        Sont stockées dans nos bases de données :
        <ul>
            <li>
                Votre nom d'utilisateur
            </li>
            <li>
                Votre e-mail (non dévoilée au public)
            </li>
            <li>
                Votre mot de passe (crypté)
            </li>
            <li>
                L'ensemble des dépenses et catégories personnalisées que vous ajoutez.
            </li>
        </ul>
    </p>
    <p>
        Ces données font l'object d'un stockage dans une base de données et ne sont pas dévoilées à des tiers.
        WIMW utilise seulement les cookies de session, des cookies permettant de savoir si vous êtes connectés ou non.
        Ceux-ci ne sont en aucun cas utilisés pour vous proposer des publicités personnalisées ou à des fins de
        traitements informatiques divers. Vos données seront accessibles par les uniques développeurs du site web.
    </p>

    <p> A tout moment, vous pouvez nous contacter via le formulaire adéquat, accessible par le lien en bas de page.
        Nous pourrons, à votre demande, supprimer votre compte et l'ensemble des données qui y sont relatives.
        Nous conservons vos données pour une durée indéterminée.
    </p>

    <br />

@endsection