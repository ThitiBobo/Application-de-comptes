@extends('template')

@section('title')
    Liste des dépenses
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
    <nav class="navbar navbar-light">
        <form class="form-inline">
            <a href="{{ url('/wimw/overview') }}"><button class="btn btn-sm btn-outline-secondary" type="button">Vue d'ensemble</button></a>
            <span> &nbsp; &nbsp;  </span>
            <a href="{{ url('/wimw/list') }}"><button class="btn btn-warning" type="button">Liste des dépenses</button></a>
            <span> &nbsp; &nbsp;  </span>
            <a href="{{ url('/wimw/budget') }}"><button class="btn btn-sm btn-outline-secondary" type="button">Budget</button></a>
            <span> &nbsp; &nbsp;  </span>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ajouter...
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ url('/wimw/add-spending') }}">une dépense</a>
                    <a class="dropdown-item" href="{{ url('/wimw/add-category') }}">une catégorie</a>
                </div>
            </div>
        </form>
    </nav>
    <br/>


    <br/>

    <h2>Liste de vos dépenses</h2>


    <div class="dropdown show" style="margin-left:1%;">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Regrouper/trier par...
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="{{ url('/wimw/list-ascending') }}">montant croissant</a>
            <a class="dropdown-item" href="{{ url('/wimw/list-descending') }}">montant décroissant</a>
            <a class="dropdown-item" href="{{ url('/wimw/list-this-month') }}">ce mois-ci</a>
            <a class="dropdown-item" href="{{ url('/wimw/list-this-year') }}">cette année</a>
            <a class="dropdown-item" href="{{ url('/wimw/list') }}">retourner à l'affichage classique (toutes les dépenses)</a>
        </div>
    </div>

    <br />

    <?php /** @var $depense \App\Models\Depense */ ?>
    @foreach ($depenses as $depense)
        <!-- un numéro d'une liste organisée devant chaque dépense -->
        <ol>
            <!-- un élément de la liste d'organisé (unique) -->
            <li>
                <!-- numéro de dépense -->
                <p>
                    Dépense n° <i>{{ $depense->getIdDepense() }}</i>
                </p>
                <!-- informations relatives à la dépense -->
                <ul>
                    <!-- catégorie -->
                    <li>
                        Catégorie : <span class="bold text-info">{{ $depense->getCategorie()->getNom() }}</span>
                    </li>
                    <!-- date -->
                    <li>
                        Date : <span class="bold text-info">{{ $depense->getDateDepense() }}</span>
                    </li>
                    <!-- montant -->
                    <li>
                        Montant : <span class="bold text-warning"> {{ $depense->getMontant() }} €</span>
                    </li>
                    <!-- nature paiement -->
                    <li>
                        Mode : <span class="bold text-info"> {{ $depense->getNaturePaiement()->getNom() }} </span>
                    </li>
                    <!-- nom -->
                    <li>
                        Nom :
                        <span class="text-secondary">
                        @if($depense->getNom() != "")
                            {{ $depense->getNom() }}
                        @else
                            Aucun nom renseigné
                        @endif
                        </span>
                    </li>
                    <!-- description -->
                    <li>
                        Description :
                        <span class="text-secondary">
                        @if($depense->getDescription() != "")
                            {{ $depense->getDescription() }}
                        @else
                            Aucune description renseignée
                        @endif
                        </span>
                    </li>
                </ul>
            </li>
        </ol>
    @endforeach

    <br />

@endsection