@extends('template')

@section('title')
    Vue d'ensemble
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
            <a href="{{ url('/wimw/overview') }}"><button class="btn btn-warning" type="button">Vue d'ensemble</button></a>
            <span> &nbsp; &nbsp;  </span>
            <a href="{{ url('/wimw/list') }}"><button class="btn btn-sm btn-outline-secondary" type="button">Liste des dépenses</button></a>
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

    <h2>Vue d'ensemble de vos dépenses</h2>

    <div class="dropdown show" style="margin-left:1%;">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Modifier l'affichage...
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="{{ url('/wimw/overview-percent') }}">Afficher en tant que pourcentages</a>
            <a class="dropdown-item" href="{{ url('/wimw/overview') }}">Afficher en valeurs numériques (€) (affichage par défaut)</a>
            <a class="dropdown-item" href="{{ url('/wimw/overview-month') }}">Dépenses du mois courant uniquement (en €)</a>
            <a class="dropdown-item" href="{{ url('/wimw/overview-year') }}">Dépenses de l'année courante uniquement (en €)</a>
        </div>
    </div>
    <br />
    <br />
    <!-- insert pie chart here -->
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                data: [{
                    type: "pie",
                    startAngle: 240,
                    yValueFormatString: ": ##0.00 €\"\"",
                    indexLabel: "{label} {y}",
                    dataPoints: [
                        @foreach($depensesParCategorie as $key => $depense)
                            {y: {{ $depense }}, label: "{{ str_replace("&", "et", $key) }}" },
                        @endforeach
                    ]
                }]
            });
            chart.render();

        }
    </script>
    <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
    <br />


    {!! Html::script('https://canvasjs.com/assets/script/canvasjs.min.js') !!}
@endsection