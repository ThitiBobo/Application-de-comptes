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

    <br/>

    <h2> Qu'est-ce que WIMW ?</h2>
    <p>
        What's in my Wallet est un petit site vous permettant d'avoir une vue d'ensemble sur vos dépenses.
    </p>
    <p>
        Il a été réalisé par Dorian NAAJI & Thibaut DELPLANQUE dans le cadre d'un projet à Polytech Lyon (2019), dans le module
        d'Ingénierie des Systèmes d'Informations
    </p>
    <p>
        D'autres applications plus performantes existent bien entendu pour gérer des dépenses, l'idée de la réalisation
        de ce site est surtout de pouvoir améliorer nos compétences dans le cadriciel Laravel et dans le langage PHP.
        La réalisation de ce site était également pour nous l'occasion d'appréhender le déploiement d'une application Laravel
        et de comprendre comment les applications web modernes sont développées.
    </p>

    <br />

@endsection