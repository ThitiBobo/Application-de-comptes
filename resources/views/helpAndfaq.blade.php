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

    <h2> Comment utiliser WIMW ?</h2>
    <p>
        Il suffit de vous connecter et d'aller sur la page des dépenses.
    </p>
    <p>
        Vous pouvez ensuite ajouter des dépenses et les classer par catégorie.
    </p>
    <p>
        Une visualisation sous forme de graphique et de liste est ensuite
        disponible.
    </p>

    <br />

@endsection