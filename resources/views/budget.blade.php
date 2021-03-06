@extends('template')

@section('title')
    Budget
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
            <button class="btn btn-sm btn-outline-secondary" type="button"><a href="{{ url('/wimw/overview') }}">Vue d'ensemble</a></button>
            <span> &nbsp; &nbsp;  </span>
            <button class="btn btn-sm btn-outline-secondary" type="button"><a href="{{ url('/wimw/list') }}">Liste des dépenses</a></button>
            <span> &nbsp; &nbsp;  </span>
            <button class="btn btn-warning" type="button"><a href="{{ url('/wimw/budget') }}">Budget</a></button>
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

    <h2>Votre budget</h2>

    <br />

    @foreach($depensesParCategorie as $key => $value)
        <h3> {{ $key }}</h3>
        <p>
            <ul>
            <li>
                Vous avez dépensé <span class="text-danger"> {{ $value }} € </span> dans cette catégorie.
            </li>
            <li>
                Votre plafond pour cette catégorie est de <span class="text-info">{{ $usedCategories[$key]->getPlafond() }} €</span>
            </li>
            </ul>

        </p>
    @endforeach

    <br />

@endsection